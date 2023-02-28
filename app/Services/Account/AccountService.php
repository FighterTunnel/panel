<?php

namespace App\Services\Account;

use Carbon\Carbon;
use App\Models\Site;
use GuzzleHttp\Client;
use App\Models\Account;
use Illuminate\Support\Str;
use App\Traits\AccountFormat;
use Illuminate\Support\Facades\Validator;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;

class AccountService
{
    use AccountFormat;
    private $client;
    private $url;
    private $headers;
    private $body;
    private $token;
    private $messages;
    private $site;
    private $limit;
    public function __construct()
    {
        $this->headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'Authorization' => env('API_TOKEN')
        ];
        $this->client = new Client([
            'headers' => $this->headers
        ]);
        $this->messages = [
            'username.required' => 'Username tidak boleh kosong',
            'username.alpha_num' => 'Username hanya boleh huruf dan angka',
            'username.min' => 'Username minimal 4 karakter',
            'username.max' => 'Username maksimal 32 karakter',
            'password.required' => 'Password tidak boleh kosong',
            'password.alpha_num' => 'Password hanya boleh huruf dan angka',
            'password.min' => 'Password minimal 4 karakter',
            'password.max' => 'Password maksimal 32 karakter',
            'g-recaptcha-response.required' => 'Captcha tidak boleh kosong',
            'g-recaptcha-response.captcha' => 'Captcha tidak valid',
        ];
        $this->site = Site::first();
        $this->limit = (!isset(json_decode($this->site->tunnel)->limit)) ? 0 : json_decode($this->site->tunnel)->limit;
    }


    private function checkUsername($username)
    {
        // cek username
        $rules = [
            'ssh',
            'vps',
            'daemon',
            'bin', 'sys', 'sync', 'games', 'man', 'lp', 'mail', 'news', 'uucp', 'proxy', 'www-data', 'backup', 'list', 'irc', 'gnats', 'nobody', 'systemd-timesync', 'systemd-network', 'systemd-resolve', 'systemd-bus-proxy', 'unscd', 'ntp', '_apt', 'messagebus', 'bind', 'stunnel4', 'sshd'
        ];
        // check username exist in rules
        if (in_array($username, $rules)) {
            return false;
        }
    }

    public function createSSHAccount($server, $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'username' => 'required|alpha_num|min:4|max:32',
                'password' => 'required|alpha_num|min:4|max:32',
                'g-recaptcha-response' => 'required|captcha',
            ],
            $this->messages
        );

        if ($validator->fails()) {
            return array(
                'status' => 'error',
                'message' => $validator->errors()->first(),
            );
        }

        $username = Account::join('servers', 'servers.id', '=', 'accounts.server_id')->where('servers.ip', $server->ip)->where('accounts.username', $request->username)->first();
        if ($username) {
            return array(
                'status' => 'error',
                'message' => 'Username sudah digunakan',
            );
        }

        if ($this->checkUsername($request->username)) {
            return array(
                'status' => 'error',
                'message' => 'Username tidak boleh menggunakan username sistem',
            );
        }

        if ($server->limit <= $server->current) {
            return array(
                'status' => 'error',
                'message' => 'Server sudah penuh',
            );
        }

        if (session()->has('created ' . Str::upper($server->category->name))) {
            $created = session()->get('created ' . Str::upper($server->category->name));
            if (Carbon::now()->diffInMinutes($created) > 0) {
                return array(
                    'status' => 'error',
                    'message' => 'Anda sudah membuat akun ' . Str::upper($server->category->name) . ' sebelumnya, silahkan tunggu ' . Carbon::now()->diffInMinutes($created) . ' menit lagi',
                );
            }
        }

        $tunnel = json_decode($this->site->tunnel);
        if (!empty($tunnel->username)) {
            $username = $tunnel->username . '-' . $request->username;
        } else {
            $username = $request->username;
        }

        $password = $request->password;
        $expired = $server->type;


        $this->url = "http://" . $server->host . "/vps/sshvpn";
        $this->body = [
            'username' => $username,
            'password' => $password,
            'limitip' => $this->limit,
            'expired' => $expired,
        ];

        try {
            $response = $this->client->post($this->url, [
                'json' => $this->body,
            ]);
        } catch (RequestException $e) {
            return array(
                'status' => 'error',
                'message' => $e->getResponse()->getBody()->getContents()
            );
        }

        // remove non-printable characters
        $output = preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $response->getBody()->getContents());

        // convert json to array
        $output = json_decode($output, true);
        $output['expired'] = Carbon::now()->addDays($server->type)->format('d-m-Y H:i:s');
        $data = $this->formatSSHAccount($output, $server);

        $account = new Account();
        $account->username = $username;
        $account->password = $request->password;
        $account->server_id = $server->id;
        $account->created_at = Carbon::now();
        $account->expired_at = Carbon::now()->addDays($server->type);
        $account->save();

        $server->current = $server->current + 1;
        $server->total = $server->total + 1;
        $server->update();

        $total_accounts = $this->site->total_accounts;
        $total_accounts['ssh'] = $total_accounts['ssh'] + 1;
        $this->site->total_accounts = $total_accounts;
        $this->site->update();

        $interval = $tunnel->interval;
        session()->put('created ' . Str::upper($server->category->name), Carbon::now()->addMinutes($interval));

        return array(
            'status' => 'success',
            'message' => 'Account ' . Str::upper($server->category->name) . ' berhasil dibuat',
            'output' => $data,
        );
    }

    public function createTrojanAccount($server, $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'username' => 'required|alpha_num|min:4|max:32',
                'g-recaptcha-response' => 'required|captcha',
            ],
            $this->messages
        );

        if ($validator->fails()) {
            return array(
                'status' => 'error',
                'message' => $validator->errors()->first(),
            );
        }

        $username = Account::join('servers', 'servers.id', '=', 'accounts.server_id')->where('servers.ip', $server->ip)->where('accounts.username', $request->username)->first();
        if ($username) {
            return array(
                'status' => 'error',
                'message' => 'Username sudah digunakan',
            );
        }

        if ($this->checkUsername($request->username)) {
            return array(
                'status' => 'error',
                'message' => 'Username tidak boleh menggunakan username sistem',
            );
        }

        if ($server->limit <= $server->current) {
            return array(
                'status' => 'error',
                'message' => 'Server sudah penuh',
            );
        }

        if (session()->has('created ' . Str::upper($server->category->name))) {
            $created = session()->get('created ' . Str::upper($server->category->name));
            if (Carbon::now()->diffInMinutes($created) > 0) {
                return array(
                    'status' => 'error',
                    'message' => 'Anda sudah membuat akun ' . Str::upper($server->category->name) . ' sebelumnya, silahkan tunggu ' . Carbon::now()->diffInMinutes($created) . ' menit lagi',
                );
            }
        }

        $tunnel = json_decode($this->site->tunnel);
        if (!empty($tunnel->username)) {
            $username = $tunnel->username . '-' . $request->username;
        } else {
            $username = $request->username;
        }

        $expired = $server->type;
        $category = $server->category;
        $categorySlug = explode('-', $category->slug);
        $categorySlug = $categorySlug[count($categorySlug) - 2] . $categorySlug[count($categorySlug) - 1];
        $this->url = "http://" . $server->host . "/vps/" . $categorySlug;
        $this->body = [
            'username' => Str::lower($username),
            'limitip' => $this->limit,
            'expired' => $expired,
        ];

        try {
            $response = $this->client->post($this->url, [
                'json' => $this->body,
            ]);
        } catch (RequestException $e) {
            return array(
                'status' => 'error',
                'message' => $e->getResponse()->getBody()->getContents()
            );
        }

        $output = preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $response->getBody()->getContents());

        // convert json to array
        $output = json_decode($output, true);
        $output['expired'] = Carbon::now()->addDays($server->type)->format('d-m-Y H:i:s');
        $data = $this->formatTrojanAccount($output, $server);

        $account = new Account();
        $account->username = $username;
        $account->server_id = $server->id;
        $account->created_at = Carbon::now();
        $account->expired_at = Carbon::now()->addDays($server->type);
        $account->save();

        $server->current = $server->current + 1;
        $server->total = $server->total + 1;
        $server->update();

        $category = explode('-', $server->category->slug);
        $total_accounts = $this->site->total_accounts;
        $total_accounts[$category[0]] = $total_accounts[$category[0]] + 1;
        $this->site->total_accounts = $total_accounts;
        $this->site->update();

        $interval = $tunnel->interval;
        session()->put('created ' . Str::upper($server->category->name), Carbon::now()->addMinutes($interval));

        return array(
            'status' => 'success',
            'message' => 'Account ' . Str::upper($server->category->name) . ' berhasil dibuat',
            'output' => $data,
        );
    }

    public function createVmessAccount($server, $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'username' => 'required|alpha_num|min:4|max:32',
                'g-recaptcha-response' => 'required|captcha',
            ],
            $this->messages
        );

        if ($validator->fails()) {
            return array(
                'status' => 'error',
                'message' => $validator->errors()->first(),
            );
        }

        $username = Account::join('servers', 'servers.id', '=', 'accounts.server_id')->where('servers.ip', $server->ip)->where('accounts.username', $request->username)->first();
        if ($username) {
            return array(
                'status' => 'error',
                'message' => 'Username sudah digunakan',
            );
        }

        if ($this->checkUsername($request->username)) {
            return array(
                'status' => 'error',
                'message' => 'Username tidak boleh menggunakan username sistem',
            );
        }

        if ($server->limit <= $server->current) {
            return array(
                'status' => 'error',
                'message' => 'Server sudah penuh',
            );
        }

        if (session()->has('created ' . Str::upper($server->category->name))) {
            $created = session()->get('created ' . Str::upper($server->category->name));
            if (Carbon::now()->diffInMinutes($created) > 0) {
                return array(
                    'status' => 'error',
                    'message' => 'Anda sudah membuat akun ' . Str::upper($server->category->name) . ' sebelumnya, silahkan tunggu ' . Carbon::now()->diffInMinutes($created) . ' menit lagi',
                );
            }
        }

        $tunnel = json_decode($this->site->tunnel);
        if (!empty($tunnel->username)) {
            $username = $tunnel->username . '-' . $request->username;
        } else {
            $username = $request->username;
        }

        $expired = $server->type;

        $category = $server->category;
        $categorySlug = explode('-', $category->slug);
        $categorySlug = $categorySlug[count($categorySlug) - 2] . $categorySlug[count($categorySlug) - 1];
        $this->url = "http://" . $server->host . "/vps/" . $categorySlug;
        $this->body = [
            'username' => Str::lower($username),
            'limitip' => $this->limit,
            'expired' => $expired,
        ];

        try {
            $response = $this->client->post($this->url, [
                'json' => $this->body,
            ]);
        } catch (RequestException $e) {
            return array(
                'status' => 'error',
                'message' => $e->getResponse()->getBody()->getContents()
            );
        }

        $output = preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $response->getBody()->getContents());

        // convert json to array
        $output = json_decode($output, true);
        $output['expired'] = Carbon::now()->addDays($server->type)->format('d-m-Y H:i:s');
        $data = $this->formatVmessAccount($output, $server);

        $account = new Account();
        $account->username = $username;
        $account->server_id = $server->id;
        $account->created_at = Carbon::now();
        $account->expired_at = Carbon::now()->addDays($server->type);
        $account->save();

        $server->current = $server->current + 1;
        $server->total = $server->total + 1;
        $server->update();

        $category = explode('-', $server->category->slug);
        $total_accounts = $this->site->total_accounts;
        $total_accounts[$category[0]] = $total_accounts[$category[0]] + 1;
        $this->site->total_accounts = $total_accounts;
        $this->site->update();

        $interval = $tunnel->interval;
        session()->put('created ' . Str::upper($server->category->name), Carbon::now()->addMinutes($interval));

        return array(
            'status' => 'success',
            'message' => 'Account ' . Str::upper($server->category->name) . ' berhasil dibuat',
            'output' => $data,
        );
    }

    public function createVlessAccount($server, $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'username' => 'required|alpha_num|min:4|max:32',
                'g-recaptcha-response' => 'required|captcha',
            ],
            $this->messages
        );

        if ($validator->fails()) {
            return array(
                'status' => 'error',
                'message' => $validator->errors()->first(),
            );
        }

        $username = Account::join('servers', 'servers.id', '=', 'accounts.server_id')->where('servers.ip', $server->ip)->where('accounts.username', $request->username)->first();
        if ($username) {
            return array(
                'status' => 'error',
                'message' => 'Username sudah digunakan',
            );
        }

        if ($this->checkUsername($request->username)) {
            return array(
                'status' => 'error',
                'message' => 'Username tidak boleh menggunakan username sistem',
            );
        }

        if ($server->limit <= $server->current) {
            return array(
                'status' => 'error',
                'message' => 'Server sudah penuh',
            );
        }

        if (session()->has('created ' . Str::upper($server->category->name))) {
            $created = session()->get('created ' . Str::upper($server->category->name));
            if (Carbon::now()->diffInMinutes($created) > 0) {
                return array(
                    'status' => 'error',
                    'message' => 'Anda sudah membuat akun ' . Str::upper($server->category->name) . ' sebelumnya, silahkan tunggu ' . Carbon::now()->diffInMinutes($created) . ' menit lagi',
                );
            }
        }


        $tunnel = json_decode($this->site->tunnel);
        if (!empty($tunnel->username)) {
            $username = $tunnel->username . '-' . $request->username;
        } else {
            $username = $request->username;
        }

        $expired = $server->type;

        $category = $server->category;
        $categorySlug = explode('-', $category->slug);
        $categorySlug = $categorySlug[count($categorySlug) - 2] . $categorySlug[count($categorySlug) - 1];
        $this->url = "http://" . $server->host . "/vps/" . $categorySlug;
        $this->body = [
            'username' => Str::lower($username),
            'limitip' => $this->limit,
            'expired' => $expired,
        ];

        try {
            $response = $this->client->post($this->url, [
                'json' => $this->body,
            ]);
        } catch (RequestException $e) {
            return array(
                'status' => 'error',
                'message' => $e->getResponse()->getBody()->getContents()
            );
        }

        $output = preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $response->getBody()->getContents());

        // convert json to array
        $output = json_decode($output, true);
        $output['expired'] = Carbon::now()->addDays($server->type)->format('d-m-Y H:i:s');
        $data = $this->formatVlessAccount($output, $server);

        $account = new Account();
        $account->username = $username;
        $account->server_id = $server->id;
        $account->created_at = Carbon::now();
        $account->expired_at = Carbon::now()->addDays($server->type);
        $account->save();

        $server->current = $server->current + 1;
        $server->total = $server->total + 1;
        $server->update();

        $category = explode('-', $server->category->slug);
        $total_accounts = $this->site->total_accounts;
        $total_accounts[$category[0]] = $total_accounts[$category[0]] + 1;
        $this->site->total_accounts = $total_accounts;
        $this->site->update();

        $interval = $tunnel->interval;
        session()->put('created ' . Str::upper($server->category->name), Carbon::now()->addMinutes($interval));

        return array(
            'status' => 'success',
            'message' => 'Account ' . Str::upper($server->category->name) . ' berhasil dibuat',
            'output' => $data,
        );
    }
}

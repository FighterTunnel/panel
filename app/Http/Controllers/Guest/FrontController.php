<?php

namespace App\Http\Controllers\Guest;

use Carbon\Carbon;
use App\Models\Dns;
use App\Models\Server;
use GuzzleHttp\Client;
use App\Models\Account;
use App\Traits\ToolsFormat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Page;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Illuminate\Support\Facades\Validator;

class FrontController extends Controller
{
    use ToolsFormat;
    private $headers;
    private $client;
    public function __construct()
    {
        SEOMeta::setTitleDefault(getSettings('site_name'));
        parent::__construct();

        $this->headers = [
            'X-Auth-Email' => getCloudflareSettings('email'),
            'X-Auth-Key' => getCloudflareSettings('api_key'),
            'Content-Type' => 'application/json',
        ];
        $this->client = new Client([
            'headers' => $this->headers
        ]);
    }

    private function setMeta(string $title)
    {
        SEOMeta::setTitle($title);
        OpenGraph::setTitle(SEOMeta::getTitle());
        JsonLd::setTitle(SEOMeta::getTitle());
        SEOMeta::setDescription(getSeoSettings('description'));
        SEOMeta::setKeywords(getSeoSettings('keywords'));
        OpenGraph::setDescription(SEOMeta::getDescription());
        JsonLd::setSite(SEOMeta::getCanonical());
        JsonLd::setDescription(SEOMeta::getDescription());
    }

    public function ipLookup()
    {
        $this->setMeta('IP Lookup');
        return view('pages.guest.tools.ip_lookup');
    }

    public function getIpLookup(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'ip' => 'required|ipv4',
                'g-recaptcha-response' => 'required|captcha'
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first(),
            ]);
        }
        if ($this->validateIP($request->ip)) {
            $ip = $request->ip;
            $details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"), true);
            return response()->json([
                'status' => 'success',
                'message' => 'Your IP is ' . $ip,
                'details' => $this->formatIpLookup($details),
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid IP',
            ]);
        }
    }

    public function hostToIP()
    {
        $this->setMeta('Host to IP');
        return view('pages.guest.tools.host_to_ip');
    }

    public function getHostToIP(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'host' => 'required',
            'g-recaptcha-response' => 'required|captcha'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first(),
            ]);
        }
        if ($this->validateHostname($request->host)) {
            $host = $request->host;
            $ip = gethostbyname($host);
            return response()->json([
                'status' => 'success',
                'message' => 'Your IP is ' . $ip,
                'details' => $this->formatHostToIp(['host' => $host, 'ip' => $ip]),
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid hostname',
            ]);
        }
    }

    public function createHostname()
    {
        $this->setMeta('Create Hostname');
        $domain = json_decode($this->site->cloudflare)->domain;
        return view('pages.guest.tools.create_hostname', compact('domain'));
    }

    public function storeHostname(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'host' => 'required',
                'ip' => 'required|ipv4',
                'g-recaptcha-response' => 'required|captcha'
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first(),
            ]);
        }

        $host = $request->host . '.' . json_decode($this->site->cloudflare)->domain;

        $body = [
            'type' => 'A',
            'name' => $host,
            'content' => $request->ip,
            'ttl' => 1,
            'proxied' => false,
        ];

        $response = $this->client->post('https://api.cloudflare.com/client/v4/zones/' . json_decode($this->site->cloudflare)->zone_id . '/dns_records', [
            'body' => json_encode($body)
        ]);

        if ($response->getStatusCode() == 200) {
            $dns = new Dns();
            $dns->name = $request->host;
            $dns->host = $host;
            $dns->ip = $request->ip;
            $dns->save();

            $total_accounts = $this->site->total_accounts;
            $total_accounts['dns'] = $total_accounts['dns'] + 1;
            $this->site->update();

            return response()->json([
                'status' => 'success',
                'message' => 'Your DNS has been created',
                'details' => $this->formatCreateHostname($host, $request->ip),
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid hostname',
            ]);
        }
    }

    public function serverStatus()
    {
        $this->setMeta('Server Status');
        $servers = Server::all();
        return view('pages.guest.tools.server_status', compact('servers'));
    }

    public function accountRemaining()
    {
        $this->setMeta('Account Remaining');
        $servers = Server::all();
        return view('pages.guest.tools.account_remaining', compact('servers'));
    }

    public function pages($slug)
    {
        $page = Page::where('slug', $slug)->first();
        $this->setMeta($page->title);
        return view('pages.guest.tools.page', compact('page'));
    }

    private function validateIP($ip)
    {
        if (filter_var($ip, FILTER_VALIDATE_IP)) {
            return true;
        } else {
            return false;
        }
    }

    private function validateHostname($hostname)
    {
        if (
            preg_match("/^([a-z\d](-*[a-z\d])*)(\.([a-z\d](-*[a-z\d])*))*$/i", $hostname)
            && preg_match("/^.{1,253}$/", $hostname)
            && preg_match("/^[^\.]{1,63}(\.[^\.]{1,63})*$/", $hostname)
        ) {
            return true;
        } else {
            return false;
        }
    }

    private function formatCreateHostname($host, $ip)
    {
        $data = [
            '<ul class="list-unstyled">
            <li class="list-group-item d-flex justify-content-between align-items-center text-break w-100">Host <b>' . $host . '</b></li>
            <li class="list-group-item d-flex justify-content-between align-items-center text-break w-100">IP <b>' . $ip . '</b></li>
            </ul>',
        ];
        return $data;
    }
}

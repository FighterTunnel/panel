<?php

namespace App\Http\Controllers\Admin;

use App\Models\Site;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Rules\CheckIfFavicon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class SiteController extends Controller
{
    public function install()
    {
        return view('pages.install');
    }

    public function do_install(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'site_name' => 'required',
            'site_url' => 'required',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'favicon' => ['required', new CheckIfFavicon],
            'username' => 'required',
            'name' => 'required',
            'password' => 'required|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first()
            ]);
        }

        $site = new Site();
        $site->site_name = $request->site_name;
        $file = $request->file('logo');
        $site->site_logo = $file->getClientOriginalName();
        $file->move(public_path('img'), $file->getClientOriginalName());
        $file = $request->file('favicon');
        $site->site_favicon = $file->getClientOriginalName();
        $file->move(public_path('img'), $file->getClientOriginalName());
        $site->site_url = $request->site_url;
        $site->save();

        $user = new User();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->save();
        Auth::login($user);

        return response()->json([
            'status' => 'success',
            'message' => 'Site installed successfully',
            'redirect' => route('admin.dashboard')
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $site = Site::first();
        return view('pages.admin.site.index', compact('site'));
    }

    public function update_site(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'site_name' => 'required',
                'site_url' => 'required',
                'site_logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'site_favicon' => [new CheckIfFavicon],
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first()
            ]);
        }

        // update site
        $site = Site::first();
        $site->site_name = $request->site_name;
        $site->site_url = $request->site_url;

        if ($request->hasFile('site_logo')) {
            $path = public_path('images/' . $site->site_logo);
            if (file_exists($path)) {
                unlink($path);
            }
            $file = $request->file('site_logo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
            $site->site_logo = $filename;
        }

        if ($request->hasFile('site_favicon')) {
            $path = public_path('images/' . $site->site_favicon);
            if (file_exists($path)) {
                unlink($path);
            }
            $file = $request->file('site_favicon');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
            $site->site_favicon = $filename;
        }

        $site->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Berhasil mengubah data',
        ]);
    }

    public function update_user(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'username' => 'required',
                'name' => 'required',
                'password' => 'required|confirmed',
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first()
            ]);
        }

        // update user
        $user = User::first();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Berhasil mengubah data',
        ]);
    }

    public function update_dns(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'domain' => 'required',
                'email' => 'required|email',
                'api_key' => 'required',
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first(),
            ]);
        }

        // get zone id
        $client = new Client();
        $response = $client->get('https://api.cloudflare.com/client/v4/zones?name=' . $request->domain, [
            'headers' => [
                'X-Auth-Email' => $request->email,
                'X-Auth-Key' => $request->api_key,
                'Content-Type' => 'application/json',
            ],
        ]);

        if ($response->getStatusCode() != 200) {
            return response()->json([
                'status' => 'error',
                'message' => 'Gagal menghubungi Cloudflare API',
            ]);
        }

        $body = json_decode($response->getBody());
        if (!$body->success) {
            return response()->json([
                'status' => 'error',
                'message' => 'Gagal menghubungi Cloudflare API',
            ]);
        }

        if (count($body->result) == 0) {
            return response()->json([
                'status' => 'error',
                'message' => 'Domain tidak ditemukan',
            ]);
        }

        $zone_id = $body->result[0]->id;

        $data = [
            'domain' => $request->domain,
            'email' => $request->email,
            'api_key' => $request->api_key,
            'zone_id' => $zone_id,
        ];

        // update dns
        $site = Site::first();
        $site->cloudflare = json_encode($data);
        $site->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Berhasil mengubah data',
        ]);
    }

    public function update_tunnel(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'username' => 'nullable',
                'interval' => 'required|numeric',
                'reset_time' => 'required',
                'limit' => 'required|numeric',
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first(),
            ]);
        }

        // update tunnel
        $site = Site::first();
        $site->tunnel = json_encode($request->only(['username', 'interval', 'reset_time', 'limit']));
        $site->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Berhasil mengubah data',
        ]);
    }

    public function update_ads(Request $request)
    {
        // update ads
        $site = Site::first();
        $site->banner = json_encode($request->only(['mobile', 'responsive_full']));
        $site->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Berhasil mengubah data',
        ]);
    }

    public function update_seo(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'keywords' => 'required',
                'description' => 'required',
                // 'google_analytics' => 'required'
            ],
        );

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first(),
            ]);
        }

        // update seo
        $site = Site::first();
        $site->seo = json_encode($request->only(['keywords', 'description', 'google_analytics', 'google_site_verification', 'bing_site_verification']));
        $site->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Berhasil mengubah data',
        ]);
    }
}

<?php

use Carbon\Carbon;
use App\Models\Site;
use App\Models\Server;

if (!function_exists('getSettings')) {
    function getSettings($key)
    {
        if (Site::first() == null) {
            return null;
        } else {
            return Site::first()->$key;
        }
    }
}

if (!function_exists('getSeoSettings')) {
    function getSeoSettings($key)
    {
        if (Site::first()->seo == null) {
            return null;
        } else {
            return (!isset(json_decode(Site::first()->seo)->$key)) ? null : json_decode(Site::first()->seo)->$key;
        }
    }
}

if (!function_exists('getBannerSettings')) {
    function getBannerSettings($key)
    {
        if (Site::first()->banner == null) {
            return null;
        } else {
            return (!isset(json_decode(Site::first()->banner)->$key)) ? null : json_decode(Site::first()->banner)->$key;
        }
    }
}

if (!function_exists('getCloudflareSettings')) {
    function getCloudflareSettings($key)
    {
        if (Site::first()->cloudflare == null) {
            return null;
        } else {
            return (!isset(json_decode(Site::first()->cloudflare)->$key)) ? null : json_decode(Site::first()->cloudflare)->$key;
        }
    }
}

if (!function_exists('getTunnelSettings')) {
    function getTunnelSettings($key)
    {
        if (Site::first()->tunnel == null) {
            return null;
        } else {
            return (!isset(json_decode(Site::first()->tunnel)->$key)) ? null : json_decode(Site::first()->tunnel)->$key;
        }
    }
}

if (!function_exists('getTotalAccount')) {
    function getTotalAccount($key)
    {
        return Site::first()->total_accounts[$key];
    }
}

if (!function_exists('getResetTime')) {
    function getResetTime()
    {
        $resetTime = getTunnelSettings('reset_time');
        if ($resetTime == null) {
            return 0;
        } else {
            $resetTime = explode(',', $resetTime);
            $now = Carbon::now()->format('d-m-Y H:i');
            // for each element in array create into format H:i
            $resetTime = array_map(function ($time) {
                return Carbon::createFromFormat('H', $time)->format('H:i');
            }, $resetTime);
            // sort array
            sort($resetTime);
            // dd($resetTime);
            return $resetTime;
        }
    }
}

if (!function_exists('is_app_installed')) {
    function is_app_installed()
    {
        if (Site::first() == null) {
            return false;
        } else {
            return true;
        }
    }
}

if (!function_exists('getServerStatus')) {
    function getServerStatus($server)
    {
        // check if server is online
        $fp = @fsockopen($server->ip, 80, $errno, $errstr, 0.1);
        if (!$fp) {
            return '<b class="text-danger">
            <span class="spinner-grow spinner-grow-sm" role="status"
                aria-hidden="true"></span> Offline</b>';
        } else {
            return '<b class="text-success">
            <span class="spinner-grow spinner-grow-sm" role="status"
                aria-hidden="true"></span> Online</b>';
        }
    }
}

if (!function_exists('getMyIp')) {
    function getMyIp()
    {
        return $_SERVER['REMOTE_ADDR'];
    }
}

if (!function_exists('getCreatedAccountToday')) {
    function getCreatedAccountToday($key)
    {
        $createdAccounts =  Server::join('categories', 'categories.id', '=', 'servers.category_id')
            ->join('accounts', 'accounts.server_id', '=', 'servers.id')
            ->where('categories.slug', 'like', '%' . $key . '%')
            ->whereDate('accounts.created_at', Carbon::today())
            ->count();
        // dd($createdAccounts);
        return $createdAccounts;
    }
}

if (!function_exists('getTotalServers')) {
    function getTotalServers($country_id, $category_id)
    {
        $totalServers =  Server::where('country_id', $country_id)
            ->where('category_id', $category_id)
            ->count();
        // dd($createdAccounts);
        return $totalServers;
    }
}

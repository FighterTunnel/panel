<?php

namespace App\Http\Controllers\Admin;

use App\Models\Server;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_ssh =  Server::join('categories', 'categories.id', '=', 'servers.category_id')
            ->join('accounts', 'accounts.server_id', '=', 'servers.id')
            ->where('categories.slug', 'like', '%ssh%')
            ->count();
        $all_vmess = Server::join('categories', 'categories.id', '=', 'servers.category_id')
            ->join('accounts', 'accounts.server_id', '=', 'servers.id')
            ->where('categories.slug', 'like', '%vmess%')
            ->count();
        $all_vless = Server::join('categories', 'categories.id', '=', 'servers.category_id')
            ->join('accounts', 'accounts.server_id', '=', 'servers.id')
            ->where('categories.slug', 'like', '%vless%')
            ->count();
        $all_trojan = Server::join('categories', 'categories.id', '=', 'servers.category_id')
            ->join('accounts', 'accounts.server_id', '=', 'servers.id')
            ->where('categories.slug', 'like', '%trojan%')
            ->count();

        // get data total account group by month
        $ssh = Server::join('categories', 'categories.id', '=', 'servers.category_id')
            ->join('accounts', 'accounts.server_id', '=', 'servers.id')
            ->where('categories.slug', 'like', '%ssh%')
            ->selectRaw('COUNT(*) as total, accounts.created_at')
            ->groupBy(DB::raw('MONTH(accounts.created_at)'))
            ->get();
        $data_ssh = [];
        foreach ($ssh as $item) {
            $data_ssh[] = [
                'month' => $item->created_at->format('F'),
                'SSH' => $item->total,
            ];
        }
        $trojan = Server::join('categories', 'categories.id', '=', 'servers.category_id')
            ->join('accounts', 'accounts.server_id', '=', 'servers.id')
            ->where('categories.slug', 'like', '%trojan%')
            ->selectRaw('COUNT(*) as total, accounts.created_at')
            ->groupBy(DB::raw('MONTH(accounts.created_at)'))
            ->get();
        $data_trojan = [];
        foreach ($trojan as $item) {
            $data_trojan[] = [
                'month' => $item->created_at->format('F'),
                'Trojan' => $item->total,
            ];
        }
        $vmess = Server::join('categories', 'categories.id', '=', 'servers.category_id')
            ->join('accounts', 'accounts.server_id', '=', 'servers.id')
            ->where('categories.slug', 'like', '%vmess%')
            ->selectRaw('COUNT(*) as total, accounts.created_at')
            ->groupBy(DB::raw('MONTH(accounts.created_at)'))
            ->get();
        $data_vmess = [];
        foreach ($vmess as $item) {
            $data_vmess[] = [
                'month' => $item->created_at->format('F'),
                'Vmess' => $item->total,
            ];
        }
        $vless = Server::join('categories', 'categories.id', '=', 'servers.category_id')
            ->join('accounts', 'accounts.server_id', '=', 'servers.id')
            ->where('categories.slug', 'like', '%vless%')
            ->selectRaw('COUNT(*) as total, accounts.created_at')
            ->groupBy(DB::raw('MONTH(accounts.created_at)'))
            ->get();
        $data_vless = [];
        foreach ($vless as $item) {
            $data_vless[] = [
                'month' => $item->created_at->format('F'),
                'Vless' => $item->total,
            ];
        }
        // merge all data
        $data = array_merge($data_ssh, $data_trojan, $data_vmess, $data_vless);
        return view('pages.admin.dashboard.index', compact('all_ssh', 'all_vmess', 'all_trojan', 'all_vless', 'data'));
    }
}

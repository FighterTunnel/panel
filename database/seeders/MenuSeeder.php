<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menus = [
            [
                'name' => 'Home',
                'slug' => 'home',
                'menu_id' => null
            ],
            [
                'name' => 'SSH',
                'slug' => 'ssh',
                'menu_id' => null
            ],
            [
                'name' => 'V2ray VPN',
                'slug' => 'v2ray-vpn',
                'menu_id' => null
            ],
            [
                'name' => 'V2ray Vmess Websocket',
                'slug' => 'v2ray-vmess-ws',
                'menu_id' => 3
            ],
            [
                'name' => 'V2ray Vmess GRPC',
                'slug' => 'v2ray-vmess-grpc',
                'menu_id' => 3
            ],
            [
                'name' => 'V2ray Vless Websocket',
                'slug' => 'v2ray-vless-ws',
                'menu_id' => 3
            ],
            [
                'name' => 'V2ray Vless GRPC',
                'slug' => 'v2ray-vless-grpc',
                'menu_id' => 3
            ],
            [
                'name' => 'Xray VPN',
                'slug' => 'xray-vpn',
                'menu_id' => null
            ],
            [
                'name' => 'Xray Vmess Websocket',
                'slug' => 'xray-vmess-ws',
                'menu_id' => 8
            ],
            [
                'name' => 'Xray Vmess GRPC',
                'slug' => 'xray-vmess-grpc',
                'menu_id' => 8
            ],
            [
                'name' => 'Xray Vless Websocket',
                'slug' => 'xray-vless-ws',
                'menu_id' => 8
            ],
            [
                'name' => 'Xray Vless GRPC',
                'slug' => 'xray-vless-grpc',
                'menu_id' => 8
            ],
            [
                'name' => 'Trojan',
                'slug' => 'trojan',
                'menu_id' => null
            ],
            [
                'name' => 'Trojan Websocket',
                'slug' => 'trojan-ws',
                'menu_id' => 13
            ],
            [
                'name' => 'Trojan GRPC',
                'slug' => 'trojan-grpc',
                'menu_id' => 13
            ],
            [
                'name' => 'Tools',
                'slug' => 'tools',
                'menu_id' => null
            ],
            [
                'name' => 'IP Address Lookup',
                'slug' => 'ip-address-lookup',
                'menu_id' => 16
            ],
            [
                'name' => 'Hostname to IP',
                'slug' => 'hostname-to-ip',
                'menu_id' => 16
            ],
            [
                'name' => 'Create Hostname',
                'slug' => 'create-hostname',
                'menu_id' => 16
            ],
            [
                'name' => 'Server Status',
                'slug' => 'server-status',
                'menu_id' => 16
            ],
            [
                'name' => 'Account Remaining',
                'slug' => 'account-remaining',
                'menu_id' => 16
            ],
            [
                'name' => 'Premium Account Panel',
                'slug' => 'premium-account-panel',
                'menu_id' => 16
            ]
        ];

        foreach ($menus as $menu) {
            Menu::create($menu);
        }
    }
}

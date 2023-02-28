<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'category_id' => null,
                'name' => 'SSH',
                'slug' => 'ssh',
                'description' => '',
                'features' => [
                    'Simple and Secure',
                    'Multiple login allowed',
                    'Protocol TCP/UDP',
                    'SSL/TLS support'
                ],
                'icon' => 'icon-ssh.svg'
            ],
            [
                'category_id' => null,
                'name' => 'V2ray VPN',
                'slug' => 'v2ray-vpn',
                'icon' => 'icon-v2ray.svg'
            ],
            [
                'category_id' => 2,
                'name' => 'V2ray Vmess Websocket',
                'slug' => 'v2ray-vmess-ws',
                'description' => '',
                'features' => [
                    'Simple and Secure',
                    'Multiple login allowed',
                    'Protocol TCP/UDP',
                    'SSL/TLS support'
                ]
            ],
            [
                'category_id' => 2,
                'name' => 'V2ray Vmess GRPC',
                'slug' => 'v2ray-vmess-grpc',
                'description' => '',
                'features' => [
                    'Simple and Secure',
                    'Multiple login allowed',
                    'Protocol TCP/UDP',
                    'SSL/TLS support'
                ],
            ],
            [
                'category_id' => 2,
                'name' => 'V2ray Vless Websocket',
                'slug' => 'v2ray-vless-ws',
                'description' => '',
                'features' => [
                    'Simple and Secure',
                    'Multiple login allowed',
                    'Protocol TCP/UDP',
                    'SSL/TLS support'
                ]
            ],
            [
                'category_id' => 2,
                'name' => 'V2ray Vless GRPC',
                'slug' => 'v2ray-vless-grpc',
                'description' => '',
                'features' => [
                    'Simple and Secure',
                    'Multiple login allowed',
                    'Protocol TCP/UDP',
                    'SSL/TLS support'
                ],
            ],
            [
                'category_id' => null,
                'name' => 'Xray VPN',
                'slug' => 'xray-vpn',
                'icon' => 'icon-xray.svg'
            ],
            [
                'category_id' => 7,
                'name' => 'Xray Vmess Websocket',
                'slug' => 'xray-vmess-ws',
                'description' => '',
                'features' => [
                    'Simple and Secure',
                    'Multiple login allowed',
                    'Protocol TCP/UDP',
                    'SSL/TLS support'
                ],
            ],
            [
                'category_id' => 7,
                'name' => 'Xray Vmess GRPC',
                'slug' => 'xray-vmess-grpc',
                'description' => '',
                'features' => [
                    'Simple and Secure',
                    'Multiple login allowed',
                    'Protocol TCP/UDP',
                    'SSL/TLS support'
                ],
            ],
            [
                'category_id' => 7,
                'name' => 'Xray Vless Websocket',
                'slug' => 'xray-vless-ws',
                'description' => '',
                'features' => [
                    'Simple and Secure',
                    'Multiple login allowed',
                    'Protocol TCP/UDP',
                    'SSL/TLS support'
                ],
            ],
            [
                'category_id' => 7,
                'name' => 'Xray Vless GRPC',
                'slug' => 'xray-vless-grpc',
                'description' => '',
                'features' => [
                    'Simple and Secure',
                    'Multiple login allowed',
                    'Protocol TCP/UDP',
                    'SSL/TLS support'
                ],
            ],
            [
                'category_id' => null,
                'name' => 'Trojan',
                'slug' => 'trojan',
                'icon' => 'icon-trojan.svg'
            ],
            [
                'category_id' => 12,
                'name' => 'Trojan Websocket',
                'slug' => 'trojan-ws',
                'description' => '',
                'features' => [
                    'Simple and Secure',
                    'Multiple login allowed',
                    'Protocol TCP/UDP',
                    'SSL/TLS support'
                ],
            ],
            [
                'category_id' => 12,
                'name' => 'Trojan GRPC',
                'slug' => 'trojan-grpc',
                'description' => '',
                'features' => [
                    'Simple and Secure',
                    'Multiple login allowed',
                    'Protocol TCP/UDP',
                    'SSL/TLS support'
                ],
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}

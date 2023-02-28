<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Site;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::create([
            'name' => 'Administrator',
            'username' => 'admin',
            'password' => Hash::make('password'),
        ]);

        $this->call([
            CountriesSeeder::class,
            CategoriesSeeder::class,
            MenuSeeder::class,
            // ServerSeeder::class,
        ]);

        Site::create([
            'site_name' => 'Example Site',
            'site_url' => 'https://example.com',
            'site_logo' => 'https://example.com/logo.png',
            'site_favicon' => 'https://example.com/favicon.png',
            'total_accounts' => [
                'dns' => 0,
                'ssh' => 0,
                'v2ray' => 0,
                'xray' => 0,
                'trojan' => 0,
            ],
        ]);
    }
}

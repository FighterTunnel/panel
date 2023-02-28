<?php

namespace App\Providers;

use App\Models\Menu;
use App\Models\Page;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('layouts.guest.navbar', function ($view) {
            $menus = Menu::where('menu_id', null)->get();
            $view->with('menus', $menus);
        });

        View::composer('layouts.guest.footer', function ($view) {
            $pages = Page::all();
            $view->with('pages', $pages);
        });
    }
}

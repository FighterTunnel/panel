<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DnsController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\SiteController;
use App\Http\Controllers\Admin\ServerController;
use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AnnouncementController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('admin')->name('admin.')->group(function () {
    // Auth
    Route::get('/', [AuthController::class, 'index'])->name('login');
    Route::post('/', [AuthController::class, 'do_login'])->name('do_login');

    Route::middleware(['auth', 'installed'])->group(function () {
        Route::middleware('auth')->group(function () {
            Route::get('logout', [AuthController::class, 'do_logout'])->name('logout');

            // Dashboard
            Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
            // Category
            Route::resource('categories', CategoryController::class);
            // Menu
            Route::resource('menus', MenuController::class);

            // Server
            Route::resource('servers', ServerController::class);
            Route::put('servers/{server}/reset', [ServerController::class, 'reset'])->name('server.reset');

            // Account
            Route::get('accounts', [AccountController::class, 'index'])->name('accounts.index');
            Route::delete('accounts/{account}', [AccountController::class, 'destroy'])->name('accounts.destroy');

            // DNS
            Route::get('dns', [DnsController::class, 'index'])->name('dns.index');

            // Announcement
            Route::resource('announcements', AnnouncementController::class);
            // Page
            Route::resource('pages', PageController::class);
            // Site
            Route::prefix('site')->name('')->group(function () {
                Route::get('', [SiteController::class, 'index'])->name('site');
                Route::put('update_site', [SiteController::class, 'update_site'])->name('update_site');
                Route::put('update_user', [SiteController::class, 'update_user'])->name('update_user');
                Route::put('update_dns', [SiteController::class, 'update_dns'])->name('update_dns');
                Route::put('update_tunnel', [SiteController::class, 'update_tunnel'])->name('update_tunnel');
                Route::put('update_ads', [SiteController::class, 'update_ads'])->name('update_ads');
                Route::put('update_seo', [SiteController::class, 'update_seo'])->name('update_seo');
            });
        });
    });
});

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Guest\DNSController;
use App\Http\Controllers\Admin\SiteController;
use App\Http\Controllers\Guest\ServerController;
use App\Http\Controllers\Guest\DashboardController;
use App\Http\Controllers\Guest\FrontController;
use App\Http\Controllers\Guest\HomeController;

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

Route::get('install', [SiteController::class, 'install'])->name('install');
Route::post('install', [SiteController::class, 'do_install'])->name('do_install');
Route::middleware('installed')->group(function () {
    // redirect to home
    Route::get('/', [HomeController::class, 'index'])->name('home');

    // TOOLS
    Route::get('ip-address-lookup', [FrontController::class, 'ipLookup'])->name('ipLookup');
    Route::post('ip-address-lookup', [FrontController::class, 'getIpLookup'])->name('getIpLookup');
    Route::get('hostname-to-ip', [FrontController::class, 'hostToIP'])->name('hostToIP');
    Route::post('hostname-to-ip', [FrontController::class, 'getHostToIP'])->name('getHostToIP');
    Route::get('create-hostname', [FrontController::class, 'createHostname'])->name('createHostname');
    Route::post('create-hostname', [FrontController::class, 'storeHostname'])->name('storeHostname');
    Route::get('server-status', [FrontController::class, 'serverStatus'])->name('serverStatus');
    Route::get('account-remaining', [FrontController::class, 'accountRemaining'])->name('accountRemaining');
    Route::get('pages/{slug}', [FrontController::class, 'pages'])->name('pages');

    // Servers
    Route::get('{category}', [ServerController::class, 'index'])->name('server.index');
    Route::get('{category}/{country}', [ServerController::class, 'list'])->name('server.list');
    Route::get('{category}/{country}/create/{slug}', [ServerController::class, 'create'])->name('server.create');
    Route::post('store/{slug}', [ServerController::class, 'store'])->name('server.store');
});

<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Site;
use Illuminate\Http\Request;

class CheckIfInstalled
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $site = Site::first();
        if ($site) {
            return $next($request);
        } else {
            return redirect()->route('install');
        }
    }
}

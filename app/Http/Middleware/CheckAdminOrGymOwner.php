<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckAdminOrGymOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Memeriksa apakah role pengguna adalah 'admin' atau 'gym owner'
        if (Session::get('role') == 'admin' || Session::get('role') == 'gym owner') {
            return $next($request); // Lanjutkan ke rute yang diminta
        }

        // Jika bukan admin atau gym owner, redirect ke halaman lain (misalnya halaman utama)
        return redirect()->route('home.welcome');
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Authenticate
{
    public function handle($request, Closure $next)
    {
        // Tambahkan pengecualian untuk rute login, register, dan halaman utama
        if ($request->is('login') || $request->is('register') || $request->is('/') || $request->is('articles/*')) {
            return $next($request);
        }

        // Jika belum login, redirect ke login dengan flash message
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Anda harus login terlebih dahulu!');
        }

        return $next($request);
    }
}

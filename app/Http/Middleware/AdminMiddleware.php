<?php
// app/Http/Middleware/AdminMiddleware.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Cek apakah user sudah login
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Cek apakah role user adalah admin
        if (!Auth::user()->isAdmin()) {
            abort(403, 'Anda tidak memiliki akses ke halaman admin.');
        }

        return $next($request);
    }
}
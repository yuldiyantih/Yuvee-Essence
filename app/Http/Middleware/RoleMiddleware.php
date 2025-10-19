<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, string $role = null)
    {
        // 🔹 Jika user belum login, biarkan saja (halaman publik tetap bisa diakses)
        if (!Auth::check()) {
            return $next($request);
        }

        $user = Auth::user();

        // 🔹 Kalau role tidak ditentukan (null), lanjutkan saja
        if ($role === null) {
            return $next($request);
        }

        // 🔹 Jika role cocok, lanjutkan
        if ($user->role === $role) {
            return $next($request);
        }

        // 🔹 Kalau role tidak cocok, arahkan ke home (tidak ke login)
        return redirect()->route('home')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
    }
}

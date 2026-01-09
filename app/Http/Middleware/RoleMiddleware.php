<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // 1. Belum login
        if (!Auth::check()) {
            return redirect('/login');
        }

        // 2. Cek role
        if (!in_array(Auth::user()->role, $roles)) {
            abort(403, 'Akses ditolak');
        }

        return $next($request);
    }
}

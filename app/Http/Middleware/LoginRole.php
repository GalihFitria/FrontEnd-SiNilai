<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginRoleMiddleware
{
    public function handle(Request $request, Closure $next, $role)
    {
        if (!Auth::check() || $request->session()->get('login_role') !== $role) {
            return redirect('/')->with('error', 'Akses tidak diizinkan.');
        }
        return $next($request);
    }
}

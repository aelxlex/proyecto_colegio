<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $user = Auth::user();

        if (!$user || !$user->role || !in_array($user->role->name, $roles)) {
            return redirect('/login')->withErrors(['msg' => 'No tienes permiso para acceder a esta página.']);
        }

        return $next($request);
    }
}

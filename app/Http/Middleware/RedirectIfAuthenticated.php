<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Manejar una solicitud entrante.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $user = Auth::user();

                if ($user && $user->role) {
                    switch ($user->role->name) {
                        case 'admin':
                            return redirect('/admin');
                        case 'directora':
                            return redirect('/directora');
                        case 'secretaria':
                            return redirect('/secretaria');
                        case 'regente':
                            return redirect('/regente');
                        case 'docente':
                            return redirect('/docente');
                        default:
                            // Si el rol no está definido, redirigir a logout o página default
                            Auth::logout();
                            return redirect('/login')->withErrors(['msg' => 'Rol no asignado. Contacta al administrador.']);
                    }
                } else {
                    // Usuario sin rol asignado
                    Auth::logout();
                    return redirect('/login')->withErrors(['msg' => 'Rol no asignado o usuario inválido. Contacta al administrador.']);
                }
            }
        }

        return $next($request);
    }
}

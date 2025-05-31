<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Redirige al usuario después del login según su rol
     *
     * @return string
     */
    protected function redirectTo()
    {
        $user = Auth::user();

        if ($user && $user->role) {
            switch ($user->role->name) {
                case 'admin':
                    return '/admin';
                case 'directora':
                    return '/directora';
                case 'secretaria':
                    return '/secretaria';
                case 'regente':
                    return '/regente';
                case 'docente':
                    return '/docente';
                default:
                    return '/home';
            }
        }

        // Por defecto
        return '/home';
    }

    /**
     * Crea una nueva instancia del controlador.
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}


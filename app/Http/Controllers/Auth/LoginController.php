<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    // Redirige a /empleados después de iniciar sesión
    protected $redirectTo = '/empleados';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}

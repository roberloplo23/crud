<?php

use App\Http\Controllers\EmpleadosController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

// Middleware de autenticación para proteger las rutas CRUD
Route::middleware('auth')->group(function () {
    // Rutas CRUD protegidas para empleados
    Route::resource('empleados', EmpleadosController::class);

    // Redirigir la ruta '/home' a '/empleados'
    Route::get('/home', function () {
        return redirect()->route('empleados.index');
    })->name('home');
});

Auth::routes(['reset' => false]);

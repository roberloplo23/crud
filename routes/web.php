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
    Route::resource('home', EmpleadosController::class);
}); // <- Aquí cerramos el grupo de rutas

Auth::routes(['reset' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

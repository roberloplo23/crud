<?php

use App\Http\Controllers\EmpleadosController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Middleware de autenticación para proteger las rutas CRUD
Route::middleware('auth')->group(function () {
    // Rutas CRUD protegidas para empleados
    Route::resource('empleados', EmpleadosController::class);
}); // <- Aquí cerramos el grupo de rutas

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

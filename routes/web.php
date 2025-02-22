<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Laravel\Sanctum\Http\Controllers\CsrfCookieController;

// Ruta protegida con Sanctum para obtener el usuario autenticado
Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

// Ruta para obtener el token CSRF de Sanctum
Route::get('sanctum/csrf-cookie', [CsrfCookieController::class, 'show']);

// Ruta de login
Route::post('/login', [AuthenticatedSessionController::class, 'store']);

// Ruta de prueba para verificar que Laravel funciona
Route::get('/', function () {
    return ['Laravel' => app()->version()];
});

// Incluir otras rutas de autenticación
require __DIR__.'/auth.php';
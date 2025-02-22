<?php

use App\Http\Controllers\Api\AntesController;
use App\Http\Controllers\Api\CentroComposterasController;
use App\Http\Controllers\Api\CicloBoloController;
use App\Http\Controllers\Api\CicloRegistrosController;
use App\Http\Controllers\Api\ComposteraRegistrosController;
use App\Http\Controllers\Api\RegistroAntesController;
use App\Http\Controllers\Api\RegistroDurantesController;
use App\Http\Controllers\Api\RegistroDespuesController;
use App\Http\Controllers\Api\RegistrosController;
use App\Http\Controllers\Api\UserRegistrosController;
use App\Http\Controllers\Api\BoloCiclosController;
use App\Http\Controllers\Api\CiclosController;
use App\Http\Controllers\Api\BoloController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ComposterasController;
use App\Http\Controllers\Api\UserCentroController;
use App\Http\Controllers\Api\RegistroController;
use App\Http\Controllers\Api\CentrosController;
use App\Http\Controllers\Api\DespuesController;
use App\Http\Controllers\Api\DurantesController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Sanctum\Http\Controllers\CsrfCookieController;
use Orion\Facades\Orion;


// Ruta protegida con Sanctum para obtener el usuario autenticado
Route::get('/user', function (Request $request) {
    return $request->user();
});

Route::get('sanctum/csrf-cookie', [CsrfCookieController::class, 'show']);

Route::post('/login', action: [AuthenticatedSessionController::class, 'store']);


// Rutas API organizadas en un grupo
Route::group(['as' => 'api.'], function() {
    Orion::resource('centros', CentrosController::class);
    Orion::resource('composteras', ComposterasController::class);
    Orion::resource('bolos', BoloController::class);
    Orion::resource('ciclos', CiclosController::class);
    Orion::resource('registros', RegistrosController::class);
    Orion::resource('antes', AntesController::class);
    Orion::resource('durantes', DurantesController::class);
    Orion::resource('despues', DespuesController::class);
    Orion::resource('users', UserController::class);

    Orion::hasManyResource('users', 'registros', UserRegistrosController::class);
    Orion::hasManyResource('registros', 'antes', RegistroAntesController::class);
    Orion::hasManyResource('registros', 'durantes', RegistroDurantesController::class);
    Orion::hasManyResource('registros', 'despues', RegistroDespuesController::class);
    Orion::hasManyResource('bolos', 'ciclos', BoloCiclosController::class);
    Orion::hasManyResource('composteras', 'registros', ComposteraRegistrosController::class);
    Orion::hasManyResource('centros', 'composteras', CentroComposterasController::class);

    Orion::belongsToResource('ciclos', 'bolos', CicloBoloController::class);
    Orion::hasManyResource('ciclo', 'registros', CicloRegistrosController::class);
    Orion::belongsToResource('user', 'centro', UserCentroController::class);
});

Route::get('users/{userId}/centros', [UserController::class, 'centros']);

Route::get('centrosPublicos', [CentrosController::class, 'centrosPublicos']);
Route::get('centros/{id}/registros', [CentrosController::class, 'registros']);
Route::get('centro/{id}/composterasCentro', [CentrosController::class, 'composterasConCentro']);

Route::get('ultimoRegistro', [RegistroController::class, 'lastRegist']);
Route::get('centros/{id}/bolosUsuarios', [RegistroController::class, 'boloUsuario']);

Route::get('antesBolo/{id}', [BoloController::class, 'antesBolo']);
Route::get('durantesBolo/{id}', [BoloController::class, 'duranteBolo']);
Route::get('registrosBolo/{id}', [BoloController::class, 'registrosBolo']);

// Route::get('exactbolo/composter1', [BoloController::class, 'bolocomposter1']);
// Route::get('exactbolo/composter2', [BoloController::class, 'bolocomposter2']);
// Route::get('exactbolo/composter3', [BoloController::class, 'bolocomposter3']);
<?php

use App\Http\Controllers\Api\CentrosController;
use Illuminate\Http\Request;
use Orion\Facades\Orion;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::group(['as' => 'api.'], function() {
    Orion::resource('centros', CentrosController::class);
});

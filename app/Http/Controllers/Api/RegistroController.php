<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Registro;
use App\Policies\RegistroPolicy;
use Illuminate\Http\Request;
use Orion\Concerns\DisableAuthorization;
use Orion\Concerns\DisablePagination;
use Orion\Http\Controllers\Controller as ControllersController;

class RegistroController extends ControllersController
{
    use DisablePagination, DisableAuthorization;
    protected $model = Registro::class; // or "App\Models\Post"

    protected $policy = RegistroPolicy::class;

    public function lastRegist(){
        $registro = Registro::latest('id')->first();
        return response()->json($registro,200);
    }

}
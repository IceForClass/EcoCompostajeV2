<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Registro;
use App\Policies\RegistroPolicy;
use Illuminate\Http\Request;
use Orion\Concerns\DisableAuthorization;
use Orion\Http\Controllers\Controller as ControllersController;

class RegistroController extends ControllersController
{
    use DisableAuthorization;
    protected $model = Registro::class; // or "App\Models\Post"

    protected $policy = RegistroPolicy::class;

    public function lastRegist(){
        $registro = Registro::latest('id')->first();
        return response()->json($registro,200);
    }

    public function boloUsuario($id)
    {
        $datos = Registro::with([
            'ciclo.bolo:id,nombre',
            'user:id,name'
        ])->whereHas('compostera', function ($query) use ($id) {
            $query->where('centro_id', $id);
        })->paginate(15);
    
        return response()->json($datos, 200);
    }
}
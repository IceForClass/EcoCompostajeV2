<?php

namespace App\Http\Controllers\Api;

use App\Models\Centro;
use App\Models\Compostera;
use App\Models\Registro;
use Orion\Concerns\DisableAuthorization;
use Orion\Http\Controllers\Controller;
use App\Models\Bolo;

class CentrosController extends Controller
{

    use DisableAuthorization;
    protected $model = Centro::class; // or "App\Models\Post"

    public function centrosPublicos(){
        $centro = Centro::where("tipo","publico")->get();
        return response()->json($centro);
    }

    public function registros($id)
    {
        $registros = Centro::find($id)->registros()->paginate(15);
        return response()->json($registros, 200);
    }

    public function composterasConCentro($id){
    $composteras = Compostera::where('centro_id', $id)
        ->with('centro:id,nombre')->get();
    return response()->json($composteras);
}

    public function users($centroId)
    {
        $centros = Centro::find($centroId);
        return response()->json($centros->users);
    }
    
    public function bolosCentro($centroId)
{
    $bolos = Bolo::whereHas('ciclos', function($query) use ($centroId) {
        $query->whereHas('compostera', function($query) use ($centroId) {
            $query->where('centro_id', $centroId);
        });
    })->get();

    return response()->json($bolos);
}


    
}
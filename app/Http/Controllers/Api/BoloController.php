<?php

namespace App\Http\Controllers\Api;

use App\Models\Bolo;
use Orion\Concerns\DisableAuthorization;
use Orion\Http\Controllers\Controller;

class BoloController extends Controller
{
    use DisableAuthorization;

    protected $model = Bolo::class; // or "App\Models\Post"


    public function ultimobolo(){
        $bolo = Bolo::latest('id')->first();
        return response()->json($bolo,200);
    }

    public function bolocomposter1(){
        $bolo = Bolo::where('cicle1',true)->where('cicle2',false)->where('cicle3',false)->where('finish',false)->first();
        return response()->json($bolo,200);
    }
    public function bolocomposter2(){
        $bolo = Bolo::where('cicle1',true)->where('cicle2',true)->where('cicle3',false)->where('finish',false)->first();
        return response()->json($bolo,200);
    }

    public function bolocomposter3(){
        $bolo = Bolo::where('cicle1',true)->where('cicle2',true)->where('cicle3',true)->where('finish',false)->first();
        return response()->json($bolo,200);
    }

    public function registrosBolo($id){
        $registros = Bolo::find($id)->registros;
        return response()->json($registros,200);
    }

    public function antesBolo($id)
{
    $bolo = Bolo::with([
        'ciclos.registros.antes',
        'ciclos.registros.compostera:id,tipo'
    ])->find($id);

    if (!$bolo) {
        return response()->json(['error' => 'Bolo no encontrado'], 404);
    }

    // Mapear los datos para devolverlos en el formato deseado
    $antesConRegistros = $bolo->ciclos->flatMap(function ($ciclo) {
        return $ciclo->registros->flatMap(function ($registro) {
            return $registro->antes->map(function ($antes) use ($registro) {
                return [
                    'id' => $antes->id,
                    'registro_id' => $antes->registro_id,
                    'temp_compostera' => $antes->temp_compostera,
                    'compostera_tipo' => $registro->compostera ? $registro->compostera->tipo : "No asignado",
                    'antes_created_at' => $antes->created_at->format('Y-m-d'),
                ];
            });
        });
    });

    return response()->json($antesConRegistros, 200, [], JSON_UNESCAPED_UNICODE);
}


    


public function duranteBolo($id)
{
    $bolo = Bolo::with([
        'ciclos.registros.durante',
        'ciclos.registros.compostera:id,tipo'
    ])->find($id);

    if (!$bolo) {
        return response()->json(['error' => 'Bolo no encontrado'], 404);
    }

    // Mapear los datos correctamente
    $durantesConRegistros = $bolo->ciclos->flatMap(function ($ciclo) {
        return $ciclo->registros->flatMap(function ($registro) {
            return $registro->durante->map(function ($durante) use ($registro) {
                return [
                    'id' => $durante->id,
                    'registro_id' => $durante->registro_id,
                    'cantidad_aporteVLitros' => $durante->cantidad_aporteVLitros,
                    'cantidad_aporteSLitros' => $durante->cantidad_aporteSLitros,
                    'compostera_tipo' => $registro->compostera ? $registro->compostera->tipo : "No asignado",
                    'durante_created_at' => $durante->created_at->format('Y-m-d'),
                ];
            });
        });
    });

    return response()->json($durantesConRegistros, 200, [], JSON_UNESCAPED_UNICODE);
}



}
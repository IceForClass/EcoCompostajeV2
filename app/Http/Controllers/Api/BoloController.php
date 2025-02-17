<?php

namespace App\Http\Controllers\Api;

use App\Models\Bolo;
use Orion\Concerns\DisableAuthorization;
use Orion\Http\Controllers\Controller;

class BoloController extends Controller
{
    use DisableAuthorization;

    protected $model = Bolo::class; // or "App\Models\Post"

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
        'antes' => function ($query) {
            $query->select('antes.id as antes_id', 'antes.registro_id', 'antes.temp_compostera');
        },
        'registros' => function ($query) {
            $query->select('registros.id as registro_id', 'registros.compostera_id')
                ->with('compostera:id,tipo');
        }
    ])->find($id);

    // Unimos cada 'antes' con su 'registro' y su 'compostera.tipo'
    $antesConRegistros = $bolo->antes->map(function ($antes) use ($bolo) {
        $registro = $bolo->registros->firstWhere('registro_id', $antes->registro_id);
        return [
            'id' => $antes->antes_id,
            'registro_id' => $antes->registro_id,
            'temp_compostera' => $antes->temp_compostera,
            'compostera_tipo' => $registro && $registro->compostera ? $registro->compostera->tipo : "No asignado",
        ];
    });

    return response()->json($antesConRegistros, 200, [], JSON_UNESCAPED_UNICODE);
}
}
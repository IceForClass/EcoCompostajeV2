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
        'ciclos.registros.antes'
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
        'durantes' => function ($query) {
            $query->select(
                'durantes.id as durante_id',
                'durantes.registro_id',
                'durantes.cantidad_aporteVLitros', // Modificado: Devuelve los litros en vez de la cantidad general
                'durantes.cantidad_aporteSLitros', // Modificado: Devuelve los litros en vez de la cantidad general
                'durantes.created_at'
            );
        },
        'registros' => function ($query) {
            $query->select(
                'registros.id as registro_id',
                'registros.compostera_id',
                'registros.created_at'
            )
            ->with('compostera:id,tipo');
        }
    ])->find($id);

    // Unimos cada 'durante' con su 'registro' y su 'compostera.tipo'
    $durantesConRegistros = $bolo->durantes->map(function ($durante) use ($bolo) {
        $registro = $bolo->registros->firstWhere('registro_id', $durante->registro_id);
        return [
            'id' => $durante->durante_id,
            'registro_id' => $durante->registro_id,
            'cantidad_aporteVLitros' => $durante->cantidad_aporteVLitros, // Modificado: Ahora devuelve la cantidad en litros
            'cantidad_aporteSLitros' => $durante->cantidad_aporteSLitros, // Modificado: Ahora devuelve la cantidad en litros
            'compostera_tipo' => $registro && $registro->compostera ? $registro->compostera->tipo : "No asignado",
            'durante_created_at' => $durante->created_at->format('Y-m-d'),
        ];
    });

    return response()->json($durantesConRegistros, 200, [], JSON_UNESCAPED_UNICODE);
}


    

}
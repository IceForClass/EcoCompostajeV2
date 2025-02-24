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
        'ciclos.registros' => function ($query) {
            $query->with('durante');  // Aquí usamos "durante" en singular
        }
    ])->find($id);

    dd($bolo->ciclos->first()->registros->first()->durante ?? 'No hay durantes');
}


}
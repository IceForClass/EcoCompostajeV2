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

    public function antesBolo($id){
        $registros = Bolo::find($id)->antes;
        return response()->json($registros, 200);
    }
    

}
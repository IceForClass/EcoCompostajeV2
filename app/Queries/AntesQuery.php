<?php

namespace App\Queries;

use App\Models\Registro;
use App\Http\Requests\RegistroRequest;
use Illuminate\Http\Request;

class AntesQuery
{
    /*
    public function setAntes(Registro $registro, Request $request)
    {
        $antes = new Antes();
        $antes->registros_id = $registro->id;
        $antes->temperatura_ambiental = $request['temperatura_ambiental'];
        $antes->temperatura_compostera = $request['temperatura_compostera'];
        $antes->nivel_llenado_inicial = $request['nivel_llenado_inicial'];
        $antes->olor = $request['olor'];
        if ($request['presencia_insectos'] != 'No anotado') $antes->presencia_insectos = $request['presencia_insectos'];
        if ($request['humedad'] != 'No anotado') $antes->humedad = $request['humedad'];
        if ($request->hasFile('fotografias_iniciales')){
            $path = $request->file('fotografias_iniciales')->store('images/antes','public');
            $antes->fotografias_iniciales = $path;
        } 
        $antes->observaciones_iniciales = $request['observaciones_iniciales'];
        return $antes;
    }
        */

}
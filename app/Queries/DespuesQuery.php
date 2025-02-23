<?php

namespace App\Queries;

use App\Models\Registro;
use App\Models\Despues;
use App\Http\Requests\RegistroRequest;
use Illuminate\Http\Request;

class DespuesQuery
{

    public function setDespues(Registro $registro, Request $request)
    {
        $despues = new Despues();
        $despues->registros_id = $registro->id;
        $despues->nivel_llenado_final = $request['nivel_llenado_final'];
        if ($request->hasFile('fotografias_finales')){
            $path = $request->file('fotografias_finales')->store('images/despues','public');
            $despues->fotografias_finales = $path;
        } 
        $despues->observaciones_finales = $request['observaciones_finales'];
        return $despues;
    }
}
<?php

namespace App\Queries;

use App\Models\Registro;

use App\Models\Durante;
use App\Http\Requests\RegistroRequest;
use Illuminate\Http\Request;

class DuranteQuery
{
    public function setDurante(Registro $registro, Request $request)
    {
        $durante = new Durante();
        $durante->registros_id = $registro->id;
        if ($request['riego'] != 'No anotado') $durante->riego = $request['riego'];
        if ($request['revolver'] != 'No anotado') $durante->revolver = $request['revolver'];
        $durante->aporte_verde = $request['aporte_verde'];
        $durante->tipo_aporte_verde = $request['tipo_aporte_verde'];
        $durante->aporte_seco = $request['aporte_seco'];
        $durante->tipo_aporte_seco = $request['tipo_aporte_seco'];
        if ($request->hasFile('fotografias_durante')){
            $path = $request->file('fotografias_durante')->store('images/durante','public');
            $durante->fotografias_durante = $path;
        } 
        $durante->observaciones_durante = $request['observaciones_durante'];
        return $durante;
    }

}
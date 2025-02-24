<?php

namespace App\Http\Controllers\Api;

use Orion\Http\Controllers\Controller;
use Orion\Concerns\DisableAuthorization;
use Orion\Http\Requests\Request as OrionRequest;
use App\Models\Despues;
use App\Http\Requests\DespuesRequest;

class DespuesController extends Controller
{
    use DisableAuthorization;

    // Indicas el modelo de Eloquent
    protected $model = Despues::class;

    // Indicas a Orion que use tu Request para validaciones
    protected $request = DespuesRequest::class;

    public function store(OrionRequest $request)
    {
        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('imagenes', 'public');
            // Actualizas la información del request con la ruta
            $registro = Despues::create(array_merge($request->except('foto'), ['foto' => $path]));
            
            return response()->json($registro,201);
        }

        // Llamas a la implementación de Orion para crear el registro
        return parent::store($request);
    }
}

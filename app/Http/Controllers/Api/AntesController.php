<?php

namespace App\Http\Controllers\Api;
use Orion\Http\Requests\Request as OrionRequest;
use App\Http\Requests\AntesRequest;
use App\Models\Antes;
use Orion\Concerns\DisableAuthorization;
use Orion\Http\Controllers\Controller;

class AntesController extends Controller
{
    use DisableAuthorization;

    protected $model = Antes::class; // or "App\Models\Post"
    protected $request = AntesRequest::class;

    //protected $request = AntesRequest::class;
    
    public function store(OrionRequest $request)
    {
        if ($request->hasFile('foto')) {
            // Guarda la imagen correctamente en storage/app/public/imagenes
            $path = $request->file('foto')->store('imagenes', 'public');

            // Crea el registro manualmente y lo guarda en la base de datos
            $registro = Antes::create(array_merge($request->except('foto'), ['foto' => $path]));

            return response()->json($registro, 201);
        }

        // Si no hay foto, usa el método de Orion normal
        return parent::store($request);
    }
}
    

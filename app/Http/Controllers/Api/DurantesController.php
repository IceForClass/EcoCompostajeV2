<?php

namespace App\Http\Controllers\Api;
use App\Http\Requests\DuranteRequest;
use App\Models\Durante;
use Orion\Concerns\DisableAuthorization;
use Orion\Http\Controllers\Controller;
use Orion\Http\Requests\Request as OrionRequest;
class DurantesController extends Controller
{
    use DisableAuthorization;

    protected $model = Durante::class; // or "App\Models\Post"
    

    protected $request = DuranteRequest::class;

    
    public function store(OrionRequest $request)
    {
        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('duranteimages', 'public');
            // Actualizas la información del request con la ruta
            $request->merge(['foto' => $path]);
        }

        // Llamas a la implementación de Orion para crear el registro
        return parent::store($request);
    } 

}
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
            $path = $request->file('foto')->store('antesimages', 'public');
            // Actualizas la información del request con la ruta
            $request->merge(['foto' => $path]);
        }

        // Llamas a la implementación de Orion para crear el registro
        return parent::store($request);
    }
    

}
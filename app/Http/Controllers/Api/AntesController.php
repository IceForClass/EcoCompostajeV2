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
        // Guarda la imagen en la carpeta storage/app/public y obtiene el path relativo
        $path = $request->file('foto')->store('antesimages', 'public');

        // Clonar el request y modificar el path de la imagen antes de enviarlo a Orion
        $modifiedRequest = new OrionRequest(array_merge($request->all(), ['foto' => $path]));

        // Llamar a la implementación de Orion con el request modificado
        return parent::store($modifiedRequest);
    }

    // Si no hay foto, usa el request normal
    return parent::store($request);
}

    

}
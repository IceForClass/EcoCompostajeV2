<?php

namespace App\Http\Controllers\Api;

use App\Models\Centro;
use App\Models\Compostera;
use App\Models\Registro;
use Orion\Concerns\DisableAuthorization;
use Orion\Http\Controllers\Controller;

class CentrosController extends Controller
{

    use DisableAuthorization;
    protected $model = Centro::class; // or "App\Models\Post"

    public function centrosPublicos(){
        $centro = Centro::where("tipo","publico")->get();
        return response()->json($centro);
    }

    public function registros($id)
    {
        $registros = Centro::find($id)->registros()->paginate(15);
        return response()->json($registros, 200);
    }
    
}
<?php

namespace App\Http\Controllers\Api;

use App\Models\Centro;
use Orion\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CentrosController extends Controller
{
    protected $model = Centro::class; 

    // Obtener todos los centros
    public function index(Request $request)
    {
        return response()->json(Centro::all(), 200);
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Models\Durante;
use Orion\Concerns\DisableAuthorization;
use Orion\Http\Controllers\Controller;

class DurantesController extends Controller
{
    use DisableAuthorization;


    use DisableAuthorization;
    protected $model = Durante::class; // or "App\Models\Post"

}
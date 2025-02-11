<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Ciclo;
use App\Policies\CicloPolicy;
use Illuminate\Http\Request;
use Orion\Concerns\DisablePagination;
use Orion\Http\Controllers\Controller as ControllersController;

class CicloController extends ControllersController
{
    use DisablePagination;
    protected $model = Ciclo::class; // or "App\Models\Post"

    protected $policy = CicloPolicy::class;

}
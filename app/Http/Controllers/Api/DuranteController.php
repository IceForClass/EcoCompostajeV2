<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Durante;
use App\Policies\DurantePolicy;
use Illuminate\Http\Request;
use Orion\Concerns\DisableAuthorization;
use Orion\Concerns\DisablePagination;
use Orion\Http\Controllers\Controller as ControllersController;

class DuranteController extends ControllersController
{
    use DisablePagination, DisableAuthorization;
    protected $model = Durante::class; // or "App\Models\Post"

    protected $policy = DurantePolicy::class;
}
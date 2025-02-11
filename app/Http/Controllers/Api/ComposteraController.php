<?php

namespace App\Http\Controllers\Api;

use Orion\Concerns\DisableAuthorization;
use Orion\Concerns\DisablePagination;
use App\Models\Compostera;
use App\Policies\ComposteraPolicy;
use Orion\Http\Controllers\Controller;

class ComposteraController extends Controller
{
    // use DisableAuthorization;
    use DisablePagination, DisableAuthorization;
    protected $model = Compostera::class; 

    protected $policy = ComposteraPolicy::class;
}
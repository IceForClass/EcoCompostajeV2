<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Registro;
use Illuminate\Http\Request;
use Orion\Concerns\DisableAuthorization;
use Orion\Concerns\DisablePagination;
use Orion\Http\Controllers\RelationController;

class RegistroDuranteController extends RelationController
{
    // use DisableAuthorization;
    use DisablePagination, DisableAuthorization;
    protected $model = Registro::class;
    protected $relation = 'during';
}
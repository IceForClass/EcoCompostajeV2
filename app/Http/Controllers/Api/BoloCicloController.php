<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Bolo;
use App\Policies\BoloPolicy;
use Illuminate\Http\Request;
use Orion\Http\Controllers\RelationController;

class BoloCicloController extends RelationController
{
    protected $model = Bolo::class;
    protected $relation = 'ciclo';

    protected $policy = BoloPolicy::class;
}
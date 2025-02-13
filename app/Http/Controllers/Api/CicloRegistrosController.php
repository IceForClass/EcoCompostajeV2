<?php

namespace App\Http\Controllers\Api;

use App\Models\Ciclo;
use Orion\Concerns\DisableAuthorization;
use Orion\Http\Controllers\RelationController;

class CicloRegistrosController extends RelationController
{
    use DisableAuthorization;

    /**
     * Fully-qualified model class name
     */
    // use DisableAuthorization;
    protected $model = Ciclo::class; // or "App\Models\Post"

    /**
     * Name of the relationship as it is defined on the Post model
     */
    protected $relation = 'registros';
}
<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Centro;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Http\Request;
use Orion\Concerns\DisableAuthorization;
use Orion\Http\Controllers\Controller as ControllersController;
use Orion\Http\Controllers\RelationController;

class CentroUsersController extends RelationController
{
    use DisableAuthorization;
    // use DisableAuthorization;
    protected $model = Centro::class;
    protected $relation = 'users';
}
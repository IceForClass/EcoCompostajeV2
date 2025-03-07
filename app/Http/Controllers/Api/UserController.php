<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Orion\Concerns\DisableAuthorization;
use Orion\Http\Controllers\Controller;

class UserController extends Controller
{
    use DisableAuthorization;
    protected $model = User::class; // or "App\Models\Post"
    
    public function centros($userId)
    {
        $user = User::find($userId);
        return response()->json($user->centros);
    }

}
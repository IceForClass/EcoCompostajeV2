<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class AuthenticatedSessionController extends Controller
{
    public function store(LoginRequest $request): JsonResponse
    {
        $request->authenticate();
        $request->session()->regenerate();

        return response()->json([
            'user' => Auth::user(), // Devuelve el usuario autenticado
            'message' => 'Login exitoso'
        ]);
    }

    public function destroy(Request $request): JsonResponse
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return response()->json([
            'message' => 'Logout exitoso'
        ])->withCookie(cookie()->forget('ecocompostaje_session')) // Elimina la cookie de sesión
          ->withCookie(cookie()->forget('XSRF-TOKEN')); // Elimina la cookie CSRF si es necesario
    }
}
<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthLoginRequest;
use App\Http\Resources\TokenResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(AuthLoginRequest $request)
    {
        $credentials = $request->validated();

        if (Auth::attempt($credentials)) {
            $user = $request->user();

            if ($user->tokens()->exists()) {
                $user->tokens()->delete();
            }

            $token = $user->createToken('auth_token');

            return response()->json(new TokenResource($token));
        }


        return response()->json([
            "message" => "unauthorized"
        ], 401);
    }

    public function me(): JsonResponse
    {
        return response()->json(Auth::user());
    }
}

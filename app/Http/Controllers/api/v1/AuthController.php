<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Auth;
use Illuminate\Http\JsonResponse;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function login(LoginRequest $request): JsonResponse
    {
        $credentials = $request->only('email', 'password');
        $token = JWTAuth::attempt($credentials);
        if (! $token) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        return response()->json([
            'access_token' => $token,
            'expires_in' => JWTAuth::factory()->getTTL() * 60,
            ]);
    }

    public function refresh(): JsonResponse
    {
        // Get the current token from the request
        $token = JWTAuth::getToken();
        if (!$token) {
            return response()->json(['message' => 'Token not provided'], 401);
        }

        try {
            $newToken = JWTAuth::refresh($token);
        } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            return response()->json(['message' => 'Invalid token'], 401);
        }

        return response()->json([
            'Refreshed_Token' => $newToken,
            'expires_in' => JWTAuth::factory()->getTTL() * 60,
        ]);
    }

    public function me(): JsonResponse
    {
        $user = auth('api')->user();
        if (! $user) {
            return response()->json(['message' => 'User not found'], 404);
        }
        return response()->json($user);
    }

    public function logout(): JsonResponse
    {
        // @TODO
       // JWTAuth::invalidate(JWTAuth::getToken());
        Auth::logout(true);
        return response()->json(['message' => 'Successfully logged out']);
    }
}

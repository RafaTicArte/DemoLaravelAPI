<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $this->validateLogin($request);

        if (Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'token' => $request->user()->createToken($request->device)->plainTextToken,
                'status' => 1,
                'message' => 'Login success',
            ], 200);
        }

        return response()->json([
            'status' => -1,
            'message' => 'Unauthenticated',
        ], 401);
    }

    public function validateLogin(Request $request)
    {
        return $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'device' => 'required',
        ]);
    }

    public function logout(Request $request)
    {
        if ($request->user()->currentAccessToken()->delete()) {
            return response()->json([
                'status' => 1,
                'message' => 'Logout success',
            ], 200);
        }

        return response()->json([
            'status' => 1,
            'message' => 'Logout error',
        ], 401);
    }
}

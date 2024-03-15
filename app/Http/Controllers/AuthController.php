<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->all();

        $remember = $credentials['remember'] ?? false;
        unset($credentials['remember']);
        
        if (!Auth::attempt($credentials,$remember)) {
            return response([
                'msg' => 'Do not match'
            ], 422);
        }
        

        $user = Auth::user();
        $token = $user->createToken('Tokenn')->plainTextToken;
        return response([
            'name' => $user->name,
            'email' => $user->email,
            'token' => $token
        ]);
    }

    public function logout(Request $request)
    {
        //$request->user()->tokens()->delete();
        $user = Auth::user();
        // Revoke the token that was used to authenticate the current request...
        $user->currentAccessToken()->delete();

        return response()->json(['message' => 'Logged out']);
    }
}

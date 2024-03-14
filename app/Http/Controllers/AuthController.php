<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->all();

        if (!Auth::attempt($credentials)) {
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
}

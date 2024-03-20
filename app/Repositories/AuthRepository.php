<?php
namespace App\Repositories;

use App\Interfaces\AuthRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class AuthRepository implements AuthRepositoryInterface
{
    public function login(array $credentials)
    {
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('Token')->plainTextToken;
            return ['user' => $user, 'token' => $token];
        }
        return null;
    }

    public function logout()
    {
        $user = Auth::user();

        $user->currentAccessToken()->delete();
        
        return ['message' => 'Logged out', 'user' => $user->name];
    }
}
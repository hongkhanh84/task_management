<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserRepository
{
    public function all()
    {
        return User::all();
    }

    public function infor()
    {
        return Auth::user();
    }
}

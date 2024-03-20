<?php
namespace App\Interfaces;

use App\Models\User;


interface AuthRepositoryInterface
{
    public function login(array $credentials);

    public function logout();
}
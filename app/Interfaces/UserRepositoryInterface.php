<?php
namespace App\Interfaces;

use App\Models\User;


interface UserRepositoryInterface
{
    public function getUsers();

    public function createUser(array $data);

    public function findUserById($id);

    public function updateUser($id, array $data);

    public function delete(User $user);

    public function updateProfile($id, array $data);
}
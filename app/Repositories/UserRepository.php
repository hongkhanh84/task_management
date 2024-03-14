<?php
namespace App\Repositories;

use App\Interfaces\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserRepositoryInterface
{
    public function getUsers()
    {
        return User::all();
    }

    public function createUser(array $data)
    {
        $data['password'] = bcrypt($data['password']);
        return User::create($data);
    }

    public function findUserById($id)
    {
        return User::find($id);
    }

    public function updateUser($id, array $data)
    {
        $user = $this->findUserById($id);

        if ($user) {
            $user->update($data);
            return $user;
        }

        return null;
    }

    public function delete(User $user)
    {
        $user->delete();
    }

    public function updateProfile($userId, array $data)
    {
        $user = $this->findUserById($userId);

        if ($user) {
            if (isset($data['password']) && !empty($data['password'])) {
                $data['password'] = Hash::make($data['password']);
            } else {
                unset($data['password']);
            }
            $user->update($data);
            return $user;
        }
    }
}
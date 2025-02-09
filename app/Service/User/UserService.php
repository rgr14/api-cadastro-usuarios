<?php

namespace App\Service\User;

use App\Exceptions\User\UserCreateException;
use App\Exceptions\User\UserUpdateException;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function getAllUsers()
    {
        return User::all();
    }

    public function createUser(array $data)
    {
        try {
            return User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => $data['password'],
            ]);
        } catch (QueryException $e) {
            throw new UserCreateException("Erro ao criar usuário. Verifique os dados e tente novamente.");
        }
    }

    public function getUserById($id)
    {
        return User::findOrFail($id);
    }

    public function updateUser(User $user, array $data): User
    {
        try {
            $updateData = [
                'name' => $data['name'],
                'email' => $data['email'],
            ];

            if (isset($data['password'])) {
                $updateData['password'] = $data['password'];
            }

            $user->update($updateData);

            return $user->fresh();
        } catch (QueryException $e) {
            throw new UserUpdateException("Erro ao atualizar usuário. Verifique os dados e tente novamente.");
        }
    }

    public function deleteUser( User $user): ?bool
    {
        return $user->delete();
    }
}

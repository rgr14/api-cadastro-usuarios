<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserFormRequest;
use App\Http\Resources\User\UserCollection;
use App\Http\Resources\User\UserResource;
use App\Service\User\UserService;

class UserController extends Controller
{
    public function __construct(
        protected UserService $userService
    ){}

    public function index()
    {
        $users = $this->userService->getAllUsers();
        return new UserCollection($users);
    }

    public function store(UserFormRequest $request)
    {
        $user = $this->userService->createUser($request->all());

        return response()->json([
            'message' => 'Usuário criado com sucesso',
            'data' => new UserResource($user),
        ]);
    }

    public function show($id)
    {
        $user = $this->userService->getUserById($id);
        return new UserResource($user);
    }

    public function update(UserFormRequest $request, $id)
    {
        $user = $this->userService->getUserById($id);
        $updatedUser = $this->userService->updateUser($user, $request->all());

        return response()->json([
            'message' => 'Usuário atualizado com sucesso',
            'data' => new UserResource($updatedUser),
        ]);
    }

    public function destroy($id)
    {
        $user = $this->userService->getUserById($id);
        $this->userService->deleteUser($user);

        return response()->json([
            'message' => 'Usuário deletado com sucesso'
        ]);
    }
}

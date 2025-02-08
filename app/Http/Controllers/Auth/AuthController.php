<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginFormRequest;
use App\Http\Requests\Auth\RegisterFormRequest;
use App\Http\Resources\Auth\AuthLoginResource;
use App\Http\Resources\User\UserResource;
use App\Service\User\UserService;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function __construct(
       protected UserService $userService
    ) {}

    public function login(LoginFormRequest $request)
    {
        $credentials = $request->only(['email', 'password']);

        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return new AuthLoginResource( (object) [
            'user' => auth()->user(),
            'token' => $token,
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }

    public function register(RegisterFormRequest $request)
    {
        $user = $this->userService->createUser($request->all());
        return new UserResource($user);
    }

    public function logout()
    {
        auth()->logout();
        return response()->json([
            'message' => 'Sucesso ao deslogar',
            'success' => true
        ]);
    }
}

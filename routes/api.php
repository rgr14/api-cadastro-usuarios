<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:api'])->group(function () {
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::apiResource('users', UserController::class);
});


Route::post('login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

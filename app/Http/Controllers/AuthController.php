<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Resources\User\UserResource;
use App\Services\User\UserRegisterService;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    public function register(UserRegisterService $userRegisterService, RegisterRequest $registerRequest): JsonResponse
    {
        $user = $userRegisterService->register($registerRequest->validated());

        return UserResource::make($user)->response()->setStatusCode(201);
    }
}

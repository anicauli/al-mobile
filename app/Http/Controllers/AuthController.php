<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Resources\User\UserResource;
use App\Models\User;
use App\Services\User\UserGenerateLoginTokensService;
use App\Services\User\UserRegisterService;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    public function register(
        UserRegisterService $userRegisterService,
        UserGenerateLoginTokensService $generateLoginTokensService,
        RegisterRequest $registerRequest
    ): JsonResponse
    {
        $user = $userRegisterService->register($registerRequest->validated());

        return response()->json([
            'user' => UserResource::make($user),
            'token' => $generateLoginTokensService->generate($user)
        ]);
    }

    public function login(
        UserGenerateLoginTokensService $generateLoginTokensService,
        LoginRequest $loginRequest
    ): JsonResponse
    {
        if (!auth()->attempt($loginRequest->validated())) {
            abort(401, __('Credentials not valid'));
        }

        /**
         * @var User $user
         */
        $user = auth()->user();
        return response()->json($generateLoginTokensService->generate($user))->setStatusCode(201);
    }

    public function refresh(
        UserGenerateLoginTokensService $generateLoginTokensService,
    ): JsonResponse
    {
        /**
         * @var User $user
         */
        $user = auth()->user();
        return response()->json($generateLoginTokensService->refresh(
            $user,
            $user->currentAccessToken()
        ))->setStatusCode(201);
    }

    public function user(): JsonResponse
    {
        /**
         * @var User $user
         */
        $user = auth()->user();
        return UserResource::make($user)->response()->setStatusCode(200);
    }
}

<?php

namespace App\Services\User;

use App\Models\PersonalAccessToken;
use App\Models\User;

class UserGenerateLoginTokensService
{
    /**
     * @param User $user
     * @return array
     */
    public function generate(User $user): array
    {
        $accessTokenExpireAt = now()->addHours(2);
        $accessToken = $user->createToken(
            name:'access_token', abilities: ['all_api_access'], expiresAt: $accessTokenExpireAt
        );
        $refreshTokenExpireAt = now()->addHours(2);
        $refreshToken = $user->createToken(
            name:'refresh_token', abilities: ['refresh_token_access'], expiresAt: $refreshTokenExpireAt
        );

        $refreshToken->accessToken->access_token_id = $accessToken->accessToken->id;
        $refreshToken->accessToken->save();

        return [
            'access_token' => $accessToken->plainTextToken,
            'access_token_expires_at' => $accessTokenExpireAt,
            'refresh_token' => $refreshToken->plainTextToken,
            'refresh_token_expires_at' => $refreshTokenExpireAt,
        ];
    }

    /**
     * @param User $user
     * @param PersonalAccessToken $refreshToken
     * @return array
     */
    public function refresh(User $user, PersonalAccessToken $refreshToken): array
    {
        $accessToken = PersonalAccessToken::query()->where('id', $refreshToken->access_token_id)->first();
        $accessToken->delete();
        $refreshToken->delete();
        return $this->generate($user);
    }
}

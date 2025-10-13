<?php
namespace App\Services\User;

use App\Models\User;

class UserReadService
{
    public function getUserByEmail(string $email):  User|null
    {
        return User::query()->where('email', $email)->first();
    }
}

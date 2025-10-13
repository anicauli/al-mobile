<?php

namespace App\Services\User;

use App\Models\User;

class UserRegisterService
{
    public function register(array $data): User
    {
        $user = new User();
        $user->fill($data);
        $user->save();
        return $user;
    }
}

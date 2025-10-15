<?php

namespace App\Services\User;

use App\Enums\UserType;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRegisterService
{
    public function register(array $data): User
    {
        $user = new User();
        $data['password'] = Hash::make($data['password']);
        $data['type'] = UserType::CLIENT;
        $user->fill($data);
        $user->save();
        return $user;
    }
}

<?php

namespace App\Services\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRegisterService
{
    public function register(array $data): User
    {
        $user = new User();
        $data['password'] = Hash::make($data['password']);
        $user->fill($data);
        $user->save();
        return $user;
    }
}

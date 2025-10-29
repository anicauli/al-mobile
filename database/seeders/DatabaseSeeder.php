<?php

namespace Database\Seeders;

use App\Enums\UserType;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Staff',
            'email' => 'staff@example.com',
            'type' => UserType::STAFF,
            'password' => Hash::make('password')
        ]);
        User::factory()->create([
            'name' => 'User',
            'email' => 'user@example.com',
            'type' => UserType::CLIENT,
            'password' => Hash::make('password')
        ]);
    }
}

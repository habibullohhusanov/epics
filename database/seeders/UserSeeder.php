<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::create([
            "role_id" => 1,
            "name" => "admin",
            "email" => "admin@gmail.com",
            "password" => Hash::make("2407"),
        ]);
        $user->markEmailAsVerified();

        User::factory()->count(100)->create();
    }
}

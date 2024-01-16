<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        \App\Models\User::factory()->create([
            'name' => env('DEFAULT_USER_NAME', 'User McUserFace'),
            'email' => env('DEFAULT_USER_EMAIL', 'user@user.user'),
            'password' => env('DEFAULT_USER_PASSWORD_HASH', bcrypt('password'))
        ]);

        \App\Models\User::factory(20)->create();


    }
}

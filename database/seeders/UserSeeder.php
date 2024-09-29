<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Creating default admin user
        User::create([
            'name' => 'Admin',
            'email' => 'admin@test.com',
            'password' => Hash::make('123456789'), // Make sure to hash the password
        ]);

        // Creating some regular users
        User::create([
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'password' => Hash::make('password123'),
        ]);

        User::create([
            'name' => 'Jane Doe',
            'email' => 'janedoe@example.com',
            'password' => Hash::make('123456780'),
        ]);
    }
}
<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'user_type' => 'admin',
            'is_approve' => true
        ]);
        User::create([
            'name' => 'Member 1',
            'email' => 'member@gmail.com',
            'password' => bcrypt('password'),
            'user_type' => 'member',
        ]);

    }
}

<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $users = [
            [
                'name' => 'Dedek Tegar Apriyandi',
                'username' => 'G1F020027',
                'gender' => 'male',
                'role' => 'student',
                'password' => bcrypt('password')
            ],
            [
                'name' => 'Bagus Mirzana',
                'username' => 'G1F020024',
                'gender' => 'female',
                'role' => 'student',
                'password' => bcrypt('password')
            ],
            [
                'name' => 'Endina Putri Purwandari',
                'username' => '9999999999',
                'gender' => 'female',
                'role' => 'teacher',
                'password' => bcrypt('password')
            ],

        ];

        User::insert($users);
    }
}

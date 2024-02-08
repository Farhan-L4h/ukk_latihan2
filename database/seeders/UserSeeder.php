<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => "Admin",
            'email' => "admin@gmail.com",
            'password' => Hash::make("123456789"),
            'role' => "admin"
        ]);

        DB::table('users')->insert([
            'name' => "TestUser",
            'email' => "user@gmail.com",
            'password' => Hash::make("123456789"),
            'role' => "user"
        ]);
    }
}

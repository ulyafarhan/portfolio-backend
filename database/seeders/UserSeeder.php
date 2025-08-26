<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Muhammad Ulya Farhan',
            'email' => 'admin@example.com', // Ganti dengan email admin Anda
            'password' => Hash::make('password'), // Ganti dengan password yang aman
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
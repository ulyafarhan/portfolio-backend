<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            CvDataSeeder::class, 
            ProjectSeeder::class,    
            PostSeeder::class,       
            CertificateSeeder::class, 
        ]);
    }
}
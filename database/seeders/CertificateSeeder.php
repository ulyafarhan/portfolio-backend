<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Certificate;
use Illuminate\Support\Facades\DB;

class CertificateSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('certificates')->truncate();

        Certificate::create([
            'title' => 'Dasar-Dasar Pemrograman Web',
            'issuer' => 'Dicoding Indonesia',
            'description' => 'Mempelajari konsep dasar HTML, CSS, dan JavaScript untuk membangun website statis.', // <-- TAMBAHKAN DESKRIPSI
            'issued_year' => '2024',
            'credential_url' => '#',
            'thumbnail' => 'images/certificates/dicoding.jpg',
        ]);

        Certificate::create([
            'title' => 'Cloud Practitioner Essentials',
            'issuer' => 'Amazon Web Services (AWS)',
            'description' => 'Memahami konsep dasar, layanan inti, keamanan, dan harga dari platform AWS Cloud.', // <-- TAMBAHKAN DESKRIPSI
            'issued_year' => '2024',
            'credential_url' => '#',
            'thumbnail' => 'images/certificates/aws.jpg',
        ]);

        Certificate::create([
            'title' => 'Introduction to Back-End Development',
            'issuer' => 'Coursera (Meta)',
            'description' => 'Pengenalan fundamental pengembangan sisi server menggunakan bahasa pemrograman dan framework modern.', // <-- TAMBAHKAN DESKRIPSI
            'issued_year' => '2025',
            'credential_url' => '#',
            'thumbnail' => 'images/certificates/meta.jpg',
        ]);
    }
}
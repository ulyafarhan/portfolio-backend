<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;
use Illuminate\Support\Facades\DB;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('projects')->truncate();

        Project::create([
            'title' => 'Sistem Manajemen Inventaris Toko',
            'description' => 'Aplikasi berbasis web untuk mengelola stok barang, melacak penjualan, dan menghasilkan laporan bulanan. Dibangun untuk membantu UMKM mendigitalisasi proses bisnis mereka.',
            'thumbnail' => 'images/projects/inventory.jpg', // DIGANTI DARI 'image'
            'url' => 'https://github.com/username/sistem-inventaris',
            'technologies' => 'Laravel, MySQL, Bootstrap, jQuery',
            'category' => 'Web App',
        ]);

        Project::create([
            'title' => 'Website Portofolio Pribadi (Proyek Ini)',
            'description' => 'Portofolio digital yang menampilkan profil, keahlian, proyek, dan tulisan saya. Frontend dibangun dengan Next.js untuk performa tinggi dan SEO, sedangkan backend menggunakan Laravel sebagai API.',
            'thumbnail' => 'images/projects/portfolio.jpg', // DIGANTI DARI 'image'
            'url' => 'https://github.com/username/portfolio-project',
            'technologies' => 'Next.js, React, Laravel, REST API',
            'category' => 'Web App',
        ]);

        Project::create([
            'title' => 'Blog Platform Sederhana',
            'description' => 'Sebuah platform untuk menulis dan mempublikasikan artikel. Dilengkapi dengan sistem otentikasi, manajemen post (CRUD), dan halaman detail post yang SEO-friendly.',
            'thumbnail' => 'images/projects/blog.jpg', // DIGANTI DARI 'image'
            'url' => 'https://github.com/username/blog-platform',
            'technologies' => 'PHP, Laravel, Tailwind CSS, MySQL',
            'category' => 'Web App',
        ]);

        Project::create([
            'title' => 'Aplikasi To-Do List Mobile',
            'description' => 'Aplikasi mobile sederhana untuk mengelola tugas harian. Fitur termasuk menambah, mengedit, menghapus tugas, serta menandai tugas sebagai selesai.',
            'thumbnail' => 'images/projects/todo.jpg', // DIGANTI DARI 'image'
            'url' => 'https://github.com/username/to-do-list-app',
            'technologies' => 'Flutter, Dart, Firebase',
            'category' => 'Mobile App',
        ]);

        Project::create([
            'title' => 'Aplikasi Manajemen Toko',
            'description' => 'Aplikasi mobile untuk mengelola stok, penjualan, dan laporan toko. Dibangun dengan Flutter dan Firebase.',
            'thumbnail' => 'images/projects/shop.jpg', // DIGANTI DARI 'image'
            'url' => 'https://github.com/username/shop-app',
            'technologies' => 'Flutter, Dart, Firebase',
            'category' => 'Mobile App',
        ]);
    }
}
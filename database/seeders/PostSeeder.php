<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('posts')->truncate();

        Post::create([
            'title' => 'Memahami Konsep REST API untuk Pemula',
            'slug' => Str::slug('Memahami Konsep REST API untuk Pemula'),
            'body' => 'REST API adalah kunci utama dalam pengembangan aplikasi modern...', // Menggunakan 'body'
            'thumbnail' => 'images/posts/api.jpg', // Menggunakan 'thumbnail'
            'published_at' => now(),
        ]);

        Post::create([
            'title' => '5 Alasan Mengapa Laravel Menjadi Framework PHP Favorit',
            'slug' => Str::slug('5 Alasan Mengapa Laravel Menjadi Framework PHP Favorit'),
            'body' => 'Laravel secara konsisten menduduki peringkat atas sebagai framework PHP paling populer...', // Menggunakan 'body'
            'thumbnail' => 'images/posts/laravel.jpg', // Menggunakan 'thumbnail'
            'published_at' => now()->subDays(5),
        ]);

        Post::create([
            'title' => 'Cara Membuat Aplikasi Mobile dengan JavaScript',
            'slug' => Str::slug('Cara Membuat Aplikasi Mobile dengan JavaScript'),
            'body' => 'JavaScript adalah bahasa pemrograman yang sangat kuat untuk membuat aplikasi mobile...', // Menggunakan 'body'
            'thumbnail' => 'images/posts/js.jpg', // Menggunakan 'thumbnail'
            'published_at' => now()->subDays(10),
        ]);

        Post::create([
            'title' => 'Cara Membuat Aplikasi Mobile dengan Flutter',
            'slug' => Str::slug('Cara Membuat Aplikasi Mobile dengan Flutter'),
            'body' => 'Flutter adalah framework yang sangat kuat untuk membuat aplikasi mobile...', // Menggunakan 'body'
            'thumbnail' => 'images/posts/flutter.jpg', // Menggunakan 'thumbnail'
            'published_at' => now()->subDays(15),
        ]);

        Post::create([
            'title' => 'Cara Membuat Aplikasi Mobile dengan Kotlin',
            'slug' => Str::slug('Cara Membuat Aplikasi Mobile dengan Kotlin'),
            'body' => 'Kotlin adalah bahasa pemrograman yang sangat kuat untuk membuat aplikasi mobile...', // Menggunakan 'body'
            'thumbnail' => 'images/posts/kotlin.jpg', // Menggunakan 'thumbnail'
            'published_at' => now()->subDays(20),
        ]);
    }
}
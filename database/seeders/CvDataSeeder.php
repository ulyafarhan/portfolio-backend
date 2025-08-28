<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Profile;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Skill;
use Carbon\Carbon;

class CvDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // --- Hapus data lama untuk memastikan tidak ada duplikasi ---
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Profile::truncate();
        Education::truncate();
        Experience::truncate();
        Skill::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // --- 1. Seeder untuk Personal Profile ---
        Profile::create([
            'id' => 1,
            'full_name' => 'Muhammad Ulya Farhan',
            'job_title' => 'Calon Full Stack Developer',
            'summary' => 'Seorang mahasiswa Teknik Informatika dengan minat besar pada pengembangan web full-stack. Saya menikmati proses belajar dan eksplorasi teknologi baru untuk membangun aplikasi yang tidak hanya berfungsi baik, tetapi juga memberikan pengalaman pengguna yang positif.',
            'phone' => '+62 823 7226 8996',
            'email' => 'muhammadulyafarhan1312@gmail.com',
            'website' => 'https://ulyafarhan.com', // Ganti dengan website Anda jika ada
            'location' => 'Pidie Jaya, Aceh',
            'cv_url' => null, // Biarkan null, ini akan di-generate otomatis
        ]);

        // --- 2. Seeder untuk Pendidikan ---
        Education::create([
            'institution' => 'UNIVERSITAS MALIKUSSALEH',
            'degree' => 'Sarjana', // Asumsi
            'field_of_study' => 'Teknik Informatika',
            'start_year' => 2024,
            'end_year' => null, // Masih berjalan
        ]);

        // --- 3. Seeder untuk Pengalaman Organisasi ---
        Experience::create([
            'job_title' => 'Ketua Bidang Publikasi & Dokumentasi',
            'company_name' => 'UKM PTQ Universitas Malikussaleh',
            'location' => 'Lhokseumawe, Aceh',
            'start_date' => Carbon::parse('2024-01-01'), // Tanggal perkiraan
            'end_date' => null, // Masih menjabat
            'description' => 'Aktif dalam program kerja besar seperti SIMPATI (Sehari Bersama Adik Panti). Berkontribusi dalam berbagai hal di kelompok dan proyek organisasi. Terbiasa membuat script, presentasi, dan narasi kritis.',
        ]);

        // --- 4. Seeder untuk Keahlian ---
        $skills = [
            // Kategori: Frontend
            ['name' => 'HTML', 'category' => 'Frontend', 'mastery' => 85],
            ['name' => 'CSS', 'category' => 'Frontend', 'mastery' => 80],
            ['name' => 'JavaScript', 'category' => 'Frontend', 'mastery' => 75],
            ['name' => 'React', 'category' => 'Frontend', 'mastery' => 70],
            ['name' => 'Next.js', 'category' => 'Frontend', 'mastery' => 70],
            
            // Kategori: Backend
            ['name' => 'PHP', 'category' => 'Backend', 'mastery' => 80],
            ['name' => 'Laravel', 'category' => 'Backend', 'mastery' => 85],
            ['name' => 'Python', 'category' => 'Backend', 'mastery' => 70],

            // Kategori: Database
            ['name' => 'MySQL', 'category' => 'Database', 'mastery' => 80],
            ['name' => 'Microsoft Access', 'category' => 'Database', 'mastery' => 65],

            // Kategori: Tools
            ['name' => 'Wordpress', 'category' => 'Tools', 'mastery' => 75],
            ['name' => 'Git', 'category' => 'Tools', 'mastery' => 80],
            ['name' => 'Figma', 'category' => 'Tools', 'mastery' => 70],
            ['name' => 'Canva', 'category' => 'Tools', 'mastery' => 90],
            ['name' => 'CapCut', 'category' => 'Tools', 'mastery' => 90],
        ];

        foreach ($skills as $skill) {
            Skill::create($skill);
        }
    }
}
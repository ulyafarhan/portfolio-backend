<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Experience;
use App\Models\Education;
use App\Models\Skill;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Str; // <-- INI ADALAH BARIS KUNCI YANG HARUS ADA

class CvGeneratorController extends Controller
{
    public function generate()
    {
        // 1. Ambil semua data yang dibutuhkan dari database
        $profile = Profile::firstOrFail();
        $experiences = Experience::orderBy('start_date', 'desc')->get();
        $educations = Education::orderBy('start_year', 'desc')->get();
        $skills = Skill::orderBy('category')->get();

        // 2. Siapkan data untuk dikirim ke view
        $data = [
            'profile' => $profile,
            'experiences' => $experiences,
            'educations' => $educations,
            'skills' => $skills,
        ];

        // 3. Render view Blade menjadi HTML
        $pdf = Pdf::loadView('cv-template', $data);

        // 4. Buat nama file yang dinamis
        $fileName = 'CV-' . Str::slug($profile->full_name) . '.pdf';

        // 5. Kirim PDF ke browser untuk diunduh
        return $pdf->download($fileName);
    }
}
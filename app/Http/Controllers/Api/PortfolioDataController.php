<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Post;
use App\Models\Profile;
use App\Models\Project;
use App\Models\Skill;

class PortfolioDataController extends Controller
{
    // Mengembalikan semua data proyek
    public function projects()
    {
        return response()->json(Project::latest()->get());
    }

    // Mengembalikan semua data postingan blog
    public function posts()
    {
        return response()->json(Post::latest()->get());
    }
    
    // Mengembalikan semua data sertifikat
    public function certificates()
    {
        return response()->json(Certificate::latest()->get());
    }

    // Mengembalikan semua data untuk CV dalam satu panggilan
    public function cvData()
    {
        return response()->json([
            'profile' => Profile::first(),
            'experiences' => Experience::orderBy('start_date', 'desc')->get(),
            'educations' => Education::orderBy('start_year', 'desc')->get(),
            'skills' => Skill::orderBy('category')->get(),
        ]);
    }
}
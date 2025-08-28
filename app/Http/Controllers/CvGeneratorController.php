<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Experience;
use App\Models\Education;
use App\Models\Skill;
use App\Models\Project;
use App\Models\Certificate;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Str;

class CvGeneratorController extends Controller
{
    public function generate()
    {
        $profile = Profile::firstOrFail();
        $experiences = Experience::orderBy('start_date', 'desc')->get();
        $educations = Education::orderBy('start_year', 'desc')->get();
        $skills = Skill::orderBy('category')->get();
        $projects = Project::latest()->take(3)->get();
        $certificates = Certificate::latest()->take(3)->get();

        $data = [
            'profile' => $profile,
            'experiences' => $experiences,
            'educations' => $educations,
            'skills' => $skills,
            'projects' => $projects,
            'certificates' => $certificates,
        ];

        $pdf = Pdf::loadView('cv-template', $data);
        $fileName = 'CV-' . Str::slug($profile->full_name) . '.pdf';
        return $pdf->download($fileName);
    }
}
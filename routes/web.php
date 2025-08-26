<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\CertificateController;
use App\Http\Controllers\Admin\ContactSubmissionController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Admin\ExperienceController;
use App\Http\Controllers\Admin\EducationController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\CvGeneratorController;

// Rute utama
Route::get('/', function () {
    return "Halaman Frontend (Next.js)";
});

// Grup Rute Admin
Route::prefix('admin')->name('admin.')->group(function () {
    
    // Rute untuk tamu (halaman login)
    Route::middleware('guest')->group(function () {
        Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
        Route::post('login', [AuthenticatedSessionController::class, 'store']);
    });

    // Rute yang dilindungi (memerlukan login)
    Route::middleware('auth')->group(function () {
        Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // Resourceful Routes
        Route::resource('projects', ProjectController::class);
        Route::resource('posts', PostController::class);
        Route::resource('certificates', CertificateController::class);
        Route::resource('contact-submissions', ContactSubmissionController::class)->only([
            'index', 'show', 'destroy'
        ]);

        // Rute Profil
        Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');

        Route::resource('experiences', ExperienceController::class);
        Route::resource('educations', EducationController::class);
        Route::resource('skills', SkillController::class);
    });
});

// Rute untuk Form Kontak Publik (Workaround)
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('/cv/download', [CvGeneratorController::class, 'generate'])->name('cv.download');
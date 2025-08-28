<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\CertificateController;
use App\Http\Controllers\Admin\ContactSubmissionController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ExperienceController;
use App\Http\Controllers\Admin\EducationController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\CvGeneratorController;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;

Route::get('/', function () {
    return "Halaman Frontend (Next.js)";
});

Route::get('/cv/download', [CvGeneratorController::class, 'generate'])->name('cv.download');


Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');

    Route::middleware('auth')->group(function () {
        Route::resource('projects', ProjectController::class);
        Route::resource('posts', PostController::class);
        Route::resource('certificates', CertificateController::class);
        Route::resource('contact-submissions', ContactSubmissionController::class)->only(['index', 'show', 'destroy']);

        Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');

        Route::resource('experiences', ExperienceController::class);
        Route::resource('educations', EducationController::class);
        Route::resource('skills', SkillController::class);
        Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
    });

    require __DIR__.'/auth.php';
});
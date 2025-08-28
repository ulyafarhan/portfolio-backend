<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PortfolioDataController;
use App\Models\Post;
use App\Models\Certificate;
use App\Http\Controllers\Api\ContactController;

Route::get('/projects', [PortfolioDataController::class, 'projects']);
Route::get('/posts', [PortfolioDataController::class, 'posts']);
Route::get('/certificates', [PortfolioDataController::class, 'certificates']);
Route::get('/cv-data', [PortfolioDataController::class, 'cvData']);

Route::get('/posts/{post:slug}', function (Post $post) {
    return response()->json($post);
});

Route::post('/contact', [ContactController::class, 'store'])->name('api.contact.store');


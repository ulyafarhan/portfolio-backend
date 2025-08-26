<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PortfolioDataController;

Route::get('/projects', [PortfolioDataController::class, 'projects']);
Route::get('/posts', [PortfolioDataController::class, 'posts']);
Route::get('/certificates', [PortfolioDataController::class, 'certificates']);
Route::get('/cv-data', [PortfolioDataController::class, 'cvData']);
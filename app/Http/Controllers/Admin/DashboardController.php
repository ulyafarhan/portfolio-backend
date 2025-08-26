<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Project;
use App\Models\ContactSubmission;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Mengambil data untuk kartu statistik
        $projectCount = Project::count();
        $postCount = Post::count();
        $unreadMessagesCount = ContactSubmission::where('status', 'unread')->count();

        // Mengambil data untuk daftar aktivitas terbaru
        $recentMessages = ContactSubmission::latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'projectCount',
            'postCount',
            'unreadMessagesCount',
            'recentMessages'
        ));
    }
}
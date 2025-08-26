<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Menampilkan form edit profil.
     */
    public function edit()
    {
        // Ambil data profil pertama, atau buat objek baru jika tidak ada
        $profile = Profile::firstOrNew(['id' => 1]);
        return view('admin.profile.edit', compact('profile'));
    }

    /**
     * Memperbarui data profil di database.
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'job_title' => 'required|string|max:255',
            'summary' => 'required|string',
            'phone' => 'nullable|string|max:20',
            'email' => 'required|email|max:255',
            'website' => 'nullable|url|max:255',
            'location' => 'nullable|string|max:255',
        ]);

        // Update data jika sudah ada, atau buat baru jika belum.
        // Ini memastikan kita hanya punya 1 baris data profil.
        Profile::updateOrCreate(['id' => 1], $validated);

        return redirect()->route('admin.profile.edit')->with('success', 'Profile updated successfully.');
    }
}
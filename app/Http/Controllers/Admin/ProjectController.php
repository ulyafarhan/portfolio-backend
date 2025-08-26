<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Menampilkan daftar semua proyek.
     */
    public function index()
    {
        $projects = Project::latest()->paginate(10);
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Menampilkan form untuk membuat proyek baru.
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Menyimpan proyek baru ke database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255|unique:projects',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'technologies' => 'required|string',
            'demo_url' => 'nullable|url',
            'source_code_url' => 'nullable|url',
        ]);

        // Proses upload gambar
        $imagePath = $request->file('image')->store('projects', 'public');

        Project::create([
            'title' => $validated['title'],
            'slug' => Str::slug($validated['title']),
            'description' => $validated['description'],
            'image_url' => $imagePath,
            'technologies' => explode(',', $validated['technologies']),
            'demo_url' => $validated['demo_url'],
            'source_code_url' => $validated['source_code_url'],
        ]);

        return redirect()->route('admin.projects.index')->with('success', 'Project created successfully.');
    }

    /**
     * Menampilkan form untuk mengedit proyek.
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Memperbarui proyek di database.
     */
    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255|unique:projects,title,' . $project->id,
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'technologies' => 'required|string',
            'demo_url' => 'nullable|url',
            'source_code_url' => 'nullable|url',
        ]);

        $imagePath = $project->image_url;
        if ($request->hasFile('image')) {
            // Hapus gambar lama
            Storage::disk('public')->delete($project->image_url);
            // Upload gambar baru
            $imagePath = $request->file('image')->store('projects', 'public');
        }

        $project->update([
            'title' => $validated['title'],
            'slug' => Str::slug($validated['title']),
            'description' => $validated['description'],
            'image_url' => $imagePath,
            'technologies' => explode(',', $validated['technologies']),
            'demo_url' => $validated['demo_url'],
            'source_code_url' => $validated['source_code_url'],
        ]);

        return redirect()->route('admin.projects.index')->with('success', 'Project updated successfully.');
    }

    /**
     * Menghapus proyek dari database.
     */
    public function destroy(Project $project)
    {
        // Hapus gambar dari storage
        Storage::disk('public')->delete($project->image_url);
        
        $project->delete();

        return redirect()->route('admin.projects.index')->with('success', 'Project deleted successfully.');
    }
}
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->paginate(10);
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'url' => 'nullable|url',
            'technologies' => 'required|string',
            'category' => 'required|string',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $project = new Project($request->except('thumbnail'));

        if ($request->hasFile('thumbnail')) {
            $project->thumbnail = $request->file('thumbnail')->store('thumbnails/projects', 'public');
        }

        $project->save();

        return redirect()->route('admin.projects.index')->with('success', 'Project created successfully.');
    }

    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'url' => 'nullable|url',
            'technologies' => 'required|string',
            'category' => 'required|string',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $project->fill($request->except('thumbnail'));

        if ($request->hasFile('thumbnail')) {
            // Hapus gambar lama jika ada
            // Storage::disk('public')->delete($project->thumbnail);
            $project->thumbnail = $request->file('thumbnail')->store('thumbnails/projects', 'public');
        }

        $project->save();

        return redirect()->route('admin.projects.index')->with('success', 'Project updated successfully.');
    }

    public function destroy(Project $project)
    {
        // Hapus gambar
        // Storage::disk('public')->delete($project->thumbnail);
        $project->delete();

        return redirect()->route('admin.projects.index')->with('success', 'Project deleted successfully.');
    }
}
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Education;
use Illuminate\Http\Request;


class EducationController extends Controller
{
    public function index()
    {
        $educations = Education::orderBy('start_year', 'desc')->paginate(10);
        return view('admin.educations.index', compact('educations'));
    }

    public function create()
    {
        return view('admin.educations.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'institution' => 'required|string|max:255',
            'degree' => 'required|string|max:255',
            'field_of_study' => 'required|string|max:255',
            'start_year' => 'required|digits:4|integer|min:1900',
            'end_year' => 'nullable|digits:4|integer|min:1900|after_or_equal:start_year',
        ]);
        Education::create($validated);
        return redirect()->route('admin.educations.index')->with('success', 'Education added successfully.');
    }

    public function edit(Education $education)
    {
        return view('admin.educations.edit', compact('education'));
    }

    public function update(Request $request, Education $education)
    {
        $validated = $request->validate([
            'institution' => 'required|string|max:255',
            'degree' => 'required|string|max:255',
            'field_of_study' => 'required|string|max:255',
            'start_year' => 'required|digits:4|integer|min:1900',
            'end_year' => 'nullable|digits:4|integer|min:1900|after_or_equal:start_year',
        ]);
        $education->update($validated);
        return redirect()->route('admin.educations.index')->with('success', 'Education updated successfully.');
    }

    public function destroy(Education $education)
    {
        $education->delete();
        return redirect()->route('admin.educations.index')->with('success', 'Education deleted successfully.');
    }
}
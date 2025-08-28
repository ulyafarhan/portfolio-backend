<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CertificateController extends Controller
{
    public function index()
    {
        $certificates = Certificate::latest()->paginate(10);
        return view('admin.certificates.index', compact('certificates'));
    }

    public function create()
    {
        return view('admin.certificates.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'issuer' => 'required|string|max:255',
            'description' => 'required|string', 
            'issued_year' => 'required|integer|min:1990|max:' . date('Y'), 
            'credential_url' => 'nullable|url',
            'image' => 'nullable|image|max:2048', 
        ]);
        
        $imagePath = $request->file('image')->store('certificates', 'public');
        
        Certificate::create($validated + ['image_url' => $imagePath]);

        return redirect()->route('admin.certificates.index')->with('success', 'Certificate added successfully.');
    }

    public function edit(Certificate $certificate)
    {
        return view('admin.certificates.edit', compact('certificate'));
    }

    public function update(Request $request, Certificate $certificate)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'issuer' => 'required|string|max:255',
            'description' => 'required|string', 
            'issued_year' => 'required|integer|min:1990|max:' . date('Y'), 
            'credential_url' => 'nullable|url',
            'image' => 'nullable|image|max:2048', 
        ]);

        $imagePath = $certificate->image_url;
        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($certificate->image_url);
            $imagePath = $request->file('image')->store('certificates', 'public');
        }

        $certificate->update($validated + ['image_url' => $imagePath]);

        return redirect()->route('admin.certificates.index')->with('success', 'Certificate updated successfully.');
    }

    public function destroy(Certificate $certificate)
    {
        Storage::disk('public')->delete($certificate->image_url);
        $certificate->delete();

        return redirect()->route('admin.certificates.index')->with('success', 'Certificate deleted successfully.');
    }
}
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactSubmission;
use Illuminate\Http\Request;


class ContactSubmissionController extends Controller
{
    public function index()
    {
        $submissions = ContactSubmission::latest()->paginate(15);
        return view('admin.contact_submissions.index', compact('submissions'));
    }

    public function show(ContactSubmission $contactSubmission)
    {
        // Tandai sebagai sudah dibaca saat dibuka
        if ($contactSubmission->status === 'unread') {
            $contactSubmission->update(['status' => 'read']);
        }
        return view('admin.contact_submissions.show', ['submission' => $contactSubmission]);
    }

    public function destroy(ContactSubmission $contactSubmission)
    {
        $contactSubmission->delete();
        return redirect()->route('admin.contact-submissions.index')->with('success', 'Message deleted successfully.');
    }
}
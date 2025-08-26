<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\ContactFormSubmitted;
use App\Models\ContactSubmission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\JsonResponse;

class ContactController extends Controller
{
    /**
     * Menyimpan data dari form kontak.
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:5000',
        ]);

        // Simpan ke database
        $submission = ContactSubmission::create($validated);

        // Kirim notifikasi email ke admin/pemilik portofolio
        // Ambil email tujuan dari file .env untuk fleksibilitas
        $recipientEmail = config('mail.from.address');
        Mail::to($recipientEmail)->send(new ContactFormSubmitted($submission));

        return response()->json([
            'message' => 'Your message has been sent successfully!'
        ], 201); // 201 Created
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'job_title',
        'summary',
        'phone',
        'email',
        'website',
        'location',
        'cv_url', // Kita akan gunakan ini nanti
    ];
}
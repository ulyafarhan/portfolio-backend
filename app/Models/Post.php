<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'excerpt',
        'body',
        'cover_image_url',
        'published_at',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];
    
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Mendapatkan user (penulis) dari post ini.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Certificate extends Model {
    use HasFactory;
    protected $fillable = [
        'title',
        'issuing_organization',
        'issue_date',
        'credential_id',
        'image_url',
    ];
}
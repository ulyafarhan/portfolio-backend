<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Certificate extends Model {
    use HasFactory;
    protected $fillable = [
        'title',
        'issuer',
        'description',    // <-- TAMBAHKAN
        'issued_year',    // <-- UBAH DARI issue_date
        'credential_url',
        'image_url',
    ];
}
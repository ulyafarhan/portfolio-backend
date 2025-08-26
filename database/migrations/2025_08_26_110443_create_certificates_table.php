<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void {
        Schema::create('certificates', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('issuing_organization');
            $table->date('issue_date');
            $table->string('credential_id')->nullable();
            $table->string('image_url'); // Path ke gambar sertifikat
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('certificates');
    }
};
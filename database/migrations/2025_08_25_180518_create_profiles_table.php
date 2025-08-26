<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            // Hanya ada 1 profil, jadi kita bisa hardcode id=1
            $table->string('full_name');
            $table->string('job_title');
            $table->text('summary');
            $table->string('phone')->nullable();
            $table->string('email');
            $table->string('website')->nullable();
            $table->string('location')->nullable();
            $table->string('cv_url')->nullable(); // Path ke file PDF CV
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
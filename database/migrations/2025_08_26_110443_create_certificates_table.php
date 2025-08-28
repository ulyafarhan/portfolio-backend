<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void
    {
        Schema::create('certificates', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('issuer');
            $table->text('description'); 
            $table->year('issued_year'); 
            $table->string('credential_url')->nullable();
            $table->string('image_url');
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('certificates');
    }
};
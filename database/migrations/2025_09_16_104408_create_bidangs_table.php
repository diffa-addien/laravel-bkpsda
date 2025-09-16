<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // database/migrations/xxxx_xx_xx_xxxxxx_create_bidangs_table.php
public function up(): void
{
    Schema::create('bidangs', function (Blueprint $table) {
        $table->id();
        $table->string('judul');
        $table->string('slug')->unique();

        // Sub Halaman 1
        $table->string('sub_halaman_1_judul')->nullable();
        $table->string('sub_halaman_1_url')->nullable();
        $table->text('sub_halaman_1_deskripsi')->nullable();

        // Sub Halaman 2
        $table->string('sub_halaman_2_judul')->nullable();
        $table->string('sub_halaman_2_url')->nullable();
        $table->text('sub_halaman_2_deskripsi')->nullable();
        
        // Sub Halaman 3
        $table->string('sub_halaman_3_judul')->nullable();
        $table->string('sub_halaman_3_url')->nullable();
        $table->text('sub_halaman_3_deskripsi')->nullable();
        
        $table->foreignId('user_id')->constrained('users');
        $table->boolean('is_published')->default(true);
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bidangs');
    }
};

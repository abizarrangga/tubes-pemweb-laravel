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
        Schema::create('berita', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->enum('kategori', ['Kegiatan', 'Prestasi', 'Pengumuman'])->default('Kegiatan');
            $table->date('tanggal');
            $table->string('penulis')->default('Admin DSB');
            $table->enum('status', ['Published', 'Draft'])->default('Draft');
            $table->string('ringkasan')->nullable();
            $table->string('gambar')->nullable();         // path file upload lokal
            $table->string('gambar_url')->nullable();     // URL eksternal (fallback)
            $table->longText('konten');
            $table->string('slug')->unique()->nullable(); // untuk URL SEO-friendly
            $table->unsignedBigInteger('user_id')->nullable(); // relasi ke users (penulis)
            $table->foreign('user_id')->references('id')->on('users')->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('berita');
    }
};

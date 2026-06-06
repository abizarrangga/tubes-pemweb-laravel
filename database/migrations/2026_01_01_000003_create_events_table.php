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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->enum('kategori', ['Pagelaran', 'Workshop', 'Lomba', 'Festival'])->default('Pagelaran');
            $table->date('tanggal');
            $table->enum('status', ['Mendatang', 'Selesai'])->default('Mendatang');
            $table->string('harga')->nullable();          // misal: "Rp 25.000" atau "Gratis"
            $table->string('lokasi');
            $table->string('gambar')->nullable();         // path file upload lokal
            $table->string('gambar_url')->nullable();     // URL eksternal (fallback)
            $table->text('deskripsi')->nullable();
            $table->string('slug')->unique()->nullable(); // untuk URL SEO-friendly
            $table->unsignedBigInteger('user_id')->nullable(); // relasi ke users (pembuat)
            $table->foreign('user_id')->references('id')->on('users')->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};

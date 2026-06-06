<?php

use App\Models\AboutPage;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('about_pages', function (Blueprint $table) {
            $table->id();
            $table->string('nama_organisasi')->default('Dapur Seni Biru');
            $table->text('deskripsi');
            $table->string('gambar')->nullable();
            $table->string('gambar_url')->nullable();
            $table->string('visi_judul');
            $table->text('visi_deskripsi');
            $table->string('misi_judul');
            $table->json('misi_items');
            $table->json('struktur_items');
            $table->text('kontak_deskripsi');
            $table->string('kontak_email')->nullable();
            $table->string('kontak_lokasi')->nullable();
            $table->timestamps();
        });

        AboutPage::create(AboutPage::defaultData());
    }

    public function down(): void
    {
        Schema::dropIfExists('about_pages');
    }
};

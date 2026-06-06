<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'nama'      => 'Pagelaran Teater "Fajar di Ujung Senja"',
                'kategori'  => 'Pagelaran',
                'tanggal'   => '2025-12-05',
                'status'    => 'Mendatang',
                'harga'     => 'Rp 30.000',
                'lokasi'    => 'Aula Utama UPI Kampus Cibiru',
                'deskripsi' => 'Pertunjukan teater tahunan Dapur Seni Biru yang mengangkat kisah perjuangan generasi muda dalam mencari jati diri. Dipentaskan oleh 20 aktor pilihan.',
                'gambar_url' => 'https://images.unsplash.com/photo-1507676184212-d03ab07a01bf?w=800&h=500&fit=crop',
            ],
            [
                'nama'      => 'Workshop Fotografi Seni untuk Pemula',
                'kategori'  => 'Workshop',
                'tanggal'   => '2025-11-20',
                'status'    => 'Mendatang',
                'harga'     => 'Gratis',
                'lokasi'    => 'Ruang Studio DSB Lt. 3',
                'deskripsi' => 'Workshop fotografi yang membahas komposisi, pencahayaan, dan estetika foto untuk keperluan dokumentasi seni. Bawa kamera atau gunakan HP.',
                'gambar_url' => 'https://images.unsplash.com/photo-1452587925148-ce544e77e70d?w=800&h=500&fit=crop',
            ],
            [
                'nama'      => 'Festival Musik Akustik "Dapur Sessions Vol. 3"',
                'kategori'  => 'Festival',
                'tanggal'   => '2025-12-15',
                'status'    => 'Mendatang',
                'harga'     => 'Rp 15.000',
                'lokasi'    => 'Amphiteater Kampus UPI Cibiru',
                'deskripsi' => 'Festival musik akustik yang menampilkan berbagai genre dari folk, jazz, hingga indie. Open mic untuk umum. Bawa tiket dan semangat!',
                'gambar_url' => 'https://images.unsplash.com/photo-1501386761578-eaa54b08b4f3?w=800&h=500&fit=crop',
            ],
            [
                'nama'      => 'Lomba Cipta Puisi & Musikalisasi Antar Kampus',
                'kategori'  => 'Lomba',
                'tanggal'   => '2025-11-30',
                'status'    => 'Mendatang',
                'harga'     => 'Rp 25.000 / tim',
                'lokasi'    => 'Gedung Serbaguna UPI Cibiru',
                'deskripsi' => 'Kompetisi bergengsi yang terbuka untuk mahasiswa seluruh Bandung Raya. Tema tahun ini: "Bumi dan Manusia". Total hadiah Rp 5.000.000.',
                'gambar_url' => 'https://images.unsplash.com/photo-1493225457124-a3eb161ffa5f?w=800&h=500&fit=crop',
            ],
            [
                'nama'      => 'Kelas Menari Tari Sunda untuk Mahasiswa Baru',
                'kategori'  => 'Workshop',
                'tanggal'   => '2025-10-10',
                'status'    => 'Selesai',
                'harga'     => 'Gratis',
                'lokasi'    => 'Aula Lantai 1 UPI Cibiru',
                'deskripsi' => 'Kelas pengenalan tari Sunda untuk mahasiswa baru yang ingin mengenal budaya lokal. Dipandu oleh anggota Divisi Tari DSB.',
                'gambar_url' => 'https://images.unsplash.com/photo-1518611012118-696072aa579a?w=800&h=500&fit=crop',
            ],
            [
                'nama'      => 'Pameran Seni Visual "Imaji Biru"',
                'kategori'  => 'Festival',
                'tanggal'   => '2025-09-20',
                'status'    => 'Selesai',
                'harga'     => 'Gratis',
                'lokasi'    => 'Koridor Gedung A UPI Cibiru',
                'deskripsi' => 'Pameran karya seni rupa anggota DSB yang menampilkan lukisan, ilustrasi digital, dan instalasi seni bertema kehidupan kampus.',
                'gambar_url' => 'https://images.unsplash.com/photo-1531058020387-3be344556be6?w=800&h=500&fit=crop',
            ],
        ];

        foreach ($data as $item) {
            Event::create(array_merge($item, [
                'slug'    => \Illuminate\Support\Str::slug($item['nama']),
                'user_id' => 1,
            ]));
        }
    }
}

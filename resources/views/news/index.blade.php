@extends('layouts.main')

@section('title', 'News')

@section('content')

<section class="section-screen section-dark">
    <div class="w-[min(900px,calc(100%-32px))] mx-auto text-center space-y-6">
        <span class="eyebrow">News</span>
        <h1 class="page-title">Berita dan<br>Dokumentasi</h1>
        <p class="text-white/75 leading-8">
            Foto-foto kegiatan kini masuk ke dalam berita, sehingga dokumentasi dan kabar terbaru berada dalam satu halaman.
        </p>
    </div>
</section>

<section class="section-screen section-light">
    <div class="w-[min(1180px,calc(100%-32px))] mx-auto">
        @php
            $berita = [
                ['img' => 'photo-1514525253161-7a46d19cd819', 'kategori' => 'Kegiatan', 'judul' => 'Pendaftaran Member Baru Dapur Seni Biru 2026', 'tanggal' => '5 Mei 2026', 'slug' => 'pendaftaran-member-baru-dapur-seni-biru-2026'],
                ['img' => 'photo-1460661419201-fd4cecdf8a8b', 'kategori' => 'Prestasi', 'judul' => 'Tim Teater DSB Raih Juara 1 di Festival Nasional', 'tanggal' => '2 Mei 2026', 'slug' => 'tim-teater-dsb-raih-juara-1-di-festival-nasional'],
                ['img' => 'photo-1513364776144-60967b0f800f', 'kategori' => 'Dokumentasi', 'judul' => 'Foto Workshop Desain Grafis dan Pameran Karya', 'tanggal' => '26 April 2026', 'slug' => 'foto-workshop-desain-grafis-dan-pameran-karya'],
                ['img' => 'photo-1476982313460-2580796b4a3a', 'kategori' => 'Dokumentasi', 'judul' => 'Galeri Open Mic Nite - Suara Kampus', 'tanggal' => '20 April 2026', 'slug' => 'galeri-open-mic-nite-suara-kampus'],
                ['img' => 'photo-1508700115892-45ecd05ae2ad', 'kategori' => 'Kegiatan', 'judul' => 'DSB Tampil di Festival Seni Nasional Jakarta 2026', 'tanggal' => '15 April 2026', 'slug' => 'dsb-tampil-di-festival-seni-nasional-jakarta-2026'],
                ['img' => 'photo-1493225457124-a3eb161ffa5f', 'kategori' => 'Dokumentasi', 'judul' => 'Foto Pelantikan Pengurus Baru DSB Periode 2026/2027', 'tanggal' => '8 April 2026', 'slug' => 'foto-pelantikan-pengurus-baru-dsb-periode-2026-2027'],
            ];
        @endphp
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($berita as $b)
                <a href="{{ route('news.show', $b['slug']) }}" class="surface-card overflow-hidden block hover:-translate-y-1 transition">
                    <div class="media-frame h-56 rounded-none">
                        <img src="https://images.unsplash.com/{{ $b['img'] }}?w=700&h=460&fit=crop" alt="{{ $b['judul'] }}">
                    </div>
                    <div class="p-6 space-y-3">
                        <span class="pill">{{ $b['kategori'] }}</span>
                        <h2 class="font-black leading-snug">{{ $b['judul'] }}</h2>
                        <p class="text-xs text-gray-400">{{ $b['tanggal'] }}</p>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</section>

@endsection

@extends('layouts.main')

@section('title', 'Detail Berita')

@section('content')

@php
    $items = [
        'pendaftaran-member-baru-dapur-seni-biru-2026' => ['img' => 'photo-1514525253161-7a46d19cd819', 'kategori' => 'Kegiatan', 'judul' => 'Pendaftaran Member Baru Dapur Seni Biru 2026', 'tanggal' => '5 Mei 2026'],
        'tim-teater-dsb-raih-juara-1-di-festival-nasional' => ['img' => 'photo-1460661419201-fd4cecdf8a8b', 'kategori' => 'Prestasi', 'judul' => 'Tim Teater DSB Raih Juara 1 di Festival Nasional', 'tanggal' => '2 Mei 2026'],
        'foto-workshop-desain-grafis-dan-pameran-karya' => ['img' => 'photo-1513364776144-60967b0f800f', 'kategori' => 'Dokumentasi', 'judul' => 'Foto Workshop Desain Grafis dan Pameran Karya', 'tanggal' => '26 April 2026'],
        'galeri-open-mic-nite-suara-kampus' => ['img' => 'photo-1476982313460-2580796b4a3a', 'kategori' => 'Dokumentasi', 'judul' => 'Galeri Open Mic Nite - Suara Kampus', 'tanggal' => '20 April 2026'],
        'dsb-tampil-di-festival-seni-nasional-jakarta-2026' => ['img' => 'photo-1508700115892-45ecd05ae2ad', 'kategori' => 'Kegiatan', 'judul' => 'DSB Tampil di Festival Seni Nasional Jakarta 2026', 'tanggal' => '15 April 2026'],
        'foto-pelantikan-pengurus-baru-dsb-periode-2026-2027' => ['img' => 'photo-1493225457124-a3eb161ffa5f', 'kategori' => 'Dokumentasi', 'judul' => 'Foto Pelantikan Pengurus Baru DSB Periode 2026/2027', 'tanggal' => '8 April 2026'],
    ];

    $news = $items[request()->route('slug')] ?? $items['pendaftaran-member-baru-dapur-seni-biru-2026'];
@endphp

<section class="section-screen section-dark">
    <div class="w-[min(900px,calc(100%-32px))] mx-auto text-center space-y-6">
        <span class="eyebrow">{{ $news['kategori'] }}</span>
        <h1 class="page-title">{{ $news['judul'] }}</h1>
        <p class="text-white/75">{{ $news['tanggal'] }} | Admin Dapur Seni Biru</p>
    </div>
</section>

<section class="section-screen section-white">
    <article class="w-[min(900px,calc(100%-32px))] mx-auto">
        <div class="media-frame h-[460px] mb-8">
            <img src="https://images.unsplash.com/{{ $news['img'] }}?w=1100&h=680&fit=crop" alt="{{ $news['judul'] }}">
        </div>
        <div class="surface-card p-8 md:p-10 space-y-6 text-gray-600 leading-8">
            <p>
                {{ $news['judul'] }} menjadi salah satu kabar terbaru dari Dapur Seni Biru. Kegiatan ini menunjukkan semangat anggota dalam berkarya, belajar, dan menghadirkan ruang seni yang terbuka untuk mahasiswa.
            </p>
            <p>
                Melalui dokumentasi dan publikasi ini, Dapur Seni Biru ingin membagikan proses kreatif yang berlangsung di balik setiap agenda. Setiap program dirancang agar anggota bisa mengembangkan minat, memperluas pengalaman, dan berkolaborasi secara positif.
            </p>
            <p>
                Informasi lanjutan tentang kegiatan Dapur Seni Biru dapat dilihat melalui halaman News dan Events.
            </p>
            <a href="{{ route('news') }}" class="primary-btn">Kembali ke News</a>
        </div>
    </article>
</section>

@endsection

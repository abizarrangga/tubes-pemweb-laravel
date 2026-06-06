@extends('layouts.main')

@section('title', 'Home')

@section('content')

<section class="section-screen section-dark">
    <div class="w-[min(1180px,calc(100%-32px))] mx-auto grid lg:grid-cols-[1.05fr_.95fr] gap-12 items-center">
        <div class="space-y-7">
            <span class="eyebrow">Portal Seni Mahasiswa UPI Cibiru</span>
            <h1 class="hero-title">DAPUR<br><span class="text-[#f7b4d0]">SENI BIRU</span></h1>
            <p class="text-white/75 max-w-xl leading-8">
                Seni, kreativitas, dan kolaborasi dalam satu ruang. Dapur Seni Biru menjadi tempat mahasiswa berkarya lewat teater, musik, tari, visual, dan event kampus.
            </p>
            <div class="flex flex-wrap gap-4">
                <a href="{{ route('events') }}" class="primary-btn">Explore Events <i class="fa-solid fa-arrow-right"></i></a>
                <a href="{{ route('about') }}" class="secondary-btn">About Us</a>
            </div>
        </div>
        <div class="media-frame h-[420px] shadow-2xl">
            <img src="https://images.unsplash.com/photo-1460661419201-fd4cecdf8a8b?w=900&h=900&fit=crop" alt="Kegiatan seni Dapur Seni Biru">
        </div>
    </div>
</section>

<section class="section-screen section-white">
    <div class="w-[min(1180px,calc(100%-32px))] mx-auto grid lg:grid-cols-[.8fr_1.2fr] gap-12 items-center">
        <div class="space-y-5">
            <span class="eyebrow">Highlights</span>
            <h2 class="page-title text-[#0b2545]">Creative<br>Pulse</h2>
            <p class="text-gray-500 leading-8">
                Semua pagelaran, workshop, dan pemesanan tiket kini disatukan dalam halaman Events. Dokumentasi foto kegiatan ditempatkan di News agar alurnya sama dengan admin.
            </p>
        </div>
        <div class="grid sm:grid-cols-2 gap-6">
            <div class="metric"><strong>{{ $totalEvent }}</strong><span>Total event</span></div>
            <div class="metric"><strong>{{ $totalBerita }}</strong><span>Berita dan dokumentasi</span></div>
            <div class="metric"><strong>{{ $eventMendatangCount }}</strong><span>Event mendatang</span></div>
            <div class="metric"><strong>{{ $totalKonten }}</strong><span>Total konten</span></div>
        </div>
    </div>
</section>

{{-- Latest News dari DB --}}
<section class="section-screen section-light">
    <div class="w-[min(1180px,calc(100%-32px))] mx-auto">
        <div class="flex flex-wrap items-end justify-between gap-5 mb-8">
            <div>
                <span class="eyebrow">Latest News</span>
                <h2 class="text-3xl font-black text-[#0b2545] mt-2">Berita dan dokumentasi terbaru</h2>
            </div>
            <a href="{{ route('news') }}" class="primary-btn">View News</a>
        </div>
        <div class="grid md:grid-cols-3 gap-6">
            @forelse ($beritaTerbaru as $item)
                <a href="{{ route('news.show', $item->slug) }}" class="surface-card overflow-hidden block hover:-translate-y-1 transition">
                    <div class="media-frame h-52 rounded-none">
                        <img src="{{ $item->gambar_final }}" alt="{{ $item->judul }}">
                    </div>
                    <div class="p-6 space-y-3">
                        <span class="pill">{{ $item->kategori }}</span>
                        <h3 class="font-black leading-snug">{{ $item->judul }}</h3>
                        <p class="text-xs text-gray-400">{{ $item->tanggal->format('d M Y') }}</p>
                    </div>
                </a>
            @empty
                <div class="col-span-3 text-center py-8 text-gray-400">
                    Belum ada berita yang dipublikasikan.
                </div>
            @endforelse
        </div>
    </div>
</section>

<section class="section-screen section-dark">
    <div class="w-[min(900px,calc(100%-32px))] mx-auto text-center space-y-7">
        <span class="eyebrow">Join The Movement</span>
        <h2 class="page-title">Bergabung Bersama Kami</h2>
        <p class="text-white/75 leading-8 max-w-2xl mx-auto">
            Jadilah bagian dari keluarga besar Dapur Seni Biru dan tuangkan kreativitasmu melalui event, karya, dan kolaborasi.
        </p>
        <a href="{{ route('about') }}#contact" class="primary-btn">Contact Us</a>
    </div>
</section>

@endsection

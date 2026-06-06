@extends('layouts.main')

@section('title', $berita->judul)

@section('content')

<section class="section-screen section-dark">
    <div class="w-[min(900px,calc(100%-32px))] mx-auto text-center space-y-6">
        <span class="eyebrow">{{ $berita->kategori }}</span>
        <h1 class="page-title">{{ $berita->judul }}</h1>
        <p class="text-white/75">{{ $berita->tanggal->format('d M Y') }} | {{ $berita->penulis }}</p>
    </div>
</section>

<section class="section-screen section-white">
    <article class="w-[min(900px,calc(100%-32px))] mx-auto">
        <div class="media-frame h-[460px] mb-8">
            <img src="{{ $berita->gambar_final }}" alt="{{ $berita->judul }}">
        </div>
        <div class="surface-card p-8 md:p-10 space-y-6 text-gray-600 leading-8">

            {{-- Ringkasan (jika ada) --}}
            @if ($berita->ringkasan)
                <p class="text-lg font-semibold text-gray-700 border-l-4 border-[#ef6fa9] pl-4">
                    {{ $berita->ringkasan }}
                </p>
            @endif

            {{-- Konten utama --}}
            <div>
                {!! nl2br(e($berita->konten)) !!}
            </div>

            <a href="{{ route('news') }}" class="primary-btn">Kembali ke News</a>
        </div>
    </article>
</section>

{{-- Berita lainnya --}}
@if ($beritaLain->isNotEmpty())
<section class="section-screen section-light">
    <div class="w-[min(1180px,calc(100%-32px))] mx-auto">
        <h2 class="text-2xl font-black text-[#0b2545] mb-6">Berita Lainnya</h2>
        <div class="grid md:grid-cols-3 gap-6">
            @foreach ($beritaLain as $b)
                <a href="{{ route('news.show', $b->slug) }}" class="surface-card overflow-hidden block hover:-translate-y-1 transition">
                    <div class="media-frame h-48 rounded-none">
                        <img src="{{ $b->gambar_final }}" alt="{{ $b->judul }}">
                    </div>
                    <div class="p-5 space-y-2">
                        <span class="pill">{{ $b->kategori }}</span>
                        <h3 class="font-black leading-snug">{{ $b->judul }}</h3>
                        <p class="text-xs text-gray-400">{{ $b->tanggal->format('d M Y') }}</p>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</section>
@endif

@endsection

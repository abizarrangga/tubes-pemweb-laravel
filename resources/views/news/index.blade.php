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
        <form action="{{ route('news') }}" method="GET" class="mb-8">
            <div class="flex flex-col sm:flex-row gap-3 max-w-2xl">
                <input type="text" name="q" value="{{ $search }}"
                       placeholder="Cari berita berdasarkan judul, ringkasan, atau kategori..."
                       class="flex-1 rounded-full border border-gray-200 px-5 py-3 text-sm focus:outline-none focus:border-[#ef6fa9]">
                <button type="submit" class="primary-btn whitespace-nowrap">
                    <i class="fa-solid fa-magnifying-glass"></i> Cari
                </button>
                @if ($search !== '')
                    <a href="{{ route('news') }}" class="secondary-btn whitespace-nowrap text-center">
                        Reset
                    </a>
                @endif
            </div>
        </form>

        @if ($search !== '')
            <p class="text-sm text-gray-500 mb-6">
                Menampilkan hasil pencarian untuk <strong>"{{ $search }}"</strong>
                ({{ $berita->total() }} berita ditemukan)
            </p>
        @endif

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse ($berita as $b)
                <a href="{{ route('news.show', $b->slug) }}" class="surface-card overflow-hidden block hover:-translate-y-1 transition">
                    <div class="media-frame h-56 rounded-none">
                        <img src="{{ $b->gambar_final }}" alt="{{ $b->judul }}">
                    </div>
                    <div class="p-6 space-y-3">
                        <span class="pill">{{ $b->kategori }}</span>
                        <h2 class="font-black leading-snug">{{ $b->judul }}</h2>
                        <p class="text-xs text-gray-400">{{ $b->tanggal->format('d M Y') }}</p>
                    </div>
                </a>
            @empty
                <div class="col-span-3 text-center py-16 text-gray-400">
                    <p class="text-lg">
                        @if ($search !== '')
                            Tidak ada berita yang cocok dengan pencarian "{{ $search }}".
                        @else
                            Belum ada berita yang dipublikasikan.
                        @endif
                    </p>
                </div>
            @endforelse
        </div>

        {{-- Pagination --}}
        @if ($berita->hasPages())
            <div class="mt-12 flex justify-center">
                {{ $berita->links() }}
            </div>
        @endif
    </div>
</section>

@endsection

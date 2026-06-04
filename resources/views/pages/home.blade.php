@extends('layouts.main')

@section('title', 'Beranda')

@section('content')

{{-- ===== HERO SECTION ===== --}}
<section class="bg-[#0B2545] text-white">
    <div class="container mx-auto px-6 py-20 flex flex-col md:flex-row items-center gap-12">
        <div class="flex-1 flex flex-col gap-6">
            <span class="text-pink-400 text-sm font-semibold tracking-widest uppercase">Portal Seni Mahasiswa UPI Cibiru</span>
            <h1 class="text-5xl md:text-6xl font-extrabold leading-tight">
                DAPUR <br>
                <span class="text-pink-400">SENI BIRU</span>
            </h1>
            <p class="text-gray-300 text-base leading-relaxed max-w-md">
                Seni, Kreativitas, dan Kolaborasi Tanpa Batas. Bergabunglah bersama komunitas seni terbaik di UPI Cibiru.
            </p>
            <div class="flex items-center gap-4 mt-2">
                <a href="{{ url('/event') }}" class="bg-pink-400 hover:bg-pink-500 text-white font-semibold px-6 py-3 rounded-xl transition-colors">
                    Lihat Event
                </a>
                <a href="{{ url('/tentang') }}" class="border border-gray-500 hover:border-white text-gray-300 hover:text-white font-semibold px-6 py-3 rounded-xl transition-colors">
                    Tentang Kami
                </a>
            </div>
        </div>
        <div class="flex-1 flex justify-center">
            <div class="w-80 h-80 md:w-96 md:h-96 rounded-3xl overflow-hidden shadow-2xl bg-blue-900">
                <img src="https://images.unsplash.com/photo-1460661419201-fd4cecdf8a8b?w=600&h=600&fit=crop"
                     alt="Dapur Seni Biru" class="w-full h-full object-cover opacity-80">
            </div>
        </div>
    </div>
</section>

{{-- ===== STATS SECTION ===== --}}
<section class="bg-white border-b border-gray-100">
    <div class="container mx-auto px-6 py-10 grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
        <div>
            <p class="text-4xl font-extrabold text-[#0B2545]">24</p>
            <p class="text-sm text-gray-500 mt-1">Event Terlaksana</p>
        </div>
        <div>
            <p class="text-4xl font-extrabold text-[#0B2545]">48</p>
            <p class="text-sm text-gray-500 mt-1">Berita Diterbitkan</p>
        </div>
        <div>
            <p class="text-4xl font-extrabold text-[#0B2545]">18</p>
            <p class="text-sm text-gray-500 mt-1">Pagelaran</p>
        </div>
        <div>
            <p class="text-4xl font-extrabold text-[#0B2545]">1.250+</p>
            <p class="text-sm text-gray-500 mt-1">Pengunjung</p>
        </div>
    </div>
</section>

{{-- ===== BERITA TERBARU ===== --}}
<section class="container mx-auto px-6 py-16">
    <div class="flex items-center justify-between mb-8">
        <h2 class="text-2xl font-bold text-[#0B2545]">Berita Terbaru</h2>
        <a href="{{ url('/berita') }}" class="flex items-center gap-2 text-xs font-medium text-gray-500 hover:text-pink-500 transition-colors">
            Lihat Semua <i class="fa-solid fa-arrow-right text-[10px]"></i>
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition-shadow">
            <img src="https://images.unsplash.com/photo-1514525253161-7a46d19cd819?w=400&h=200&fit=crop" alt="Event" class="w-full h-48 object-cover">
            <div class="p-5">
                <span class="bg-pink-100 text-pink-600 text-[10px] font-medium px-2.5 py-1 rounded-full uppercase">Kegiatan</span>
                <h4 class="text-sm font-bold text-gray-800 leading-snug mt-3 hover:text-pink-500 cursor-pointer">
                    <a href="{{ url('/berita') }}">Pendaftaran Member Baru Dapur Seni Biru 2026</a>
                </h4>
                <span class="text-xs text-gray-400 mt-2 block">5 Mei 2026</span>
            </div>
        </div>
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition-shadow">
            <img src="https://images.unsplash.com/photo-1460661419201-fd4cecdf8a8b?w=400&h=200&fit=crop" alt="Theater" class="w-full h-48 object-cover">
            <div class="p-5">
                <span class="bg-pink-100 text-pink-600 text-[10px] font-medium px-2.5 py-1 rounded-full uppercase">Prestasi</span>
                <h4 class="text-sm font-bold text-gray-800 leading-snug mt-3 hover:text-pink-500 cursor-pointer">
                    <a href="{{ url('/berita') }}">Tim Teater DSB Raih Juara 1 di Festival Nasional</a>
                </h4>
                <span class="text-xs text-gray-400 mt-2 block">2 Mei 2026</span>
            </div>
        </div>
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition-shadow">
            <img src="https://images.unsplash.com/photo-1513364776144-60967b0f800f?w=400&h=200&fit=crop" alt="Workshop" class="w-full h-48 object-cover">
            <div class="p-5">
                <span class="bg-pink-100 text-pink-600 text-[10px] font-medium px-2.5 py-1 rounded-full uppercase">Kegiatan</span>
                <h4 class="text-sm font-bold text-gray-800 leading-snug mt-3 hover:text-pink-500 cursor-pointer">
                    <a href="{{ url('/berita') }}">Dokumentasi Workshop Desain Grafis</a>
                </h4>
                <span class="text-xs text-gray-400 mt-2 block">26 April 2026</span>
            </div>
        </div>
    </div>
</section>

{{-- ===== EVENT MENDATANG ===== --}}
<section class="bg-gray-50 py-16">
    <div class="container mx-auto px-6">
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-2xl font-bold text-[#0B2545]">Event Mendatang</h2>
            <a href="{{ url('/event') }}" class="flex items-center gap-2 text-xs font-medium text-gray-500 hover:text-pink-500 transition-colors">
                Lihat Semua <i class="fa-solid fa-arrow-right text-[10px]"></i>
            </a>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 flex gap-5 hover:shadow-md transition-shadow">
                <div class="flex flex-col items-center justify-center bg-pink-50 text-pink-500 rounded-xl px-5 py-3 shrink-0">
                    <span class="text-2xl font-extrabold leading-none">20</span>
                    <span class="text-xs font-semibold tracking-wider uppercase">Jun</span>
                </div>
                <div>
                    <h4 class="font-bold text-gray-800 hover:text-pink-500">
                        <a href="{{ url('/event') }}">Pentas Akbar 2026</a>
                    </h4>
                    <p class="text-xs text-gray-400 mt-1"><i class="fa-solid fa-location-dot mr-1"></i>Aula UPI Cibiru, Bandung</p>
                    <a href="{{ url('/tiket') }}" class="mt-3 inline-block text-xs bg-[#0B2545] text-white px-4 py-1.5 rounded-lg hover:bg-blue-900 transition-colors">
                        Beli Tiket
                    </a>
                </div>
            </div>
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 flex gap-5 hover:shadow-md transition-shadow">
                <div class="flex flex-col items-center justify-center bg-pink-50 text-pink-500 rounded-xl px-5 py-3 shrink-0">
                    <span class="text-2xl font-extrabold leading-none">05</span>
                    <span class="text-xs font-semibold tracking-wider uppercase">Jul</span>
                </div>
                <div>
                    <h4 class="font-bold text-gray-800 hover:text-pink-500">
                        <a href="{{ url('/event') }}">Workshop Fotografi & Sinematografi</a>
                    </h4>
                    <p class="text-xs text-gray-400 mt-1"><i class="fa-solid fa-location-dot mr-1"></i>Ruang Kreatif DSB, Cibiru</p>
                    <a href="{{ url('/event') }}" class="mt-3 inline-block text-xs bg-[#0B2545] text-white px-4 py-1.5 rounded-lg hover:bg-blue-900 transition-colors">
                        Daftar
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ===== JOIN CTA ===== --}}
<section class="bg-[#0B2545] text-white py-16">
    <div class="container mx-auto px-6 text-center">
        <h2 class="text-3xl font-bold mb-4">Bergabung Bersama Kami</h2>
        <p class="text-gray-300 text-sm mb-8 max-w-md mx-auto">
            Jadilah bagian dari keluarga besar Dapur Seni Biru dan tuangkan kreativitasmu bersama kami.
        </p>
        <a href="{{ url('/kontak') }}" class="bg-pink-400 hover:bg-pink-500 text-white font-semibold px-8 py-3 rounded-xl transition-colors">
            Daftar Sekarang
        </a>
    </div>
</section>

@endsection

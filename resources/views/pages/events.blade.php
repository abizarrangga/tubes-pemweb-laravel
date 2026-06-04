@extends('layouts.main')

@section('title', 'Event')

@section('content')

{{-- ===== PAGE HEADER ===== --}}
<section class="bg-[#0B2545] text-white py-14">
    <div class="container mx-auto px-6 text-center">
        <span class="text-pink-400 text-sm font-semibold tracking-widest uppercase">Agenda Kami</span>
        <h1 class="text-4xl font-extrabold mt-2">Daftar Event</h1>
        <p class="text-gray-300 text-sm mt-3 max-w-md mx-auto">Ikuti berbagai event seni dan kreativitas yang diselenggarakan oleh Dapur Seni Biru.</p>
    </div>
</section>

{{-- ===== EVENTS GRID ===== --}}
<section class="container mx-auto px-6 py-14">

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

        {{-- Event 1 --}}
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition-shadow group">
            <div class="relative">
                <img src="https://images.unsplash.com/photo-1514525253161-7a46d19cd819?w=500&h=250&fit=crop"
                     alt="Pentas Akbar" class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                <span class="absolute top-3 left-3 bg-pink-500 text-white text-[10px] font-bold px-3 py-1 rounded-full uppercase">Pagelaran</span>
            </div>
            <div class="p-6">
                <div class="flex items-center gap-2 text-gray-400 text-xs mb-3">
                    <i class="fa-regular fa-calendar"></i>
                    <span>20 Juni 2026</span>
                    <span class="ml-auto text-pink-500 font-semibold">Mendatang</span>
                </div>
                <h3 class="font-bold text-gray-800 text-base mb-2">Pentas Akbar 2026</h3>
                <p class="text-gray-500 text-xs leading-relaxed mb-4">Pagelaran seni tahunan terbesar DSB yang menampilkan berbagai pertunjukan teater, musik, dan tari.</p>
                <div class="flex items-center gap-2 text-gray-400 text-xs mb-5">
                    <i class="fa-solid fa-location-dot text-pink-400"></i>
                    <span>Aula UPI Cibiru, Bandung</span>
                </div>
                <a href="{{ url('/tiket') }}" class="block text-center bg-[#0B2545] hover:bg-blue-900 text-white text-xs font-semibold py-2.5 rounded-xl transition-colors">
                    Beli Tiket
                </a>
            </div>
        </div>

        {{-- Event 2 --}}
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition-shadow group">
            <div class="relative">
                <img src="https://images.unsplash.com/photo-1560421683-6856ea585c78?w=500&h=250&fit=crop"
                     alt="Workshop Fotografi" class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                <span class="absolute top-3 left-3 bg-blue-500 text-white text-[10px] font-bold px-3 py-1 rounded-full uppercase">Workshop</span>
            </div>
            <div class="p-6">
                <div class="flex items-center gap-2 text-gray-400 text-xs mb-3">
                    <i class="fa-regular fa-calendar"></i>
                    <span>5 Juli 2026</span>
                    <span class="ml-auto text-pink-500 font-semibold">Mendatang</span>
                </div>
                <h3 class="font-bold text-gray-800 text-base mb-2">Workshop Fotografi & Sinematografi</h3>
                <p class="text-gray-500 text-xs leading-relaxed mb-4">Pelajari teknik dasar hingga lanjutan fotografi dan sinematografi bersama fotografer profesional.</p>
                <div class="flex items-center gap-2 text-gray-400 text-xs mb-5">
                    <i class="fa-solid fa-location-dot text-pink-400"></i>
                    <span>Ruang Kreatif DSB, Cibiru</span>
                </div>
                <a href="{{ url('/kontak') }}" class="block text-center bg-[#0B2545] hover:bg-blue-900 text-white text-xs font-semibold py-2.5 rounded-xl transition-colors">
                    Daftar Sekarang
                </a>
            </div>
        </div>

        {{-- Event 3 --}}
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition-shadow group">
            <div class="relative">
                <img src="https://images.unsplash.com/photo-1513364776144-60967b0f800f?w=500&h=250&fit=crop"
                     alt="Lomba Desain" class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                <span class="absolute top-3 left-3 bg-yellow-500 text-white text-[10px] font-bold px-3 py-1 rounded-full uppercase">Lomba</span>
            </div>
            <div class="p-6">
                <div class="flex items-center gap-2 text-gray-400 text-xs mb-3">
                    <i class="fa-regular fa-calendar"></i>
                    <span>12 Agustus 2026</span>
                    <span class="ml-auto text-pink-500 font-semibold">Mendatang</span>
                </div>
                <h3 class="font-bold text-gray-800 text-base mb-2">Kompetisi Desain Grafis Nasional</h3>
                <p class="text-gray-500 text-xs leading-relaxed mb-4">Kompetisi terbuka bagi mahasiswa seluruh Indonesia dengan total hadiah jutaan rupiah.</p>
                <div class="flex items-center gap-2 text-gray-400 text-xs mb-5">
                    <i class="fa-solid fa-location-dot text-pink-400"></i>
                    <span>Online & Offline</span>
                </div>
                <a href="{{ url('/kontak') }}" class="block text-center bg-[#0B2545] hover:bg-blue-900 text-white text-xs font-semibold py-2.5 rounded-xl transition-colors">
                    Daftar Sekarang
                </a>
            </div>
        </div>

        {{-- Event 4 (Past) --}}
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition-shadow group opacity-80">
            <div class="relative">
                <img src="https://images.unsplash.com/photo-1460661419201-fd4cecdf8a8b?w=500&h=250&fit=crop"
                     alt="Festival Teater" class="w-full h-48 object-cover grayscale group-hover:scale-105 transition-transform duration-300">
                <span class="absolute top-3 left-3 bg-gray-500 text-white text-[10px] font-bold px-3 py-1 rounded-full uppercase">Selesai</span>
            </div>
            <div class="p-6">
                <div class="flex items-center gap-2 text-gray-400 text-xs mb-3">
                    <i class="fa-regular fa-calendar"></i>
                    <span>15 Maret 2026</span>
                    <span class="ml-auto text-gray-400 font-semibold">Selesai</span>
                </div>
                <h3 class="font-bold text-gray-800 text-base mb-2">Festival Teater Mahasiswa 2026</h3>
                <p class="text-gray-500 text-xs leading-relaxed mb-4">Festival teater antar kampus se-Jawa Barat yang diramaikan 12 tim peserta.</p>
                <div class="flex items-center gap-2 text-gray-400 text-xs mb-5">
                    <i class="fa-solid fa-location-dot text-pink-400"></i>
                    <span>Gedung Kesenian Bandung</span>
                </div>
                <a href="{{ url('/berita') }}" class="block text-center bg-gray-200 text-gray-500 text-xs font-semibold py-2.5 rounded-xl cursor-default">
                    Event Selesai
                </a>
            </div>
        </div>

        {{-- Event 5 (Past) --}}
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition-shadow group opacity-80">
            <div class="relative">
                <img src="https://images.unsplash.com/photo-1476982313460-2580796b4a3a?w=500&h=250&fit=crop"
                     alt="Open Mic" class="w-full h-48 object-cover grayscale group-hover:scale-105 transition-transform duration-300">
                <span class="absolute top-3 left-3 bg-gray-500 text-white text-[10px] font-bold px-3 py-1 rounded-full uppercase">Selesai</span>
            </div>
            <div class="p-6">
                <div class="flex items-center gap-2 text-gray-400 text-xs mb-3">
                    <i class="fa-regular fa-calendar"></i>
                    <span>2 Februari 2026</span>
                    <span class="ml-auto text-gray-400 font-semibold">Selesai</span>
                </div>
                <h3 class="font-bold text-gray-800 text-base mb-2">Open Mic Nite - Suara Kampus</h3>
                <p class="text-gray-500 text-xs leading-relaxed mb-4">Malam seni open mic yang menampilkan penampilan musik, puisi, dan stand-up comedy.</p>
                <div class="flex items-center gap-2 text-gray-400 text-xs mb-5">
                    <i class="fa-solid fa-location-dot text-pink-400"></i>
                    <span>Aula UPI Cibiru</span>
                </div>
                <a href="{{ url('/berita') }}" class="block text-center bg-gray-200 text-gray-500 text-xs font-semibold py-2.5 rounded-xl cursor-default">
                    Event Selesai
                </a>
            </div>
        </div>

    </div>
</section>

{{-- ===== CTA TIKET ===== --}}
<section class="bg-pink-50 border-t border-pink-100 py-14">
    <div class="container mx-auto px-6 text-center">
        <h2 class="text-2xl font-bold text-[#0B2545] mb-3">Ingin Hadir di Event Kami?</h2>
        <p class="text-gray-500 text-sm mb-6">Beli tiket sekarang dan nikmati pengalaman seni yang tak terlupakan.</p>
        <a href="{{ url('/tiket') }}" class="bg-[#0B2545] hover:bg-blue-900 text-white font-semibold px-8 py-3 rounded-xl transition-colors">
            Lihat Tiket
        </a>
    </div>
</section>

@endsection


@extends('layouts.main')

@section('title', 'Berita')

@section('content')

{{-- ===== PAGE HEADER ===== --}}
<section class="bg-[#0B2545] text-white py-14">
    <div class="container mx-auto px-6 text-center">
        <span class="text-pink-400 text-sm font-semibold tracking-widest uppercase">Informasi Terkini</span>
        <h1 class="text-4xl font-extrabold mt-2">Berita Terbaru</h1>
        <p class="text-gray-300 text-sm mt-3 max-w-md mx-auto">Ikuti berita dan kabar terkini seputar kegiatan Dapur Seni Biru.</p>
    </div>
</section>

{{-- ===== BERITA GRID ===== --}}
<section class="container mx-auto px-6 py-14">

    @php
        $berita = [
            ['img' => 'photo-1514525253161-7a46d19cd819', 'kategori' => 'KEGIATAN',  'judul' => 'Pendaftaran Member Baru Dapur Seni Biru 2026',      'tanggal' => '5 Mei 2026'],
            ['img' => 'photo-1460661419201-fd4cecdf8a8b', 'kategori' => 'PRESTASI',  'judul' => 'Tim Teater DSB Raih Juara 1 di Festival Nasional',   'tanggal' => '2 Mei 2026'],
            ['img' => 'photo-1513364776144-60967b0f800f', 'kategori' => 'KEGIATAN',  'judul' => 'Dokumentasi Workshop Desain Grafis',                 'tanggal' => '26 April 2026'],
            ['img' => 'photo-1476982313460-2580796b4a3a', 'kategori' => 'KEGIATAN',  'judul' => 'Open Volunteer untuk Event Pentas Akbar 2026',       'tanggal' => '20 April 2026'],
            ['img' => 'photo-1508700115892-45ecd05ae2ad', 'kategori' => 'PRESTASI',  'judul' => 'DSB Tampil di Festival Seni Nasional Jakarta 2026',  'tanggal' => '15 April 2026'],
            ['img' => 'photo-1493225457124-a3eb161ffa5f', 'kategori' => 'KEGIATAN',  'judul' => 'Pelantikan Pengurus Baru DSB Periode 2026/2027',      'tanggal' => '8 April 2026'],
            ['img' => 'photo-1529156069898-49953e39b3ac', 'kategori' => 'KEGIATAN',  'judul' => 'Rapat Evaluasi Pagelaran Malam Melodi 2025',          'tanggal' => '1 April 2026'],
            ['img' => 'photo-1492684223066-81342ee5ff30', 'kategori' => 'PRESTASI',  'judul' => 'Karya Fotografer DSB Masuk Pameran Internasional',    'tanggal' => '25 Maret 2026'],
        ];
    @endphp

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        @foreach ($berita as $b)
        <div class="bg-white p-5 rounded-2xl shadow-sm border border-gray-100 flex flex-col gap-4 hover:shadow-md transition-shadow">
            <div class="w-full h-40 bg-blue-900 rounded-xl overflow-hidden shrink-0">
                <img src="https://images.unsplash.com/{{ $b['img'] }}?w=300&h=200&fit=crop"
                     alt="{{ $b['judul'] }}" class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
            </div>
            <div class="flex flex-col gap-2">
                <span class="bg-pink-100 text-pink-600 text-[10px] font-medium px-2.5 py-1 rounded-full uppercase w-fit">{{ $b['kategori'] }}</span>
                <h4 class="text-sm font-bold text-gray-800 leading-snug hover:text-pink-500 cursor-pointer">{{ $b['judul'] }}</h4>
                <span class="text-xs text-gray-400 font-medium">{{ $b['tanggal'] }}</span>
            </div>
        </div>
        @endforeach
    </div>

    {{-- PAGINATION PLACEHOLDER --}}
    <div class="flex justify-center gap-2 mt-12">
        <span class="w-8 h-8 flex items-center justify-center rounded-lg bg-[#0B2545] text-white text-xs font-bold">1</span>
        <a href="#" class="w-8 h-8 flex items-center justify-center rounded-lg bg-gray-100 text-gray-500 text-xs font-medium hover:bg-gray-200 transition-colors">2</a>
        <a href="#" class="w-8 h-8 flex items-center justify-center rounded-lg bg-gray-100 text-gray-500 text-xs font-medium hover:bg-gray-200 transition-colors">3</a>
        <a href="#" class="w-8 h-8 flex items-center justify-center rounded-lg bg-gray-100 text-gray-500 text-xs font-medium hover:bg-gray-200 transition-colors">
            <i class="fa-solid fa-chevron-right text-[10px]"></i>
        </a>
    </div>
</section>

@endsection

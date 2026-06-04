@extends('layouts.main')

@section('title', 'Galeri')

@section('content')

{{-- ===== PAGE HEADER ===== --}}
<section class="bg-[#0B2545] text-white py-14">
    <div class="container mx-auto px-6 text-center">
        <span class="text-pink-400 text-sm font-semibold tracking-widest uppercase">Dokumentasi Kami</span>
        <h1 class="text-4xl font-extrabold mt-2">Galeri</h1>
        <p class="text-gray-300 text-sm mt-3 max-w-md mx-auto">Kumpulan momen terbaik dari berbagai kegiatan dan pagelaran Dapur Seni Biru.</p>
    </div>
</section>

{{-- ===== FILTER TABS ===== --}}
<section class="container mx-auto px-6 py-8">
    <div class="flex flex-wrap justify-center gap-3 mb-10">
        <button class="bg-[#0B2545] text-white text-xs font-semibold px-5 py-2 rounded-full">Semua</button>
        <button class="bg-gray-100 text-gray-600 text-xs font-semibold px-5 py-2 rounded-full hover:bg-gray-200 transition-colors">Pagelaran</button>
        <button class="bg-gray-100 text-gray-600 text-xs font-semibold px-5 py-2 rounded-full hover:bg-gray-200 transition-colors">Workshop</button>
        <button class="bg-gray-100 text-gray-600 text-xs font-semibold px-5 py-2 rounded-full hover:bg-gray-200 transition-colors">Event</button>
        <button class="bg-gray-100 text-gray-600 text-xs font-semibold px-5 py-2 rounded-full hover:bg-gray-200 transition-colors">Keseharian</button>
    </div>

    {{-- GALLERY GRID --}}
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        @php
            $photos = [
                ['url' => 'photo-1514525253161-7a46d19cd819', 'caption' => 'Pentas Akbar 2025'],
                ['url' => 'photo-1460661419201-fd4cecdf8a8b', 'caption' => 'Festival Teater'],
                ['url' => 'photo-1513364776144-60967b0f800f', 'caption' => 'Workshop Desain'],
                ['url' => 'photo-1476982313460-2580796b4a3a', 'caption' => 'Open Mic Night'],
                ['url' => 'photo-1508700115892-45ecd05ae2ad', 'caption' => 'Latihan Rutin'],
                ['url' => 'photo-1529156069898-49953e39b3ac', 'caption' => 'Foto Bersama'],
                ['url' => 'photo-1560421683-6856ea585c78', 'caption' => 'Sesi Fotografi'],
                ['url' => 'photo-1493225457124-a3eb161ffa5f', 'caption' => 'Penampilan Musik'],
                ['url' => 'photo-1527529482837-4698179dc6ce', 'caption' => 'Pentas Drama'],
                ['url' => 'photo-1516450360452-9312f5e86fc7', 'caption' => 'Malam Apresiasi'],
                ['url' => 'photo-1492684223066-81342ee5ff30', 'caption' => 'Parade Seni'],
                ['url' => 'photo-1508997449629-303059a039c0', 'caption' => 'Backstage Moment'],
            ];
        @endphp

        @foreach ($photos as $photo)
        <div class="group relative rounded-2xl overflow-hidden aspect-square bg-gray-200 cursor-pointer shadow-sm hover:shadow-lg transition-shadow">
            <img src="https://images.unsplash.com/{{ $photo['url'] }}?w=400&h=400&fit=crop"
                 alt="{{ $photo['caption'] }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
            <div class="absolute inset-0 bg-[#0B2545]/60 opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-4">
                <p class="text-white text-xs font-semibold">{{ $photo['caption'] }}</p>
            </div>
        </div>
        @endforeach
    </div>
</section>

@endsection

@extends('layouts.main')

@section('content')
<main class="container mx-auto px-6 py-12">

    <div class="flex items-center justify-between mb-10">
        <h2 class="text-3xl font-bold text-[#0B2545]">Berita Terbaru</h2>
        <a href="#" class="flex items-center gap-2.5 text-xs font-medium text-gray-600 hover:text-pink-500 transition-colors">
            Lihat Semua
            <i class="fa-solid fa-arrow-right text-[10px]"></i>
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

        <div class="bg-white p-5 rounded-2xl shadow-sm border border-gray-100 flex flex-col gap-4">
            <div class="w-full h-40 bg-blue-900 rounded-xl overflow-hidden shrink-0">
                <img src="https://images.unsplash.com/photo-1514525253161-7a46d19cd819?w=300" alt="Event" class="w-full h-full object-cover">
            </div>
            <div class="flex flex-col gap-2">
                <div class="flex items-center gap-2">
                    <span class="bg-pink-100 text-pink-600 text-[10px] font-medium px-2.5 py-1 rounded-full uppercase">KEGIATAN</span>
                </div>
                <h4 class="text-sm font-bold text-gray-800 leading-snug hover:text-pink-500 cursor-pointer">Pendaftaran Member Baru Dapur Seni Biru 2026</h4>
                <span class="text-xs text-gray-400 font-medium mt-1">5 Mei 2026</span>
            </div>
        </div>

        <div class="bg-white p-5 rounded-2xl shadow-sm border border-gray-100 flex flex-col gap-4">
            <div class="w-full h-40 bg-blue-900 rounded-xl overflow-hidden shrink-0">
                <img src="https://images.unsplash.com/photo-1460661419201-fd4cecdf8a8b?w=300" alt="Theater" class="w-full h-full object-cover">
            </div>
            <div class="flex flex-col gap-2">
                <div class="flex items-center gap-2">
                    <span class="bg-pink-100 text-pink-600 text-[10px] font-medium px-2.5 py-1 rounded-full uppercase">PRESTASI</span>
                </div>
                <h4 class="text-sm font-bold text-gray-800 leading-snug hover:text-pink-500 cursor-pointer">Tim Teater DSB Raih Juara 1 di Festival Nasional</h4>
                <span class="text-xs text-gray-400 font-medium mt-1">2 Mei 2026</span>
            </div>
        </div>

        <div class="bg-white p-5 rounded-2xl shadow-sm border border-gray-100 flex flex-col gap-4">
            <div class="w-full h-40 bg-blue-900 rounded-xl overflow-hidden shrink-0">
                <img src="https://images.unsplash.com/photo-1513364776144-60967b0f800f?w=300" alt="Workshop" class="w-full h-full object-cover">
            </div>
            <div class="flex flex-col gap-2">
                <div class="flex items-center gap-2">
                    <span class="bg-pink-100 text-pink-600 text-[10px] font-medium px-2.5 py-1 rounded-full uppercase">KEGIATAN</span>
                </div>
                <h4 class="text-sm font-bold text-gray-800 leading-snug hover:text-pink-500 cursor-pointer">Dokumentasi Workshop Desain Grafis</h4>
                <span class="text-xs text-gray-400 font-medium mt-1">26 April 2026</span>
            </div>
        </div>

        <div class="bg-white p-5 rounded-2xl shadow-sm border border-gray-100 flex flex-col gap-4">
            <div class="w-full h-40 bg-blue-900 rounded-xl overflow-hidden shrink-0">
                <img src="https://images.unsplash.com/photo-1476982313460-2580796b4a3a?w=300" alt="Workshop" class="w-full h-full object-cover">
            </div>
            <div class="flex flex-col gap-2">
                <div class="flex items-center gap-2">
                    <span class="bg-pink-100 text-pink-600 text-[10px] font-medium px-2.5 py-1 rounded-full uppercase">KEGIATAN</span>
                </div>
                <h4 class="text-sm font-bold text-gray-800 leading-snug hover:text-pink-500 cursor-pointer">Open Volunteer untuk Event Pentas Akbar 2026</h4>
                <span class="text-xs text-gray-400 font-medium mt-1">20 April 2026</span>
            </div>
        </div>

    </div>

</main>
@endsection
@extends('layouts.main')

@section('title', 'Pagelaran')

@section('content')

{{-- ===== PAGE HEADER ===== --}}
<section class="bg-[#0B2545] text-white py-14">
    <div class="container mx-auto px-6 text-center">
        <span class="text-pink-400 text-sm font-semibold tracking-widest uppercase">Karya Terbaik Kami</span>
        <h1 class="text-4xl font-extrabold mt-2">Pagelaran</h1>
        <p class="text-gray-300 text-sm mt-3 max-w-md mx-auto">Setiap pagelaran adalah bukti dedikasi dan semangat berkarya anggota Dapur Seni Biru.</p>
    </div>
</section>

{{-- ===== PAGELARAN LIST ===== --}}
<section class="container mx-auto px-6 py-16">
    <div class="space-y-10">

        {{-- Pagelaran 1 --}}
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden flex flex-col md:flex-row hover:shadow-md transition-shadow">
            <div class="md:w-72 h-56 md:h-auto shrink-0 bg-blue-900 overflow-hidden">
                <img src="https://images.unsplash.com/photo-1460661419201-fd4cecdf8a8b?w=500&h=400&fit=crop"
                     alt="Pentas Akbar" class="w-full h-full object-cover">
            </div>
            <div class="p-8 flex flex-col justify-center gap-3">
                <span class="bg-pink-100 text-pink-600 text-[10px] font-bold px-3 py-1 rounded-full uppercase w-fit">Teater</span>
                <h3 class="text-xl font-bold text-[#0B2545]">Pentas Akbar 2025 - "Mimpi di Ujung Senja"</h3>
                <p class="text-gray-500 text-sm leading-relaxed">Pertunjukan teater dramatikal yang mengisahkan perjuangan seorang pemuda dalam menemukan jati dirinya di tengah tekanan keluarga dan masyarakat.</p>
                <div class="flex items-center gap-6 text-xs text-gray-400 mt-1">
                    <span><i class="fa-regular fa-calendar mr-1.5"></i>Oktober 2025</span>
                    <span><i class="fa-solid fa-location-dot mr-1.5 text-pink-400"></i>Gedung Kesenian Bandung</span>
                </div>
                <a href="{{ url('/galeri') }}" class="mt-2 self-start text-xs font-semibold text-pink-500 hover:underline flex items-center gap-1">
                    Lihat Dokumentasi <i class="fa-solid fa-arrow-right text-[10px]"></i>
                </a>
            </div>
        </div>

        {{-- Pagelaran 2 --}}
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden flex flex-col md:flex-row hover:shadow-md transition-shadow">
            <div class="md:w-72 h-56 md:h-auto shrink-0 bg-blue-900 overflow-hidden">
                <img src="https://images.unsplash.com/photo-1493225457124-a3eb161ffa5f?w=500&h=400&fit=crop"
                     alt="Konser Musik" class="w-full h-full object-cover">
            </div>
            <div class="p-8 flex flex-col justify-center gap-3">
                <span class="bg-blue-100 text-blue-600 text-[10px] font-bold px-3 py-1 rounded-full uppercase w-fit">Musik</span>
                <h3 class="text-xl font-bold text-[#0B2545]">Malam Melodi - Konser Akustik DSB</h3>
                <p class="text-gray-500 text-sm leading-relaxed">Konser musik akustik yang menampilkan repertoar dari berbagai genre, mulai dari folk, indie, hingga keroncong modern oleh musisi-musisi berbakat DSB.</p>
                <div class="flex items-center gap-6 text-xs text-gray-400 mt-1">
                    <span><i class="fa-regular fa-calendar mr-1.5"></i>Agustus 2025</span>
                    <span><i class="fa-solid fa-location-dot mr-1.5 text-pink-400"></i>Taman Budaya Cibiru</span>
                </div>
                <a href="{{ url('/galeri') }}" class="mt-2 self-start text-xs font-semibold text-pink-500 hover:underline flex items-center gap-1">
                    Lihat Dokumentasi <i class="fa-solid fa-arrow-right text-[10px]"></i>
                </a>
            </div>
        </div>

        {{-- Pagelaran 3 --}}
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden flex flex-col md:flex-row hover:shadow-md transition-shadow">
            <div class="md:w-72 h-56 md:h-auto shrink-0 bg-blue-900 overflow-hidden">
                <img src="https://images.unsplash.com/photo-1527529482837-4698179dc6ce?w=500&h=400&fit=crop"
                     alt="Tari" class="w-full h-full object-cover">
            </div>
            <div class="p-8 flex flex-col justify-center gap-3">
                <span class="bg-yellow-100 text-yellow-600 text-[10px] font-bold px-3 py-1 rounded-full uppercase w-fit">Tari</span>
                <h3 class="text-xl font-bold text-[#0B2545]">Gerak & Rasa - Pagelaran Tari Kontemporer</h3>
                <p class="text-gray-500 text-sm leading-relaxed">Pertunjukan tari kontemporer yang memadukan gerakan tradisional dan modern, menyampaikan pesan keberagaman dan persatuan melalui bahasa gerak.</p>
                <div class="flex items-center gap-6 text-xs text-gray-400 mt-1">
                    <span><i class="fa-regular fa-calendar mr-1.5"></i>Mei 2025</span>
                    <span><i class="fa-solid fa-location-dot mr-1.5 text-pink-400"></i>Aula UPI Cibiru</span>
                </div>
                <a href="{{ url('/galeri') }}" class="mt-2 self-start text-xs font-semibold text-pink-500 hover:underline flex items-center gap-1">
                    Lihat Dokumentasi <i class="fa-solid fa-arrow-right text-[10px]"></i>
                </a>
            </div>
        </div>

    </div>
</section>

{{-- ===== CTA ===== --}}
<section class="bg-[#0B2545] text-white py-14">
    <div class="container mx-auto px-6 text-center">
        <h2 class="text-2xl font-bold mb-3">Jangan Lewatkan Pagelaran Berikutnya!</h2>
        <p class="text-gray-300 text-sm mb-6 max-w-md mx-auto">Pesan tiketmu sekarang untuk Pentas Akbar 2026 dan saksikan persembahan terbaik kami.</p>
        <a href="{{ url('/tiket') }}" class="bg-pink-400 hover:bg-pink-500 text-white font-semibold px-8 py-3 rounded-xl transition-colors">
            Beli Tiket
        </a>
    </div>
</section>

@endsection


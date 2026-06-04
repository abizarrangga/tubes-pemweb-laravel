@extends('layouts.main')

@section('title', 'Tiket')

@section('content')

{{-- ===== PAGE HEADER ===== --}}
<section class="bg-[#0B2545] text-white py-14">
    <div class="container mx-auto px-6 text-center">
        <span class="text-pink-400 text-sm font-semibold tracking-widest uppercase">Dapatkan Tiketmu</span>
        <h1 class="text-4xl font-extrabold mt-2">Pembelian Tiket</h1>
        <p class="text-gray-300 text-sm mt-3 max-w-md mx-auto">Pesan tiketmu sekarang dan nikmati pengalaman seni yang tak terlupakan bersama Dapur Seni Biru.</p>
    </div>
</section>

{{-- ===== TIKET CARDS ===== --}}
<section class="container mx-auto px-6 py-16">
    <h2 class="text-xl font-bold text-[#0B2545] mb-8 text-center">Pentas Akbar 2026 — 20 Juni 2026</h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-4xl mx-auto">

        {{-- Reguler --}}
        <div class="bg-white border-2 border-gray-100 rounded-2xl p-8 text-center hover:shadow-lg transition-shadow">
            <h3 class="text-sm font-bold text-gray-400 uppercase tracking-wider mb-2">Reguler</h3>
            <p class="text-4xl font-extrabold text-[#0B2545] mb-1">Rp 25K</p>
            <p class="text-xs text-gray-400 mb-6">per orang</p>
            <ul class="text-xs text-gray-600 space-y-2 text-left mb-8">
                <li class="flex items-center gap-2"><i class="fa-solid fa-check text-pink-400"></i> Akses semua pertunjukan</li>
                <li class="flex items-center gap-2"><i class="fa-solid fa-check text-pink-400"></i> Tempat duduk reguler</li>
                <li class="flex items-center gap-2"><i class="fa-solid fa-check text-pink-400"></i> E-ticket via email</li>
                <li class="flex items-center gap-2 text-gray-300"><i class="fa-solid fa-xmark"></i> Meet & greet</li>
            </ul>
            <a href="{{ url('/kontak') }}" class="block w-full bg-gray-100 hover:bg-gray-200 text-gray-800 text-sm font-semibold py-3 rounded-xl transition-colors">
                Pesan Sekarang
            </a>
        </div>

        {{-- VIP --}}
        <div class="bg-[#0B2545] border-2 border-[#0B2545] rounded-2xl p-8 text-center shadow-xl relative">
            <span class="absolute -top-3 left-1/2 -translate-x-1/2 bg-pink-400 text-white text-[10px] font-bold px-4 py-1 rounded-full uppercase">Terlaris</span>
            <h3 class="text-sm font-bold text-pink-300 uppercase tracking-wider mb-2">VIP</h3>
            <p class="text-4xl font-extrabold text-white mb-1">Rp 50K</p>
            <p class="text-xs text-gray-400 mb-6">per orang</p>
            <ul class="text-xs text-gray-300 space-y-2 text-left mb-8">
                <li class="flex items-center gap-2"><i class="fa-solid fa-check text-pink-400"></i> Akses semua pertunjukan</li>
                <li class="flex items-center gap-2"><i class="fa-solid fa-check text-pink-400"></i> Kursi terdepan & terbaik</li>
                <li class="flex items-center gap-2"><i class="fa-solid fa-check text-pink-400"></i> E-ticket via email</li>
                <li class="flex items-center gap-2"><i class="fa-solid fa-check text-pink-400"></i> Meet & greet eksklusif</li>
            </ul>
            <a href="{{ url('/kontak') }}" class="block w-full bg-pink-400 hover:bg-pink-500 text-white text-sm font-semibold py-3 rounded-xl transition-colors">
                Pesan Sekarang
            </a>
        </div>

        {{-- Pelajar --}}
        <div class="bg-white border-2 border-gray-100 rounded-2xl p-8 text-center hover:shadow-lg transition-shadow">
            <h3 class="text-sm font-bold text-gray-400 uppercase tracking-wider mb-2">Pelajar</h3>
            <p class="text-4xl font-extrabold text-[#0B2545] mb-1">Rp 15K</p>
            <p class="text-xs text-gray-400 mb-6">per orang (wajib KTM)</p>
            <ul class="text-xs text-gray-600 space-y-2 text-left mb-8">
                <li class="flex items-center gap-2"><i class="fa-solid fa-check text-pink-400"></i> Akses semua pertunjukan</li>
                <li class="flex items-center gap-2"><i class="fa-solid fa-check text-pink-400"></i> Tempat duduk reguler</li>
                <li class="flex items-center gap-2"><i class="fa-solid fa-check text-pink-400"></i> E-ticket via email</li>
                <li class="flex items-center gap-2 text-gray-300"><i class="fa-solid fa-xmark"></i> Meet & greet</li>
            </ul>
            <a href="{{ url('/kontak') }}" class="block w-full bg-gray-100 hover:bg-gray-200 text-gray-800 text-sm font-semibold py-3 rounded-xl transition-colors">
                Pesan Sekarang
            </a>
        </div>
    </div>

    <p class="text-center text-xs text-gray-400 mt-10">
        Untuk pemesanan grup (10+ tiket), silakan <a href="{{ url('/kontak') }}" class="text-pink-500 hover:underline">hubungi kami</a> langsung.
    </p>
</section>

{{-- ===== CARA PEMESANAN ===== --}}
<section class="bg-gray-50 border-t border-gray-100 py-16">
    <div class="container mx-auto px-6">
        <h2 class="text-xl font-bold text-[#0B2545] text-center mb-10">Cara Pemesanan Tiket</h2>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 max-w-4xl mx-auto text-center">
            @php
                $steps = [
                    ['icon' => 'fa-solid fa-mouse-pointer', 'step' => '1', 'title' => 'Pilih Tiket',    'desc' => 'Pilih jenis tiket yang sesuai kebutuhanmu.'],
                    ['icon' => 'fa-solid fa-user',          'step' => '2', 'title' => 'Isi Data',       'desc' => 'Lengkapi formulir data diri dengan benar.'],
                    ['icon' => 'fa-solid fa-credit-card',   'step' => '3', 'title' => 'Bayar',          'desc' => 'Lakukan pembayaran via transfer bank atau QRIS.'],
                    ['icon' => 'fa-solid fa-ticket',        'step' => '4', 'title' => 'Terima Tiket',   'desc' => 'E-ticket dikirim ke email dalam 1×24 jam.'],
                ];
            @endphp
            @foreach ($steps as $s)
            <div class="flex flex-col items-center gap-3">
                <div class="w-14 h-14 bg-[#0B2545] rounded-2xl flex items-center justify-center">
                    <i class="{{ $s['icon'] }} text-white text-xl"></i>
                </div>
                <span class="text-xs font-bold text-pink-400 tracking-wider uppercase">Step {{ $s['step'] }}</span>
                <h4 class="font-bold text-gray-800 text-sm">{{ $s['title'] }}</h4>
                <p class="text-xs text-gray-500">{{ $s['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection

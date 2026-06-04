@extends('layouts.main')

@section('title', 'Tentang Kami')

@section('content')

{{-- ===== HERO ABOUT ===== --}}
<section class="bg-[#0B2545] text-white py-20">
    <div class="container mx-auto px-6 flex flex-col md:flex-row items-center gap-12">
        <div class="flex-1">
            <span class="text-pink-400 text-sm font-semibold tracking-widest uppercase">Mengenal Kami</span>
            <h1 class="text-4xl md:text-5xl font-extrabold leading-tight mt-3">
                Tentang <br> <span class="text-pink-400">Dapur Seni Biru</span>
            </h1>
            <p class="text-gray-300 mt-6 leading-relaxed max-w-lg">
                Dapur Seni Biru adalah wadah bagi mahasiswa untuk berkarya, berkolaborasi,
                dan mengembangkan diri di bidang seni dan kreativitas demi menciptakan perubahan positif.
            </p>
        </div>
        <div class="flex-1 flex justify-center">
            <div class="w-80 h-72 rounded-3xl overflow-hidden shadow-2xl bg-blue-900">
                <img src="https://images.unsplash.com/photo-1529156069898-49953e39b3ac?w=600&h=450&fit=crop"
                     alt="Team Dapur Seni Biru" class="w-full h-full object-cover opacity-80">
            </div>
        </div>
    </div>
</section>

{{-- ===== VISI MISI ===== --}}
<section class="container mx-auto px-6 py-16">
    <h2 class="text-2xl font-bold text-[#0B2545] text-center mb-10">Visi & Misi Kami</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <div class="bg-[#0B2545] text-white p-8 rounded-2xl shadow-sm">
            <div class="w-10 h-10 bg-pink-400 rounded-xl flex items-center justify-center mb-4">
                <i class="fa-solid fa-eye text-white"></i>
            </div>
            <h3 class="text-lg font-bold mb-3">Visi</h3>
            <p class="text-gray-300 leading-relaxed">
                Menjadi organisasi seni yang kreatif, inovatif, dan inspiratif bagi mahasiswa serta masyarakat.
            </p>
        </div>
        <div class="bg-gray-50 border border-gray-100 p-8 rounded-2xl shadow-sm">
            <div class="w-10 h-10 bg-[#0B2545] rounded-xl flex items-center justify-center mb-4">
                <i class="fa-solid fa-bullseye text-white"></i>
            </div>
            <h3 class="text-lg font-bold text-[#0B2545] mb-3">Misi</h3>
            <ul class="space-y-2 text-gray-600 text-sm">
                <li class="flex items-start gap-2"><i class="fa-solid fa-check text-pink-400 mt-0.5"></i> Mengembangkan potensi seni mahasiswa.</li>
                <li class="flex items-start gap-2"><i class="fa-solid fa-check text-pink-400 mt-0.5"></i> Menciptakan karya berkualitas tinggi.</li>
                <li class="flex items-start gap-2"><i class="fa-solid fa-check text-pink-400 mt-0.5"></i> Membangun kolaborasi yang positif.</li>
                <li class="flex items-start gap-2"><i class="fa-solid fa-check text-pink-400 mt-0.5"></i> Memberikan kontribusi nyata melalui seni.</li>
            </ul>
        </div>
    </div>
</section>

{{-- ===== STRUKTUR KEPENGURUSAN ===== --}}
<section class="bg-gray-50 py-16">
    <div class="container mx-auto px-6">
        <h2 class="text-2xl font-bold text-[#0B2545] text-center mb-10">Struktur Kepengurusan</h2>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
            @php
                $pengurus = [
                    ['nama' => 'Aisha Putri',     'jabatan' => 'Ketua Umum',  'img' => 'photo-1438761681033-6461ffad8d80'],
                    ['nama' => 'Ricky Maulana',   'jabatan' => 'Wakil Ketua', 'img' => 'photo-1472099645785-5658abf4ff4e'],
                    ['nama' => 'Siti Aulia',      'jabatan' => 'Sekretaris',  'img' => 'photo-1544005313-94ddf0286df2'],
                    ['nama' => 'Fahmi Alfarizi',  'jabatan' => 'Bendahara',   'img' => 'photo-1500648767791-00dcc994a43e'],
                    ['nama' => 'Dewi Lestari',    'jabatan' => 'Div. Humas',  'img' => 'photo-1494790108377-be9c29b29330'],
                ];
            @endphp
            @foreach ($pengurus as $p)
            <div class="bg-white rounded-2xl p-5 text-center shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                <img src="https://images.unsplash.com/{{ $p['img'] }}?w=150&h=150&fit=crop&crop=faces"
                     alt="{{ $p['nama'] }}" class="w-20 h-20 rounded-full object-cover mx-auto mb-3 ring-2 ring-pink-200">
                <h4 class="font-bold text-gray-800 text-sm">{{ $p['nama'] }}</h4>
                <p class="text-xs text-gray-400 mt-1">{{ $p['jabatan'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ===== SEJARAH ===== --}}
<section class="container mx-auto px-6 py-16">
    <div class="flex flex-col md:flex-row items-center gap-12">
        <div class="flex-1">
            <span class="text-pink-400 text-sm font-semibold tracking-widest uppercase">Perjalanan Kami</span>
            <h2 class="text-2xl font-bold text-[#0B2545] mt-2 mb-4">Sejarah Dapur Seni Biru</h2>
            <p class="text-gray-600 leading-relaxed text-sm">
                Dapur Seni Biru berdiri sejak tahun 2006 di Universitas Pendidikan Indonesia Kampus Cibiru.
                Berawal dari sekumpulan mahasiswa yang memiliki ketertarikan di dunia seni, komunitas ini berkembang
                menjadi organisasi yang aktif berkarya dan berkontribusi dalam berbagai kegiatan seni budaya.
            </p>
            <a href="{{ url('/kontak') }}" class="mt-6 inline-block bg-[#0B2545] text-white font-semibold px-6 py-3 rounded-xl hover:bg-blue-900 transition-colors text-sm">
                Hubungi Kami
            </a>
        </div>
        <div class="flex-1">
            <div class="w-full h-64 rounded-3xl overflow-hidden shadow-xl bg-blue-900">
                <img src="https://images.unsplash.com/photo-1508700115892-45ecd05ae2ad?w=600&h=350&fit=crop"
                     alt="Sejarah DSB" class="w-full h-full object-cover opacity-80">
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

@extends('layouts.main')

@section('title', 'Kontak')

@section('content')

{{-- ===== PAGE HEADER ===== --}}
<section class="bg-[#0B2545] text-white py-14">
    <div class="container mx-auto px-6 text-center">
        <span class="text-pink-400 text-sm font-semibold tracking-widest uppercase">Hubungi Kami</span>
        <h1 class="text-4xl font-extrabold mt-2">Kontak</h1>
        <p class="text-gray-300 text-sm mt-3 max-w-md mx-auto">Ada pertanyaan atau ingin bergabung? Jangan ragu untuk menghubungi kami.</p>
    </div>
</section>

{{-- ===== KONTAK CONTENT ===== --}}
<section class="container mx-auto px-6 py-16">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">

        {{-- FORM KONTAK --}}
        <div>
            <h2 class="text-xl font-bold text-[#0B2545] mb-6">Kirim Pesan</h2>
            <form action="#" method="POST" class="space-y-5">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap</label>
                        <input type="text" name="nama" placeholder="Masukkan nama lengkap" required
                               class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:border-pink-400 text-sm transition-colors">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                        <input type="email" name="email" placeholder="contoh@mail.com" required
                               class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:border-pink-400 text-sm transition-colors">
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Subjek</label>
                    <input type="text" name="subjek" placeholder="Perihal pesan Anda"
                           class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:border-pink-400 text-sm transition-colors">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Pesan</label>
                    <textarea name="pesan" rows="5" placeholder="Tulis pesan Anda di sini..."
                              class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:border-pink-400 text-sm transition-colors resize-none"></textarea>
                </div>
                <button type="submit"
                        class="w-full bg-[#0B2545] hover:bg-blue-900 text-white font-semibold py-3 rounded-xl transition-colors">
                    Kirim Pesan
                </button>
            </form>
        </div>

        {{-- INFO KONTAK --}}
        <div class="flex flex-col gap-6">
            <h2 class="text-xl font-bold text-[#0B2545]">Informasi Kontak</h2>

            <div class="flex gap-4 p-5 bg-gray-50 rounded-2xl border border-gray-100">
                <div class="w-11 h-11 bg-[#0B2545] rounded-xl flex items-center justify-center shrink-0">
                    <i class="fa-solid fa-envelope text-white"></i>
                </div>
                <div>
                    <h4 class="font-semibold text-gray-800 text-sm">Email</h4>
                    <p class="text-gray-500 text-xs mt-1">dapursenibiru@gmail.com</p>
                </div>
            </div>

            <div class="flex gap-4 p-5 bg-gray-50 rounded-2xl border border-gray-100">
                <div class="w-11 h-11 bg-[#0B2545] rounded-xl flex items-center justify-center shrink-0">
                    <i class="fa-solid fa-phone text-white"></i>
                </div>
                <div>
                    <h4 class="font-semibold text-gray-800 text-sm">Telepon</h4>
                    <p class="text-gray-500 text-xs mt-1">+62 812-3456-7890</p>
                </div>
            </div>

            <div class="flex gap-4 p-5 bg-gray-50 rounded-2xl border border-gray-100">
                <div class="w-11 h-11 bg-[#0B2545] rounded-xl flex items-center justify-center shrink-0">
                    <i class="fa-solid fa-location-dot text-white"></i>
                </div>
                <div>
                    <h4 class="font-semibold text-gray-800 text-sm">Alamat</h4>
                    <p class="text-gray-500 text-xs mt-1">Aula UPI Kampus Cibiru, Jl. Raya Cibiru No. 1, Bandung, Jawa Barat</p>
                </div>
            </div>

            <div class="p-5 bg-gray-50 rounded-2xl border border-gray-100">
                <h4 class="font-semibold text-gray-800 text-sm mb-3">Ikuti Kami</h4>
                <div class="flex items-center gap-3">
                    <a href="#" class="w-9 h-9 bg-[#0B2545] rounded-xl flex items-center justify-center hover:bg-pink-500 transition-colors">
                        <i class="fa-brands fa-instagram text-white text-sm"></i>
                    </a>
                    <a href="#" class="w-9 h-9 bg-[#0B2545] rounded-xl flex items-center justify-center hover:bg-pink-500 transition-colors">
                        <i class="fa-brands fa-tiktok text-white text-sm"></i>
                    </a>
                    <a href="#" class="w-9 h-9 bg-[#0B2545] rounded-xl flex items-center justify-center hover:bg-pink-500 transition-colors">
                        <i class="fa-brands fa-youtube text-white text-sm"></i>
                    </a>
                    <a href="#" class="w-9 h-9 bg-[#0B2545] rounded-xl flex items-center justify-center hover:bg-pink-500 transition-colors">
                        <i class="fa-brands fa-facebook-f text-white text-sm"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@extends('layouts.main')

@section('title', 'Pendaftaran ' . $event->nama)

@section('content')

<section class="section-screen section-dark py-12">
    <div class="w-[min(1180px,calc(100%-32px))] mx-auto grid lg:grid-cols-[1fr_1fr] gap-12 items-center">
        <div class="space-y-6">
            <span class="eyebrow">Pendaftaran Event Gratis</span>
            <h1 class="page-title text-4xl lg:text-5xl font-black text-white leading-tight">
                {{ $event->nama }}
            </h1>
            <p class="text-white/75 leading-relaxed">
                Silakan isi data diri Anda untuk melakukan pendaftaran secara gratis pada event ini. Konfirmasi pendaftaran akan langsung diberikan setelah submit.
            </p>
            <div class="flex flex-col gap-2 text-white/80 text-sm">
                <span><i class="fa-solid fa-calendar mr-2 text-[#ef6fa9]"></i> {{ $event->tanggal->format('d M Y') }}</span>
                <span><i class="fa-solid fa-location-dot mr-2 text-[#ef6fa9]"></i> {{ $event->lokasi }}</span>
                <span><i class="fa-solid fa-tags mr-2 text-[#ef6fa9]"></i> {{ $event->kategori }}</span>
            </div>
            <a href="{{ route('events') }}" class="secondary-btn inline-block mt-4">Kembali ke Daftar Event</a>
        </div>
        <div class="media-frame h-[320px] rounded-2xl overflow-hidden shadow-2xl">
            <img src="{{ $event->gambar_final }}" alt="{{ $event->nama }}" class="w-full h-full object-cover">
        </div>
    </div>
</section>

<section class="section-screen section-light py-16 bg-gray-55">
    <div class="w-[min(600px,calc(100%-32px))] mx-auto">
        <div class="surface-card p-8 md:p-10 bg-white rounded-3xl shadow-xl border border-gray-100">
            <span class="eyebrow text-[#ef6fa9]">Form Registrasi</span>
            <h2 class="text-3xl font-black text-[#0b2545] mt-2 mb-6">Data Pendaftar</h2>

            @if ($errors->any())
                <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl mb-6 text-sm">
                    <ul class="list-disc list-inside space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('events.register.store', $event->slug) }}" method="POST" class="space-y-6">
                @csrf
                <div>
                    <label class="block text-sm font-bold text-[#0b2545] mb-2">Nama Lengkap</label>
                    <input type="text" name="nama" value="{{ old('nama', Auth::user()->name) }}" 
                           class="w-full rounded-xl border border-gray-200 px-4 py-3 focus:outline-none focus:border-[#ef6fa9] focus:ring-1 focus:ring-[#ef6fa9] transition" 
                           placeholder="Masukkan nama lengkap Anda" required>
                </div>

                <div>
                    <label class="block text-sm font-bold text-[#0b2545] mb-2">Alamat Email</label>
                    <input type="email" name="email" value="{{ old('email', Auth::user()->email) }}" 
                           class="w-full rounded-xl border border-gray-200 px-4 py-3 focus:outline-none focus:border-[#ef6fa9] focus:ring-1 focus:ring-[#ef6fa9] transition" 
                           placeholder="contoh@domain.com" required>
                </div>

                <div>
                    <label class="block text-sm font-bold text-[#0b2545] mb-2">Nomor Telepon</label>
                    <input type="text" name="telepon" value="{{ old('telepon') }}" 
                           class="w-full rounded-xl border border-gray-200 px-4 py-3 focus:outline-none focus:border-[#ef6fa9] focus:ring-1 focus:ring-[#ef6fa9] transition" 
                           placeholder="08xxxxxxxxxx" required>
                </div>

                <div>
                    <label class="block text-sm font-bold text-[#0b2545] mb-2">Catatan / Pesan <span class="text-xs text-gray-400 font-normal">(Opsional)</span></label>
                    <textarea name="catatan" rows="4" 
                              class="w-full rounded-xl border border-gray-200 px-4 py-3 focus:outline-none focus:border-[#ef6fa9] focus:ring-1 focus:ring-[#ef6fa9] transition" 
                              placeholder="Tuliskan catatan khusus atau pesan untuk panitia jika ada...">{{ old('catatan') }}</textarea>
                </div>

                <div class="pt-4">
                    <button type="submit" class="primary-btn w-full justify-center py-4 rounded-xl text-lg font-bold shadow-lg shadow-[#ef6fa9]/20 hover:shadow-[#ef6fa9]/40 transition">
                        Daftar Sekarang <i class="fa-solid fa-paper-plane ml-2"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection

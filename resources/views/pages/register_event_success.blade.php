@extends('layouts.main')

@section('title', 'Pendaftaran Berhasil - ' . $event->nama)

@section('content')

<section class="section-screen section-light py-20 bg-gray-50 flex items-center justify-center">
    <div class="w-[min(650px,calc(100%-32px))] mx-auto text-center">
        <div class="surface-card p-10 bg-white rounded-3xl shadow-xl border border-gray-100 space-y-6">
            <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center text-green-600 text-4xl mx-auto shadow-inner">
                <i class="fa-solid fa-circle-check"></i>
            </div>
            
            <div class="space-y-2">
                <span class="eyebrow text-green-600">Pendaftaran Sukses</span>
                <h1 class="text-3xl font-black text-[#0b2545]">Selamat, Anda Terdaftar!</h1>
                <p class="text-gray-500 max-w-md mx-auto">
                    Pendaftaran Anda untuk event <strong>{{ $event->nama }}</strong> telah berhasil disimpan di sistem.
                </p>
            </div>

            <hr class="border-gray-100 my-6">

            <div class="bg-gray-50 p-6 rounded-2xl text-left space-y-3 border border-gray-100">
                <h3 class="text-sm font-bold text-[#0b2545] uppercase tracking-wider mb-2">Detail Pendaftar:</h3>
                <div class="grid grid-cols-[120px_1fr] text-sm text-gray-700">
                    <span class="font-semibold text-gray-400">Nama:</span>
                    <span>{{ $registration->nama }}</span>
                </div>
                <div class="grid grid-cols-[120px_1fr] text-sm text-gray-700">
                    <span class="font-semibold text-gray-400">Email:</span>
                    <span>{{ $registration->email }}</span>
                </div>
                <div class="grid grid-cols-[120px_1fr] text-sm text-gray-700">
                    <span class="font-semibold text-gray-400">Telepon:</span>
                    <span>{{ $registration->telepon }}</span>
                </div>
                @if($registration->catatan)
                    <div class="grid grid-cols-[120px_1fr] text-sm text-gray-700">
                        <span class="font-semibold text-gray-400">Catatan:</span>
                        <span class="italic text-gray-600">"{{ $registration->catatan }}"</span>
                    </div>
                @endif
                <div class="grid grid-cols-[120px_1fr] text-sm text-gray-700 pt-2 border-t border-gray-200">
                    <span class="font-semibold text-gray-400">Event:</span>
                    <span class="font-bold text-[#0b2545]">{{ $event->nama }}</span>
                </div>
                <div class="grid grid-cols-[120px_1fr] text-sm text-gray-700">
                    <span class="font-semibold text-gray-400">Tanggal:</span>
                    <span>{{ $event->tanggal->format('d M Y') }}</span>
                </div>
                <div class="grid grid-cols-[120px_1fr] text-sm text-gray-700">
                    <span class="font-semibold text-gray-400">Lokasi:</span>
                    <span>{{ $event->lokasi }}</span>
                </div>
            </div>

            <div class="flex flex-col sm:flex-row gap-4 justify-center pt-4">
                <a href="{{ route('tickets') }}" class="primary-btn w-full sm:w-auto justify-center">
                    Lihat Tiket Saya <i class="fa-solid fa-ticket ml-2"></i>
                </a>
                <a href="{{ route('events') }}" class="secondary-btn w-full sm:w-auto justify-center border border-gray-200 hover:bg-gray-55 text-gray-75">
                    Kembali ke Event
                </a>
            </div>
        </div>
    </div>
</section>

@endsection

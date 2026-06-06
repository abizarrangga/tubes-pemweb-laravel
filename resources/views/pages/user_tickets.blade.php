@extends('layouts.main')

@section('title', 'Tiket & Registrasi Saya')

@section('content')

<section class="section-screen section-dark py-12">
    <div class="w-[min(1180px,calc(100%-32px))] mx-auto grid lg:grid-cols-[1.2fr_0.8fr] gap-12 items-center">
        <div class="space-y-6">
            <span class="eyebrow">Dashboard User</span>
            <h1 class="page-title text-4xl lg:text-5xl font-black text-white leading-tight">
                Tiket & Registrasi<br>Saya
            </h1>
            <p class="text-white/75 leading-relaxed">
                Di sini Anda dapat melihat seluruh riwayat pendaftaran event gratis dan pembelian tiket event berbayar lengkap dengan status pembayaran serta kode unik tiket Anda.
            </p>
        </div>
        <div class="flex flex-col gap-4 bg-[#15305B] p-6 rounded-2xl border border-gray-700 text-white/95">
            <h4 class="font-bold text-lg border-b border-gray-700 pb-2 mb-2">Informasi Akun:</h4>
            <div class="grid grid-cols-[100px_1fr] text-sm">
                <span class="text-gray-400">Nama:</span>
                <span>{{ Auth::user()->name }}</span>
            </div>
            <div class="grid grid-cols-[100px_1fr] text-sm">
                <span class="text-gray-400">Email:</span>
                <span>{{ Auth::user()->email }}</span>
            </div>
            <div class="grid grid-cols-[100px_1fr] text-sm">
                <span class="text-gray-400">Role Akun:</span>
                <span class="capitalize font-bold text-[#ef6fa9]">{{ Auth::user()->role }}</span>
            </div>
        </div>
    </div>
</section>

<section class="section-screen section-light py-16 bg-gray-50">
    <div class="w-[min(1180px,calc(100%-32px))] mx-auto">
        
        <div class="grid lg:grid-cols-[1.3fr_0.7fr] gap-10">
            
            <!-- LIST PEMESANAN TIKET BERBAYAR -->
            <div class="space-y-8">
                <div>
                    <span class="eyebrow text-[#ef6fa9]">Tiket Event</span>
                    <h2 class="text-3xl font-black text-[#0b2545] mt-1">Pemesanan Tiket</h2>
                    <p class="text-gray-400 text-sm">Riwayat pembelian tiket untuk event-event berbayar.</p>
                </div>

                @forelse($tickets as $ticket)
                    <div class="surface-card bg-white p-6 md:p-8 rounded-3xl border border-gray-150 shadow-sm space-y-6">
                        <div class="flex flex-wrap items-start justify-between gap-4">
                            <div class="space-y-1">
                                <span class="pill bg-blue-50 text-[#0b2545] font-bold text-xs">Paid Event</span>
                                <h3 class="text-xl font-black text-[#0b2545] mt-1">{{ $ticket->event->nama }}</h3>
                                <p class="text-xs text-gray-400">
                                    <i class="fa-solid fa-calendar mr-1"></i> {{ $ticket->event->tanggal->format('d M Y') }} 
                                    • <i class="fa-solid fa-location-dot mr-1"></i> {{ $ticket->event->lokasi }}
                                </p>
                            </div>
                            <div class="text-right">
                                <span class="px-3 py-1 rounded-full text-xs font-black uppercase tracking-wider
                                    {{ $ticket->status_pembayaran === 'sukses' ? 'bg-green-100 text-green-700' : '' }}
                                    {{ $ticket->status_pembayaran === 'pending' ? 'bg-yellow-100 text-yellow-700 animate-pulse' : '' }}
                                    {{ $ticket->status_pembayaran === 'gagal' ? 'bg-red-100 text-red-700' : '' }}">
                                    {{ $ticket->status_pembayaran }}
                                </span>
                                <p class="text-sm font-bold text-gray-500 mt-2">Rp {{ number_format($ticket->total_harga, 0, ',', '.') }}</p>
                            </div>
                        </div>

                        <hr class="border-gray-100">

                        <div class="grid sm:grid-cols-2 gap-4 text-xs text-gray-500">
                            <div>
                                <p><span class="font-bold text-gray-400">Order ID:</span> <span class="font-mono text-gray-700">{{ $ticket->midtrans_order_id }}</span></p>
                                <p class="mt-1"><span class="font-bold text-gray-400">Nama Pemesan:</span> <span class="text-gray-700">{{ $ticket->nama_pemesan }}</span></p>
                            </div>
                            <div>
                                <p><span class="font-bold text-gray-400">Jumlah Tiket:</span> <span class="text-gray-700 font-bold">{{ $ticket->jumlah_tiket }} Pcs</span></p>
                                <p class="mt-1"><span class="font-bold text-gray-400">Tgl Pesan:</span> <span class="text-gray-700">{{ $ticket->created_at->format('d M Y H:i') }}</span></p>
                            </div>
                        </div>

                        <!-- Kode Tiket Muncul hanya jika Status sukses -->
                        @if($ticket->status_pembayaran === 'sukses')
                            <div class="bg-gray-50 p-4 md:p-6 rounded-2xl border border-gray-100 space-y-3">
                                <h4 class="text-xs font-bold text-[#0b2545] uppercase tracking-wider">Daftar Kode Unik Tiket:</h4>
                                <div class="grid gap-2">
                                    @foreach($ticket->ticketCodes as $code)
                                        <div class="flex items-center justify-between bg-white p-3 rounded-xl border border-gray-200 text-xs font-mono">
                                            <div class="flex items-center gap-2">
                                                <span class="text-gray-700 font-bold tracking-wide">{{ $code->kode }}</span>
                                            </div>
                                            <div class="flex items-center gap-3">
                                                <span class="px-2 py-0.5 rounded text-[10px] font-bold uppercase
                                                    {{ $code->status === 'belum_dipakai' ? 'bg-blue-50 text-blue-600' : 'bg-gray-200 text-gray-600' }}">
                                                    {{ $code->status === 'belum_dipakai' ? 'Belum Dipakai' : 'Sudah Check-In' }}
                                                </span>
                                                @if($code->status === 'sudah_dipakai' && $code->used_at)
                                                    <span class="text-[10px] text-gray-400 italic">Pada {{ $code->used_at->format('d/m H:i') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @elseif($ticket->status_pembayaran === 'pending')
                            <div class="bg-yellow-50/50 p-4 rounded-2xl border border-yellow-100 text-xs text-yellow-800 flex items-center justify-between">
                                <span>Menunggu pembayaran dikonfirmasi oleh Midtrans. Jika sudah membayar, klik reload halaman.</span>
                                <a href="" class="font-bold text-[#ef6fa9] hover:underline"><i class="fa-solid fa-rotate mr-1"></i> Refresh</a>
                            </div>
                        @endif
                    </div>
                @empty
                    <div class="text-center py-12 bg-white rounded-3xl border border-gray-150 text-gray-400">
                        <i class="fa-solid fa-ticket-simple text-4xl mb-3 block"></i>
                        <p class="text-sm">Belum ada pemesanan tiket event berbayar.</p>
                        <a href="{{ route('events') }}" class="text-xs font-bold text-[#ef6fa9] hover:underline mt-2 inline-block">Cari Event Berbayar</a>
                    </div>
                @endforelse
            </div>

            <!-- LIST PENDAFTARAN EVENT GRATIS -->
            <div class="space-y-8">
                <div>
                    <span class="eyebrow text-[#ef6fa9]">Registrasi Gratis</span>
                    <h2 class="text-3xl font-black text-[#0b2545] mt-1">Registrasi Event</h2>
                    <p class="text-gray-400 text-sm">Riwayat registrasi event gratis.</p>
                </div>

                @forelse($registrations as $reg)
                    <div class="surface-card bg-white p-6 rounded-3xl border border-gray-150 shadow-sm space-y-4">
                        <div class="space-y-1">
                            <span class="pill bg-green-50 text-green-700 font-bold text-xs">Free Event</span>
                            <h3 class="text-lg font-black text-[#0b2545] mt-1">{{ $reg->event->nama }}</h3>
                            <p class="text-[11px] text-gray-400">
                                <i class="fa-solid fa-calendar mr-1"></i> {{ $reg->event->tanggal->format('d M Y') }}
                                • <i class="fa-solid fa-location-dot mr-1"></i> {{ $reg->event->lokasi }}
                            </p>
                        </div>
                        
                        <div class="bg-gray-50 p-4 rounded-2xl text-[11px] text-gray-500 space-y-1 border border-gray-100">
                            <p><span class="font-bold text-gray-400">Nama Pendaftar:</span> <span class="text-gray-700">{{ $reg->nama }}</span></p>
                            <p><span class="font-bold text-gray-400">No. Telepon:</span> <span class="text-gray-700">{{ $reg->telepon }}</span></p>
                            <p><span class="font-bold text-gray-400">Tgl Daftar:</span> <span class="text-gray-700">{{ $reg->created_at->format('d M Y') }}</span></p>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-12 bg-white rounded-3xl border border-gray-150 text-gray-400">
                        <i class="fa-solid fa-address-card text-4xl mb-3 block"></i>
                        <p class="text-sm">Belum mendaftar pada event gratis.</p>
                        <a href="{{ route('events') }}" class="text-xs font-bold text-[#ef6fa9] hover:underline mt-2 inline-block">Cari Event Gratis</a>
                    </div>
                @endforelse
            </div>

        </div>

    </div>
</section>

@endsection

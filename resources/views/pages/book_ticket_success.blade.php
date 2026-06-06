@extends('layouts.main')

@section('title', 'Pembayaran ' . ($ticket->status_pembayaran === 'sukses' ? 'Berhasil' : 'Diproses'))

@section('content')

<section class="section-screen section-light py-20 bg-gray-55 flex items-center justify-center">
    <div class="w-[min(700px,calc(100%-32px))] mx-auto">
        <div class="surface-card p-8 md:p-12 bg-white rounded-3xl shadow-xl border border-gray-100 space-y-8 text-center">
            
            @if($ticket->status_pembayaran === 'sukses')
                <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center text-green-600 text-4xl mx-auto shadow-inner">
                    <i class="fa-solid fa-circle-check"></i>
                </div>
                <div class="space-y-2">
                    <span class="eyebrow text-green-600">Pembayaran Sukses</span>
                    <h1 class="text-3xl font-black text-[#0b2545]">Tiket Anda Berhasil Terbit!</h1>
                    <p class="text-gray-500 text-sm max-w-md mx-auto">
                        Terima kasih, pembayaran untuk event <strong>{{ $ticket->event->nama }}</strong> telah kami terima.
                    </p>
                </div>
            @elseif($ticket->status_pembayaran === 'pending')
                <div class="w-20 h-20 bg-yellow-100 rounded-full flex items-center justify-center text-yellow-600 text-4xl mx-auto shadow-inner">
                    <i class="fa-solid fa-clock"></i>
                </div>
                <div class="space-y-2">
                    <span class="eyebrow text-yellow-600">Menunggu Pembayaran</span>
                    <h1 class="text-3xl font-black text-[#0b2545]">Pembayaran Sedang Diproses</h1>
                    <p class="text-gray-500 text-sm max-w-md mx-auto">
                        Transaksi Anda untuk <strong>{{ $ticket->event->nama }}</strong> masih berstatus pending. Jika Anda telah membayar, silakan tunggu beberapa saat atau hubungi admin.
                    </p>
                </div>
            @else
                <div class="w-20 h-20 bg-red-100 rounded-full flex items-center justify-center text-red-600 text-4xl mx-auto shadow-inner">
                    <i class="fa-solid fa-circle-xmark"></i>
                </div>
                <div class="space-y-2">
                    <span class="eyebrow text-red-600">Transaksi Gagal</span>
                    <h1 class="text-3xl font-black text-[#0b2545]">Pembayaran Gagal / Dibatalkan</h1>
                    <p class="text-gray-500 text-sm max-w-md mx-auto">
                        Mohon maaf, transaksi pembayaran Anda tidak berhasil. Silakan coba memesan ulang tiket Anda.
                    </p>
                </div>
            @endif

            <hr class="border-gray-100 my-6">

            <!-- Detail Transaksi -->
            <div class="bg-gray-50 p-6 rounded-2xl text-left space-y-3 border border-gray-100 text-sm">
                <h3 class="text-xs font-bold text-[#0b2545] uppercase tracking-wider mb-2">Detail Transaksi:</h3>
                <div class="grid grid-cols-[140px_1fr] text-gray-700">
                    <span class="text-gray-400 font-semibold">Order ID:</span>
                    <span class="font-mono">{{ $ticket->midtrans_order_id }}</span>
                </div>
                <div class="grid grid-cols-[140px_1fr] text-gray-700">
                    <span class="text-gray-400 font-semibold">Nama Pemesan:</span>
                    <span>{{ $ticket->nama_pemesan }}</span>
                </div>
                <div class="grid grid-cols-[140px_1fr] text-gray-700">
                    <span class="text-gray-400 font-semibold">Jumlah Tiket:</span>
                    <span>{{ $ticket->jumlah_tiket }} Tiket</span>
                </div>
                <div class="grid grid-cols-[140px_1fr] text-gray-700">
                    <span class="text-gray-400 font-semibold">Total Bayar:</span>
                    <span class="font-bold text-[#0b2545]">Rp {{ number_format($ticket->total_harga, 0, ',', '.') }}</span>
                </div>
                <div class="grid grid-cols-[140px_1fr] text-gray-700 pt-2 border-t border-gray-200">
                    <span class="text-gray-400 font-semibold">Nama Event:</span>
                    <span class="font-bold text-[#0b2545]">{{ $ticket->event->nama }}</span>
                </div>
                <div class="grid grid-cols-[140px_1fr] text-gray-700">
                    <span class="text-gray-400 font-semibold">Tanggal Event:</span>
                    <span>{{ $ticket->event->tanggal->format('d M Y') }}</span>
                </div>
            </div>

            <!-- Kode Tiket (Hanya Muncul Jika Sukses) -->
            @if($ticket->status_pembayaran === 'sukses' && $ticket->ticketCodes->count() > 0)
                <div class="space-y-4 text-left">
                    <h3 class="text-sm font-bold text-[#0b2545] uppercase tracking-wider">Kode Unik Tiket Anda:</h3>
                    <p class="text-xs text-gray-400 mb-3">Tunjukkan kode unik ini kepada panitia di pintu masuk event untuk dipindai/divalidasi.</p>
                    
                    <div class="space-y-3">
                        @foreach($ticket->ticketCodes as $index => $code)
                            <div class="flex items-center justify-between bg-blue-50/50 p-4 rounded-xl border border-blue-100 font-mono">
                                <div class="flex items-center gap-3">
                                    <span class="text-xs bg-[#0b2545] text-white px-2 py-0.5 rounded-full font-sans font-bold">Tiket {{ $index + 1 }}</span>
                                    <span class="text-sm md:text-base font-black text-[#0b2545] tracking-wider" id="code-{{ $code->id }}">{{ $code->kode }}</span>
                                </div>
                                <button onclick="copyToClipboard('{{ $code->kode }}', 'btn-{{ $code->id }}')" 
                                        id="btn-{{ $code->id }}" 
                                        class="text-xs font-bold text-[#ef6fa9] hover:text-[#0b2545] flex items-center gap-1 transition">
                                    <i class="fa-regular fa-copy"></i> Salin
                                </button>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <div class="flex flex-col sm:flex-row gap-4 justify-center pt-4">
                <a href="{{ route('tickets') }}" class="primary-btn w-full sm:w-auto justify-center">
                    Lihat Semua Tiket Saya <i class="fa-solid fa-ticket ml-2"></i>
                </a>
                <a href="{{ route('events') }}" class="secondary-btn w-full sm:w-auto justify-center border border-gray-200 hover:bg-gray-55 text-gray-75">
                    Kembali ke Event
                </a>
            </div>
        </div>
    </div>
</section>

<script>
    function copyToClipboard(text, buttonId) {
        navigator.clipboard.writeText(text).then(function() {
            const button = document.getElementById(buttonId);
            const originalHTML = button.innerHTML;
            button.innerHTML = '<i class="fa-solid fa-check text-green-500"></i> Tersalin!';
            button.classList.add('text-green-600');
            
            setTimeout(function() {
                button.innerHTML = originalHTML;
                button.classList.remove('text-green-600');
            }, 2000);
        }, function(err) {
            console.error('Gagal menyalin teks: ', err);
        });
    }
</script>

@endsection

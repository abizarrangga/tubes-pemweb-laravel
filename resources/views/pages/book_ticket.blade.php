@extends('layouts.main')

@section('title', 'Pesan Tiket - ' . $event->nama)

@section('content')

<section class="section-screen section-dark py-12">
    <div class="w-[min(1180px,calc(100%-32px))] mx-auto grid lg:grid-cols-[1fr_1fr] gap-12 items-center">
        <div class="space-y-6">
            <span class="eyebrow">Pemesanan Tiket Event</span>
            <h1 class="page-title text-4xl lg:text-5xl font-black text-white leading-tight">
                {{ $event->nama }}
            </h1>
            <p class="text-white/75 leading-relaxed">
                Segera dapatkan tiket Anda sebelum kehabisan. Setelah mengisi data pemesanan, Anda akan diarahkan ke gerbang pembayaran aman Midtrans Snap untuk menyelesaikan transaksi.
            </p>
            <div class="flex flex-col gap-2 text-white/80 text-sm">
                <span><i class="fa-solid fa-calendar mr-2 text-[#ef6fa9]"></i> {{ $event->tanggal->format('d M Y') }}</span>
                <span><i class="fa-solid fa-location-dot mr-2 text-[#ef6fa9]"></i> {{ $event->lokasi }}</span>
                <span><i class="fa-solid fa-tags mr-2 text-[#ef6fa9]"></i> {{ $event->kategori }}</span>
                <span class="text-lg font-black text-[#ef6fa9] mt-2"><i class="fa-solid fa-money-bill-wave mr-1 text-[#ef6fa9]"></i> {{ $event->harga }}</span>
            </div>
            <a href="{{ route('events') }}" class="secondary-btn inline-block mt-4">Kembali ke Daftar Event</a>
        </div>
        <div class="media-frame h-[320px] rounded-2xl overflow-hidden shadow-2xl">
            <img src="{{ $event->gambar_final }}" alt="{{ $event->nama }}" class="w-full h-full object-cover">
        </div>
    </div>
</section>

<section class="section-screen section-light py-16 bg-gray-55">
    <div class="w-[min(1180px,calc(100%-32px))] mx-auto grid lg:grid-cols-[1.1fr_0.9fr] gap-8 items-start">
        
        <!-- Info Event & Petunjuk -->
        <div class="space-y-6">
            <div class="bg-white p-8 rounded-3xl border border-gray-100 shadow-sm space-y-4">
                <h3 class="text-xl font-black text-[#0b2545]">Petunjuk Pembayaran</h3>
                <ul class="list-decimal list-inside text-gray-500 text-sm space-y-2 leading-relaxed">
                    <li>Isi formulir data diri di sebelah kanan dengan lengkap dan benar.</li>
                    <li>Tentukan jumlah tiket yang ingin Anda pesan.</li>
                    <li>Sistem akan menghitung total harga pembayaran secara otomatis.</li>
                    <li>Tekan tombol <strong>"Bayar Sekarang"</strong> untuk membuka pop-up atau halaman pembayaran Midtrans.</li>
                    <li>Pilih metode pembayaran (Transfer Bank, GoPay, Qris, Kartu Kredit, Alfamart/Indomaret).</li>
                    <li>Setelah transaksi sukses, Anda akan dialihkan kembali dan tiket berupa kode unik akan terbit secara instan.</li>
                </ul>
            </div>
        </div>

        <!-- Form Pemesanan -->
        <div class="surface-card p-8 md:p-10 bg-white rounded-3xl shadow-xl border border-gray-100">
            <span class="eyebrow text-[#ef6fa9]">Form Tiket</span>
            <h2 class="text-3xl font-black text-[#0b2545] mt-2 mb-6">Pesan Tiket</h2>

            @if (session('error'))
                <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl mb-6 text-sm">
                    {{ session('error') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl mb-6 text-sm">
                    <ul class="list-disc list-inside space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('events.book.store', $event->slug) }}" method="POST" class="space-y-5" id="bookForm">
                @csrf
                <div>
                    <label class="block text-sm font-bold text-[#0b2545] mb-2">Nama Pemesan</label>
                    <input type="text" name="nama_pemesan" value="{{ old('nama_pemesan', Auth::user()->name) }}" 
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

                <div class="grid sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-bold text-[#0b2545] mb-2">Jumlah Tiket</label>
                        <input type="number" name="jumlah_tiket" id="ticketQty" min="1" value="1" 
                               class="w-full rounded-xl border border-gray-200 px-4 py-3 focus:outline-none focus:border-[#ef6fa9] focus:ring-1 focus:ring-[#ef6fa9] transition" required>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-[#0b2545] mb-2">Harga Satuan</label>
                        <input type="text" class="w-full rounded-xl border border-gray-200 px-4 py-3 bg-gray-50 text-gray-500 font-bold" 
                               value="{{ $event->harga }}" readonly>
                    </div>
                </div>

                <div class="rounded-2xl bg-[#0b2545] p-5 text-white shadow-inner">
                    <p class="text-xs text-white/65">Total Harga</p>
                    <p class="text-3xl font-black mt-1" id="ticketTotal">Rp 0</p>
                </div>

                <button type="submit" class="primary-btn w-full justify-center py-4 rounded-xl text-lg font-bold shadow-lg shadow-[#ef6fa9]/20 hover:shadow-[#ef6fa9]/40 transition">
                    Bayar Sekarang <i class="fa-solid fa-credit-card ml-2"></i>
                </button>
            </form>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ticketQty = document.getElementById('ticketQty');
        const ticketTotal = document.getElementById('ticketTotal');
        const unitPrice = {{ $event->harga_numeric }};
        const rupiah = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', maximumFractionDigits: 0 });

        function updateTicketTotal() {
            const qty = Math.max(1, Number(ticketQty.value || 1));
            ticketTotal.textContent = rupiah.format(unitPrice * qty);
        }

        ticketQty.addEventListener('input', updateTicketTotal);
        updateTicketTotal();
    });
</script>

@endsection

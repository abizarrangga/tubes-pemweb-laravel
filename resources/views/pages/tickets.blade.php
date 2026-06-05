@extends('layouts.main')

@section('title', 'Tickets')

@section('content')

<section class="section-screen section-dark">
    <div class="w-[min(1180px,calc(100%-32px))] mx-auto grid lg:grid-cols-[.85fr_1.15fr] gap-12 items-center">
        <div class="space-y-6">
            <span class="eyebrow">Tickets</span>
            <h1 class="page-title">Pemesanan<br>Tiket</h1>
            <p class="text-white/75 leading-8">
                Pilih jenis tiket, jumlah pesanan, dan lihat harga sebelum mengirim permintaan pemesanan ke panitia.
            </p>
            <a href="{{ route('events') }}" class="secondary-btn">Back to Events</a>
        </div>
        <div class="media-frame h-[430px]">
            <img src="https://images.unsplash.com/photo-1516450360452-9312f5e86fc7?w=1000&h=760&fit=crop" alt="Pemesanan tiket event Dapur Seni Biru">
        </div>
    </div>
</section>

<section class="section-screen section-white">
    <div class="w-[min(1180px,calc(100%-32px))] mx-auto grid lg:grid-cols-[.95fr_1.05fr] gap-8 items-start">
        <div>
            <span class="eyebrow">Ticket Options</span>
            <h2 class="text-3xl font-black text-[#0b2545] mt-2 mb-8">Jenis tiket tersedia</h2>
            <div class="grid sm:grid-cols-3 lg:grid-cols-1 gap-5">
                @foreach ([
                    ['name' => 'Regular', 'price' => 'Rp 25.000', 'desc' => 'Akses kursi reguler dan e-ticket.'],
                    ['name' => 'VIP', 'price' => 'Rp 50.000', 'desc' => 'Area terbaik, prioritas masuk, dan e-ticket.'],
                    ['name' => 'Student', 'price' => 'Rp 15.000', 'desc' => 'Harga khusus mahasiswa aktif.'],
                ] as $ticket)
                    <article class="surface-card p-6">
                        <span class="pill">{{ $ticket['name'] }}</span>
                        <p class="text-3xl font-black text-[#0b2545] mt-4">{{ $ticket['price'] }}</p>
                        <p class="text-sm text-gray-500 mt-2">{{ $ticket['desc'] }}</p>
                    </article>
                @endforeach
            </div>
        </div>

        <div class="surface-card p-8">
            <span class="eyebrow">Order Form</span>
            <h2 class="text-3xl font-black text-[#0b2545] mt-2 mb-6">Pesan tiket</h2>
            <form action="{{ route('contact.store') }}" method="POST" class="space-y-5" id="ticketForm">
                @csrf
                <div>
                    <label class="block text-sm font-bold text-[#0b2545] mb-2">Nama Pemesan</label>
                    <input type="text" name="nama" class="w-full rounded-lg border border-gray-200 px-4 py-3 focus:outline-none focus:border-[#ef6fa9]" required>
                </div>
                <div>
                    <label class="block text-sm font-bold text-[#0b2545] mb-2">Jenis Tiket</label>
                    <select name="jenis_tiket" id="ticketType" class="w-full rounded-lg border border-gray-200 px-4 py-3 focus:outline-none focus:border-[#ef6fa9]" required>
                        <option value="Regular" data-price="25000">Regular - Rp 25.000</option>
                        <option value="VIP" data-price="50000">VIP - Rp 50.000</option>
                        <option value="Student" data-price="15000">Student - Rp 15.000</option>
                    </select>
                </div>
                <div class="grid sm:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-sm font-bold text-[#0b2545] mb-2">Jumlah Tiket</label>
                        <input type="number" name="jumlah_tiket" id="ticketQty" min="1" value="1" class="w-full rounded-lg border border-gray-200 px-4 py-3 focus:outline-none focus:border-[#ef6fa9]" required>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-[#0b2545] mb-2">Harga Satuan</label>
                        <input type="text" id="ticketPrice" class="w-full rounded-lg border border-gray-200 px-4 py-3 bg-gray-50" value="Rp 25.000" readonly>
                    </div>
                </div>
                <div class="rounded-lg bg-[#0b2545] p-5 text-white">
                    <p class="text-sm text-white/65">Total Harga</p>
                    <p class="text-3xl font-black" id="ticketTotal">Rp 25.000</p>
                </div>
                <button type="submit" class="primary-btn w-full justify-center">Kirim Pemesanan</button>
            </form>
        </div>
    </div>
</section>

<script>
    const ticketType = document.getElementById('ticketType');
    const ticketQty = document.getElementById('ticketQty');
    const ticketPrice = document.getElementById('ticketPrice');
    const ticketTotal = document.getElementById('ticketTotal');
    const rupiah = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', maximumFractionDigits: 0 });

    function updateTicketTotal() {
        const price = Number(ticketType.selectedOptions[0].dataset.price);
        const qty = Math.max(1, Number(ticketQty.value || 1));
        ticketPrice.value = rupiah.format(price);
        ticketTotal.textContent = rupiah.format(price * qty);
    }

    ticketType.addEventListener('change', updateTicketTotal);
    ticketQty.addEventListener('input', updateTicketTotal);
    updateTicketTotal();
</script>

@endsection

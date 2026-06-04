@extends('layouts.main')

@section('title', 'Events')

@section('content')

<section class="section-screen section-dark">
    <div class="w-[min(1180px,calc(100%-32px))] mx-auto grid lg:grid-cols-[.8fr_1.2fr] gap-12 items-center">
        <div class="space-y-6">
            <span class="eyebrow">Events</span>
            <h1 class="page-title">Agenda Seni<br>dan Tiket</h1>
            <p class="text-white/75 leading-8">
                Pagelaran, workshop, lomba, dan pemesanan tiket disatukan di halaman ini agar alurnya sama dengan bagian admin.
            </p>
            <a href="#tickets" class="primary-btn">View Tickets <i class="fa-solid fa-ticket"></i></a>
        </div>
        <div class="media-frame h-[430px]">
            <img src="https://images.unsplash.com/photo-1508700115892-45ecd05ae2ad?w=1000&h=760&fit=crop" alt="Event Dapur Seni Biru">
        </div>
    </div>
</section>

<section class="section-screen section-light">
    <div class="w-[min(1180px,calc(100%-32px))] mx-auto">
        <span class="eyebrow">Event List</span>
        <h2 class="text-3xl font-black text-[#0b2545] mt-2 mb-8">Daftar Event</h2>
        <div class="grid lg:grid-cols-3 gap-6">
            @foreach ([
                ['day' => '20', 'mon' => 'Jun', 'tag' => 'Pagelaran', 'title' => 'Pentas Akbar 2026', 'date' => '20 Juni 2026', 'loc' => 'Aula UPI Cibiru', 'img' => 'photo-1514525253161-7a46d19cd819', 'status' => 'Mendatang'],
                ['day' => '05', 'mon' => 'Jul', 'tag' => 'Workshop', 'title' => 'Workshop Fotografi & Sinematografi', 'date' => '5 Juli 2026', 'loc' => 'Ruang Kreatif DSB', 'img' => 'photo-1560421683-6856ea585c78', 'status' => 'Mendatang'],
                ['day' => '12', 'mon' => 'Agu', 'tag' => 'Lomba', 'title' => 'Kompetisi Desain Grafis Nasional', 'date' => '12 Agustus 2026', 'loc' => 'Online & Offline', 'img' => 'photo-1513364776144-60967b0f800f', 'status' => 'Mendatang'],
            ] as $event)
                <article class="surface-card overflow-hidden">
                    <div class="media-frame h-48 rounded-none">
                        <img src="https://images.unsplash.com/{{ $event['img'] }}?w=700&h=420&fit=crop" alt="{{ $event['title'] }}">
                    </div>
                    <div class="p-6">
                        <div class="flex gap-4">
                            <div class="event-date"><div><strong>{{ $event['day'] }}</strong><span>{{ $event['mon'] }}</span></div></div>
                            <div class="space-y-3">
                                <span class="pill">{{ $event['tag'] }}</span>
                                <h3 class="font-black text-lg leading-snug">{{ $event['title'] }}</h3>
                                <p class="text-sm text-gray-500">{{ $event['date'] }} • {{ $event['loc'] }}</p>
                                <a href="#tickets" class="text-sm font-black text-[#ef6fa9] hover:text-[#0b2545] transition">Ticket Order</a>
                            </div>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>

<section id="tickets" class="section-screen section-white">
    <div class="w-[min(1180px,calc(100%-32px))] mx-auto">
        <div class="text-center max-w-2xl mx-auto mb-8">
            <span class="eyebrow">Tickets</span>
            <h2 class="text-3xl font-black text-[#0b2545] mt-2">Pentas Akbar 2026</h2>
            <p class="text-gray-500 mt-3">Pemesanan tiket event utama tersedia langsung di halaman Events.</p>
        </div>
        <div class="grid md:grid-cols-3 gap-6">
            @foreach ([
                ['name' => 'Regular', 'price' => 'Rp 25K', 'featured' => false],
                ['name' => 'VIP', 'price' => 'Rp 50K', 'featured' => true],
                ['name' => 'Student', 'price' => 'Rp 15K', 'featured' => false],
            ] as $ticket)
                <article class="surface-card ticket-card {{ $ticket['featured'] ? 'featured' : '' }} p-8">
                    @if ($ticket['featured'])
                        <span class="pill absolute top-5 right-5">Popular</span>
                    @endif
                    <h3 class="text-sm font-black uppercase text-[#ef6fa9]">{{ $ticket['name'] }}</h3>
                    <p class="text-5xl font-black mt-3 mb-2 {{ $ticket['featured'] ? 'text-white' : 'text-[#0b2545]' }}">{{ $ticket['price'] }}</p>
                    <p class="text-sm text-gray-500 mb-6">per orang</p>
                    <ul class="text-sm text-gray-500 space-y-3 mb-8">
                        <li><i class="fa-solid fa-check text-[#ef6fa9] mr-2"></i>Akses semua pertunjukan</li>
                        <li><i class="fa-solid fa-check text-[#ef6fa9] mr-2"></i>E-ticket via email</li>
                        <li><i class="fa-solid fa-check text-[#ef6fa9] mr-2"></i>Konfirmasi melalui kontak panitia</li>
                    </ul>
                    <a href="{{ route('contact') }}" class="primary-btn w-full">Order Ticket</a>
                </article>
            @endforeach
        </div>
    </div>
</section>

@endsection

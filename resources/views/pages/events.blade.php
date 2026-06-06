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
            <a href="{{ route('tickets') }}" class="primary-btn">View Tickets <i class="fa-solid fa-ticket"></i></a>
        </div>
        <div class="media-frame h-[430px]">
            <img src="https://images.unsplash.com/photo-1508700115892-45ecd05ae2ad?w=1000&h=760&fit=crop" alt="Event Dapur Seni Biru">
        </div>
    </div>
</section>

<section class="section-screen section-light">
    <div class="w-[min(1180px,calc(100%-32px))] mx-auto">
        <div class="flex flex-wrap items-end justify-between gap-5 mb-8">
            <div>
                <span class="eyebrow">Event List</span>
                <h2 class="text-3xl font-black text-[#0b2545] mt-2">Daftar Event</h2>
            </div>
            <div class="flex flex-wrap gap-2">
                @foreach ([
                    'semua' => 'Semua',
                    'mendatang' => 'Mendatang',
                    'selesai' => 'Selesai',
                ] as $value => $label)
                    <a href="{{ route('events', ['status' => $value]) }}"
                       class="px-4 py-2 rounded-full text-sm font-bold transition
                              {{ $filter === $value
                                  ? 'bg-[#0b2545] text-white'
                                  : 'bg-white text-[#0b2545] border border-gray-200 hover:border-[#ef6fa9]' }}">
                        {{ $label }}
                    </a>
                @endforeach
            </div>
        </div>

        <div class="grid lg:grid-cols-3 gap-6">
            @forelse ($events as $event)
                <article class="surface-card overflow-hidden">
                    <div class="media-frame h-48 rounded-none">
                        <img src="{{ $event->gambar_final }}" alt="{{ $event->nama }}">
                    </div>
                    <div class="p-6">
                        <div class="flex gap-4">
                            <div class="event-date">
                                <div>
                                    <strong>{{ $event->tanggal->format('d') }}</strong>
                                    <span>{{ $event->tanggal->locale('id')->isoFormat('MMM') }}</span>
                                </div>
                            </div>
                            <div class="space-y-3">
                                <div class="flex flex-wrap gap-2">
                                    <span class="pill">{{ $event->kategori }}</span>
                                    <span class="pill {{ $event->status === 'Selesai' ? 'opacity-70' : '' }}">
                                        {{ $event->status }}
                                    </span>
                                </div>
                                <h3 class="font-black text-lg leading-snug">{{ $event->nama }}</h3>
                                <p class="text-sm text-gray-500">
                                    {{ $event->tanggal->format('d M Y') }} • {{ $event->lokasi }}
                                </p>
                                @if ($event->harga)
                                    <p class="text-sm font-semibold text-[#0b2545]">{{ $event->harga }}</p>
                                @endif
                                @if ($event->status === 'Mendatang')
                                    @if ($event->isFree())
                                        <a href="{{ route('events.register', $event->slug) }}" class="text-sm font-black text-[#ef6fa9] hover:text-[#0b2545] transition">
                                            Daftar Sekarang <i class="fa-solid fa-arrow-right ml-1"></i>
                                        </a>
                                    @else
                                        <a href="{{ route('events.book', $event->slug) }}" class="text-sm font-black text-[#ef6fa9] hover:text-[#0b2545] transition">
                                            Pesan Tiket <i class="fa-solid fa-ticket ml-1"></i>
                                        </a>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                </article>
            @empty
                <div class="col-span-3 text-center py-16 text-gray-400">
                    <p class="text-lg">
                        @if ($filter === 'mendatang')
                            Belum ada event mendatang.
                        @elseif ($filter === 'selesai')
                            Belum ada event yang selesai.
                        @else
                            Belum ada event.
                        @endif
                    </p>
                </div>
            @endforelse
        </div>
    </div>
</section>

@endsection

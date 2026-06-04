@extends('layouts.main')

@section('title', 'Contact')

@section('content')

<section class="section-screen section-dark">
    <div class="w-[min(1180px,calc(100%-32px))] mx-auto grid lg:grid-cols-[.9fr_1.1fr] gap-12 items-center">
        <div class="space-y-6">
            <span class="eyebrow">Contact</span>
            <h1 class="page-title">Hubungi<br>Kami</h1>
            <p class="text-white/75 leading-8">
                Punya pertanyaan, ingin bergabung, atau ingin memesan tiket event? Kirim pesan ke panitia Dapur Seni Biru.
            </p>
        </div>
        <form action="{{ route('contact.store') }}" method="POST" class="surface-card p-7 space-y-5">
            @csrf
            <div class="grid md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-sm font-bold mb-2">Nama Lengkap</label>
                    <input class="input-clean" type="text" name="nama" placeholder="Masukkan nama lengkap" required>
                </div>
                <div>
                    <label class="block text-sm font-bold mb-2">Email</label>
                    <input class="input-clean" type="email" name="email" placeholder="contoh@mail.com" required>
                </div>
            </div>
            <div>
                <label class="block text-sm font-bold mb-2">Subjek</label>
                <input class="input-clean" type="text" name="subjek" placeholder="Keperluan pesan">
            </div>
            <div>
                <label class="block text-sm font-bold mb-2">Pesan</label>
                <textarea class="input-clean min-h-[140px]" name="pesan" placeholder="Tulis pesan Anda di sini"></textarea>
            </div>
            <button type="submit" class="primary-btn w-full border-0 cursor-pointer">Send Message</button>
        </form>
    </div>
</section>

<section class="section-screen section-white">
    <div class="w-[min(1180px,calc(100%-32px))] mx-auto">
        <span class="eyebrow">Information</span>
        <h2 class="text-3xl font-black text-[#0b2545] mt-2 mb-8">Informasi Kontak</h2>
        <div class="grid md:grid-cols-3 gap-6">
            @foreach ([
                ['icon' => 'fa-solid fa-envelope', 'title' => 'Email', 'text' => 'dapursenibiru@gmail.com'],
                ['icon' => 'fa-solid fa-phone', 'title' => 'Phone', 'text' => '+62 812-3456-7890'],
                ['icon' => 'fa-solid fa-location-dot', 'title' => 'Address', 'text' => 'UPI Kampus Cibiru, Bandung'],
            ] as $info)
                <div class="surface-card p-6 flex gap-4 items-start">
                    <div class="contact-icon"><i class="{{ $info['icon'] }}"></i></div>
                    <div>
                        <h3 class="font-black">{{ $info['title'] }}</h3>
                        <p class="text-sm text-gray-500 mt-1">{{ $info['text'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

@endsection

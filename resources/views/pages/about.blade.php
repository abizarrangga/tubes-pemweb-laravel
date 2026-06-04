@extends('layouts.main')

@section('title', 'About')

@section('content')

<section class="section-screen section-dark">
    <div class="w-[min(1180px,calc(100%-32px))] mx-auto grid lg:grid-cols-[.9fr_1.1fr] gap-12 items-center">
        <div class="space-y-6">
            <span class="eyebrow">About Us</span>
            <h1 class="page-title">Tentang<br>Dapur Seni Biru</h1>
            <p class="text-white/75 leading-8">
                Dapur Seni Biru adalah wadah bagi mahasiswa untuk berkarya, berkolaborasi, dan mengembangkan diri di bidang seni dan kreativitas.
            </p>
        </div>
        <div class="media-frame h-[420px]">
            <img src="https://images.unsplash.com/photo-1529156069898-49953e39b3ac?w=900&h=650&fit=crop" alt="Tim Dapur Seni Biru">
        </div>
    </div>
</section>

<section class="section-screen section-white">
    <div class="w-[min(1180px,calc(100%-32px))] mx-auto grid md:grid-cols-2 gap-6">
        <div class="surface-card p-8">
            <span class="pill">Visi</span>
            <h2 class="text-3xl font-black text-[#0b2545] mt-4 mb-4">Ruang seni yang inspiratif</h2>
            <p class="text-gray-500 leading-8">Menjadi organisasi seni yang kreatif, inovatif, dan inspiratif bagi mahasiswa serta masyarakat.</p>
        </div>
        <div class="surface-card p-8">
            <span class="pill">Misi</span>
            <h2 class="text-3xl font-black text-[#0b2545] mt-4 mb-4">Berkarya dan berkolaborasi</h2>
            <ul class="text-gray-500 leading-8 space-y-2">
                <li>Mengembangkan potensi seni mahasiswa.</li>
                <li>Menciptakan karya berkualitas dan relevan.</li>
                <li>Membangun kolaborasi positif melalui seni.</li>
                <li>Memberikan kontribusi untuk lingkungan kampus.</li>
            </ul>
        </div>
    </div>
</section>

<section class="section-screen section-light">
    <div class="w-[min(1180px,calc(100%-32px))] mx-auto">
        <span class="eyebrow">Team</span>
        <h2 class="text-3xl font-black text-[#0b2545] mt-2 mb-8">Struktur Kepengurusan</h2>
        <div class="grid sm:grid-cols-2 lg:grid-cols-5 gap-5">
            @foreach ([
                ['name' => 'Aisha Putri', 'role' => 'Ketua Umum', 'img' => 'photo-1494790108377-be9c29b29330'],
                ['name' => 'Ricky Maulana', 'role' => 'Wakil Ketua', 'img' => 'photo-1500648767791-00dcc994a43e'],
                ['name' => 'Siti Aulia', 'role' => 'Sekretaris', 'img' => 'photo-1438761681033-6461ffad8d80'],
                ['name' => 'Fahmi Alfarizi', 'role' => 'Bendahara', 'img' => 'photo-1506794778202-cad84cf45f1d'],
                ['name' => 'Dewi Lestari', 'role' => 'Div. Humas', 'img' => 'photo-1534528741775-53994a69daeb'],
            ] as $person)
                <article class="surface-card p-4 text-center">
                    <div class="media-frame h-48 mb-4">
                        <img src="https://images.unsplash.com/{{ $person['img'] }}?w=360&h=420&fit=crop" alt="{{ $person['name'] }}">
                    </div>
                    <h3 class="font-black">{{ $person['name'] }}</h3>
                    <p class="text-sm text-gray-500">{{ $person['role'] }}</p>
                </article>
            @endforeach
        </div>
    </div>
</section>

@endsection

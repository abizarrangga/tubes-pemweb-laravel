<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>@yield('title','Dapur Seni Biru')</title>

<script src="https://cdn.tailwindcss.com"></script>

<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
      rel="stylesheet">

<link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

<link rel="stylesheet"
      href="{{ asset('assets/css/frontend/main.css') }}">

<link rel="stylesheet"
      href="{{ asset('assets/css/frontend/pages.css') }}">

</head>

<body class="bg-gray-50">

<<<<<<< HEAD
            <div class="hidden md:flex items-center gap-x-6 text-xs font-medium text-gray-300">
                <a href="{{ url('/') }}"
                   class="{{ request()->is('/') ? 'text-white border-b border-pink-400 pb-0.5' : 'hover:text-white' }} transition-colors">
                    Beranda
                </a>
                <a href="{{ url('/tentang') }}"
                   class="{{ request()->is('tentang') ? 'text-white border-b border-pink-400 pb-0.5' : 'hover:text-white' }} transition-colors">
                    Tentang
                </a>
                <a href="{{ url('/event') }}"
                   class="{{ request()->is('event') ? 'text-white border-b border-pink-400 pb-0.5' : 'hover:text-white' }} transition-colors">
                    Event
                </a>
                <a href="{{ url('/berita') }}"
                   class="{{ request()->is('berita') ? 'text-white border-b border-pink-400 pb-0.5' : 'hover:text-white' }} transition-colors">
                    Berita
                </a>
                <a href="{{ url('/kontak') }}"
                   class="{{ request()->is('kontak') ? 'text-white border-b border-pink-400 pb-0.5' : 'hover:text-white' }} transition-colors">
                    Kontak
                </a>
            </div>
=======
<header class="bg-[#0B2545] text-white sticky top-0 z-50 shadow-lg shadow-blue-950/10">
    <nav class="container mx-auto px-6 py-4 flex items-center justify-between">
        <a href="{{ route('home') }}" class="flex items-center gap-3">
            <span class="w-10 h-10 rounded-xl bg-white text-[#0B2545] flex items-center justify-center font-black">DSB</span>
            <span class="font-bold tracking-wide">Dapur Seni Biru</span>
        </a>
>>>>>>> 4c77fbd (Udah bagus tapi belum final -dim)

        <div class="hidden md:flex items-center gap-1 text-sm">
            @php
                $menus = [
                    ['label' => 'Beranda', 'route' => 'home'],
                    ['label' => 'Tentang', 'route' => 'tentang'],
                    ['label' => 'Event', 'route' => 'event'],
                    ['label' => 'Pagelaran', 'route' => 'pagelaran'],
                    ['label' => 'Galeri', 'route' => 'galeri'],
                    ['label' => 'Berita', 'route' => 'berita'],
                    ['label' => 'Kontak', 'route' => 'kontak'],
                ];
            @endphp

            @foreach ($menus as $menu)
                <a href="{{ route($menu['route']) }}"
                   class="px-3 py-2 rounded-lg hover:bg-white/10 {{ request()->routeIs($menu['route']) ? 'bg-white/15 text-pink-200' : 'text-gray-200' }}">
                    {{ $menu['label'] }}
                </a>
            @endforeach

            <a href="{{ route('login') }}" class="ml-2 px-4 py-2 rounded-lg bg-pink-400 text-[#0B2545] font-semibold hover:bg-pink-300">
                Login
            </a>
        </div>

        <a href="{{ route('login') }}" class="md:hidden text-sm px-4 py-2 rounded-lg bg-pink-400 text-[#0B2545] font-semibold">
            Login
        </a>
    </nav>
</header>

@yield('content')

<footer class="bg-[#071a33] text-gray-300">
    <div class="container mx-auto px-6 py-10 grid grid-cols-1 md:grid-cols-3 gap-8 text-sm">
        <div>
            <h3 class="text-white font-bold mb-3">Dapur Seni Biru</h3>
            <p class="leading-relaxed">Portal kegiatan seni, pagelaran, galeri, dan berita mahasiswa UPI Kampus Cibiru.</p>
        </div>
        <div>
            <h3 class="text-white font-bold mb-3">Menu</h3>
            <div class="grid grid-cols-2 gap-2">
                <a href="{{ route('event') }}" class="hover:text-pink-300">Event</a>
                <a href="{{ route('pagelaran') }}" class="hover:text-pink-300">Pagelaran</a>
                <a href="{{ route('galeri') }}" class="hover:text-pink-300">Galeri</a>
                <a href="{{ route('berita') }}" class="hover:text-pink-300">Berita</a>
            </div>
        </div>
        <div>
            <h3 class="text-white font-bold mb-3">Kontak</h3>
            <p>dapursenibiru@gmail.com</p>
            <p class="mt-1">UPI Kampus Cibiru, Bandung</p>
        </div>
    </div>
</footer>

</body>

</html>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dapur Seni Biru') - Portal Seni Mahasiswa UPI Cibiru</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; }
    </style>
    @stack('styles')
</head>
<body class="bg-white text-gray-800">

    {{-- ===== NAVBAR ===== --}}
    <header class="bg-[#0B2545] text-white sticky top-0 z-50 shadow-lg">
        <nav class="container mx-auto px-6 py-4 flex items-center justify-between">
            <a href="{{ url('/') }}" class="flex items-center gap-2">
                <div class="w-8 h-8 bg-white rounded-full flex items-center justify-center text-[#0B2545] font-bold text-xs">DSB</div>
                <h1 class="text-sm font-bold tracking-wider leading-tight">DAPUR SENI BIRU</h1>
            </a>

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
                <a href="{{ url('/pagelaran') }}"
                   class="{{ request()->is('pagelaran') ? 'text-white border-b border-pink-400 pb-0.5' : 'hover:text-white' }} transition-colors">
                    Pagelaran
                </a>
                <a href="{{ url('/galeri') }}"
                   class="{{ request()->is('galeri') ? 'text-white border-b border-pink-400 pb-0.5' : 'hover:text-white' }} transition-colors">
                    Galeri
                </a>
                <a href="{{ url('/kontak') }}"
                   class="{{ request()->is('kontak') ? 'text-white border-b border-pink-400 pb-0.5' : 'hover:text-white' }} transition-colors">
                    Kontak
                </a>
            </div>

            <a href="{{ url('/login') }}" class="bg-pink-400 text-white text-xs font-semibold px-5 py-2.5 rounded-xl hover:bg-pink-500 transition-colors">
                Login
            </a>
        </nav>
    </header>

    {{-- ===== MAIN CONTENT ===== --}}
    @yield('content')

    {{-- ===== FOOTER ===== --}}
    <footer class="bg-[#0B2545] text-gray-400 text-xs mt-12">
        <div class="container mx-auto px-6 py-12 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="flex flex-col gap-4">
                <div class="flex items-center gap-2 text-white">
                    <div class="w-8 h-8 bg-white rounded-full flex items-center justify-center text-[#0B2545] font-bold text-xs">DSB</div>
                    <h1 class="font-bold tracking-wider leading-tight">DAPUR SENI BIRU</h1>
                </div>
                <p class="leading-relaxed">Dapur Seni Biru adalah wadah kreativitas, seni, dan kolaborasi mahasiswa UPI Kampus Cibiru.</p>
                <div class="flex items-center gap-4 text-gray-300 mt-2">
                    <a href="#" class="hover:text-white transition-colors"><i class="fa-brands fa-instagram text-lg"></i></a>
                    <a href="#" class="hover:text-white transition-colors"><i class="fa-brands fa-tiktok text-lg"></i></a>
                    <a href="#" class="hover:text-white transition-colors"><i class="fa-brands fa-youtube text-lg"></i></a>
                    <a href="#" class="hover:text-white transition-colors"><i class="fa-brands fa-facebook-f text-lg"></i></a>
                </div>
            </div>

            <div class="flex flex-col gap-3">
                <h3 class="font-bold text-white mb-2 tracking-wide uppercase">Menu</h3>
                <a href="{{ url('/') }}" class="hover:text-white transition-colors">Beranda</a>
                <a href="{{ url('/tentang') }}" class="hover:text-white transition-colors">Tentang</a>
                <a href="{{ url('/event') }}" class="hover:text-white transition-colors">Event</a>
                <a href="{{ url('/berita') }}" class="hover:text-white transition-colors">Berita</a>
                <a href="{{ url('/pagelaran') }}" class="hover:text-white transition-colors">Pagelaran</a>
                <a href="{{ url('/galeri') }}" class="hover:text-white transition-colors">Galeri</a>
            </div>

            <div class="flex flex-col gap-3">
                <h3 class="font-bold text-white mb-2 tracking-wide uppercase">Informasi</h3>
                <a href="{{ url('/tentang') }}" class="hover:text-white transition-colors">Struktur</a>
                <a href="{{ url('/tentang') }}" class="hover:text-white transition-colors">Divisi</a>
                <a href="{{ url('/kontak') }}" class="hover:text-white transition-colors">Bergabung</a>
                <a href="{{ url('/kontak') }}" class="hover:text-white transition-colors">FAQ</a>
            </div>

            <div class="flex flex-col gap-3">
                <h3 class="font-bold text-white mb-2 tracking-wide uppercase">Kontak Kami</h3>
                <div class="flex items-center gap-2.5">
                    <i class="fa-solid fa-envelope text-gray-500 w-4"></i>
                    dapursenibiru@gmail.com
                </div>
                <div class="flex items-center gap-2.5">
                    <i class="fa-solid fa-phone text-gray-500 w-4"></i>
                    +62 812-3456-7890
                </div>
                <div class="flex items-start gap-2.5">
                    <i class="fa-solid fa-location-dot text-gray-500 w-4 mt-1"></i>
                    <span class="flex-1 leading-relaxed">Aula UPI Cibiru, Bandung</span>
                </div>
            </div>
        </div>

        <div class="border-t border-gray-700">
            <div class="container mx-auto px-6 py-5 text-center">
                <p>&copy; 2026 Dapur Seni Biru. All rights reserved.</p>
            </div>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>

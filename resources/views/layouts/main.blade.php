<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dapur Seni Biru - Portal Seni Mahasiswa UPI Cibiru</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; }
    </style>
</head>
<body class="bg-white text-gray-800">

    <header class="bg-[#0B2545] text-white">
        <nav class="container mx-auto px-6 py-4 flex items-center justify-between">
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 bg-white rounded-full flex items-center justify-center text-[#0B2545] font-bold text-xs">DSB</div>
                <h1 class="text-sm font-bold tracking-wider leading-tight">DAPUR SENI BIRU</h1>
            </div>

            <div class="flex items-center gap-x-6 text-xs font-medium text-gray-300">
                <a href="#" class="hover:text-white transition-colors">Beranda</a>
                <a href="#" class="hover:text-white transition-colors">Tentang</a>
                <a href="#" class="hover:text-white transition-colors">Event</a>
                <a href="#" class="text-white relative pb-1 hover:text-white transition-colors">
                    Berita
                    <span class="absolute bottom-0 left-0 w-full h-0.5 bg-pink-400"></span>
                </a>
                <a href="#" class="hover:text-white transition-colors">Pagelaran</a>
                <a href="#" class="hover:text-white transition-colors">Galeri</a>
                <a href="#" class="hover:text-white transition-colors">Kontak</a>
            </div>

            <a href="/admin/dashboard" class="bg-pink-400 text-white text-xs font-semibold px-5 py-2.5 rounded-xl hover:bg-pink-500 transition-colors">
                Login
            </a>
        </nav>
    </header>

    @yield('content')

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
                <h3 class="font-bold text-white mb-2 tracking-wide uppercase">MENU</h3>
                <a href="#" class="hover:text-white transition-colors">Beranda</a>
                <a href="#" class="hover:text-white transition-colors">Tentang</a>
                <a href="#" class="hover:text-white transition-colors">Event</a>
                <a href="#" class="hover:text-white transition-colors">Berita</a>
                <a href="#" class="hover:text-white transition-colors">Pagelaran</a>
                <a href="#" class="hover:text-white transition-colors">Galeri</a>
            </div>

            <div class="flex flex-col gap-3">
                <h3 class="font-bold text-white mb-2 tracking-wide uppercase">INFORMASI</h3>
                <a href="#" class="hover:text-white transition-colors">Struktur</a>
                <a href="#" class="hover:text-white transition-colors">Divisi</a>
                <a href="#" class="hover:text-white transition-colors">Bergabung</a>
                <a href="#" class="hover:text-white transition-colors">FAQ</a>
            </div>

            <div class="flex flex-col gap-3">
                <h3 class="font-bold text-white mb-2 tracking-wide uppercase">KONTAK KAMI</h3>
                <div class="flex items-center gap-2.5">
                    <i class="fa-solid fa-envelope text-gray-500 w-4"></i>
                    dapursenibiru@gmail.com
                </div>
                <div class="flex items-center gap-2.5">
                    <i class="fa-solid fa-phone text-gray-500 w-4"></i>
                    +62 812-3456-7890
                </div>
                <div class="flex items-center gap-2.5 items-start">
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

</body>
</html>
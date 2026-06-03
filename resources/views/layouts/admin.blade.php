<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Dapur Seni Biru</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100 font-sans">

    <div class="flex h-screen overflow-hidden">
        <div class="w-64 bg-[#0B2545] text-gray-300 flex flex-col justify-between p-5 shadow-lg shrink-0">
            <div>
                <div class="flex items-center gap-3 mb-8 px-2">
                    <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center text-[#0B2545] font-bold">DSB</div>
                    <div>
                        <h1 class="text-sm font-bold text-white tracking-wider leading-tight">DAPUR</h1>
                        <p class="text-xs font-semibold tracking-wider text-gray-400">SENI BIRU</p>
                    </div>
                </div>

                <nav class="space-y-1">
                    <a href="#" class="flex items-center gap-4 px-4 py-3 bg-white/10 text-white rounded-xl font-medium transition-all">
                        <i class="fa-solid fa-house text-sm w-5"></i> Dashboard
                    </a>
                    <a href="#" class="flex items-center gap-4 px-4 py-3 hover:bg-white/5 hover:text-white rounded-xl font-medium transition-all">
                        <i class="fa-regular fa-pen-to-square text-sm w-5"></i> Berita
                    </a>
                    <a href="#" class="flex items-center gap-4 px-4 py-3 hover:bg-white/5 hover:text-white rounded-xl font-medium transition-all">
                        <i class="fa-regular fa-calendar-days text-sm w-5"></i> Event
                    </a>
                    <a href="#" class="flex items-center gap-4 px-4 py-3 hover:bg-white/5 hover:text-white rounded-xl font-medium transition-all">
                        <i class="fa-solid fa-masks-theater text-sm w-5"></i> Pagelaran
                    </a>
                    <a href="#" class="flex items-center gap-4 px-4 py-3 hover:bg-white/5 hover:text-white rounded-xl font-medium transition-all">
                        <i class="fa-regular fa-image text-sm w-5"></i> Galeri
                    </a>
                    <a href="#" class="flex items-center gap-4 px-4 py-3 hover:bg-white/5 hover:text-white rounded-xl font-medium transition-all">
                        <i class="fa-solid fa-users text-sm w-5"></i> Pengguna
                    </a>
                    <a href="#" class="flex items-center gap-4 px-4 py-3 hover:bg-white/5 hover:text-white rounded-xl font-medium transition-all">
                        <i class="fa-solid fa-gear text-sm w-5"></i> Pengaturan
                    </a>
                </nav>
            </div>

            <a href="#" class="flex items-center gap-4 px-4 py-3 hover:bg-red-500/20 hover:text-red-400 rounded-xl font-medium transition-all mb-4">
                <i class="fa-solid fa-arrow-right-from-bracket text-sm w-5"></i> Logout
            </a>
        </div>

        <div class="flex-1 flex flex-col overflow-y-auto">
            <header class="flex justify-between items-center px-8 py-5 bg-transparent">
                <h2 class="text-2xl font-bold text-gray-800">Dashboard</h2>
                <div class="flex items-center gap-3">
                    <span class="text-sm font-semibold text-gray-700">Admin DSB</span>
                    <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=100&h=100&fit=crop&crop=faces" alt="Admin Profile" class="w-8 h-8 rounded-full object-cover ring-2 ring-gray-200">
                </div>
            </header>

            <main class="p-8 pt-0">
                @yield('content')
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @stack('scripts')
</body>
</html>
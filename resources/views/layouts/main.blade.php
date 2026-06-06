<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Dapur Seni Biru')</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Poppins:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/frontend/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/frontend/pages.css') }}">
</head>

<body>
    <header class="site-header">
        <nav class="site-nav">
            <a href="{{ route('home') }}" class="brand-link" aria-label="Dapur Seni Biru home">
                <span class="brand-mark">DSB</span>
                <span class="brand-name">Dapur Seni Biru</span>
            </a>

            <div class="desktop-menu">
                @php
                    $menus = [
                        ['label' => 'Home',   'route' => 'home'],
                        ['label' => 'About',  'route' => 'about'],
                        ['label' => 'Events', 'route' => 'events'],
                        ['label' => 'News',   'route' => 'news'],
                    ];
                @endphp

                @foreach ($menus as $menu)
                    <a href="{{ route($menu['route']) }}" class="nav-link {{ request()->routeIs($menu['route']) ? 'active' : '' }}">
                        {{ $menu['label'] }}
                    </a>
                @endforeach

                {{-- Tampilkan link Dashboard hanya kalau sudah login sebagai admin --}}
                @if (Auth::check() && Auth::user()->isAdmin())
                    <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        Dashboard
                    </a>
                @endif

                {{-- Tampilkan Login atau Logout sesuai status autentikasi --}}
                @if (Auth::check())
                    <form action="{{ route('logout') }}" method="POST" style="display:inline">
                        @csrf
                        <button type="submit" class="login-link">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="login-link">Login</a>
                @endif
            </div>

            <div class="mobile-menu">
                <a href="{{ route('events') }}" class="nav-link">Events</a>

                @if (Auth::check() && Auth::user()->isAdmin())
                    <a href="{{ route('admin.dashboard') }}" class="nav-link">Dashboard</a>
                @endif

                @if (Auth::check())
                    <form action="{{ route('logout') }}" method="POST" style="display:inline">
                        @csrf
                        <button type="submit" class="login-link">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="login-link">Login</a>
                @endif
            </div>
        </nav>
    </header>

    <main class="page-transition">
        @yield('content')
    </main>

    <footer class="site-footer">
        <div class="footer-inner">
            <div>
                <h3>Dapur Seni Biru</h3>
                <p>Portal kegiatan seni, event, dokumentasi, dan berita mahasiswa UPI Kampus Cibiru.</p>
            </div>
            <div>
                <h3>Menu</h3>
                <div class="footer-links">
                    <a href="{{ route('home') }}">Home</a>
                    <a href="{{ route('about') }}">About</a>
                    <a href="{{ route('events') }}">Events</a>
                    <a href="{{ route('news') }}">News</a>
                </div>
            </div>
            <div>
                <h3>Contact</h3>
                <p>dapursenibiru@gmail.com</p>
                <p>UPI Kampus Cibiru, Bandung</p>
            </div>
        </div>
    </footer>
</body>

</html>

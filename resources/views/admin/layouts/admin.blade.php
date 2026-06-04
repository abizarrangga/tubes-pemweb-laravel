<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Admin Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet">

<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
      rel="stylesheet">

<link rel="stylesheet"
      href="{{ asset('assets/css/admin/layout.css') }}">

      <script src="https://cdn.tailwindcss.com"></script>
      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

@stack('styles')

</head>

<body>

<div class="admin-wrapper">

    <aside class="sidebar">

        <div class="logo-section">

            <div class="admin-logo">DSB</div>

            <div>

                <h6>DAPUR</h6>
                <h6>SENI BIRU</h6>

            </div>

        </div>

        <ul class="nav flex-column mt-4">

            <li class="nav-item">

                <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
                   href="{{ route('admin.dashboard') }}">

                    <i class="bi bi-grid"></i>

                    Dashboard

                </a>

            </li>

            <li class="nav-item">

                <a class="nav-link {{ request()->routeIs('admin.about') ? 'active' : '' }}"
                   href="{{ route('admin.about') }}">

                    <i class="bi bi-info-circle"></i>

                    Tentang Kami

                </a>

            </li>

            <li class="nav-item">

                <a class="nav-link {{ request()->routeIs('admin.event.*') ? 'active' : '' }}"
                   href="{{ route('admin.event.index') }}">

                    <i class="bi bi-calendar-event"></i>

                    Event

                </a>

            </li>

            <li class="nav-item">

                <a class="nav-link {{ request()->routeIs('admin.berita.*') ? 'active' : '' }}"
                   href="{{ route('admin.berita.index') }}">

                    <i class="bi bi-newspaper"></i>

                    Berita

                </a>

            </li>

        </ul>

    </aside>

    <main class="main-content">

        @yield('content')

    </main>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')

</body>
</html>

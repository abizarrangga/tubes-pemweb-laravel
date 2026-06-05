<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes - Portal Dapur Seni Biru (Portal Dapus)
|--------------------------------------------------------------------------
*/

// ==========================================
// 1. HALAMAN PUBLIK / MAHASISWA (TAILWIND)
// ==========================================
Route::view('/', 'pages.home')->name('home');
Route::view('/tentang', 'pages.about')->name('about');
Route::view('/tiket', 'pages.tickets')->name('tickets');

// Halaman Event (Sisi Mahasiswa) - Disesuaikan dengan panggillan route('events')
// Halaman Event (Sisi Mahasiswa) - Arahkan ke folder pages
Route::get('/event', function () { return view('pages.events'); })->name('events');
Route::get('/event/detail', function () { return view('events.details'); })->name('events.details');

// Halaman Berita (Sisi Mahasiswa) - Disesuaikan dengan panggilan route('news')
Route::get('/berita', function () { return view('news.index'); })->name('news');
Route::get('/berita/detail/{slug}', function ($slug) { return view('news.show', compact('slug')); })->name('news.show');

// Rute Pengiriman Form Kontak & Tiket
Route::post('/contact-store', function () { return back()->with('success', 'Pesan/Pemesanan berhasil terkirim ke panitia!'); })->name('contact.store');


// ==========================================
// 2. HALAMAN AUTENTIKASI MAHASISWA
// ==========================================
Route::view('/login', 'auth.login')->name('login');
Route::post('/login', function () { 
    // Simulasi jika berhasil login, buat session admin aktif dan lempar ke dashboard admin
    session(['is_admin' => true]);
    return redirect()->route('admin.dashboard'); 
})->name('login.store');

Route::view('/register', 'auth.register')->name('register');
Route::post('/register', function () { 
    return redirect()->route('login')->with('success', 'Akun berhasil dibuat! Silakan masuk.'); 
})->name('register.store');

Route::post('/logout', function () {
    session()->forget('is_admin');
    return redirect()->route('home');
})->name('logout');

// ==========================================
// 3. HALAMAN BACKEND / ADMIN (BOOTSTRAP)
// ==========================================
Route::prefix('admin')->name('admin.')->group(function () {
    
    // Dashboard Utama Admin
    Route::view('/dashboard', 'admin.dashboard')->name('dashboard');

    // CRUD Kelola Profil / About Organisasi
    Route::get('/about', function () { return view('admin.about.index'); })->name('about');

    // CRUD Kelola Berita Admin
Route::get('/berita', function () { return view('admin.berita.index'); })->name('berita.index');
Route::get('/berita/create', function () { return view('admin.berita.create'); })->name('berita.create');
Route::get('/berita/{id}/edit', function ($id) { return view('admin.berita.edit', compact('id')); })->name('berita.edit');
// ⬇️ UBAH BARIS INI (Ganti back() jadi redirect)
Route::post('/berita', function () { return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil disimpan!'); })->name('berita.store');
Route::put('/berita/{id}', function ($id) { return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diperbarui!'); })->name('berita.update');
Route::delete('/berita/{id}', function ($id) { return back()->with('success', 'Berita berhasil dihapus!'); })->name('berita.destroy');

// CRUD Kelola Event Admin
Route::get('/event', function () { return view('admin.event.index'); })->name('event.index');
Route::get('/event/create', function () { return view('admin.event.create'); })->name('event.create');
Route::get('/event/{id}/edit', function ($id) { return view('admin.event.edit', compact('id')); })->name('event.edit');
// ⬇️ UBAH BARIS INI (Ganti back() jadi redirect)
Route::post('/event', function () { return redirect()->route('admin.event.index')->with('success', 'Event berhasil disimpan!'); })->name('event.store');
Route::put('/event/{id}', function ($id) { return redirect()->route('admin.event.index')->with('success', 'Event berhasil diperbarui!'); })->name('event.update');
Route::delete('/event/{id}', function ($id) { return back()->with('success', 'Event berhasil dihapus!'); })->name('event.destroy');
});
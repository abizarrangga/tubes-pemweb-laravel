<?php

use Illuminate\Support\Facades\Route;

// --- Halaman Publik ---
Route::get('/', function () { return view('pages.home'); })->name('home');
Route::get('/tentang', function () { return view('pages.about'); })->name('tentang');
Route::get('/event', function () { return view('pages.events'); })->name('event');
Route::get('/berita', function () { return view('news.index'); })->name('berita');
Route::get('/pagelaran', function () { return view('pages.pagelaran'); })->name('pagelaran');
Route::get('/galeri', function () { return view('pages.gallery'); })->name('galeri');
Route::get('/kontak', function () { return view('pages.contact'); })->name('kontak');
Route::get('/tiket', function () { return view('pages.tiket'); })->name('tiket');

// --- Auth ---
Route::get('/login', function () { return view('auth.login'); })->name('login');
Route::get('/register', function () { return view('auth.register'); })->name('register');

// --- Admin ---
Route::get('/admin/dashboard', function () { return view('admin.dashboard'); })->name('admin.dashboard');
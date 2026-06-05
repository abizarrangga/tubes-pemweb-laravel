<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\EventController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| FRONTEND
|--------------------------------------------------------------------------
*/

Route::view('/', 'pages.home')->name('home');
Route::view('/about', 'pages.about')->name('about');
Route::view('/events', 'pages.events')->name('events');
Route::view('/tickets', 'pages.tickets')->name('tickets');
Route::view('/news', 'news.index')->name('news');
Route::view('/news/{slug}', 'news.show')->name('news.show');
Route::get('/contact', fn () => redirect('/about#contact'))->name('contact');
Route::post('/contact', fn () => redirect('/about#contact')->with('success', 'Pesan berhasil dikirim.'))->name('contact.store');

Route::redirect('/tentang', '/about');
Route::redirect('/event', '/events');
Route::redirect('/berita', '/news');
Route::redirect('/kontak', '/about#contact');
Route::redirect('/galeri', '/news');
Route::redirect('/pagelaran', '/events');
Route::redirect('/tiket', '/tickets');

Route::view('/events/detail', 'events.details')->name('events.detail');

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/

Route::view('/login', 'auth.login')->name('login');
Route::post('/login', function (Request $request) {
    $request->session()->put('is_admin', true);

    return redirect()->route('admin.dashboard');
})->name('login.store');
Route::view('/register', 'auth.register')->name('register');
Route::post('/register', fn () => redirect()->route('login')->with('success', 'Registrasi berhasil. Silakan login.'))->name('register.store');

/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/

Route::prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::view('/dashboard', 'admin.dashboard')->name('dashboard');
        Route::redirect('/', '/admin/dashboard');
        Route::get('/about', [AboutController::class, 'index'])->name('about');
        Route::resource('event', EventController::class);
        Route::resource('berita', BeritaController::class);
    });

<?php

use Illuminate\Support\Facades\Route;

<<<<<<< HEAD
/*
|--------------------------------------------------------------------------
| FRONTEND
|--------------------------------------------------------------------------
*/

Route::view('/', 'pages.home')->name('home');

Route::view('/tentang', 'pages.about')->name('about');

Route::view('/event', 'pages.events')->name('event');

Route::view('/kontak', 'pages.contact')->name('contact');

Route::view('/tiket', 'pages.tiket')->name('tiket');


/*
|--------------------------------------------------------------------------
| EVENTS
|--------------------------------------------------------------------------
*/

Route::view('/events', 'events.index')
    ->name('events.index');

Route::view('/events/detail', 'events.details')
    ->name('events.detail');


/*
|--------------------------------------------------------------------------
| NEWS
|--------------------------------------------------------------------------
*/

Route::view('/berita', 'news.index')
    ->name('news.index');


=======
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\BeritaController;

/*
|--------------------------------------------------------------------------
| FRONTEND
|--------------------------------------------------------------------------
*/

Route::view('/', 'pages.home')->name('home');

Route::view('/tentang', 'pages.about')->name('tentang');

Route::view('/event', 'pages.events')->name('event');

Route::view('/berita', 'news.index')->name('berita');

Route::view('/galeri', 'pages.gallery')->name('galeri');

Route::view('/pagelaran', 'pages.pagelaran')->name('pagelaran');

Route::view('/kontak', 'pages.contact')->name('kontak');
Route::post('/kontak', fn () => redirect()->route('kontak')->with('success', 'Pesan berhasil dikirim.'))->name('kontak.store');

Route::view('/tiket', 'pages.tiket')->name('tiket');

>>>>>>> 4c77fbd (Udah bagus tapi belum final -dim)
/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/

<<<<<<< HEAD
Route::view('/login', 'auth.login')
    ->name('login');

Route::view('/register', 'auth.register')
    ->name('register');

=======
Route::view('/login', 'auth.login')->name('login');

Route::view('/register', 'auth.register')->name('register');
Route::post('/register', fn () => redirect()->route('login')->with('success', 'Registrasi berhasil. Silakan login.'))->name('register.store');
>>>>>>> 4c77fbd (Udah bagus tapi belum final -dim)

/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/

<<<<<<< HEAD
Route::prefix('admin')->group(function () {

    Route::view('/', 'admin.dashboard')
        ->name('admin.dashboard');

    Route::view('/tentang', 'admin.about.index')
        ->name('admin.about');

    Route::view('/berita', 'admin.berita.index')
        ->name('admin.berita.index');

    Route::view('/berita/create', 'admin.berita.create')
        ->name('admin.berita.create');

    Route::view('/berita/edit', 'admin.berita.edit')
        ->name('admin.berita.edit');

    Route::view('/event', 'admin.event.index')
        ->name('admin.event.index');

    Route::view('/event/create', 'admin.event.create')
        ->name('admin.event.create');

    Route::view('/event/edit', 'admin.event.edit')
        ->name('admin.event.edit');
});
=======
Route::prefix('admin')
      ->name('admin.')
      ->group(function () {

    Route::view('/dashboard',
        'admin.dashboard')
        ->name('dashboard');

    Route::get('/about',
        [AboutController::class,'index'])
        ->name('about');

    Route::resource('event',
        EventController::class);

    Route::resource('berita',
        BeritaController::class);

});
>>>>>>> 4c77fbd (Udah bagus tapi belum final -dim)

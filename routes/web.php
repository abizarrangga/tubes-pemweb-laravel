<?php

use Illuminate\Support\Facades\Route;

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


/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/

Route::view('/login', 'auth.login')
    ->name('login');

Route::view('/register', 'auth.register')
    ->name('register');


/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/

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
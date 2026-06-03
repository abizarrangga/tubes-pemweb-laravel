<?php

use Illuminate\Support\Facades\Route;

HEAD
Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
});

Route::get('/berita', function () {
    return view('news.index');
});

Route::view('/', 'pages.home');
Route::view('/tentang', 'pages.about');
Route::view('/event', 'pages.events');
Route::view('/berita', 'pages.news');
Route::view('/tiket', 'pages.tickets');
Route::view('/galeri', 'pages.gallery');
Route::view('/kontak', 'pages.contact');
Route::view('/admin', 'admin.dashboard');
3762084 (Homepage, about v1 -dim)

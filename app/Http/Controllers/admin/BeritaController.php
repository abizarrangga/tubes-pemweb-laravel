<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class BeritaController extends Controller
{
    public function index()
    {
        return view('admin.news.index');
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store()
    {
        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        return redirect()->route('admin.berita.edit', $id);
    }

    public function edit(string $id)
    {
        return view('admin.news.edit', ['id' => $id]);
    }

    public function update(string $id)
    {
        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil dihapus.');
    }
}

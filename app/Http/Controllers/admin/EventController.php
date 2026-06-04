<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class EventController extends Controller
{
    public function index()
    {
        return view('admin.event.index');
    }

    public function create()
    {
        return view('admin.event.create');
    }

    public function store()
    {
        return redirect()->route('admin.event.index')->with('success', 'Event berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        return redirect()->route('admin.event.edit', $id);
    }

    public function edit(string $id)
    {
        return view('admin.event.edit', ['id' => $id]);
    }

    public function update(string $id)
    {
        return redirect()->route('admin.event.index')->with('success', 'Event berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        return redirect()->route('admin.event.index')->with('success', 'Event berhasil dihapus.');
    }
}

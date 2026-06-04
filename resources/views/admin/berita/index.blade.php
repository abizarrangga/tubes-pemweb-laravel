@extends('layouts.admin')

@section('title', 'Kelola Berita')
@section('page-title', 'Kelola Berita')

@section('content')

<div class="bg-white rounded-2xl shadow-sm p-6">

    <div class="flex justify-between items-center mb-6">
        <h3 class="text-xl font-semibold text-gray-800">
            Daftar Berita
        </h3>

        <a href="{{ route('admin.berita.create') }}"
           class="bg-pink-500 hover:bg-pink-600 text-white px-4 py-2 rounded-xl transition">
            + Tambah Berita
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full">
            <thead>
                <tr class="border-b">
                    <th class="text-left py-3">No</th>
                    <th class="text-left py-3">Judul</th>
                    <th class="text-left py-3">Tanggal</th>
                    <th class="text-left py-3">Aksi</th>
                </tr>
            </thead>

            <tbody>
                <tr class="border-b">
                    <td class="py-3">1</td>
                    <td class="py-3">Contoh Berita</td>
                    <td class="py-3">04 Juni 2026</td>
                    <td class="py-3 space-x-2">
                        <a href="#"
                           class="bg-yellow-400 text-white px-3 py-1 rounded-lg">
                            Edit
                        </a>

                        <a href="#"
                           class="bg-red-500 text-white px-3 py-1 rounded-lg">
                            Hapus
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

</div>

@endsection
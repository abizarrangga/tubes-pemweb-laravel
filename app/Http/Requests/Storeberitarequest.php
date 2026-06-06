<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBeritaRequest extends FormRequest
{
    /**
     * Hanya admin yang boleh mengakses.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Aturan validasi untuk MENYIMPAN berita baru.
     */
    public function rules(): array
    {
        return [
            'judul'      => ['required', 'string', 'max:255'],
            'kategori'   => ['required', 'in:Kegiatan,Prestasi,Pengumuman'],
            'tanggal'    => ['required', 'date'],
            'penulis'    => ['nullable', 'string', 'max:100'],
            'status'     => ['required', 'in:Published,Draft'],
            'ringkasan'  => ['nullable', 'string', 'max:255'],
            'gambar'     => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'gambar_url' => ['nullable', 'url', 'max:500'],
            'konten'     => ['required', 'string', 'min:10'],
        ];
    }

    /**
     * Pesan error dalam Bahasa Indonesia.
     */
    public function messages(): array
    {
        return [
            'judul.required'     => 'Judul berita wajib diisi.',
            'judul.max'          => 'Judul maksimal 255 karakter.',
            'kategori.required'  => 'Kategori wajib dipilih.',
            'kategori.in'        => 'Kategori tidak valid.',
            'tanggal.required'   => 'Tanggal publikasi wajib diisi.',
            'tanggal.date'       => 'Format tanggal tidak valid.',
            'status.required'    => 'Status wajib dipilih.',
            'status.in'          => 'Status tidak valid.',
            'ringkasan.max'      => 'Ringkasan maksimal 255 karakter.',
            'gambar.image'       => 'File harus berupa gambar.',
            'gambar.mimes'       => 'Format gambar harus JPG, PNG, atau WEBP.',
            'gambar.max'         => 'Ukuran gambar maksimal 2MB.',
            'gambar_url.url'     => 'URL gambar tidak valid.',
            'konten.required'    => 'Isi berita wajib diisi.',
            'konten.min'         => 'Isi berita minimal 10 karakter.',
        ];
    }

    /**
     * Nama field yang lebih ramah untuk pesan error default.
     */
    public function attributes(): array
    {
        return [
            'judul'      => 'Judul',
            'kategori'   => 'Kategori',
            'tanggal'    => 'Tanggal',
            'penulis'    => 'Penulis',
            'status'     => 'Status',
            'ringkasan'  => 'Ringkasan',
            'gambar'     => 'Gambar',
            'gambar_url' => 'URL Gambar',
            'konten'     => 'Isi Berita',
        ];
    }
}
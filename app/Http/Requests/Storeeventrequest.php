<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEventRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'nama'       => ['required', 'string', 'max:255'],
            'kategori'   => ['required', 'in:Pagelaran,Workshop,Lomba,Festival'],
            'tanggal'    => ['required', 'date'],
            'status'     => ['required', 'in:Mendatang,Selesai'],
            'harga'      => ['nullable', 'string', 'max:50'],
            'lokasi'     => ['required', 'string', 'max:255'],
            'gambar'     => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'gambar_url' => ['nullable', 'url', 'max:500'],
            'deskripsi'  => ['nullable', 'string'],
        ];
    }

    public function messages(): array
    {
        return [
            'nama.required'      => 'Nama event wajib diisi.',
            'nama.max'           => 'Nama event maksimal 255 karakter.',
            'kategori.required'  => 'Kategori wajib dipilih.',
            'kategori.in'        => 'Kategori tidak valid.',
            'tanggal.required'   => 'Tanggal event wajib diisi.',
            'tanggal.date'       => 'Format tanggal tidak valid.',
            'status.required'    => 'Status wajib dipilih.',
            'status.in'          => 'Status tidak valid.',
            'harga.max'          => 'Harga maksimal 50 karakter.',
            'lokasi.required'    => 'Lokasi event wajib diisi.',
            'lokasi.max'         => 'Lokasi maksimal 255 karakter.',
            'gambar.image'       => 'File harus berupa gambar.',
            'gambar.mimes'       => 'Format gambar harus JPG, PNG, atau WEBP.',
            'gambar.max'         => 'Ukuran gambar maksimal 2MB.',
            'gambar_url.url'     => 'URL gambar tidak valid.',
        ];
    }

    public function attributes(): array
    {
        return [
            'nama'       => 'Nama Event',
            'kategori'   => 'Kategori',
            'tanggal'    => 'Tanggal',
            'status'     => 'Status',
            'harga'      => 'Harga',
            'lokasi'     => 'Lokasi',
            'gambar'     => 'Gambar',
            'gambar_url' => 'URL Gambar',
            'deskripsi'  => 'Deskripsi',
        ];
    }
}
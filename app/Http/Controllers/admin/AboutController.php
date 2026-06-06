<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    public function index()
    {
        $about = AboutPage::current();

        return view('admin.about.index', compact('about'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'nama_organisasi'  => ['required', 'string', 'max:100'],
            'deskripsi'        => ['required', 'string'],
            'gambar'           => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'gambar_url'       => ['nullable', 'url'],
            'visi_judul'       => ['required', 'string', 'max:150'],
            'visi_deskripsi'   => ['required', 'string'],
            'misi_judul'       => ['required', 'string', 'max:150'],
            'misi_items'       => ['required', 'string'],
            'struktur'         => ['nullable', 'array'],
            'struktur.*.name'  => ['required', 'string', 'max:100'],
            'struktur.*.role'  => ['required', 'string', 'max:100'],
            'struktur.*.img'   => ['nullable', 'string', 'max:500'],
            'struktur.*.foto'  => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'kontak_deskripsi' => ['required', 'string'],
            'kontak_email'     => ['nullable', 'email', 'max:150'],
            'kontak_lokasi'    => ['nullable', 'string', 'max:150'],
        ]);

        $about = AboutPage::current();

        if ($request->hasFile('gambar')) {
            if ($about->gambar) {
                Storage::disk('public')->delete($about->gambar);
            }

            $data['gambar'] = $request->file('gambar')->store('about', 'public');
        }

        $data['misi_items'] = $this->linesToArray($data['misi_items']);
        $data['struktur_items'] = $this->processStrukturItems($request, $about);

        unset($data['struktur']);

        $about->update($data);

        return redirect()
            ->route('admin.about')
            ->with('success', 'Profil organisasi berhasil diperbarui.');
    }

    private function linesToArray(string $value): array
    {
        return collect(preg_split('/\r\n|\r|\n/', $value))
            ->map(fn ($item) => trim($item))
            ->filter()
            ->values()
            ->all();
    }

    private function processStrukturItems(Request $request, AboutPage $about): array
    {
        $existing = collect($about->struktur_items ?? []);
        $items = [];

        foreach ($request->input('struktur', []) as $index => $item) {
            $img = $item['img'] ?? '';

            if ($request->hasFile("struktur.{$index}.foto")) {
                if ($img && ! $this->isExternalUrl($img)) {
                    Storage::disk('public')->delete($img);
                }

                $img = $request->file("struktur.{$index}.foto")->store('about/struktur', 'public');
            }

            $items[] = [
                'name' => trim($item['name']),
                'role' => trim($item['role']),
                'img'  => $img,
            ];
        }

        $newImages = collect($items)->pluck('img')->filter()->all();
        $existing->each(function ($person) use ($newImages) {
            $oldImg = $person['img'] ?? '';
            if ($oldImg && ! $this->isExternalUrl($oldImg) && ! in_array($oldImg, $newImages, true)) {
                Storage::disk('public')->delete($oldImg);
            }
        });

        return $items;
    }

    private function isExternalUrl(string $path): bool
    {
        return str_starts_with($path, 'http://') || str_starts_with($path, 'https://');
    }
}

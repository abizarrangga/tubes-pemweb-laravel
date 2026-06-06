<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Tampilkan semua berita published ke pengunjung.
     */
    public function index(Request $request)
    {
        $search = trim($request->query('q', ''));

        $berita = Berita::published()
            ->when($search !== '', function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('judul', 'like', "%{$search}%")
                        ->orWhere('ringkasan', 'like', "%{$search}%")
                        ->orWhere('kategori', 'like', "%{$search}%");
                });
            })
            ->orderByDesc('tanggal')
            ->paginate(9)
            ->withQueryString();

        return view('news.index', compact('berita', 'search'));
    }

    /**
     * Tampilkan detail satu berita berdasarkan slug.
     */
    public function show(string $slug)
    {
        $berita = Berita::where('slug', $slug)
            ->where('status', 'Published')
            ->firstOrFail();

        // 3 berita lain selain yang sedang dibuka (untuk saran/related)
        $beritaLain = Berita::published()
            ->where('id', '!=', $berita->id)
            ->orderByDesc('tanggal')
            ->take(3)
            ->get();

        return view('news.show', compact('berita', 'beritaLain'));
    }
}

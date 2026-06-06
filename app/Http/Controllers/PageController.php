<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Event;
use App\Models\AboutPage;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        $totalBerita = Berita::published()->count();
        $totalEvent = Event::count();
        $totalKonten = $totalEvent + $totalBerita;
        $eventMendatangCount = Event::where('status', 'Mendatang')->count();

        $beritaTerbaru  = Berita::published()->orderByDesc('tanggal')->take(3)->get();
        $eventMendatang = Event::mendatang()->upcoming()->take(3)->get();

        return view('pages.home', compact(
            'beritaTerbaru',
            'eventMendatang',
            'totalBerita',
            'totalEvent',
            'totalKonten',
            'eventMendatangCount',
        ));
    }

    public function about()
    {
        $about = AboutPage::current();

        return view('pages.about', compact('about'));
    }

    public function events(Request $request)
    {
        $filter = $request->query('status', 'semua');
        if (! in_array($filter, ['semua', 'mendatang', 'selesai'], true)) {
            $filter = 'semua';
        }

        $events = Event::query()
            ->when($filter === 'mendatang', fn ($q) => $q->mendatang()->upcoming())
            ->when($filter === 'selesai', fn ($q) => $q->selesai()->orderByDesc('tanggal'))
            ->when($filter === 'semua', fn ($q) => $q->orderByDesc('tanggal'))
            ->get();

        return view('pages.events', compact('events', 'filter'));
    }

    public function tickets()
    {
        $events = Event::mendatang()->upcoming()->get();

        return view('pages.tickets', compact('events'));
    }

    /**
     * Terima POST dari form tiket (pages/tickets) dan form kontak (pages/about).
     * Saat ini hanya redirect dengan flash — belum menyimpan ke DB.
     */
    public function contact(Request $request)
    {
        // Validasi minimal agar tidak crash jika field kosong
        $request->validate([
            'nama' => ['required', 'string', 'max:100'],
        ]);

        return redirect()->back()->with('success', 'Pesan kamu berhasil dikirim! Kami akan menghubungimu segera.');
    }
}

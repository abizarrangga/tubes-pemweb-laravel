<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\Event;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBerita      = Berita::count();
        $totalEvent       = Event::count();
        $beritaPublished  = Berita::where('status', 'Published')->count();
        $eventMendatang   = Event::where('status', 'Mendatang')->count();

        // 5 berita terbaru untuk ditampilkan di dashboard
        $beritaTerbaru = Berita::orderByDesc('tanggal')->take(5)->get();

        // 5 event terdekat yang mendatang
        $eventTerdekat = Event::where('status', 'Mendatang')
            ->orderBy('tanggal')
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalBerita',
            'totalEvent',
            'beritaPublished',
            'eventMendatang',
            'beritaTerbaru',
            'eventTerdekat',
        ));
    }
}

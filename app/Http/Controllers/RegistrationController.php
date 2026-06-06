<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    /**
     * Tampilkan form pendaftaran event gratis.
     */
    public function showForm($slug)
    {
        $event = Event::where('slug', $slug)->firstOrFail();

        if ($event->status !== 'Mendatang') {
            return redirect()->route('events')->with('error', 'Event ini sudah selesai.');
        }

        if (!$event->isFree()) {
            return redirect()->route('events.book', $slug);
        }

        return view('pages.register_event', compact('event'));
    }

    /**
     * Proses submit pendaftaran event gratis.
     */
    public function register(Request $request, $slug)
    {
        $event = Event::where('slug', $slug)->firstOrFail();

        if ($event->status !== 'Mendatang') {
            return redirect()->route('events')->with('error', 'Event ini sudah selesai.');
        }

        if (!$event->isFree()) {
            return redirect()->route('events.book', $slug);
        }

        $data = $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'telepon' => ['required', 'string', 'max:20'],
            'catatan' => ['nullable', 'string', 'max:1000'],
        ], [
            'nama.required' => 'Nama lengkap wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'telepon.required' => 'Nomor telepon wajib diisi.',
        ]);

        $registration = Registration::create([
            'event_id' => $event->id,
            'user_id' => Auth::id(),
            'nama' => $data['nama'],
            'email' => $data['email'],
            'telepon' => $data['telepon'],
            'catatan' => $data['catatan'],
        ]);

        return redirect()->route('events.register.success', [$event->slug, $registration->id]);
    }

    /**
     * Tampilkan halaman konfirmasi sukses pendaftaran.
     */
    public function success($slug, $id)
    {
        $event = Event::where('slug', $slug)->firstOrFail();
        $registration = Registration::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        return view('pages.register_event_success', compact('event', 'registration'));
    }
}

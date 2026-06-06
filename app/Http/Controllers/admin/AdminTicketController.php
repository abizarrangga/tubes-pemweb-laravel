<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Registration;
use App\Models\Ticket;
use App\Models\TicketCode;
use Illuminate\Http\Request;

class AdminTicketController extends Controller
{
    /**
     * Tampilkan daftar event gratis yang memiliki registrasi.
     */
    public function indexRegistrations()
    {
        $events = Event::all()->filter(fn($event) => $event->isFree());

        return view('admin.registrations.index', compact('events'));
    }

    /**
     * Tampilkan daftar pendaftar untuk event gratis tertentu.
     */
    public function showRegistrations($id)
    {
        $event = Event::findOrFail($id);
        $registrations = $event->registrations()->orderByDesc('created_at')->get();

        return view('admin.registrations.show', compact('event', 'registrations'));
    }

    /**
     * Hapus data registrasi pendaftar event gratis.
     */
    public function destroyRegistration($id)
    {
        $registration = Registration::findOrFail($id);
        $registration->delete();

        return back()->with('success', 'Data registrasi berhasil dihapus.');
    }

    /**
     * Hapus data pemesanan tiket (event berbayar).
     */
    public function destroyTicket($id)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->delete();

        return back()->with('success', 'Pemesanan tiket berhasil dihapus.');
    }

    /**
     * Tampilkan daftar event berbayar yang memiliki pemesanan tiket.
     */
    public function indexTickets()
    {
        $events = Event::all()->filter(fn($event) => !$event->isFree());

        return view('admin.tickets.index', compact('events'));
    }

    /**
     * Tampilkan daftar pemesanan tiket untuk event berbayar tertentu.
     */
    public function showTickets($id)
    {
        $event = Event::findOrFail($id);
        $tickets = $event->tickets()->with('ticketCodes')->orderByDesc('created_at')->get();

        return view('admin.tickets.show', compact('event', 'tickets'));
    }

    /**
     * Tampilkan halaman validasi tiket.
     */
    public function showValidateForm()
    {
        return view('admin.tickets.validate');
    }

    /**
     * Proses pengecekan kode unik tiket.
     */
    public function validateTicketCode(Request $request)
    {
        $request->validate([
            'kode' => ['required', 'string'],
        ], [
            'kode.required' => 'Kode unik tiket wajib diisi.',
        ]);

        $kode = $request->input('kode');
        $ticketCode = TicketCode::with(['ticket.event', 'ticket.user'])
            ->where('kode', $kode)
            ->first();

        return view('admin.tickets.validate', compact('ticketCode', 'kode'));
    }

    /**
     * Tandai kode tiket sebagai sudah dipakai (Check-in).
     */
    public function checkInTicketCode($code)
    {
        $ticketCode = TicketCode::where('kode', $code)->firstOrFail();

        if ($ticketCode->status === 'sudah_dipakai') {
            return back()->with('error', 'Tiket ini sudah digunakan sebelumnya.');
        }

        $ticketCode->update([
            'status' => 'sudah_dipakai',
            'used_at' => now(),
        ]);

        return redirect()->route('admin.tickets.validate', ['kode' => $code])
            ->with('success', 'Tiket berhasil divalidasi! Selamat datang di event.');
    }
}

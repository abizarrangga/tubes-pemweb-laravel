<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class TicketController extends Controller
{
    /**
     * Tampilkan form pemesanan tiket event berbayar.
     */
    public function showBookForm($slug)
    {
        $event = Event::where('slug', $slug)->firstOrFail();

        if ($event->status !== 'Mendatang') {
            return redirect()->route('events')->with('error', 'Event ini sudah selesai.');
        }

        if ($event->isFree()) {
            return redirect()->route('events.register', $slug);
        }

        return view('pages.book_ticket', compact('event'));
    }

    /**
     * Proses pemesanan tiket dan redirect ke Midtrans Snap.
     */
    public function book(Request $request, $slug)
    {
        $event = Event::where('slug', $slug)->firstOrFail();

        if ($event->status !== 'Mendatang') {
            return redirect()->route('events')->with('error', 'Event ini sudah selesai.');
        }

        if ($event->isFree()) {
            return redirect()->route('events.register', $slug);
        }

        $data = $request->validate([
            'nama_pemesan' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'telepon' => ['required', 'string', 'max:20'],
            'jumlah_tiket' => ['required', 'integer', 'min:1'],
        ], [
            'nama_pemesan.required' => 'Nama lengkap wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'telepon.required' => 'Nomor telepon wajib diisi.',
            'jumlah_tiket.required' => 'Jumlah tiket wajib diisi.',
            'jumlah_tiket.min' => 'Jumlah tiket minimal 1.',
        ]);

        $hargaEvent = $event->harga_numeric;
        $totalHarga = $hargaEvent * $data['jumlah_tiket'];
        $midtransOrderId = 'TKT-' . strtoupper(Str::random(10)) . '-' . time();

        $ticket = Ticket::create([
            'event_id' => $event->id,
            'user_id' => Auth::id(),
            'nama_pemesan' => $data['nama_pemesan'],
            'email' => $data['email'],
            'telepon' => $data['telepon'],
            'jumlah_tiket' => $data['jumlah_tiket'],
            'total_harga' => $totalHarga,
            'status_pembayaran' => 'pending',
            'midtrans_order_id' => $midtransOrderId,
        ]);

        // Konfigurasi Midtrans
        \Midtrans\Config::$serverKey = config('services.midtrans.server_key');
        \Midtrans\Config::$isProduction = config('services.midtrans.is_production');
        \Midtrans\Config::$isSanitized = config('services.midtrans.is_sanitized', true);
        \Midtrans\Config::$is3ds = config('services.midtrans.is_3ds', true);

        $params = [
            'transaction_details' => [
                'order_id' => $midtransOrderId,
                'gross_amount' => $totalHarga,
            ],
            'customer_details' => [
                'first_name' => $data['nama_pemesan'],
                'email' => $data['email'],
                'phone' => $data['telepon'],
            ],
            'callbacks' => [
                'finish' => route('tickets.payment.finish'),
            ],
        ];

        try {
            $paymentUrl = \Midtrans\Snap::createTransaction($params)->redirect_url;
            return redirect($paymentUrl);
        } catch (\Exception $e) {
            Log::error('Midtrans Snap Error: ' . $e->getMessage());
            // Jika gagal panggil API, hapus tiket yang pending agar database bersih
            $ticket->delete();
            return back()->with('error', 'Gagal memproses pembayaran ke Midtrans. Silakan coba lagi.');
        }
    }

    /**
     * Halaman sukses / redirect kembali dari Midtrans.
     */
    public function paymentFinish(Request $request)
    {
        $orderId = $request->query('order_id');

        if (!$orderId) {
            return redirect()->route('tickets.index')->with('error', 'Transaksi tidak ditemukan.');
        }

        $ticket = Ticket::where('midtrans_order_id', $orderId)->firstOrFail();

        // Query status langsung ke API Midtrans untuk memperbarui status lokal secara instan (berguna di localhost)
        \Midtrans\Config::$serverKey = config('services.midtrans.server_key');
        \Midtrans\Config::$isProduction = config('services.midtrans.is_production');

        try {
            $status = \Midtrans\Transaction::status($orderId);
            $transactionStatus = $status->transaction_status;
            $fraudStatus = $status->fraud_status ?? null;

            if (in_array($transactionStatus, ['settlement', 'capture'])) {
                if ($transactionStatus == 'capture' && $fraudStatus == 'challenge') {
                    $ticket->status_pembayaran = 'pending';
                } else {
                    $ticket->status_pembayaran = 'sukses';
                    $ticket->generateCodes();
                }
            } elseif ($transactionStatus == 'pending') {
                $ticket->status_pembayaran = 'pending';
            } else {
                $ticket->status_pembayaran = 'gagal';
            }
            $ticket->save();
        } catch (\Exception $e) {
            Log::warning('Gagal memeriksa status langsung ke Midtrans: ' . $e->getMessage());
        }

        return redirect()->route('tickets.book.success', $ticket->id);
    }

    /**
     * Halaman sukses setelah pemesanan tiket berhasil (menampilkan kode unik).
     */
    public function bookSuccess($id)
    {
        $ticket = Ticket::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        return view('pages.book_ticket_success', compact('ticket'));
    }

    /**
     * Webhook callback untuk menerima notifikasi pembayaran dari Midtrans.
     */
    public function callback(Request $request)
    {
        \Midtrans\Config::$serverKey = config('services.midtrans.server_key');
        \Midtrans\Config::$isProduction = config('services.midtrans.is_production');

        try {
            $notif = new \Midtrans\Notification();
            $orderId = $notif->order_id;
            $transactionStatus = $notif->transaction_status;
            $fraudStatus = $notif->fraud_status ?? null;

            $ticket = Ticket::where('midtrans_order_id', $orderId)->first();

            if ($ticket) {
                if (in_array($transactionStatus, ['settlement', 'capture'])) {
                    if ($transactionStatus == 'capture' && $fraudStatus == 'challenge') {
                        $ticket->status_pembayaran = 'pending';
                    } else {
                        $ticket->status_pembayaran = 'sukses';
                        $ticket->generateCodes();
                    }
                } elseif ($transactionStatus == 'pending') {
                    $ticket->status_pembayaran = 'pending';
                } else {
                    $ticket->status_pembayaran = 'gagal';
                }
                $ticket->save();
            }

            return response()->json(['message' => 'Callback processed successfully']);
        } catch (\Exception $e) {
            Log::error('Midtrans Webhook Error: ' . $e->getMessage());
            return response()->json(['message' => 'Error processing callback', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Dashboard riwayat pendaftaran event & tiket milik user.
     * Menggantikan halaman /tickets lama.
     */
    public function userTickets()
    {
        $user = Auth::user();
        $registrations = $user->registrations()->with('event')->orderByDesc('created_at')->get();
        $tickets = $user->tickets()->with(['event', 'ticketCodes'])->orderByDesc('created_at')->get();

        return view('pages.user_tickets', compact('registrations', 'tickets'));
    }
}

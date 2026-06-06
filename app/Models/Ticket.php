<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'user_id',
        'nama_pemesan',
        'email',
        'telepon',
        'jumlah_tiket',
        'total_harga',
        'status_pembayaran',
        'midtrans_order_id',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ticketCodes()
    {
        return $this->hasMany(TicketCode::class);
    }

    /**
     * Generate unique codes for the ticket.
     * Idempotent method.
     */
    public function generateCodes(): void
    {
        $existingCount = $this->ticketCodes()->count();
        if ($existingCount >= $this->jumlah_tiket) {
            return;
        }

        $needed = $this->jumlah_tiket - $existingCount;
        for ($i = 0; $i < $needed; $i++) {
            do {
                $code = strtolower(Str::random(4)) . '-' . strtolower(Str::random(4));
            } while (TicketCode::where('kode', $code)->exists());

            $this->ticketCodes()->create([
                'kode' => $code,
                'status' => 'belum_dipakai',
            ]);
        }
    }
}

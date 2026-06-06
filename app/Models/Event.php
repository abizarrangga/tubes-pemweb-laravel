<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'kategori',
        'tanggal',
        'status',
        'harga',
        'lokasi',
        'gambar',
        'gambar_url',
        'deskripsi',
        'slug',
        'user_id',
    ];

    protected function casts(): array
    {
        return [
            'tanggal' => 'date',
        ];
    }

    // ── Auto-generate slug saat create/update ───────────

    protected static function booted(): void
    {
        static::creating(function (Event $event) {
            if (empty($event->slug)) {
                $event->slug = Str::slug($event->nama);
            }
        });

        static::updating(function (Event $event) {
            if ($event->isDirty('nama') && empty($event->slug)) {
                $event->slug = Str::slug($event->nama);
            }
        });
    }

    // ── Relasi ──────────────────────────────────────────

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    // ── Scopes ──────────────────────────────────────────

    // Ambil event yang akan datang
    public function scopeMendatang($query)
    {
        return $query->where('status', 'Mendatang');
    }

    public function scopeSelesai($query)
    {
        return $query->where('status', 'Selesai');
    }

    // Urutkan dari tanggal paling dekat
    public function scopeUpcoming($query)
    {
        return $query->orderBy('tanggal');
    }

    // ── Helper ──────────────────────────────────────────

    // Kembalikan URL gambar yang tersedia (lokal lebih prioritas)
    public function getGambarFinalAttribute(): string
    {
        if ($this->gambar) {
            return asset('storage/' . $this->gambar);
        }
        return $this->gambar_url ?? asset('images/placeholder.jpg');
    }

    public function isMendatang(): bool
    {
        return $this->status === 'Mendatang';
    }

    public function getHargaNumericAttribute(): int
    {
        if (empty($this->harga) || strtolower($this->harga) === 'gratis') {
            return 0;
        }
        $hargaStr = $this->harga;
        if (str_ends_with($hargaStr, ',00')) {
            $hargaStr = substr($hargaStr, 0, -3);
        }
        $digits = preg_replace('/[^0-9]/', '', $hargaStr);
        return empty($digits) ? 0 : (int)$digits;
    }

    /**
     * Mutator untuk format harga sebelum disimpan ke DB.
     */
    public function setHargaAttribute($value)
    {
        if (empty($value) || strtolower($value) === 'gratis' || $value === '0') {
            $this->attributes['harga'] = 'Gratis';
        } else {
            $digits = preg_replace('/[^0-9]/', '', $value);
            // Jika input berakhir dengan "00" karena desimal (,00) yang ikut terkirim
            if (str_ends_with($value, ',00') && strlen($digits) > 2) {
                $digits = substr($digits, 0, -2);
            }
            if (empty($digits) || (int)$digits === 0) {
                $this->attributes['harga'] = 'Gratis';
            } else {
                $this->attributes['harga'] = 'Rp ' . number_format((int)$digits, 0, ',', '.') . ',00';
            }
        }
    }

    public function isFree(): bool
    {
        return $this->harga_numeric === 0;
    }
}
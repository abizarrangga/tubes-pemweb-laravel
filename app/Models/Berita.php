<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Berita extends Model
{
    use HasFactory;

    // Nama tabel eksplisit (Laravel default-nya "beritas", kita pakai "berita")
    protected $table = 'berita';

    protected $fillable = [
        'judul',
        'kategori',
        'tanggal',
        'penulis',
        'status',
        'ringkasan',
        'gambar',
        'gambar_url',
        'konten',
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
        static::creating(function (Berita $berita) {
            if (empty($berita->slug)) {
                $berita->slug = Str::slug($berita->judul);
            }
        });

        static::updating(function (Berita $berita) {
            if ($berita->isDirty('judul') && empty($berita->slug)) {
                $berita->slug = Str::slug($berita->judul);
            }
        });
    }

    // ── Relasi ──────────────────────────────────────────

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // ── Scopes ──────────────────────────────────────────

    // Ambil hanya berita yang sudah published
    public function scopePublished($query)
    {
        return $query->where('status', 'Published');
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

    public function isPublished(): bool
    {
        return $this->status === 'Published';
    }
}

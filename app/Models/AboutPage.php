<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutPage extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_organisasi',
        'deskripsi',
        'gambar',
        'gambar_url',
        'visi_judul',
        'visi_deskripsi',
        'misi_judul',
        'misi_items',
        'struktur_items',
        'kontak_deskripsi',
        'kontak_email',
        'kontak_lokasi',
    ];

    protected function casts(): array
    {
        return [
            'misi_items' => 'array',
            'struktur_items' => 'array',
        ];
    }

    public static function defaultData(): array
    {
        return [
            'nama_organisasi' => 'Dapur Seni Biru',
            'deskripsi' => 'Dapur Seni Biru adalah wadah bagi mahasiswa untuk berkarya, berkolaborasi, dan mengembangkan diri di bidang seni dan kreativitas.',
            'gambar_url' => 'https://images.unsplash.com/photo-1529156069898-49953e39b3ac?w=900&h=650&fit=crop',
            'visi_judul' => 'Ruang seni yang inspiratif',
            'visi_deskripsi' => 'Menjadi organisasi seni yang kreatif, inovatif, dan inspiratif bagi mahasiswa serta masyarakat.',
            'misi_judul' => 'Berkarya dan berkolaborasi',
            'misi_items' => [
                'Mengembangkan potensi seni mahasiswa.',
                'Menciptakan karya berkualitas dan relevan.',
                'Membangun kolaborasi positif melalui seni.',
                'Memberikan kontribusi untuk lingkungan kampus.',
            ],
            'struktur_items' => [
                ['name' => 'Aisha Putri', 'role' => 'Ketua Umum', 'img' => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=360&h=420&fit=crop'],
                ['name' => 'Ricky Maulana', 'role' => 'Wakil Ketua', 'img' => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=360&h=420&fit=crop'],
                ['name' => 'Siti Aulia', 'role' => 'Sekretaris', 'img' => 'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=360&h=420&fit=crop'],
                ['name' => 'Fahmi Alfarizi', 'role' => 'Bendahara', 'img' => 'https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?w=360&h=420&fit=crop'],
                ['name' => 'Dewi Lestari', 'role' => 'Div. Humas', 'img' => 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=360&h=420&fit=crop'],
            ],
            'kontak_deskripsi' => 'Untuk kerja sama, pemesanan tiket, atau pertanyaan seputar kegiatan Dapur Seni Biru, kirim pesan lewat form ini.',
            'kontak_email' => 'dapursenibiru@gmail.com',
            'kontak_lokasi' => 'UPI Kampus Cibiru, Bandung',
        ];
    }

    public static function current(): self
    {
        return self::firstOrCreate([], self::defaultData());
    }

    public function getGambarFinalAttribute(): string
    {
        if ($this->gambar) {
            return asset('storage/' . $this->gambar);
        }

        return $this->gambar_url ?: self::defaultData()['gambar_url'];
    }

    public static function strukturImageUrl(?string $img): string
    {
        if (! $img) {
            return 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=360&h=420&fit=crop';
        }

        if (str_starts_with($img, 'http://') || str_starts_with($img, 'https://')) {
            return $img;
        }

        return asset('storage/' . $img);
    }
}


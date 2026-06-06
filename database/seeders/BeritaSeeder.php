<?php

namespace Database\Seeders;

use App\Models\Berita;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BeritaSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'judul'      => 'Pagelaran Teater Langit Retak Sukses Memukau Ratusan Penonton',
                'kategori'   => 'Kegiatan',
                'tanggal'    => '2025-11-10',
                'penulis'    => 'Admin DSB',
                'status'     => 'Published',
                'ringkasan'  => 'Pertunjukan teater tahunan Dapur Seni Biru berhasil memukau lebih dari 400 penonton di Aula UPI Cibiru.',
                'konten'     => 'Pagelaran teater bertajuk Langit Retak yang dipentaskan oleh Dapur Seni Biru pada 10 November 2025 di Aula UPI Kampus Cibiru berjalan dengan luar biasa. Lebih dari 400 penonton hadir dan memberikan standing ovation di akhir pertunjukan.' . "\n\n" . 'Naskah yang ditulis oleh mahasiswa semester 6, Rina Halimah, mengangkat tema tentang keberanian generasi muda dalam menghadapi tekanan sosial. Sutradara Bima Pratama berhasil menghadirkan visual yang kuat dengan pencahayaan dan tata artistik yang matang.' . "\n\n" . 'Ketua Dapur Seni Biru, Farhan Rizky, menyatakan bahwa pagelaran ini merupakan buah dari latihan intensif selama tiga bulan. Ini bukan sekadar pertunjukan, ini adalah ekspresi jiwa kami, ujarnya.',
                'gambar_url' => 'https://images.unsplash.com/photo-1507676184212-d03ab07a01bf?w=800&h=500&fit=crop',
            ],
            [
                'judul'      => 'Workshop Tari Tradisional Bersama Seniman Nasional Berlangsung Meriah',
                'kategori'   => 'Kegiatan',
                'tanggal'    => '2025-10-22',
                'penulis'    => 'Admin DSB',
                'status'     => 'Published',
                'ringkasan'  => 'DSB mengadakan workshop tari bersama seniman nasional yang diikuti 60 peserta dari berbagai jurusan.',
                'konten'     => 'Dapur Seni Biru kembali menggelar kegiatan edukatif berupa Workshop Tari Tradisional pada 22 Oktober 2025. Kegiatan ini menghadirkan Ibu Sari Dewi, seniman tari nasional asal Bandung, sebagai pemateri utama.' . "\n\n" . 'Sebanyak 60 peserta dari berbagai jurusan di UPI Kampus Cibiru antusias mengikuti sesi praktek gerak dasar Tari Sunda dan Tari Jawa. Workshop berlangsung selama enam jam dan ditutup dengan sesi penampilan kelompok.' . "\n\n" . 'Peserta mendapatkan sertifikat partisipasi dan kesempatan untuk bergabung dalam tim tari DSB yang akan tampil pada acara Milad UPI.',
                'gambar_url' => 'https://images.unsplash.com/photo-1518611012118-696072aa579a?w=800&h=500&fit=crop',
            ],
            [
                'judul'      => 'Mahasiswa DSB Raih Juara 1 Lomba Musikalisasi Puisi Tingkat Provinsi',
                'kategori'   => 'Prestasi',
                'tanggal'    => '2025-10-05',
                'penulis'    => 'Admin DSB',
                'status'     => 'Published',
                'ringkasan'  => 'Tim musikalisasi puisi DSB berhasil meraih juara pertama dalam kompetisi seni budaya tingkat Jawa Barat.',
                'konten'     => 'Kebanggaan kembali diraih oleh Dapur Seni Biru. Tim musikalisasi puisi yang terdiri dari lima mahasiswa berhasil meraih Juara 1 dalam Lomba Musikalisasi Puisi Tingkat Provinsi Jawa Barat yang diselenggarakan di Gedung Kesenian Bandung, 5 Oktober 2025.' . "\n\n" . 'Tim yang diketuai oleh Ahmad Fauzi membawakan karya puisi Pulang dengan aransemen musik orisinal yang memadukan alat musik tradisional dan modern. Dewan juri menilai penampilan mereka sebagai yang paling ekspresif dan orisinal.' . "\n\n" . 'Hadiah berupa trofi, piagam, dan uang pembinaan diterima langsung oleh Dekan Fakultas. Ini adalah kemenangan kedua berturut-turut DSB di kompetisi yang sama.',
                'gambar_url' => 'https://images.unsplash.com/photo-1493225457124-a3eb161ffa5f?w=800&h=500&fit=crop',
            ],
            [
                'judul'      => 'Penerimaan Anggota Baru DSB 2025 Resmi Dibuka',
                'kategori'   => 'Pengumuman',
                'tanggal'    => '2025-09-15',
                'penulis'    => 'Admin DSB',
                'status'     => 'Published',
                'ringkasan'  => 'Dapur Seni Biru membuka pendaftaran anggota baru untuk tahun akademik 2025/2026. Daftar sekarang!',
                'konten'     => 'Dapur Seni Biru dengan bangga mengumumkan pembukaan penerimaan anggota baru untuk tahun akademik 2025/2026. Pendaftaran dibuka mulai 15 September hingga 30 September 2025.' . "\n\n" . 'Terdapat lima divisi yang dapat dipilih: Teater, Musik, Tari, Seni Visual, dan Dokumentasi. Setiap pendaftar wajib mengisi formulir online dan menghadiri sesi audisi pada 5 Oktober 2025.' . "\n\n" . 'Syarat pendaftaran: mahasiswa aktif UPI Kampus Cibiru, memiliki minat di bidang seni, dan siap berkomitmen mengikuti kegiatan organisasi. Informasi lebih lanjut dapat menghubungi akun Instagram resmi @dapursenibiru.',
                'gambar_url' => 'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=800&h=500&fit=crop',
            ],
            [
                'judul'      => 'Dokumentasi Festival Seni Biru Nusantara Penuh Warna dan Makna',
                'kategori'   => 'Kegiatan',
                'tanggal'    => '2025-08-28',
                'penulis'    => 'Admin DSB',
                'status'     => 'Published',
                'ringkasan'  => 'Festival tahunan DSB sukses menghadirkan lebih dari 20 penampilan seni dalam satu malam.',
                'konten'     => 'Festival Seni Biru Nusantara yang diselenggarakan oleh Dapur Seni Biru pada 28 Agustus 2025 berjalan penuh semangat dan kreativitas. Festival ini menampilkan lebih dari 20 penampilan seni dari berbagai divisi dalam satu rangkaian acara.' . "\n\n" . 'Rangkaian penampilan meliputi pertunjukan teater mini, pentas musik akustik, pameran seni visual, dan penutup berupa tari kolosal yang melibatkan 35 penari. Ribuan penonton memadati area kampus dan memberikan respons yang sangat positif.' . "\n\n" . 'Festival ini juga menjadi ajang kolaborasi dengan UKM seni dari kampus lain di Bandung Raya, memperkuat jejaring seni mahasiswa di wilayah tersebut.',
                'gambar_url' => 'https://images.unsplash.com/photo-1506157786151-b8491531f063?w=800&h=500&fit=crop',
            ],
            [
                'judul'      => 'DSB Gelar Pelatihan Penulisan Naskah untuk Anggota Baru',
                'kategori'   => 'Kegiatan',
                'tanggal'    => '2025-08-10',
                'penulis'    => 'Admin DSB',
                'status'     => 'Published',
                'ringkasan'  => 'Pelatihan penulisan naskah teater untuk anggota baru dipandu langsung oleh alumni berpengalaman.',
                'konten'     => 'Dalam rangka meningkatkan kualitas karya, Divisi Teater Dapur Seni Biru menggelar Pelatihan Penulisan Naskah pada 10 Agustus 2025. Kegiatan ini dipandu oleh alumni DSB, Wahyu Nugroho, yang kini aktif sebagai penulis naskah profesional.' . "\n\n" . 'Sebanyak 25 anggota baru mengikuti pelatihan intensif selama dua hari yang mencakup teknik dasar dramaturgi, struktur cerita, penulisan dialog, dan cara membaca naskah secara kritis.' . "\n\n" . 'Hasil pelatihan ini akan diaplikasikan langsung dalam produksi teater DSB semester genap. Tiga naskah terbaik peserta akan dipertimbangkan untuk dipentaskan pada festival akhir tahun.',
                'gambar_url' => 'https://images.unsplash.com/photo-1455390582262-044cdead277a?w=800&h=500&fit=crop',
            ],
            [
                'judul'      => 'Tim Musik DSB Tampil di Peringatan Hari Kemerdekaan Kota Bandung',
                'kategori'   => 'Kegiatan',
                'tanggal'    => '2025-08-17',
                'penulis'    => 'Admin DSB',
                'status'     => 'Published',
                'ringkasan'  => 'Grup musik DSB diundang tampil dalam acara peringatan 17 Agustus di tingkat kota Bandung.',
                'konten'     => 'Sebuah kebanggaan tersendiri bagi Dapur Seni Biru saat grup musiknya diundang untuk tampil dalam Peringatan Hari Kemerdekaan Republik Indonesia ke-80 di tingkat Kota Bandung pada 17 Agustus 2025.' . "\n\n" . 'Grup musik DSB yang beranggotakan delapan orang membawakan tiga lagu nasional dalam aransemen yang segar dan modern, mendapat sambutan meriah dari ribuan peserta upacara dan penonton.' . "\n\n" . 'Kepala Dinas Kebudayaan Kota Bandung menyampaikan apresiasi atas kontribusi mahasiswa dalam pelestarian budaya dan semangat kebangsaan melalui media seni.',
                'gambar_url' => 'https://images.unsplash.com/photo-1511671782779-c97d3d27a1d4?w=800&h=500&fit=crop',
            ],
            [
                'judul'      => 'DSB Raih Penghargaan UKM Terbaik UPI Kampus Cibiru 2025',
                'kategori'   => 'Prestasi',
                'tanggal'    => '2025-07-20',
                'penulis'    => 'Admin DSB',
                'status'     => 'Published',
                'ringkasan'  => 'Atas prestasi dan kontribusinya, DSB dinobatkan sebagai UKM Terbaik dalam ajang penghargaan tahunan kampus.',
                'konten'     => 'Dapur Seni Biru menorehkan pencapaian membanggakan dengan meraih penghargaan UKM Terbaik UPI Kampus Cibiru 2025 dalam acara Malam Apresiasi Mahasiswa yang digelar pada 20 Juli 2025.' . "\n\n" . 'Penghargaan ini diberikan berdasarkan penilaian atas keaktifan organisasi, jumlah kegiatan yang dilaksanakan, prestasi yang diraih, serta dampak positif bagi civitas akademika.' . "\n\n" . 'Sepanjang tahun 2024-2025, DSB telah menyelenggarakan lebih dari 15 kegiatan, meraih 4 penghargaan di tingkat regional, dan membina lebih dari 80 anggota aktif. Piala diterima langsung oleh Ketua DSB, Farhan Rizky.',
                'gambar_url' => 'https://images.unsplash.com/photo-1567427017947-545c5f8d16ad?w=800&h=500&fit=crop',
            ],
            [
                'judul'      => 'Kolaborasi Perdana DSB dengan Komunitas Seni Luar Kampus',
                'kategori'   => 'Kegiatan',
                'tanggal'    => '2025-07-05',
                'penulis'    => 'Admin DSB',
                'status'     => 'Published',
                'ringkasan'  => 'DSB berkolaborasi dengan komunitas seni eksternal dalam proyek seni instalasi di ruang publik Kota Bandung.',
                'konten'     => 'Dapur Seni Biru untuk pertama kalinya berkolaborasi dengan komunitas seni eksternal kampus, yaitu Kolektif Seni Rupa Bandung, dalam sebuah proyek seni instalasi bertajuk Ruang Imaji yang dipamerkan di kawasan Braga, Bandung, pada 5-7 Juli 2025.' . "\n\n" . 'Proyek ini melibatkan 12 mahasiswa DSB dari divisi seni visual yang bekerja selama dua minggu untuk menciptakan instalasi interaktif berbahan daur ulang. Karya mereka menarik perhatian media lokal dan ratusan pengunjung.' . "\n\n" . 'Kolaborasi ini menjadi titik awal yang menjanjikan bagi DSB untuk memperluas jaringan dan dampak karya seni mereka ke masyarakat yang lebih luas.',
                'gambar_url' => 'https://images.unsplash.com/photo-1460661419201-fd4cecdf8a8b?w=800&h=500&fit=crop',
            ],
            [
                'judul'      => 'Jadwal Latihan Rutin DSB Semester Genap 2025 Telah Ditetapkan',
                'kategori'   => 'Pengumuman',
                'tanggal'    => '2025-02-01',
                'penulis'    => 'Admin DSB',
                'status'     => 'Published',
                'ringkasan'  => 'Jadwal latihan semua divisi untuk semester genap 2025 telah resmi ditetapkan. Catat tanggalnya!',
                'konten'     => 'Pengurus Dapur Seni Biru telah menetapkan jadwal latihan rutin untuk seluruh divisi pada Semester Genap 2025. Berikut ringkasan jadwal:' . "\n\n" . '- Divisi Teater: Senin dan Rabu, 15.00-17.30 WIB, Ruang Serbaguna Lt. 2' . "\n" . '- Divisi Musik: Selasa dan Kamis, 16.00-18.00 WIB, Ruang Musik' . "\n" . '- Divisi Tari: Rabu dan Jumat, 14.00-16.30 WIB, Aula Lantai 1' . "\n" . '- Divisi Seni Visual: Sabtu, 09.00-12.00 WIB, Ruang Studio' . "\n" . '- Divisi Dokumentasi: Fleksibel, koordinasi dengan ketua divisi' . "\n\n" . 'Seluruh anggota aktif diwajibkan hadir minimal 80% dari total latihan. Ketidakhadiran tanpa keterangan lebih dari tiga kali akan ditindaklanjuti sesuai tata tertib organisasi.',
                'gambar_url' => 'https://images.unsplash.com/photo-1484480974693-6ca0a78fb36b?w=800&h=500&fit=crop',
            ],
            [
                'judul'      => 'Anggota DSB Ikuti Program Pertukaran Budaya ke Yogyakarta',
                'kategori'   => 'Kegiatan',
                'tanggal'    => '2025-06-14',
                'penulis'    => 'Admin DSB',
                'status'     => 'Published',
                'ringkasan'  => 'Enam anggota terpilih DSB mengikuti program pertukaran budaya selama tiga hari di Yogyakarta.',
                'konten'     => 'Enam anggota terpilih Dapur Seni Biru berkesempatan mengikuti Program Pertukaran Budaya ke Yogyakarta selama tiga hari, 14-16 Juni 2025. Program ini difasilitasi oleh Kemendikbudristek dalam rangka memperkuat pemahaman seni budaya nusantara di kalangan mahasiswa.' . "\n\n" . 'Selama di Yogyakarta, para peserta mengunjungi Keraton Yogyakarta, mengikuti kelas batik di sentra pengrajin Prawirotaman, dan berdiskusi langsung dengan dalang senior di Pusat Kebudayaan Jawa. Mereka juga berkesempatan menonton pertunjukan Wayang Kulit semalam suntuk.' . "\n\n" . 'Pengalaman ini diharapkan dapat memperkaya referensi artistik anggota DSB dan menginspirasi karya-karya berikutnya yang berakar pada budaya lokal.',
                'gambar_url' => 'https://images.unsplash.com/photo-1508700115892-45ecd05ae2ad?w=800&h=500&fit=crop',
            ],
            [
                'judul'      => 'Rapat Kerja Tahunan DSB 2025 Menyusun Program Unggulan',
                'kategori'   => 'Kegiatan',
                'tanggal'    => '2025-01-18',
                'penulis'    => 'Admin DSB',
                'status'     => 'Draft',
                'ringkasan'  => 'Rapat kerja tahunan menetapkan 12 program prioritas DSB untuk tahun 2025.',
                'konten'     => 'Dapur Seni Biru menggelar Rapat Kerja Tahunan pada 18 Januari 2025 yang dihadiri oleh seluruh pengurus inti dan ketua-ketua divisi. Rapat berlangsung selama delapan jam dan menghasilkan 12 program prioritas untuk tahun 2025.' . "\n\n" . 'Program unggulan yang disepakati meliputi Festival Biru Nusantara, Pagelaran Teater Utama, Workshop Kolaboratif, dan program baru berupa DSB Goes to School yakni pertunjukan seni keliling ke sekolah-sekolah menengah di sekitar Cibiru.' . "\n\n" . 'Ketua Umum menekankan pentingnya konsistensi dokumentasi setiap kegiatan agar rekam jejak DSB semakin kuat. Target ambisius tahun ini adalah meraih minimal satu penghargaan di tingkat nasional.',
                'gambar_url' => 'https://images.unsplash.com/photo-1552664730-d307ca884978?w=800&h=500&fit=crop',
            ],
        ];

        foreach ($data as $item) {
            Berita::create(array_merge($item, [
                'slug'    => Str::slug($item['judul']),
                'user_id' => 1,
            ]));
        }
    }
}
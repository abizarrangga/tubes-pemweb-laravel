@extends('layouts.app')

@section('content')

<!-- HERO ABOUT -->
<section class="about-hero">

    <div class="about-left">

        <h1>
            Tentang <br>
            Dapur Seni Biru
        </h1>

        <p>
            Dapur Seni Biru adalah wadah bagi mahasiswa
            berkarya, berkolaborasi, dan mengembangkan diri
            di bidang seni dan kreativitas demi
            menciptakan perubahan positif.
        </p>

    </div>

    <div class="about-right">

        <img src="{{ asset('assets/images/about-team.jpg') }}" alt="Team">

    </div>

</section>

<!-- VISI MISI -->

<section class="visi-misi">

    <h2>Visi & Misi Kami</h2>

    <div class="vm-container">

        <div class="vm-card">

            <h3>Visi</h3>

            <p>
                Menjadi organisasi seni yang kreatif,
                inovatif, dan inspiratif bagi mahasiswa
                serta masyarakat.
            </p>

        </div>

        <div class="vm-card">

            <h3>Misi</h3>

            <ul>
                <li>Mengembangkan potensi seni.</li>
                <li>Menciptakan karya berkualitas.</li>
                <li>Membangun kolaborasi positif.</li>
                <li>Memberikan kontribusi melalui seni.</li>
            </ul>

        </div>

    </div>

</section>

<!-- STRUKTUR -->

<section class="struktur">

    <h2>Struktur Kepengurusan</h2>

    <div class="pengurus-grid">

        <div class="pengurus-card">
            <img src="{{ asset('assets/images/p1.jpg') }}">
            <h4>Aisha Putri</h4>
            <p>Ketua Umum</p>
        </div>

        <div class="pengurus-card">
            <img src="{{ asset('assets/images/p2.jpg') }}">
            <h4>Ricky Maulana</h4>
            <p>Wakil Ketua</p>
        </div>

        <div class="pengurus-card">
            <img src="{{ asset('assets/images/p3.jpg') }}">
            <h4>Siti Aulia</h4>
            <p>Sekretaris</p>
        </div>

        <div class="pengurus-card">
            <img src="{{ asset('assets/images/p4.jpg') }}">
            <h4>Fahmi Alfarizi</h4>
            <p>Bendahara</p>
        </div>

        <div class="pengurus-card">
            <img src="{{ asset('assets/images/p5.jpg') }}">
            <h4>Dewi Lestari</h4>
            <p>Div. Humas</p>
        </div>

    </div>

    <button class="outline-btn">
        Lihat Struktur Lengkap
    </button>

</section>

<!-- SEJARAH -->

<section class="history">

    <div class="history-left">

        <h2>Sejarah Dapur Seni Biru</h2>

        <p>
            Dapur Seni Biru berdiri sejak tahun 2006
            di Universitas Pendidikan Indonesia Kampus Cibiru.
            Berawal dari sekumpulan mahasiswa yang memiliki
            ketertarikan di dunia seni, komunitas ini berkembang
            menjadi organisasi yang aktif berkarya dan
            berkontribusi dalam berbagai kegiatan seni.
        </p>

        <button>
            Selengkapnya
        </button>

    </div>

    <div class="history-right">

        <img src="{{ asset('assets/images/history.jpg') }}">

    </div>

</section>

<!-- JOIN US -->

<section class="join-us">

    <div>

        <h2>Bergabung Bersama Kami</h2>

        <p>
            Jadilah bagian dari keluarga besar Dapur Seni Biru
            dan tuangkan kreativitasmu bersama kami.
        </p>

    </div>

    <button>
        Daftar Sekarang
    </button>

</section>

@endsection
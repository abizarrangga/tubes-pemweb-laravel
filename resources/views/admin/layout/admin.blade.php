@extends('admin.layouts.admin')

@section('content')

<div class="page-header">

    <div>
        <h2>Tentang Kami</h2>
        <small>Dashboard > Tentang Kami</small>
    </div>

    <button class="btn-save">
        <i class="bi bi-floppy"></i>
        Simpan Perubahan
    </button>

</div>

<div class="tab-menu">

    <button class="active">Konten</button>
    <button>Visi & Misi</button>
    <button>Struktur</button>
    <button>Tim</button>
    <button>Pengaturan Tampilan</button>

</div>

<div class="about-grid">

    <div class="left-column">

        <div class="card-box">

            <h5>Konten Tentang Kami</h5>

            <label>Judul Halaman</label>

            <input type="text"
                class="form-control"
                value="Tentang Dapur Seni Biru">

            <label class="mt-3">
                Deskripsi Singkat
            </label>

            <textarea
                class="form-control"
                rows="6">
Dapur Seni Biru adalah wadah bagi mahasiswa berkarya, berkolaborasi, dan mengembangkan diri di bidang seni.
            </textarea>

        </div>

        <div class="card-box mt-4">

            <h5>Konten Detail</h5>

            <textarea
                class="form-control"
                rows="10">
Dapur Seni Biru merupakan unit kegiatan mahasiswa yang berfokus pada pengembangan potensi di bidang seni.
            </textarea>

        </div>

        <div class="card-box mt-4">

            <h5>Pengaturan Tampilan</h5>

            <div class="row">

                <div class="col-md-4">

                    <label>Warna Tema</label>

                    <input
                        type="color"
                        class="form-control form-control-color"
                        value="#0B2C58">

                </div>

                <div class="col-md-4">

                    <label>Gaya Gambar</label>

                    <select class="form-control">
                        <option>Sudut Membulat</option>
                        <option>Sudut Tajam</option>
                    </select>

                </div>

                <div class="col-md-4">

                    <label>Tata Letak</label>

                    <select class="form-control">
                        <option>Layout 1</option>
                        <option>Layout 2</option>
                    </select>

                </div>

            </div>

        </div>

    </div>

    <div class="right-column">

        <div class="preview-card">

            <h5>Preview Halaman</h5>

            <img
                src="{{ asset('assets/images/about-preview.png') }}"
                class="preview-image">

        </div>

    </div>

</div>

@endsection
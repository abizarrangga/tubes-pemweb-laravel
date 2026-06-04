@extends('admin.layouts.admin')

@section('content')
<<<<<<< HEAD

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
=======
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-1">Tentang Kami</h2>
            <p class="text-muted mb-0">Kelola profil singkat Dapur Seni Biru.</p>
        </div>
        <a href="{{ route('tentang') }}" class="btn btn-outline-primary">
            <i class="bi bi-eye me-1"></i> Lihat Halaman
        </a>
    </div>

    <div class="row g-4">
        <div class="col-lg-7">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <h5 class="fw-bold mb-3">Profil Organisasi</h5>
                    <form>
                        <div class="mb-3">
                            <label class="form-label">Nama Organisasi</label>
                            <input class="form-control" value="Dapur Seni Biru">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Deskripsi</label>
                            <textarea class="form-control" rows="5">Dapur Seni Biru adalah wadah mahasiswa UPI Kampus Cibiru untuk berkarya, berkolaborasi, dan mengembangkan diri di bidang seni.</textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Tahun Berdiri</label>
                                <input class="form-control" value="2006">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Lokasi</label>
                                <input class="form-control" value="UPI Kampus Cibiru">
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary">
                            <i class="bi bi-save me-1"></i> Simpan Perubahan
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-5">
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body p-4">
                    <h5 class="fw-bold mb-3">Visi</h5>
                    <p class="text-muted mb-0">Menjadi organisasi seni yang kreatif, inovatif, dan inspiratif bagi mahasiswa serta masyarakat.</p>
                </div>
            </div>
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <h5 class="fw-bold mb-3">Misi</h5>
                    <ul class="text-muted mb-0 ps-3">
                        <li>Mengembangkan potensi seni mahasiswa.</li>
                        <li>Menciptakan karya berkualitas tinggi.</li>
                        <li>Membangun kolaborasi yang positif.</li>
                        <li>Memberikan kontribusi nyata melalui seni.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
>>>>>>> 4c77fbd (Udah bagus tapi belum final -dim)

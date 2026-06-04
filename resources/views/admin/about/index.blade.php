@extends('admin.layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-1">Tentang Kami</h2>
            <p class="text-muted mb-0">Kelola profil singkat Dapur Seni Biru.</p>
        </div>
        <a href="{{ route('about') }}" class="btn btn-outline-primary">
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

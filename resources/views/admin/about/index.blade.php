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

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <form action="{{ route('admin.about.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @if ($errors->any())
            <div class="alert alert-danger mb-4">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card border-0 shadow-sm mb-4">
            <div class="card-body p-4">
                <h5 class="fw-bold mb-3">Profil Organisasi</h5>

                <div class="mb-3">
                    <label class="form-label">Nama Organisasi</label>
                    <input type="text" name="nama_organisasi"
                           class="form-control @error('nama_organisasi') is-invalid @enderror"
                           value="{{ old('nama_organisasi', $about->nama_organisasi) }}">
                    @error('nama_organisasi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" rows="5"
                              class="form-control @error('deskripsi') is-invalid @enderror">{{ old('deskripsi', $about->deskripsi) }}</textarea>
                    @error('deskripsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Upload Gambar About</label>
                        <input type="file" name="gambar"
                               class="form-control @error('gambar') is-invalid @enderror"
                               accept="image/*">
                        <small class="text-muted">Format: JPG, PNG, WEBP. Maks 2MB.</small>
                        @error('gambar')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">URL Gambar</label>
                        <input type="url" name="gambar_url"
                               class="form-control @error('gambar_url') is-invalid @enderror"
                               value="{{ old('gambar_url', $about->gambar_url) }}">
                        @error('gambar_url')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-0">
                    <label class="form-label">Preview Gambar</label>
                    <div class="rounded overflow-hidden border" style="max-width: 360px;">
                        <img src="{{ $about->gambar_final }}" alt="Preview about" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>

        <div class="card border-0 shadow-sm mb-4">
            <div class="card-body p-4">
                <h5 class="fw-bold mb-3">Visi & Misi</h5>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Judul Visi</label>
                        <input type="text" name="visi_judul"
                               class="form-control @error('visi_judul') is-invalid @enderror"
                               value="{{ old('visi_judul', $about->visi_judul) }}">
                        @error('visi_judul')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Judul Misi</label>
                        <input type="text" name="misi_judul"
                               class="form-control @error('misi_judul') is-invalid @enderror"
                               value="{{ old('misi_judul', $about->misi_judul) }}">
                        @error('misi_judul')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Isi Visi</label>
                    <textarea name="visi_deskripsi" rows="3"
                              class="form-control @error('visi_deskripsi') is-invalid @enderror">{{ old('visi_deskripsi', $about->visi_deskripsi) }}</textarea>
                    @error('visi_deskripsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-0">
                    <label class="form-label">Daftar Misi</label>
                    <textarea name="misi_items" rows="5"
                              class="form-control @error('misi_items') is-invalid @enderror">{{ old('misi_items', implode("\n", $about->misi_items ?? [])) }}</textarea>
                    <small class="text-muted">Tulis satu misi per baris.</small>
                    @error('misi_items')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="card border-0 shadow-sm mb-4">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <h5 class="fw-bold mb-1">Struktur Kepengurusan</h5>
                        <p class="text-muted mb-0 small">Kelola daftar pengurus organisasi.</p>
                    </div>
                    <button type="button" class="btn btn-success btn-sm" id="btn-tambah-pengurus">
                        <i class="bi bi-plus-lg me-1"></i> Tambah Pengurus
                    </button>
                </div>

                <div class="table-responsive">
                    <table class="table align-middle" id="struktur-table">
                        <thead>
                            <tr>
                                <th style="width: 80px;">Foto</th>
                                <th>Nama</th>
                                <th>Jabatan</th>
                                <th class="text-end" style="width: 120px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="struktur-body">
                            @php
                                $strukturOld = old('struktur', $about->struktur_items ?? []);
                            @endphp
                            @forelse ($strukturOld as $index => $person)
                                @include('admin.about._struktur_row', [
                                    'index' => $index,
                                    'person' => $person,
                                ])
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <p class="text-muted small mb-0" id="struktur-empty"
                   style="{{ count($strukturOld) > 0 ? 'display:none' : '' }}">
                    Belum ada pengurus. Klik "Tambah Pengurus" untuk menambahkan.
                </p>
            </div>
        </div>

        <div class="card border-0 shadow-sm mb-4">
            <div class="card-body p-4">
                <h5 class="fw-bold mb-3">Kontak</h5>

                <div class="mb-3">
                    <label class="form-label">Deskripsi Kontak</label>
                    <textarea name="kontak_deskripsi" rows="3"
                              class="form-control @error('kontak_deskripsi') is-invalid @enderror">{{ old('kontak_deskripsi', $about->kontak_deskripsi) }}</textarea>
                    @error('kontak_deskripsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Email Kontak</label>
                        <input type="email" name="kontak_email"
                               class="form-control @error('kontak_email') is-invalid @enderror"
                               value="{{ old('kontak_email', $about->kontak_email) }}">
                        @error('kontak_email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Lokasi Kontak</label>
                        <input type="text" name="kontak_lokasi"
                               class="form-control @error('kontak_lokasi') is-invalid @enderror"
                               value="{{ old('kontak_lokasi', $about->kontak_lokasi) }}">
                        @error('kontak_lokasi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">
            <i class="bi bi-save me-1"></i> Simpan Perubahan
        </button>
    </form>
</div>

<template id="struktur-row-template">
    @include('admin.about._struktur_row', [
        'index' => '__INDEX__',
        'person' => ['name' => '', 'role' => '', 'img' => ''],
    ])
</template>
@endsection

@push('scripts')
<script>
(function () {
    const body = document.getElementById('struktur-body');
    const emptyMsg = document.getElementById('struktur-empty');
    const template = document.getElementById('struktur-row-template');
    let nextIndex = body.querySelectorAll('.struktur-row').length;

    function toggleEmpty() {
        emptyMsg.style.display = body.querySelectorAll('.struktur-row').length === 0 ? '' : 'none';
    }

    function reindexRows() {
        body.querySelectorAll('.struktur-row').forEach((row, index) => {
            row.dataset.index = index;
            row.querySelectorAll('[name]').forEach((input) => {
                input.name = input.name.replace(/struktur\[\d+]/, `struktur[${index}]`);
            });
        });
        nextIndex = body.querySelectorAll('.struktur-row').length;
    }

    function bindRow(row) {
        const fileInput = row.querySelector('.struktur-foto-input');
        const preview = row.querySelector('.struktur-foto-preview');

        if (fileInput) {
            fileInput.addEventListener('change', function () {
                if (this.files && this.files[0]) {
                    preview.src = URL.createObjectURL(this.files[0]);
                }
            });
        }

        row.querySelector('.btn-hapus-pengurus')?.addEventListener('click', function () {
            row.remove();
            reindexRows();
            toggleEmpty();
        });
    }

    document.getElementById('btn-tambah-pengurus').addEventListener('click', function () {
        const html = template.innerHTML.replace(/__INDEX__/g, nextIndex);
        const wrapper = document.createElement('tbody');
        wrapper.innerHTML = html.trim();
        const row = wrapper.firstElementChild;
        body.appendChild(row);
        bindRow(row);
        nextIndex++;
        toggleEmpty();
    });

    body.querySelectorAll('.struktur-row').forEach(bindRow);
    toggleEmpty();
})();
</script>
@endpush

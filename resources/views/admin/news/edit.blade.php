@extends('admin.layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold mb-0">Edit Berita</h2>
        <a href="{{ route('admin.berita.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-1"></i> Kembali
        </a>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
            @php
                $news = ['judul' => 'Pendaftaran Member Baru Dapur Seni Biru 2026', 'gambar_url' => 'https://images.unsplash.com/photo-1514525253161-7a46d19cd819?w=900&h=600&fit=crop'];
            @endphp
            <form action="{{ route('admin.berita.update', $id ?? 1) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @include('admin.news.form', ['button' => 'Perbarui Berita', 'news' => $news])
            </form>
        </div>
    </div>
</div>
@endsection

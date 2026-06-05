@extends('admin.layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold mb-0">Edit Event</h2>
        <a href="{{ route('admin.event.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-1"></i> Kembali
        </a>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
            @php
                $event = ['nama' => 'Workshop Fotografi & Sinematografi', 'lokasi' => 'Ruang Kreatif DSB', 'gambar_url' => 'https://images.unsplash.com/photo-1560421683-6856ea585c78?w=900&h=600&fit=crop'];
            @endphp
            <form action="{{ route('admin.event.update', $id ?? 1) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @include('admin.event.form', ['button' => 'Perbarui Event', 'event' => $event])
            </form>
        </div>
    </div>
</div>
@endsection

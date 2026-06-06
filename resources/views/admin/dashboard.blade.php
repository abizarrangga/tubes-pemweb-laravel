@extends('admin.layouts.admin')

@section('content')
<div class="container-fluid">

    <h2 class="fw-bold mb-4">Dashboard</h2>

    {{-- Statistik --}}
    <div class="row g-4 mb-5">
        <div class="col-md-3">
            <div class="card shadow border-0">
                <div class="card-body">
                    <h6 class="text-muted">Total Event</h6>
                    <h2 class="fw-bold">{{ $totalEvent }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow border-0">
                <div class="card-body">
                    <h6 class="text-muted">Total Berita</h6>
                    <h2 class="fw-bold">{{ $totalBerita }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow border-0">
                <div class="card-body">
                    <h6 class="text-muted">Berita Published</h6>
                    <h2 class="fw-bold">{{ $beritaPublished }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow border-0">
                <div class="card-body">
                    <h6 class="text-muted">Event Mendatang</h6>
                    <h2 class="fw-bold">{{ $eventMendatang }}</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        {{-- Berita terbaru --}}
        <div class="col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white fw-bold d-flex justify-content-between align-items-center">
                    Berita Terbaru
                    <a href="{{ route('admin.berita.index') }}" class="btn btn-sm btn-outline-primary">Lihat Semua</a>
                </div>
                <div class="card-body p-0">
                    <ul class="list-group list-group-flush">
                        @forelse ($beritaTerbaru as $b)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <p class="mb-0 fw-semibold">{{ $b->judul }}</p>
                                    <small class="text-muted">{{ $b->tanggal->format('d M Y') }} · {{ $b->kategori }}</small>
                                </div>
                                <span class="badge {{ $b->status === 'Published' ? 'bg-success' : 'bg-secondary' }}">
                                    {{ $b->status }}
                                </span>
                            </li>
                        @empty
                            <li class="list-group-item text-muted text-center py-4">Belum ada berita.</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>

        {{-- Event terdekat --}}
        <div class="col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white fw-bold d-flex justify-content-between align-items-center">
                    Event Mendatang
                    <a href="{{ route('admin.event.index') }}" class="btn btn-sm btn-outline-primary">Lihat Semua</a>
                </div>
                <div class="card-body p-0">
                    <ul class="list-group list-group-flush">
                        @forelse ($eventTerdekat as $e)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <p class="mb-0 fw-semibold">{{ $e->nama }}</p>
                                    <small class="text-muted">{{ $e->tanggal->format('d M Y') }} · {{ $e->lokasi }}</small>
                                </div>
                                <span class="badge bg-primary">{{ $e->status }}</span>
                            </li>
                        @empty
                            <li class="list-group-item text-muted text-center py-4">Belum ada event mendatang.</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

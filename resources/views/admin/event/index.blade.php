@extends('admin.layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-1">Kelola Event</h2>
            <p class="text-muted mb-0">Daftar agenda dan kegiatan Dapur Seni Biru.</p>
        </div>
        <a href="{{ route('admin.event.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg me-1"></i> Tambah Event
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table align-middle">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Event</th>
                            <th>Kategori</th>
                            <th>Tanggal</th>
                            <th>Lokasi</th>
                            <th>Status</th>
                            <th class="text-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($events as $event)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="fw-semibold">{{ $event->nama }}</td>
                                <td><span class="badge bg-info">{{ $event->kategori }}</span></td>
                                <td>{{ $event->tanggal->format('d M Y') }}</td>
                                <td>{{ $event->lokasi }}</td>
                                <td>
                                    <span class="badge {{ $event->status === 'Mendatang' ? 'bg-primary' : 'bg-secondary' }}">
                                        {{ $event->status }}
                                    </span>
                                </td>
                                <td class="text-end">
                                    <a href="{{ route('admin.event.edit', $event->id) }}" class="btn btn-sm btn-warning">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('admin.event.destroy', $event->id) }}" method="POST" class="d-inline"
                                          onsubmit="return confirm('Yakin hapus event ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger" type="submit">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted py-4">
                                    Belum ada event. <a href="{{ route('admin.event.create') }}">Tambah sekarang</a>.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

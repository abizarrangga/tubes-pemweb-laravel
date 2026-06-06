@extends('admin.layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-1">Registrasi Event Gratis</h2>
            <p class="text-muted mb-0">Kelola daftar peserta yang mendaftar pada event gratis.</p>
        </div>
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
                            <th style="width: 80px;">No</th>
                            <th>Nama Event</th>
                            <th>Tanggal</th>
                            <th>Pendaftar</th>
                            <th>Status</th>
                            <th class="text-end" style="width: 150px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($events as $index => $event)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="fw-semibold">{{ $event->nama }}</td>
                                <td>{{ $event->tanggal->format('d M Y') }}</td>
                                <td>
                                    <span class="badge bg-info text-dark">
                                        {{ $event->registrations()->count() }} Orang
                                    </span>
                                </td>
                                <td>
                                    <span class="badge {{ $event->status === 'Mendatang' ? 'bg-success' : 'bg-secondary' }}">
                                        {{ $event->status }}
                                    </span>
                                </td>
                                <td class="text-end">
                                    <a href="{{ route('admin.registrations.show', $event->id) }}" class="btn btn-sm btn-primary">
                                        <i class="bi bi-eye mr-1"></i> Lihat Peserta
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted py-4">Belum ada event gratis terdaftar.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

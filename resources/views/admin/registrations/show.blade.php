@extends('admin.layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <div class="d-flex align-items-center gap-2 mb-1">
                <a href="{{ route('admin.registrations.index') }}" class="btn btn-sm btn-outline-secondary py-1 px-2">
                    <i class="bi bi-arrow-left"></i>
                </a>
                <h2 class="fw-bold mb-0">Peserta Event: {{ $event->nama }}</h2>
            </div>
            <p class="text-muted mb-0">Daftar pendaftar pada event gratis ini.</p>
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
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Telepon</th>
                            <th>Catatan</th>
                            <th>Tanggal Daftar</th>
                            <th class="text-end" style="width: 120px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($registrations as $reg)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="fw-semibold">{{ $reg->nama }}</td>
                                <td>{{ $reg->email }}</td>
                                <td>{{ $reg->telepon }}</td>
                                <td>
                                    @if ($reg->catatan)
                                        <span class="text-muted" style="font-size: 0.9rem;">"{{ $reg->catatan }}"</span>
                                    @else
                                        <span class="text-muted italic">-</span>
                                    @endif
                                </td>
                                <td>{{ $reg->created_at->format('d M Y H:i') }}</td>
                                <td class="text-end">
                                    <form action="{{ route('admin.registrations.destroy', $reg->id) }}" method="POST"
                                          onsubmit="return confirm('Apakah Anda yakin ingin menghapus data registrasi ini? Data yang dihapus tidak dapat dikembalikan.')"
                                          class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="bi bi-trash"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted py-4">Belum ada peserta yang mendaftar pada event ini.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

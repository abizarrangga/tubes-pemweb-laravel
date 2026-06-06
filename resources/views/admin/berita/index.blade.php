@extends('admin.layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-1">Kelola Berita</h2>
            <p class="text-muted mb-0">Publikasi kabar terbaru untuk pengunjung.</p>
        </div>
        <a href="{{ route('admin.berita.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg me-1"></i> Tambah Berita
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
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                            <th>Penulis</th>
                            <th class="text-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($berita as $item)
                            <tr>
                                <td>{{ $berita->firstItem() + $loop->index }}</td>
                                <td class="fw-semibold">{{ $item->judul }}</td>
                                <td><span class="badge bg-info">{{ $item->kategori }}</span></td>
                                <td>
                                    <span class="badge {{ $item->status === 'Published' ? 'bg-success' : 'bg-secondary' }}">
                                        {{ $item->status }}
                                    </span>
                                </td>
                                <td>{{ $item->tanggal->format('d M Y') }}</td>
                                <td>{{ $item->penulis }}</td>
                                <td class="text-end">
                                    <a href="{{ route('admin.berita.edit', $item->id) }}" class="btn btn-sm btn-warning">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('admin.berita.destroy', $item->id) }}" method="POST" class="d-inline"
                                          onsubmit="return confirm('Yakin hapus berita ini?')">
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
                                    Belum ada berita. <a href="{{ route('admin.berita.create') }}">Tambah sekarang</a>.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            @if ($berita->hasPages())
                <div class="card-footer bg-white border-0 pt-0 pb-3 px-3">
                    {{ $berita->links() }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection

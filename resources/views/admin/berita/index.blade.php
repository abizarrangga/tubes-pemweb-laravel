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
        <div class="alert alert-success">{{ session('success') }}</div>
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
                            <th>Tanggal</th>
                            <th>Penulis</th>
                            <th class="text-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $berita = [
                                ['id' => 1, 'judul' => 'Pendaftaran Member Baru Dapur Seni Biru 2026', 'kategori' => 'Kegiatan', 'tanggal' => '5 Mei 2026', 'penulis' => 'Admin DSB'],
                                ['id' => 2, 'judul' => 'Tim Teater DSB Raih Juara 1 di Festival Nasional', 'kategori' => 'Prestasi', 'tanggal' => '2 Mei 2026', 'penulis' => 'Admin DSB'],
                                ['id' => 3, 'judul' => 'Dokumentasi Workshop Desain Grafis', 'kategori' => 'Kegiatan', 'tanggal' => '26 April 2026', 'penulis' => 'Admin DSB'],
                            ];
                        @endphp

                        @foreach ($berita as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="fw-semibold">{{ $item['judul'] }}</td>
                                <td><span class="badge bg-info">{{ $item['kategori'] }}</span></td>
                                <td>{{ $item['tanggal'] }}</td>
                                <td>{{ $item['penulis'] }}</td>
                                <td class="text-end">
                                    <a href="{{ route('admin.berita.edit', $item['id']) }}" class="btn btn-sm btn-warning">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('admin.berita.destroy', $item['id']) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger" type="submit">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
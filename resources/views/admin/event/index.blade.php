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
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table align-middle">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Event</th>
                            <th>Tanggal</th>
                            <th>Lokasi</th>
                            <th>Status</th>
                            <th class="text-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $events = [
                                ['id' => 2, 'nama' => 'Workshop Fotografi & Sinematografi', 'tanggal' => '5 Juli 2026', 'lokasi' => 'Ruang Kreatif DSB', 'status' => 'Mendatang'],
                                ['id' => 3, 'nama' => 'Festival Teater Mahasiswa 2026', 'tanggal' => '15 Maret 2026', 'lokasi' => 'Gedung Kesenian Bandung', 'status' => 'Selesai'],
                                ['id' => 4, 'nama' => 'Festival Musik Kampus Biru', 'tanggal' => '18 September 2026', 'lokasi' => 'Lapangan UPI Cibiru', 'status' => 'Mendatang'],
                            ];
                        @endphp

                        @foreach ($events as $event)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="fw-semibold">{{ $event['nama'] }}</td>
                                <td>{{ $event['tanggal'] }}</td>
                                <td>{{ $event['lokasi'] }}</td>
                                <td>
                                    <span class="badge {{ $event['status'] === 'Mendatang' ? 'bg-primary' : 'bg-secondary' }}">
                                        {{ $event['status'] }}
                                    </span>
                                </td>
                                <td class="text-end">
                                    <a href="{{ route('admin.event.edit', $event['id']) }}" class="btn btn-sm btn-warning">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('admin.event.destroy', $event['id']) }}" method="POST" class="d-inline">
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

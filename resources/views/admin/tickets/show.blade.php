@extends('admin.layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <div class="d-flex align-items-center gap-2 mb-1">
                <a href="{{ route('admin.tickets.index') }}" class="btn btn-sm btn-outline-secondary py-1 px-2">
                    <i class="bi bi-arrow-left"></i>
                </a>
                <h2 class="fw-bold mb-0">Pemesanan Tiket: {{ $event->nama }}</h2>
            </div>
            <p class="text-muted mb-0">Daftar transaksi pemesanan tiket untuk event ini. Klik baris tabel untuk melihat kode unik tiket.</p>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead>
                        <tr>
                            <th style="width: 50px;"></th>
                            <th>Order ID</th>
                            <th>Nama Pemesan</th>
                            <th>Email</th>
                            <th>Jumlah</th>
                            <th>Total Bayar</th>
                            <th>Status Pembayaran</th>
                            <th>Tanggal Pesan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($tickets as $ticket)
                            <tr data-bs-toggle="collapse" data-bs-target="#detail-{{ $ticket->id }}" class="align-middle" style="cursor: pointer;">
                                <td>
                                    <i class="bi bi-chevron-down text-muted"></i>
                                </td>
                                <td><span class="font-mono text-dark fw-bold">{{ $ticket->midtrans_order_id }}</span></td>
                                <td class="fw-semibold">{{ $ticket->nama_pemesan }}</td>
                                <td>{{ $ticket->email }}</td>
                                <td>{{ $ticket->jumlah_tiket }} Pcs</td>
                                <td class="fw-bold text-[#0b2545]">Rp {{ number_format($ticket->total_harga, 0, ',', '.') }}</td>
                                <td>
                                    <span class="badge 
                                        {{ $ticket->status_pembayaran === 'sukses' ? 'bg-success' : '' }}
                                        {{ $ticket->status_pembayaran === 'pending' ? 'bg-warning text-dark' : '' }}
                                        {{ $ticket->status_pembayaran === 'gagal' ? 'bg-danger' : '' }}">
                                        {{ ucfirst($ticket->status_pembayaran) }}
                                    </span>
                                </td>
                                <td>{{ $ticket->created_at->format('d M Y H:i') }}</td>
                            </tr>
                            <tr class="collapse" id="detail-{{ $ticket->id }}">
                                <td colspan="8" class="bg-light p-4">
                                    <div class="px-3">
                                        <h5 class="fw-bold text-[#0b2545] mb-3">Detail Kode Unik Tiket</h5>
                                        @if($ticket->status_pembayaran === 'sukses')
                                            <div class="row g-3">
                                                @foreach($ticket->ticketCodes as $index => $code)
                                                    <div class="col-md-6 col-lg-4">
                                                        <div class="bg-white p-3 rounded shadow-sm border d-flex justify-content-between align-items-center">
                                                             <div>
                                                                 <span class="badge bg-secondary mb-1">Tiket {{ $index + 1 }}</span>
                                                                 <p class="font-mono mb-0 fw-bold text-dark" style="font-size: 0.9rem;">{{ $code->kode }}</p>
                                                             </div>
                                                             <div class="text-end">
                                                                 <span class="badge {{ $code->status === 'belum_dipakai' ? 'bg-info text-dark' : 'bg-secondary' }}">
                                                                     {{ $code->status === 'belum_dipakai' ? 'Belum Dipakai' : 'Sudah Dipakai' }}
                                                                 </span>
                                                                 @if($code->status === 'sudah_dipakai' && $code->used_at)
                                                                     <p class="text-muted mb-0 mt-1 italic" style="font-size: 0.75rem;">{{ $code->used_at->format('d/m H:i') }}</p>
                                                                 @endif
                                                             </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @else
                                            <p class="text-muted mb-0 italic">Kode tiket belum terbit karena pembayaran belum berstatus sukses.</p>
                                        @endif

                                        @if(Auth::user()->isSuperAdmin())
                                            <div class="mt-4 pt-3 border-top d-flex justify-content-end">
                                                <form action="{{ route('admin.tickets.destroy', $ticket->id) }}" method="POST"
                                                      onsubmit="return confirm('Apakah Anda yakin ingin menghapus data pemesanan tiket ini? Seluruh kode tiket terkait juga akan terhapus secara permanen.')"
                                                      class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger d-flex align-items-center gap-1">
                                                        <i class="bi bi-trash"></i> Hapus Pemesanan
                                                    </button>
                                                </form>
                                            </div>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center text-muted py-4">Belum ada transaksi tiket untuk event ini.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

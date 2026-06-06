@extends('admin.layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-1">Validasi & Check-In Tiket</h2>
            <p class="text-muted mb-0">Input kode unik tiket untuk memverifikasi keaslian dan menandai kedatangan pengunjung.</p>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="row">
        <!-- Input Form -->
        <div class="col-lg-5 mb-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <h5 class="fw-bold text-[#0b2545] mb-3">Scan / Input Kode Tiket</h5>
                    <form action="{{ route('admin.tickets.validate.check') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label text-muted small fw-bold text-uppercase">Kode Unik Tiket (UUID)</label>
                            <input type="text" name="kode" value="{{ old('kode', $kode ?? '') }}" 
                                   class="form-control form-control-lg font-mono @error('kode') is-invalid @enderror" 
                                   placeholder="Masukkan atau tempel kode tiket..." required autofocus>
                            @error('kode')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg w-full">
                            <i class="bi bi-search mr-1"></i> Periksa Kode
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Validasi Hasil Pengecekan -->
        <div class="col-lg-7">
            @if(isset($kode))
                @if(!$ticketCode)
                    <!-- KODE TIDAK DITEMUKAN -->
                    <div class="card border-0 shadow-sm bg-danger-subtle border-start border-danger border-4">
                        <div class="card-body p-4 text-center">
                            <div class="text-danger mb-3" style="font-size: 3rem;">
                                <i class="bi bi-x-circle-fill"></i>
                            </div>
                            <h4 class="fw-bold text-danger">Kode Tidak Valid</h4>
                            <p class="text-muted mb-0">Tiket dengan kode unik <strong class="font-mono text-dark">{{ $kode }}</strong> tidak ditemukan di database. Pastikan input kode sudah benar.</p>
                        </div>
                    </div>
                @else
                    @php
                        $ticket = $ticketCode->ticket;
                        $event = $ticket->event;
                    @endphp

                    @if($ticketCode->status === 'belum_dipakai')
                        <!-- VALID & BELUM DIPAKAI -->
                        <div class="card border-0 shadow-sm bg-success-subtle border-start border-success border-4">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center gap-3 mb-4">
                                    <div class="text-success" style="font-size: 2.5rem; line-height: 1;">
                                        <i class="bi bi-check-circle-fill"></i>
                                    </div>
                                    <div>
                                        <h4 class="fw-bold text-success mb-1">Tiket Valid & Siap Pakai</h4>
                                        <span class="badge bg-success">Status: Belum Digunakan</span>
                                    </div>
                                </div>

                                <div class="bg-white p-4 rounded border mb-4 shadow-sm text-sm">
                                    <div class="row g-3">
                                        <div class="col-sm-6">
                                            <span class="text-muted d-block mb-1">Nama Pemesan</span>
                                            <strong class="text-dark fs-6">{{ $ticket->nama_pemesan }}</strong>
                                        </div>
                                        <div class="col-sm-6">
                                            <span class="text-muted d-block mb-1">Email Pemesan</span>
                                            <strong class="text-dark">{{ $ticket->email }}</strong>
                                        </div>
                                        <div class="col-sm-12 border-top pt-2">
                                            <span class="text-muted d-block mb-1">Nama Event</span>
                                            <strong class="text-dark fs-6">{{ $event->nama }}</strong>
                                        </div>
                                        <div class="col-sm-6 border-top pt-2">
                                            <span class="text-muted d-block mb-1">Tanggal Event</span>
                                            <strong class="text-dark">{{ $event->tanggal->format('d M Y') }}</strong>
                                        </div>
                                        <div class="col-sm-6 border-top pt-2">
                                            <span class="text-muted d-block mb-1">Lokasi Event</span>
                                            <strong class="text-dark">{{ $event->lokasi }}</strong>
                                        </div>
                                    </div>
                                </div>

                                <form action="{{ route('admin.tickets.validate.checkin', $ticketCode->kode) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-lg w-100 py-3 fw-bold shadow-sm">
                                        <i class="bi bi-person-check-fill mr-1"></i> Tandai Sudah Dipakai (Check-In)
                                    </button>
                                </form>
                            </div>
                        </div>
                    @else
                        <!-- SUDAH DIPAKAI -->
                        <div class="card border-0 shadow-sm bg-warning-subtle border-start border-warning border-4">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center gap-3 mb-4">
                                    <div class="text-warning" style="font-size: 2.5rem; line-height: 1;">
                                        <i class="bi bi-exclamation-triangle-fill"></i>
                                    </div>
                                    <div>
                                        <h4 class="fw-bold text-warning-emphasis mb-1">Tiket Sudah Digunakan!</h4>
                                        <span class="badge bg-secondary">Check-In pada {{ $ticketCode->used_at->format('d M Y H:i') }}</span>
                                    </div>
                                </div>

                                <div class="bg-white p-4 rounded border text-sm opacity-75">
                                    <div class="row g-3">
                                        <div class="col-sm-6">
                                            <span class="text-muted d-block mb-1">Nama Pemesan</span>
                                            <strong class="text-dark">{{ $ticket->nama_pemesan }}</strong>
                                        </div>
                                        <div class="col-sm-6">
                                            <span class="text-muted d-block mb-1">Email Pemesan</span>
                                            <strong class="text-dark">{{ $ticket->email }}</strong>
                                        </div>
                                        <div class="col-sm-12 border-top pt-2">
                                            <span class="text-muted d-block mb-1">Nama Event</span>
                                            <strong class="text-dark">{{ $event->nama }}</strong>
                                        </div>
                                        <div class="col-sm-6 border-top pt-2">
                                            <span class="text-muted d-block mb-1">Tanggal Event</span>
                                            <strong class="text-dark">{{ $event->tanggal->format('d M Y') }}</strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endif
            @else
                <!-- DEFAULT PLACEHOLDER -->
                <div class="card border-0 shadow-sm border-dashed border-2 py-5 text-center text-muted">
                    <div class="card-body py-4">
                        <i class="bi bi-qr-code text-secondary mb-3" style="font-size: 3.5rem;"></i>
                        <h5>Belum Ada Kode Dipindai</h5>
                        <p class="small mb-0 px-4">Silakan masukkan kode unik tiket di kolom sebelah kiri untuk memverifikasi tiket pengunjung.</p>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection

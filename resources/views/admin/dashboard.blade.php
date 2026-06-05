@extends('admin.layouts.admin')

@section('content')

<div class="container-fluid">

    <h2 class="fw-bold mb-4">
        Dashboard
    </h2>

    <div class="row g-4">

        <div class="col-md-3">

            <div class="card shadow border-0">

                <div class="card-body">

                    <h6>Total Event</h6>

                    <h2>24</h2>

                </div>

            </div>

        </div>

        <div class="col-md-3">

            <div class="card shadow border-0">

                <div class="card-body">

                    <h6>Total Berita</h6>

                    <h2>48</h2>

                </div>

            </div>

        </div>

        <div class="col-md-3">

            <div class="card shadow border-0">

                <div class="card-body">

                    <h6>Total Pagelaran</h6>

                    <h2>18</h2>

                </div>

            </div>

        </div>

        <div class="col-md-3">

            <div class="card shadow border-0">

                <div class="card-body">

                    <h6>Total Pengunjung</h6>

                    <h2>1250</h2>

                </div>

            </div>

        </div>

    </div>

    <div class="row g-4 mt-1">
        <div class="col-lg-8">
            <div class="card shadow border-0">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="fw-bold mb-0">Statistik Pengunjung</h5>
                        <span class="badge bg-primary-subtle text-primary">Juni 2026</span>
                    </div>
                    <div style="height:260px">
                        <canvas id="visitorChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card shadow border-0">
                <div class="card-body">
                    <h5 class="fw-bold mb-3">Aktivitas Terbaru</h5>
                    <div class="d-flex flex-column gap-3 small">
                        <div class="d-flex gap-3">
                            <i class="bi bi-calendar-event text-primary"></i>
                            <span>Event Workshop Fotografi diperbarui.</span>
                        </div>
                        <div class="d-flex gap-3">
                            <i class="bi bi-newspaper text-danger"></i>
                            <span>Berita pendaftaran member ditambahkan.</span>
                        </div>
                        <div class="d-flex gap-3">
                            <i class="bi bi-info-circle text-success"></i>
                            <span>Profil organisasi siap ditampilkan.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection

@push('scripts')
<script>
    const ctx = document.getElementById('visitorChart').getContext('2d');
    const gradient = ctx.createLinearGradient(0, 0, 0, 250);
    gradient.addColorStop(0, 'rgba(236, 72, 153, 0.4)');
    gradient.addColorStop(1, 'rgba(236, 72, 153, 0.0)');

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['01','02','03','04','05','06','07','09','10','13','14','17','18','19','20','22','23','24','25','26','27','28','29','30'],
            datasets: [{
                data: [160,260,360,320,280,330,310,350,460,305,370,330,290,380,500,310,340,430,560,470,400,460,520,450],
                borderColor: '#EC4899',
                backgroundColor: gradient,
                borderWidth: 2,
                fill: true,
                tension: 0.3,
                pointRadius: 3,
                pointBackgroundColor: '#EC4899'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { display: false } },
            scales: {
                y: { min: 100, max: 600, ticks: { stepSize: 100, font: { size: 9 } }, grid: { color: '#F3F4F6' } },
                x: { ticks: { font: { size: 9 } }, grid: { display: false } }
            }
        }
    });
</script>
@endpush

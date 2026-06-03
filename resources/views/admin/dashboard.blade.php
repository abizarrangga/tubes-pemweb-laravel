@extends('layouts.admin')

@section('content')
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-6">
    <div class="bg-white p-5 rounded-2xl shadow-sm border border-gray-100 flex flex-col">
        <span class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Total Event</span>
        <span class="text-4xl font-extrabold text-gray-800 mt-2">24</span>
    </div>
    <div class="bg-white p-5 rounded-2xl shadow-sm border border-gray-100 flex flex-col">
        <span class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Total Berita</span>
        <span class="text-4xl font-extrabold text-gray-800 mt-2">48</span>
    </div>
    <div class="bg-white p-5 rounded-2xl shadow-sm border border-gray-100 flex flex-col">
        <span class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Total Pagelaran</span>
        <span class="text-4xl font-extrabold text-gray-800 mt-2">18</span>
    </div>
    <div class="bg-white p-5 rounded-2xl shadow-sm border border-gray-100 flex flex-col">
        <span class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Total Pengunjung</span>
        <span class="text-4xl font-extrabold text-gray-800 mt-2">1.250</span>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <div class="lg:col-span-2 bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
        <h3 class="text-sm font-bold text-[#0B2545] mb-4">Grafik Pengunjung</h3>
        <div class="h-64">
            <canvas id="visitorChart"></canvas>
        </div>
    </div>

    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex flex-col">
        <h3 class="text-sm font-bold text-[#0B2545] mb-4">Berita Terbaru</h3>
        <div class="space-y-4 flex-1">
            <div class="flex gap-4 items-center">
                <div class="w-16 h-16 bg-blue-900 rounded-xl overflow-hidden shrink-0">
                    <img src="https://images.unsplash.com/photo-1514525253161-7a46d19cd819?w=150" alt="Event" class="w-full h-full object-cover">
                </div>
                <div class="flex flex-col">
                    <h4 class="text-xs font-bold text-gray-800 leading-tight hover:text-blue-600 cursor-pointer">Pendaftaran Member Baru Dapur Seni Biru 2026</h4>
                    <span class="text-[10px] text-gray-400 font-medium mt-1">5 Mei 2026</span>
                </div>
            </div>
            <div class="flex gap-4 items-center">
                <div class="w-16 h-16 bg-blue-900 rounded-xl overflow-hidden shrink-0">
                    <img src="https://images.unsplash.com/photo-1460661419201-fd4cecdf8a8b?w=150" alt="Theater" class="w-full h-full object-cover">
                </div>
                <div class="flex flex-col">
                    <h4 class="text-xs font-bold text-gray-800 leading-tight hover:text-blue-600 cursor-pointer">Tim Teater DSB Raih Juara 1 di Festival Nasional</h4>
                    <span class="text-[10px] text-gray-400 font-medium mt-1">2 Mei 2026</span>
                </div>
            </div>
            <div class="flex gap-4 items-center">
                <div class="w-16 h-16 bg-blue-900 rounded-xl overflow-hidden shrink-0">
                    <img src="https://images.unsplash.com/photo-1513364776144-60967b0f800f?w=150" alt="Workshop" class="w-full h-full object-cover">
                </div>
                <div class="flex flex-col">
                    <h4 class="text-xs font-bold text-gray-800 leading-tight hover:text-blue-600 cursor-pointer">Dokumentasi Workshop Desain Grafis</h4>
                    <span class="text-[10px] text-gray-400 font-medium mt-1">26 April 2026</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Konfigurasi Chart.js agar tampilannya mirip grafik pink bergradasi di gambar
    const ctx = document.getElementById('visitorChart').getContext('2d');
    
    // Bikin warna gradasi pink transparan ke bawah
    const gradient = ctx.createLinearGradient(0, 0, 0, 250);
    gradient.addColorStop(0, 'rgba(236, 72, 153, 0.4)');
    gradient.addColorStop(1, 'rgba(236, 72, 153, 0.0)');

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['01', '02', '03', '04', '05', '06', '07', '09', '10', '13', '14', '17', '18', '19', '20', '22', '23', '24', '25', '26', '27', '28', '29', '30'],
            datasets: [{
                data: [160, 260, 360, 320, 280, 330, 310, 350, 460, 305, 370, 330, 290, 380, 500, 310, 340, 430, 560, 470, 400, 460, 520, 450],
                borderColor: '#EC4899',
                backgroundColor: gradient,
                borderWidth: 2,
                fill: true,
                tension: 0.3, // Membuat lekukan garis mulus lembut
                pointRadius: 3,
                pointBackgroundColor: '#EC4899'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { display: false } },
            scales: {
                y: { min: 100, max: 500, ticks: { stepSize: 100, font: { size: 9 } }, grid: { color: '#F3F4F6' } },
                x: { ticks: { font: { size: 9 } }, grid: { display: false } }
            }
        }
    });
</script>
@endpush
@extends('layouts')

@section('title', 'Dashboard')

@section('content')
<div class="container py-4" style="height: 80vh; overflow: hidden;">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-2">
        <div>
            <h2 class="fw-bold text-primary">Dashboard Produksi</h2>
            <p class="text-muted mb-0">Statistik terkini dari proses produksi</p>
        </div>
        <div class="bg-danger bg-opacity-25 rounded-circle p-3">
            <i class="bi bi-speedometer2 display-5 text-danger"></i>
        </div>
    </div>

    <!-- Statistic Cards -->
    <div class="row g-4">
        <div class="col-md-4">
            <div class="card h-100 border-0 shadow-sm bg-primary text-white">
                <div class="card-body d-flex align-items-center">
                    <div class="me-3">
                        <div class="bg-white bg-opacity-25 rounded-circle p-3">
                            <i class="bi bi-list-ul fs-4 text-white"></i>
                        </div>
                    </div>
                    <div>
                        <h6 class="mb-1">Total Permintaan</h6>
                        <h3 class="fw-bold">{{ $totalPermintaan }}</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card h-100 border-0 shadow-sm bg-danger text-white">
                <div class="card-body d-flex align-items-center">
                    <div class="me-3">
                        <div class="bg-white bg-opacity-25 rounded-circle p-3">
                            <i class="bi bi-gear-fill fs-4 text-white"></i>
                        </div>
                    </div>
                    <div>
                        <h6 class="mb-1">Sedang Diproses</h6>
                        <h3 class="fw-bold">{{ $totalDiproses }}</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card h-100 border-0 shadow-sm bg-dark text-white">
                <div class="card-body d-flex align-items-center">
                    <div class="me-3">
                        <div class="bg-white bg-opacity-25 rounded-circle p-3">
                            <i class="bi bi-check2-circle fs-4 text-white"></i>
                        </div>
                    </div>
                    <div>
                        <h6 class="mb-1">Selesai</h6>
                        <h3 class="fw-bold">{{ $totalSelesai }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart -->
    <div class="card shadow-sm border-0 mt-5">
        <div class="card-body">
            <h5 class="mb-4 fw-bold text-primary">Grafik Statistik Produksi</h5>
            <canvas id="dashboardChart" height="120"></canvas>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<!-- Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

<script>
    const ctx = document.getElementById('dashboardChart').getContext('2d');
    const dashboardChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Permintaan', 'Diproses', 'Selesai'],
            datasets: [{
                label: 'Jumlah',
                data: [{{ $totalPermintaan }}, {{ $totalDiproses }}, {{ $totalSelesai }}],
                backgroundColor: [
                    'rgba(13, 110, 253, 0.8)',   // Blue
                    'rgba(220, 53, 69, 0.8)',    // Red
                    'rgba(33, 37, 41, 0.8)'      // Dark
                ],
                borderColor: [
                    'rgba(13, 110, 253, 1)',
                    'rgba(220, 53, 69, 1)',
                    'rgba(33, 37, 41, 1)'
                ],
                borderWidth: 1,
                borderRadius: 10
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false },
                title: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: { stepSize: 1 }
                }
            }
        }
    });
</script>
@endsection

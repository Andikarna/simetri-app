@extends('layouts')

@section('title', 'Dashboard')

@section('content')
    <div class="container mt-4">
        <h2 class="mb-4">Dashboard</h2>

        <div class="row">
            <!-- Card: Total Permintaan -->
            <div class="col-md-4 mb-3">
                <div class="card text-white bg-primary shadow">
                    <div class="card-body">
                        <h5 class="card-title">Total Permintaan</h5>
                        <p class="card-text display-5 fw-bold">1</p>
                    </div>
                </div>
            </div>

            <!-- Card: Total Daftar Potong -->
            <div class="col-md-4 mb-3">
                <div class="card text-white bg-success shadow">
                    <div class="card-body">
                        <h5 class="card-title">Total Daftar Potong</h5>
                        <p class="card-text display-5 fw-bold">2</p>
                    </div>
                </div>
            </div>

            <!-- Card: Total Pemesanan -->
            <div class="col-md-4 mb-3">
                <div class="card text-white bg-warning shadow">
                    <div class="card-body">
                        <h5 class="card-title">Total Pemesanan</h5>
                        <p class="card-text display-5 fw-bold">3</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Grafik -->
        <div class="card mt-4 shadow">
            <div class="card-body">
                <canvas id="dashboardChart" height="120"></canvas>
            </div>
        </div>


    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('dashboardChart').getContext('2d');
        const dashboardChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Permintaan', 'Daftar Potong', 'Pemesanan'],
                datasets: [{
                    label: 'Jumlah',
                    data: [1, 2, 3], // Ganti dengan data dinamis dari PHP jika sudah tersedia
                    backgroundColor: [
                        'rgba(13, 110, 253, 0.7)', // Blue
                        'rgba(25, 135, 84, 0.7)', // Green
                        'rgba(255, 193, 7, 0.7)' // Yellow
                    ],
                    borderColor: [
                        'rgba(13, 110, 253, 1)',
                        'rgba(25, 135, 84, 1)',
                        'rgba(255, 193, 7, 1)'
                    ],
                    borderWidth: 1,
                    borderRadius: 8
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    },
                    title: {
                        display: true,
                        text: 'Statistik Laporan',
                        font: {
                            size: 18
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1
                        }
                    }
                }
            }
        });
    </script>
@endsection

@extends('dashboard.layouts.main')

@section('container')
    <div class="row">
        <div class="col-xl">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Laporan Antrian</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <!-- Form Filter -->
                    <form action="/dashboard/statistik" method="GET">
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="start_date">Tanggal Mulai</label>
                                <input type="date" name="start_date" class="form-control"
                                    value="{{ request('start_date') }}">
                            </div>
                            <div class="col-md-6">
                                <label for="end_date">Tanggal Selesai</label>
                                <input type="date" name="end_date" class="form-control"
                                    value="{{ request('end_date') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12 text-right">
                                <button type="submit" class="btn btn-primary">Filter</button>
                                <a href="/dashboard/statistik" class="btn btn-danger">Reset</a>
                            </div>
                        </div>
                    </form>

                    <!-- Grafik Pie Chart -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    Statistik Antrian Berdasarkan Layanan (Pie Chart)
                                </div>
                                <div class="card-body">
                                    <canvas id="pieChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Chart.js Script -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('pieChart').getContext('2d');
        var pieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: {!! json_encode($chartData['labels']) !!}, // Nama layanan
                datasets: [{
                    data: {!! json_encode($chartData['data']) !!}, // Data persentase
                    backgroundColor: [
                        '#4e73df', '#e74a3b', '#f6c23e', '#36b9cc', '#1cc88a'
                    ],
                    borderWidth: 1,
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                let label = context.label || '';
                                let value = context.raw || 0;
                                // Menambahkan simbol % setelah nilai
                                return `${label}: ${value}%`;
                            }
                        }
                    }
                }
            }
        });
    </script>
@endsection

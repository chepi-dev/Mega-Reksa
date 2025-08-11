<style>
    .dashboard {
        padding: 20px;
    }

    .card {
        border: none;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
        margin-bottom: 20px;
    }

    .card:hover {
        transform: translateY(-5px);
    }

    .card-title {
        font-size: 1rem;
        font-weight: 600;
    }

    .card-text {
        font-size: 1.75rem;
        font-weight: 700;
    }

    .table-responsive {
        border-radius: 10px;
        overflow: hidden;
    }

    .table {
        margin-bottom: 0;
    }

    .table th {
        background-color: #f8f9fa;
        font-weight: 600;
    }
</style>

<div class="dashboard">
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <h5 class="card-title">Total Customer</h5>
                    <h2 class="card-text">1,248</h2>
                    <p class="small">+12% dari bulan lalu</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h5 class="card-title">Transaksi Bulan Ini</h5>
                    <h2 class="card-text">342</h2>
                    <p class="small">+8% dari bulan lalu</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-warning text-dark">
                <div class="card-body">
                    <h5 class="card-title">Total Aset Kelolaan</h5>
                    <h2 class="card-text">Rp 12,8 M</h2>
                    <p class="small">+5.2% YoY</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-info text-white">
                <div class="card-body">
                    <h5 class="card-title">Customer Baru</h5>
                    <h2 class="card-text">28</h2>
                    <p class="small">+15% dari bulan lalu</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-white">
                    <h5>Grafik Pertumbuhan Customer</h5>
                </div>
                <div class="card-body">
                    <!-- Tempat untuk grafik (Chart.js atau library lainnya) -->
                    <div class="chart-container" style="height: 300px;">
                        <canvas id="customerChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-white">
                    <h5>Produk Terpopuler</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Reksa Dana Pendapatan Tetap
                            <span class="badge bg-primary rounded-pill">45%</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Reksa Dana Saham
                            <span class="badge bg-primary rounded-pill">30%</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Reksa Dana Campuran
                            <span class="badge bg-primary rounded-pill">15%</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Reksa Dana Pasar Uang
                            <span class="badge bg-primary rounded-pill">10%</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-white">
                    <h5>Transaksi Terakhir</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Customer</th>
                                    <th>Produk</th>
                                    <th>Nominal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>#TRX-001</td>
                                    <td>John Doe</td>
                                    <td>RDPT</td>
                                    <td>Rp 5.000.000</td>
                                </tr>
                                <!-- Data lainnya -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-white">
                    <h5>Customer Baru</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Bergabung</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Jane Smith</td>
                                    <td>2 hari lalu</td>
                                    <td><span class="badge bg-success">Aktif</span></td>
                                </tr>
                                <!-- Data lainnya -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Grafik Pertumbuhan Customer
    const customerCtx = document.getElementById('customerChart').getContext('2d');
    const customerChart = new Chart(customerCtx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul'],
            datasets: [{
                label: 'Total Customer',
                data: [850, 920, 1000, 1050, 1120, 1180, 1248],
                borderColor: '#261FB3',
                backgroundColor: 'rgba(38, 31, 179, 0.1)',
                borderWidth: 2,
                tension: 0.3,
                fill: true
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                tooltip: {
                    mode: 'index',
                    intersect: false,
                }
            },
            scales: {
                y: {
                    beginAtZero: false
                }
            }
        }
    });
</script>

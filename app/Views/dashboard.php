<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?= $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
    <style>
        .dashboard-cards .col-xl-2-4 {
            flex: 0 0 20%;
            max-width: 20%;
        }
    </style>
</head>

<body>

    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-transparent fixed-top shadow-sm">
        <div class="container-fluid px-4">
            <h2>Admin Panel</h2>
            <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNavAdmin" aria-controls="navbarNavAdmin" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavAdmin">
                <ul class="navbar-nav text-end">
                    <li class="nav-item"><a class="nav-link active" href="<?= base_url('dashboard') ?>">Dashboard</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('admin') ?>">Daftar Produk</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('pesanan') ?>">Data Pesanan</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('logout') ?>"><i
                                class="bi bi-box-arrow-right"></i> Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- konten utama -->
    <section class="py-5 mt-5">
        <div class="container">

            <!-- Notifikasi Stok -->
            <?php if (!empty($lowStockProducts) || !empty($outOfStockProducts)): ?>
                <div class="container mt-4">
                    <?php if (!empty($lowStockProducts)): ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <i class="bi bi-exclamation-triangle"></i>
                            <strong>Peringatan Stok Rendah!</strong>
                            <?php foreach ($lowStockProducts as $product): ?>
                                <?= $product['nama_produk'] ?> (Stok: <?= $product['stok_produk'] ?>),
                            <?php endforeach; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($outOfStockProducts)): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="bi bi-x-circle"></i>
                            <strong>Stok Habis!</strong>
                            <?php foreach ($outOfStockProducts as $product): ?>
                                <?= $product['nama_produk'] ?>,
                            <?php endforeach; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <!-- DASHBOARD STATISTIK -->
            <div class="row mb-5">
                <div class="col-12">
                    <h2 class="mb-4">Dashboard Overview</h2>
                </div>

                <!-- Statistik Cards -->
                <div class="row mb-4 dashboard-cards">
                    <div class="col-xl-2-4 col-md-6 mb-4">
                        <div class="card stat-card h-100 py-3">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-uppercase mb-1">Total Pengguna
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold">
                                            <?= number_format($totalUsers) ?>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="bi bi-people card-icon"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-2-4 col-md-6 mb-4">
                        <div class="card stat-card transaction-card h-100 py-3">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-uppercase mb-1">Total Transaksi
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold">
                                            <?= number_format($totalTransactions) ?>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="bi bi-cart-check card-icon"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-2-4 col-md-6 mb-4">
                        <div class="card stat-card revenue-card h-100 py-3">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-uppercase mb-1">Total Pendapatan
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold">
                                            Rp <?= number_format($totalRevenue, 0, ',', '.') ?>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="bi bi-currency-dollar card-icon"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-2-4 col-md-6 mb-4">
                        <div class="card stat-card product-card h-100 py-3">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-uppercase mb-1">Produk Terlaris
                                        </div>
                                        <div class="h6 mb-0 font-weight-bold">
                                            <?= $bestSellingProduct ?>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="bi bi-trophy card-icon"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-2-4 col-md-6 mb-4">
                        <div class="card stat-card loyal-card h-100 py-3">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-uppercase mb-1">Pelanggan Tetap
                                        </div>
                                        <div class="h6 mb-0 font-weight-bold">
                                            <?= $pelangganTetap ?>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="bi bi-person-heart card-icon"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Data Terbaru & Grafik -->
            <div class="row mb-5">
                <!-- Transaksi Terbaru -->
                <div class="col-lg-4">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold">Transaksi Terbaru</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-sm table-borderless">
                                    <thead>
                                        <tr>
                                            <th>Customer</th>
                                            <th>Produk</th>
                                            <th>No.Telepon</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($recentTransactions)): ?>
                                            <?php foreach ($recentTransactions as $transaction): ?>
                                                <tr>
                                                    <td><?= $transaction->nama_lengkap ?? 'Guest' ?></td>
                                                    <td><?= $transaction->nama_produk ?></td>
                                                    <td><?= $transaction->nomor_telepon ?></td>
                                                    <td>
                                                        <span class="badge bg-<?=
                                                                                $transaction->status_pesanan == 'selesai' ? 'success' : ($transaction->status_pesanan == 'pending' ? 'warning' : 'secondary') ?>">
                                                            <?= ucfirst($transaction->status_pesanan) ?>
                                                        </span>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="4" class="text-center">Belum ada transaksi</td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Grafik Penjualan Bulanan -->
                <div class="col-lg-8">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold">Grafik Penjualan Bulanan</h6>
                        </div>
                        <div class="card-body">
                            <canvas id="monthlyChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

    </section>

    <!-- footer -->
    <footer class="text-center py-3">
        <p>&copy; <?= date('Y') ?> Creative Cell - Admin Panel.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        // Data grafik bulanan
        const monthlyLabels = <?= json_encode(array_column($monthlySales, 'bulan')); ?>;
        const monthlyData = <?= json_encode(array_column($monthlySales, 'total')); ?>;

        const ctxMonthly = document.getElementById('monthlyChart').getContext('2d');
        new Chart(ctxMonthly, {
            type: 'bar',
            data: {
                labels: monthlyLabels,
                datasets: [{
                    label: 'Jumlah Transaksi Selesai',
                    data: monthlyData,
                    borderWidth: 1,
                    backgroundColor: 'rgba(153, 102, 255, 0.4)',
                    borderColor: 'rgba(153, 102, 255, 1)'
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

</body>

</html>
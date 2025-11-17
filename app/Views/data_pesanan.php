<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Dashboard Admin - Creative Cell</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>

<body>

    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-transparent fixed-top shadow-sm">
        <div class="container-fluid px-4">
            <h2>Admin Panel</h2>
            <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAdmin"
                aria-controls="navbarNavAdmin" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavAdmin">
                <ul class="navbar-nav text-end">
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('admin') ?>">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link active" href="<?= base_url('pesanan') ?>">Data Pesanan</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('logout') ?>"><i class="bi bi-box-arrow-right"></i> Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- konten utama -->
    <section class="py-5 mt-5">
        <div class="container">
            <!-- header -->
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2>Data Pesanan</h2>
            </div>

            <!-- tabel produk -->
            <div class="table-responsive mb-5">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-light text-center">
                        <tr>
                            <th>Nomor</th>
                            <th>Nama Pemesan</th>
                            <th>Nomor Telepon</th>
                            <th>Nama Produk</th>
                            <th>Status Pesanan</th>
                            <th>Dibuat</th>
                            <th>Diubah</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($produk)) : ?>
                            <?php $no = 1;
                            foreach ($produk as $item) : ?>
                                <tr>
                                    <td class="text-center"><?= $no++ ?></td>
                                    <td><?= esc($item['id_user']) ?></td>
                                    <td><?= esc($item['nomor_telepon']) ?></td>
                                    <td><?= esc($item['nama_produk']) ?></td>
                                    <td><?= esc($item['status_pesanan']) ?></td>
                                    <td><?= esc($item['dibuat']) ?></td>
                                    <td><?= esc($item['diubah']) ?></td>
                                    <td class="text-center">
                                        <a href="<?= base_url('update/' . $item['id_pesanan']) ?>" class="btn btn-sm btn-outline-dark">Konfirmasi</a>
                                        <a href="<?= base_url('delete/' . $item['id_pesanan']) ?>" class="btn btn-sm btn-outline-dark" onclick="return confirm('Yakin ingin menghapus produk ini?')">Tolak</a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="7" class="text-center">Belum ada produk.</td>
                            </tr>
                        <?php endif ?>
                    </tbody>
                </table>
            </div>

            <!-- ===========================
     LAPORAN PENJUALAN
============================ -->
            <div class="card shadow-sm mb-5">
                <div class="card-body">

                    <!-- Header Laporan -->
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h3 class="mb-0">Laporan Penjualan</h3>

                        <!-- Tombol Export -->
                        <div>
                            <a href="<?= base_url('admin/laporan/export/pdf') ?>" class="btn btn-danger btn-sm">
                                <i class="bi bi-file-earmark-pdf"></i> Download PDF
                            </a>
                            <a href="<?= base_url('admin/laporan/export/excel') ?>" class="btn btn-success btn-sm">
                                <i class="bi bi-file-earmark-excel"></i> Download Excel
                            </a>
                        </div>
                    </div>

                    <!-- Filter Periode -->
                    <!-- Filter Periode -->
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <form method="get" action="<?= base_url('pesanan/laporan') ?>">
                                <label class="form-label fw-bold">Pilih Periode</label>
                                <select name="periode" class="form-select" onchange="this.form.submit()">
                                    <option value="harian" <?= ($periode ?? '') == 'harian' ? 'selected' : '' ?>>Harian</option>
                                    <option value="mingguan" <?= ($periode ?? '') == 'mingguan' ? 'selected' : '' ?>>Mingguan</option>
                                    <option value="bulanan" <?= ($periode ?? '') == 'bulanan' ? 'selected' : '' ?>>Bulanan</option>
                                </select>
                            </form>
                        </div>
                    </div>


                    <!-- Tabel Laporan -->
                    <div class="table-responsive mb-4">
                        <table class="table table-bordered align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th class="text-center">Periode</th>
                                    <th class="text-center">Jumlah Pesanan</th>
                                    <th class="text-center">Total Pendapatan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($laporan)) : ?>
                                    <?php foreach ($laporan as $row) : ?>
                                        <tr>
                                            <td class="text-center"><?= esc($row['periode']) ?></td>
                                            <td class="text-center"><?= esc($row['total_pesanan']) ?></td>
                                            <td class="text-center">Rp <?= number_format($row['total_pendapatan'], 0, ',', '.') ?></td>
                                        </tr>
                                    <?php endforeach ?>
                                <?php else : ?>
                                    <tr>
                                        <td colspan="3" class="text-center text-muted">Belum ada data laporan.</td>
                                    </tr>
                                <?php endif ?>
                            </tbody>

                        </table>
                    </div>

                    <!-- Grafik -->
                    <div>
                        <h5 class="mb-3">Grafik Laporan</h5>
                        <canvas id="chartLaporan" height="120"></canvas>
                    </div>

                </div>
            </div>

            <!-- Chart.js -->
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

            <script>
                let chart; // untuk menyimpan grafik agar bisa di-update

                document.getElementById('filter-periode').addEventListener('change', function() {
                    const periode = this.value;
                    if (!periode) return;

                    // Fetch data dari controller
                    fetch('/admin/laporan/filter?periode=' + periode)
                        .then(res => res.json())
                        .then(data => {
                            updateTable(data, periode);
                            updateChart(data, periode);
                        });
                });

                function updateTable(data, periode) {
                    let html = '';

                    if (data.length === 0) {
                        html = `<tr>
                    <td colspan="3" class="text-center text-muted">Data tidak ditemukan.</td>
                </tr>`;
                    } else {
                        data.forEach(row => {
                            html += `
                    <tr>
                        <td class="text-center">${row.tanggal ?? row.minggu ?? row.bulan}</td>
                        <td class="text-center">${row.total_pesanan}</td>
                        <td class="text-center">Rp ${row.total_pendapatan}</td>
                    </tr>`;
                        });
                    }

                    document.getElementById('tabel-laporan').innerHTML = html;
                }

                function updateChart(data, periode) {
                    const labels = data.map(r => r.tanggal ?? r.minggu ?? r.bulan);
                    const values = data.map(r => r.total_pendapatan);

                    const ctx = document.getElementById('chartLaporan').getContext('2d');

                    // Hapus grafik sebelumnya jika ada
                    if (chart) chart.destroy();

                    chart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: labels,
                            datasets: [{
                                label: 'Pendapatan (Rp)',
                                data: values,
                                borderWidth: 2,
                                fill: false,
                            }]
                        }
                    });
                }
            </script>


    </section>

    <!-- footer -->
    <footer class="text-center py-3">
        <p>&copy; <?= date('Y') ?> Creative Cell - Admin Panel.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
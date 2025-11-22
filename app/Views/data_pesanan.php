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
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('admin') ?>">Daftar Produk</a></li>
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

            <!-- Laporan Penjualan -->
            <div class="card shadow-sm mb-5 mt-4">
                <div class="card-body">

                    <h3 class="mb-4">Laporan Penjualan</h3>
                    <div>
                        <a href="<?= base_url('export/pdf') ?>" class="btn btn-danger btn-sm">
                            <i class="bi bi-file-earmark-pdf"></i> Download PDF
                        </a>
                        <a href="<?= base_url('export/excel') ?>" class="btn btn-success btn-sm">
                            <i class="bi bi-file-earmark-excel"></i> Download Excel
                        </a>
                    </div>
                    <form method="get" action="<?= base_url('laporan') ?>" class="row g-3 mb-4">

                        <div class="col-md-4">
                            <label class="form-label fw-bold">Tanggal Mulai</label>
                            <input type="date" name="mulai" class="form-control"
                                value="<?= $tanggalMulai ?? '' ?>">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label fw-bold">Tanggal Akhir</label>
                            <input type="date" name="akhir" class="form-control"
                                value="<?= $tanggalAkhir ?? '' ?>">
                        </div>

                        <div class="col-md-4 d-flex align-items-end">
                            <button class="btn btn-dark w-100">Filter</button>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table class="table table-bordered align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th class="text-center">Total Pesanan Selesai</th>
                                    <th class="text-center">Total Pendapatan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center fw-bold">
                                        <?= $totalPesanan ?? 0 ?>
                                    </td>
                                    <td class="text-center fw-bold">
                                        Rp <?= number_format($totalPendapatan ?? 0, 0, ',', '.') ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </section>

    <!-- footer -->
    <footer class="text-center py-3">
        <p>&copy; <?= date('Y') ?> Creative Cell - Admin Panel.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
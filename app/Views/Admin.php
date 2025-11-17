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
                    <li class="nav-item"><a class="nav-link active" href="<?= base_url('Admin') ?>">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('pesanan') ?>">Data Pesanan</a></li>
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
                <h2>Daftar Produk</h2>
            </div>

            <!-- tabel produk -->
            <div class="table-responsive mb-5">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-light text-center">
                        <tr>
                            <th>No</th>
                            <th>Nama Produk</th>
                            <th>Provider</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($produk)) : ?>
                            <?php $no = 1;
                            foreach ($produk as $item) : ?>
                                <tr>
                                    <td class="text-center"><?= $no++ ?></td>
                                    <td><?= esc($item['nama_produk']) ?></td>
                                    <td><?= esc($item['provider']) ?></td>
                                    <td>Rp<?= number_format($item['harga_produk'], 0, ',', '.') ?></td>
                                    <td><?= esc($item['stok_produk']) ?></td>
                                    <td><?= esc($item['deskripsi']) ?></td>
                                    <td class="text-center">
                                        <a href="<?= base_url('produk/edit/' . $item['id_produk']) ?>" class="btn btn-sm btn-outline-dark">Edit</a>
                                        <a href="<?= base_url('produk/delete/' . $item['id_produk']) ?>" class="btn btn-sm btn-outline-dark" onclick="return confirm('Yakin ingin menghapus produk ini?')">Hapus</a>
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

            <!-- form tambah produk -->
            <div class="container mt-5">
                <div class="mx-auto" style="max-width: 600px;">
                    <h4 class="mb-4">Tambah Produk Baru</h4>
                    <form action="<?= base_url('produk/add') ?>" method="post">
                        <div class="mb-3">
                            <label for="nama_produk" class="form-label">Nama Produk</label>
                            <input type="text" name="nama_produk" id="nama_produk" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="harga_produk" class="form-label">Harga Produk</label>
                            <input type="number" name="harga_produk" id="harga_produk" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="stok_produk" class="form-label">Stok Produk</label>
                            <input type="number" name="stok_produk" id="stok_produk" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="provider" class="form-label">Provider</label>
                            <select name="provider" id="provider" class="form-select" required>
                                <option value="">-- Pilih Provider --</option>
                                <option value="Telkomsel">Telkomsel</option>
                                <option value="XL">XL</option>
                                <option value="Axis">Axis</option>
                                <option value="Tri">Tri</option>
                                <option value="Indosat">Indosat</option>
                                <option value="Smartfren">Smartfren</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi Produk</label>
                            <textarea name="deskripsi" id="deskripsi" class="form-control" rows="3"></textarea>
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-light">Simpan Produk</button>
                        </div>
                    </form>
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
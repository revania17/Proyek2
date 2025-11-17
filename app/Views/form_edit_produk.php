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
                    <li class="nav-item"><a class="nav-link active" href="<?= base_url('admin') ?>">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('logout') ?>"><i class="bi bi-box-arrow-right"></i> Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- konten utama -->
    <section class="py-5 mt-4">
        <div class="container">
            <!-- header -->
            <div class="d-flex justify-content-between align-items-center mb-2">
                <h2>Form Edit Produk</h2>
            </div>

            <!-- form edit produk -->
            <div class="container mt-1">
                <div class="mx-auto" style="max-width: 600px;">
                    <form action="<?= base_url('produk/update/' . $produk['id_produk']) ?>" method="post">
                        <div class="mb-3">
                            <label for="nama_produk" class="form-label">Nama Produk</label>
                            <input type="text" name="nama_produk" id="nama_produk" class="form-control" value="<?= esc($produk['nama_produk']) ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="harga_produk" class="form-label">Harga Produk</label>
                            <input type="number" name="harga_produk" id="harga_produk" class="form-control" value="<?= esc($produk['harga_produk']) ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="stok_produk" class="form-label">Stok Produk</label>
                            <input type="number" name="stok_produk" id="stok_produk" class="form-control" value="<?= esc($produk['stok_produk']) ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="provider" class="form-label">Provider</label>
                            <select name="provider" id="provider" class="form-select" required>
                                <option value="">-- Pilih Provider --</option>
                                <option value="Telkomsel" <?= ($produk['provider'] == 'Telkomsel') ? 'selected' : '' ?>>Telkomsel</option>
                                <option value="XL" <?= ($produk['provider'] == 'XL') ? 'selected' : '' ?>>XL</option>
                                <option value="Axis" <?= ($produk['provider'] == 'Axis') ? 'selected' : '' ?>>Axis</option>
                                <option value="Tri" <?= ($produk['provider'] == 'Tri') ? 'selected' : '' ?>>Tri</option>
                                <option value="Indosat" <?= ($produk['provider'] == 'Indosat') ? 'selected' : '' ?>>Indosat</option>
                                <option value="Smartfren" <?= ($produk['provider'] == 'Smartfren') ? 'selected' : '' ?>>Smartfren</option>
                            </select>

                        </div>

                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi Produk</label>
                            <textarea name="deskripsi" id="deskripsi" class="form-control" rows="3"><?= esc($produk['deskripsi']) ?></textarea>
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
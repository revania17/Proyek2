<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Paket Data Axis - Creative Cell</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
    <style>

        .btn-tambah {
            background-color: #fff;
            color: #000;
            font-weight: bold;
            border: none;
        }

        .btn-tambah:hover {
            background-color: #eee;
            color: #000;
        }

    </style>
</head>

<body>

    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-transparent fixed-top shadow-sm">
        <div class="container-fluid px-4">
            <!-- logo di kiri -->
            <h2>Creative Cell</h2>

            <!-- hamburger menu di kanan -->
            <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- isi menu -->
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav text-end">
                    <form action="<?= base_url('produk/cari'); ?>" method="get" class="search-container">
                        <div class="search-box">
                            <span class="search-icon">
                                <i class="bi bi-search"></i>
                            </span>
                            <input type="text" name="keyword" placeholder="Mau cari apa?" required>
                        </div>
                    </form>
                    <li class="nav-item">
                        <a class="nav-link active" href="<?= base_url('home') ?>">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url() ?>#layanan">Layanan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('login') ?>" title="Login">
                            <i class="bi bi-person-circle fs-5"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- konten -->
    <div class="container py-5 mt-5">
        <h2 class="mb-4 fw-semibold text-white">Hasil Pencarian</h2>
        <div class="row">

            <?php foreach ($produk as $data):
                if ($data['stok_produk'] > 0): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm card-voucher h-100 text-center">
                            <div class="card-body">

                                <?php
                                $logo = 'default.png';

                                if ($data['provider'] == 'Axis') {
                                    $logo = 'logo axis.png';
                                } elseif ($data['provider'] == 'Telkomsel') {
                                    $logo = 'logo telkom.png';
                                } elseif ($data['provider'] == 'Smartfren') {
                                    $logo = 'logo smartfren.png';
                                } elseif ($data['provider'] == 'XL') {
                                    $logo = 'logo xl.png';
                                } elseif ($data['provider'] == 'Indosat') {
                                    $logo = 'logo indosat.png';
                                } elseif ($data['provider'] == 'Tri') {
                                    $logo = 'logo tri.png';
                                }
                                ?>

                                <img src="<?= base_url('images/' . $logo) ?>"
                                    alt="<?= $data['provider'] ?>"
                                    class="logo-layanan mb-3" />

                                <h5 class="card-title"><?= $data['provider'] ?> <?= $data['nama_produk'] ?></h5>
                                <p class="card-text"><?= $data['deskripsi'] ?></p>
                                <a href="<?= base_url('form?id_voucher=' . $data['id_produk']) ?>" class="btn btn-tambah">
                                    Beli Paket Data
                                </a>
                            </div>
                        </div>
                    </div>

            <?php endif;
            endforeach ?>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
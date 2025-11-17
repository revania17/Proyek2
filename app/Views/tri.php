<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Paket Data XL - Creative Cell</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />

  <style>
    body {
      background: linear-gradient(to right, #a83252, #1a1a2e);
      color: white;
      font-family: Georgia, 'Times New Roman', Times, serif;
    }

    .navbar {
      backdrop-filter: blur(10px);
      -webkit-backdrop-filter: blur(10px);
      height: 70px;
      background-color: rgba(0, 0, 0, 0.4);
    }

    .navbar-toggler-icon {
      filter: invert(1);
    }

    .nav-link {
      position: relative;
      color: #fff !important;
      font-weight: 500;
      font-size: 18px;
      padding: 8px 12px;
      transition: all 0.3s ease;
      display: inline-block;
    }

    .nav-link:hover {
      transform: translateY(-3px);
      text-shadow:
        0 2px 4px rgba(0, 0, 0, 0.7),
        0 4px 8px rgba(0, 0, 0, 0.6),
        0 6px 12px rgba(0, 0, 0, 0.5);
    }

    .hero-section {
      padding-top: 100px;
    }

    /* RESPONSIVE NAV */
    @media (max-width: 768px) {
      .navbar-collapse {
        background-color: white;
        /* ungu pastel transparan */
        border-radius: 12px;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        position: absolute;
        top: 70px;
        right: 16px;
        width: 180px;
        padding: 10px 14px;
        z-index: 999;
      }

      .navbar-nav {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
      }

      .nav-link {
        color: #222 !important;
        /* hitam keabu, biar kontras */
        font-size: 16px;
        font-weight: 600;
        padding: 8px 0;
        width: 100%;
        border-radius: 6px;
        transition: background-color 0.2s ease;
      }

      .nav-link:hover {
        background-color: rgba(255, 255, 255, 0.5);
        /* efek hover lembut */
        text-shadow: none;
        transform: none;
      }
    }

    .logo-layanan {
      max-width: 80px;
    }

    .card-voucher {
      background-color: rgba(255, 255, 255, 0.1);
      color: white;
      transition: transform 0.2s;
      border: none;
    }

    .card-voucher:hover {
      transform: scale(1.02);
    }

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

    footer {
      background-color: rgba(255, 255, 255, 0.1);
      color: #fff;
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
    <h2 class="mb-4 fw-semibold text-white">Daftar Paket Data Tri</h2>
    <div class="row">

    <?php foreach ($produk as $data): 
      if($data ['stok_produk'] > 0):?> 
      <div class="col-md-4 mb-4">
        <div class="card shadow-sm card-voucher h-100 text-center">
          <div class="card-body">
            <img src="images/logo tri.png" alt="Logo tri" class="logo-layanan mb-3" />
            <h5 class="card-title"><?= $data ['provider']?> <?= $data ['nama_produk']?></h5>
            <p class="card-text"><?= $data ['deskripsi']?></p>
            <a href="<?= base_url('form?id_voucher='. $data['id_produk'])?>" class="btn btn-tambah">Beli Paket Data</a>
          </div>
        </div>
      </div>
    <?php endif;endforeach?>

    </div>
  </div>

  <!-- footer -->
  <footer class="text-center py-3">
    <p>&copy; 2023 Creative Cell. All rights reserved.</p>
     <p>📍Jl. Sarikaso III No.3, Sarijadi, Kec. Sukasari, Kota Bandung, Jawa Barat 40151</p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
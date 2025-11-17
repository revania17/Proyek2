<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Form Pesanan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
  <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
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
        </ul>
      </div>
    </div>
  </nav>

  <!-- konten utama -->
  <section class="py-5 mt-4">
    <div class="container">
      <!-- header -->
      <div class="d-flex justify-content-between align-items-center mb-2">
        <h2>Form Pembelian Produk</h2>
      </div>

      <!-- form edit produk -->
      <div class="container mt-1">
        <div class="mx-auto" style="max-width: 600px;">
          <form action="<?= base_url('pesan') ?>" method="post">
            <div class="mb-3">
              <input type="hidden" name="id_produk" value="<?= esc($id_voucher) ?>">
              <label for="nama_produk" class="form-label">Nomor Telepon</label>
              <input type="text" name="nomor_telepon" class="form-control" required>
            </div>

            <div class="text-end">
              <button type="submit" class="btn btn-light">Beli</button>
            </div>
          </form>
        </div>
      </div>
  </section>

  <!-- footer -->
  <footer class="text-center py-3 mt-auto">
    <p>&copy; 2023 Creative Cell. All rights reserved.</p>
    <p>📍Jl. Sarikaso III No.3, Sarijadi, Kec. Sukasari, Kota Bandung, Jawa Barat 40151</p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  
  <?php if (session()->getFlashdata('error')): ?>
    <script>
      alert("<?= session()->getFlashdata('error') ?>");
      window.location.href = "<?= base_url('login') ?>";
    </script>
  <?php endif; ?>

</body>

</html>
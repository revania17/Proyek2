<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Konter Kita</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
  <script type="module" src="https://cdn.jsdelivr.net/gh/domyid/tracker@main/index.js"></script>
  <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>

<body>
  <!-- navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-transparent fixed-top shadow-sm">
    <div class="container-fluid px-4">
      <h2>Creative Cell</h2>
      <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

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
          <li class="nav-item"><a class="nav-link active" href="#beranda">Beranda</a></li>
          <li class="nav-item"><a class="nav-link" href="#layanan">Layanan</a></li>
          <li class="nav-item"><a class="nav-link" href="<?= base_url('login') ?>" title="Login"><i class="bi bi-person-circle fs-5"></i></a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- header -->
  <section id="beranda" class="py-5"></section>
  <header class="header-section text-dark py-5">
    <div class="container">
      <div class="row align-items-center text-center text-md-start">
        <div class="col-md-8 custom-header">
          <h1 class="display-4 fw-bold animate animate-from-top">
            <span style="color: white;">Selamat Datang di </span><br>
            <span style="color: black;">Creative Cell!</span>
          </h1>
          <p class="animate animate-from-bottom" style="color: white;">
            Halo! 👋👋👋 <br> Di Creative Cell, kamu bisa beli berbagai jenis paket data dengan cara yang cepat,
            gampang, dan aman. Semua tersedia online, jadi kamu tinggal pilih paket data yang kamu butuhin, bayar, dan
            beres deh! Biar makin praktis, beli paket data sekarang nggak perlu ribet lagi.
          </p>
        </div>
        <div class="col-md-4 text-center">
          <img src="<?= base_url('images/rea lucu.png') ?>" class="img-fluid animate animate-from-right" style="max-height: 200px;">
        </div>
      </div>
    </div>
  </header>

  <!-- slider -->
  <div class="slider-wrapper">
    <div id="sliderCreativeCell" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2000">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="<?= base_url('images/ket1.jpg') ?>" class="d-block w-100" alt="Promo 1">
        </div>
        <div class="carousel-item">
          <img src="<?= base_url('images/ket2.jpg') ?>" class="d-block w-100" alt="Promo 2">
        </div>
        <div class="carousel-item">
          <img src="<?= base_url('images/ket3.jpg') ?>" class="d-block w-100" alt="Promo 3">
        </div>
        <div class="carousel-item">
          <img src="<?= base_url('images/ket4.jpg') ?>" class="d-block w-100" alt="Promo 4">
        </div>

      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#sliderCreativeCell" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#sliderCreativeCell" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
      </button>
    </div>
  </div>

  <section id="layanan" class="py-5">
    <div class="container">
      <h2 class="text-center mb-5">Layanan Kami</h2>
      <div class="row">
        <div class="col-md-4 d-flex align-items-center justify-content-center mb-4 mb-md-0 animate-left">
          <img src="<?= base_url('images/endul.png') ?>" alt="Ilustrasi Layanan" class="custom-image img-fluid">
        </div>
        <div class="col-md-8 animate-right">
          <div class="row">
            <div class="col-md-6 mb-4">
              <a href="<?= base_url('xl') ?>" class="text-decoration-none text-dark">
                <div class="card shadow-sm h-100">
                  <div class="card-body text-center">
                    <img src="<?= base_url('images/logo xl.png') ?>" alt="Logo Smartfren" class="mb-3 logo-layanan">
                    <h5 class="card-title">Paket Data XL</h5>
                    <p class="card-text">Kuota Stabil & Jaringan Luas.</p>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-md-6 mb-4">
              <a href="<?= base_url('axis') ?>" class="text-decoration-none text-dark">
                <div class="card shadow-sm h-100">
                  <div class="card-body text-center">
                    <img src="<?= base_url('images/logo axis.png') ?>" alt="Logo Smartfren" class="mb-3 logo-layanan">
                    <h5 class="card-title">Paket Data Axis</h5>
                    <p class="card-text">Paket Internet & Nelpon Murah.</p>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-md-6 mb-4">
              <a href="<?= base_url('indosat') ?>" class="text-decoration-none text-dark">
                <div class="card shadow-sm h-100">
                  <div class="card-body text-center">
                    <img src="<?= base_url('images/logo indosat.png') ?>" alt="Logo Smartfren" class="mb-3 logo-layanan">
                    <h5 class="card-title">Paket Data Indosat</h5>
                    <p class="card-text">Paket Internet & Nelpon Lengkap.</p>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-md-6 mb-4">
              <a href="<?= base_url('smartfren') ?>" class="text-decoration-none text-dark">
                <div class="card shadow-sm h-100">
                  <div class="card-body text-center">
                    <img src="<?= base_url('images/logo smartfren.png') ?>" alt="Logo Smartfren" class="mb-3 logo-layanan">
                    <h5 class="card-title">Paket Data Smartfren</h5>
                    <p class="card-text">Internet Stabil & Harga Bersahabat.</p>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-md-6 mb-4">
              <a href="<?= base_url('tri') ?>" class="text-decoration-none text-dark">
                <div class="card shadow-sm h-100">
                  <div class="card-body text-center">
                    <img src="<?= base_url('images/logo tri.png') ?>" alt="Logo Smartfren" class="mb-3 logo-layanan">
                    <h5 class="card-title">Paket Data Tri</h5>
                    <p class="card-text">Kuota Melimpah & Jaringan Anak Muda.</p>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-md-6 mb-4">
              <a href="<?= base_url('telkomsel') ?>" class="text-decoration-none text-dark">
                <div class="card shadow-sm h-100">
                  <div class="card-body text-center">
                    <img src="<?= base_url('images/logo telkom.png') ?>" alt="Logo Smartfren" class="mb-3 logo-layanan">
                    <h5 class="card-title">Paket Data Telkomsel</h5>
                    <p class="card-text">Sinyal Kuat & Akses Cepat di Mana Saja.</p>
                  </div>
                </div>
              </a>
            </div>
  </section>

  <!-- footer -->
  <footer class="text-center py-3">
    <p>&copy; 2023 Creative Cell. All rights reserved.</p>
    <p>📍Jl. Sarikaso III No.3, Sarijadi, Kec. Sukasari, Kota Bandung, Jawa Barat 40151</p>
  </footer>

  <!-- script -->
  <script>
    // active nav saat scroll
    window.addEventListener("scroll", function() {
      const sections = document.querySelectorAll("section");
      const navLinks = document.querySelectorAll(".nav-link");
      let currentSection = "";

      for (let i = sections.length - 1; i >= 0; i--) {
        const sectionTop = sections[i].offsetTop - 300;
        if (window.scrollY >= sectionTop) {
          currentSection = sections[i].getAttribute("id");
          break;
        }
      }

      navLinks.forEach((link) => {
        link.classList.remove("active");
        if (link.getAttribute("href").includes(currentSection)) {
          link.classList.add("active");
        }
      });
    });

    // animasi scroll
    document.addEventListener("DOMContentLoaded", function() {
      const observerOptions = {
        root: null,
        rootMargin: "0px",
        threshold: 0.2
      };

      const observerCallback = (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            entry.target.classList.add("show");
          } else {
            entry.target.classList.remove("show");
          }
        });
      };

      const observer = new IntersectionObserver(observerCallback, observerOptions);
      document.querySelectorAll(".animate-left, .animate-right, .animate").forEach((el) => observer.observe(el));

      const kontakElements = [
        document.getElementById("anim-nama"),
        document.getElementById("anim-email"),
        document.getElementById("anim-pesan"),
        document.getElementById("anim-button"),
      ];

      const kontakObserver = new IntersectionObserver(
        (entries) => {
          entries.forEach((entry) => {
            if (entry.isIntersecting) {
              kontakElements.forEach((el) => el.classList.remove("kontak-show"));
              setTimeout(() => kontakElements[0].classList.add("kontak-show"), 200);
              setTimeout(() => kontakElements[1].classList.add("kontak-show"), 400);
              setTimeout(() => kontakElements[2].classList.add("kontak-show"), 600);
              setTimeout(() => kontakElements[3].classList.add("kontak-show"), 800);
            } else {
              kontakElements.forEach((el) => el.classList.remove("kontak-show"));
            }
          });
        }, {
          threshold: 0.2
        }
      );

      kontakObserver.observe(document.getElementById("kontak"));
    });
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
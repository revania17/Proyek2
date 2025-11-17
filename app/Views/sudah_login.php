<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Kamu Sudah Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    html, body {
      height: 100%;
      margin: 0;
    }

    body {
      display: flex;
      flex-direction: column;
      background: linear-gradient(to right, #a83252, #1a1a2e);
      color: white;
      font-family: Georgia, 'Times New Roman', Times, serif;
    }

    .main-content {
      flex: 1;
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
      margin-top: 3rem;
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

    @media (max-width: 768px) {
      .navbar-collapse {
        background-color: white;
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
        font-size: 16px;
        font-weight: 600;
        padding: 8px 0;
        width: 100%;
        border-radius: 6px;
        transition: background-color 0.2s ease;
      }

      .nav-link:hover {
        background-color: rgba(255, 255, 255, 0.5);
        text-shadow: none;
        transform: none;
      }
    }

    .form-container {
      background-color: rgba(255, 255, 255, 0.1);
      padding: 30px;
      border-radius: 15px;
      width: 100%;
      max-width: 400px;
    }

    .form-control {
      background-color: rgba(255, 255, 255, 0.2);
      border: none;
      color: rgb(0, 0, 0);
    }

    .form-control::placeholder {
      color: rgba(0, 0, 0, 0.7);
    }

    .btn-danger {
      background-color: black;
      color: #000;
      font-weight: bold;
      border: none;
      transition: all 0.3s ease;
    }

    .btn-danger:hover {
      background-color: transparent;
      border: 2px solid #fff;
      color: #fff;
    }

    .btn-primary {
      background-color: black;
      color: #000;
      font-weight: bold;
      border: none;
      transition: all 0.3s ease;
    }

    .btn-primary:hover {
      background-color: transparent;
      border: 2px solid #fff;
      color: #fff;
    }

    .text-center a {
      color: #fff;
      text-decoration: underline;
    }

    footer {
      background-color: rgba(0, 0, 0, 0.3);
      backdrop-filter: blur(10px);
      -webkit-backdrop-filter: blur(10px);
      padding: 1rem;
    }
  </style>
</head>
<body>
  <div class="main-content text-center">
    <div class="container">
      <h1>Halo, <?= esc($nama_lengkap) ?>!</h1>
      <p>Username: <?= esc($username) ?></p>
      <p>Kamu sudah login, jadi tidak perlu login lagi.</p>
      <a href="<?= base_url('home') ?>" class="btn btn-primary">Lanjut ke Beranda</a>
      <a href="<?= base_url('logout') ?>" class="btn btn-danger">Logout</a>
    </div>
  </div>

  <footer class="text-center">
    <p>&copy; 2025 Creative Cell. All rights reserved.</p>
    <p>📍Jl. Sarikaso III No.3, Sarijadi, Kec. Sukasari, Kota Bandung, Jawa Barat 40151</p>
  </footer>
</body>
</html>
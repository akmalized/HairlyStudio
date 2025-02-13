<?php
session_start();
include './code/koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HairlyStudio</title>
  <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="./code/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
</head>
<body>
  <!-- Navbar Section -->
  <header class="navbar">
    <div class="container1">
      <div class="logo">
        <a href="halaman.php"><img src="./asset/logo.png" alt="HairlyStudio Logo" class="animate__animated animate__fadeInDown"></a>
      </div>
      <nav class="nav-links">
        <ul>
          <li class="animate__animated animate__fadeInDown"><a href="#hairlyStudio">Home</a></li>
          <li class="animate__animated animate__fadeInDown"><a href="#layanan">Layanan</a></li>
          <li class="animate__animated animate__fadeInDown"><a href="#tentangKami">Tentang Kami</a></li>
          <li class="animate__animated animate__fadeInDown"><a href="./code/riwayat.php">Riwayat Pemesanan</a></li>
        </ul>
      </nav>
      <div class="animate__animated animate__fadeInDown auth-buttons">
        <a href="logout.php" class="btn btn-primary">Logout</a>
      </div>
    </div>
  </header>
  
  <!-- Hero Section -->
  <section class="hero" id="hairlyStudio">
    <div class="container2">
        <div class="heading">
            <h1 class="animate__animated animate__fadeInUp" >Hairly<span>Studio</span> : Perawatan <br>Rambut Modern dan Elegan</h1>
        </div>
        <div>
            <p class="animate__animated animate__fadeInUp" >HairlyStudio menghadirkan perawatan rambut modern dan elegan dengan <br>layanan profesional, detail sempurna, dan suasana nyaman.</p>
        </div>
        <div class="animate__animated animate__fadeInUp auth-buttons">
          <a href="./code/pembayaran.php" class="btn btn-primary">Pesan Sekarang</a>
        </div>
    </div>
  </section>  

  <!-- Layanan Section -->
  <section class="services-section" id="layanan">
    <div class="text">
        <div>
            <h2 class="services-title">Layanan</h2>
        </div>
        <div>
            <p class="services-subtitle">Pilih paket layanan yang sesuai dengan kebutuhanmu!</p>
        </div>
    </div>
    
    <div class="services-container">
      <div class="service-card">
        <div><img src="./asset/Layanan-Basic.png" alt=""></div>
      </div>
      <div class="service-card">
        <div><img src="./asset/Layanan-Premium.png" alt=""></div>
      </div>
      <div class="service-card">
        <div><img src="./asset/Layanan-Ultimate.png" alt=""></div>
      </div>
    </div>
  </section>

  <!-- Tentang Kami Section -->
  <div class="about" id="tentangKami">
    <div class="text">
        <div>
            <h2 class="services-title">Tentang Kami</h2>
        </div>
        <div>
            <p class="services-subtitle">Kelompok 10 - Pemrograman Web Sistem Informasi 1</p>
        </div>
    </div>
    <div class="team-member">
        <img src="./asset/img-Agus.png" alt="Agus Fajar Rahmawan">
        <div>
            <h3>10523002 - Agus Fajar Rahmawan</h3>
            <p>JobDesk: <br> <span class="jobdesk"> - Membuat halaman login <br> - Membuat halaman daftar</span></p>
        </div>
    </div>

    <div class="team-member">
        <img src="./asset/img-Fariz.png" alt="Fariz Oktavian">
        <div>
            <h3>10523006 - Fariz Oktavian</h3>
            <p>JobDesk: <br><span class="jobdesk"> - Membuat halaman Landing Page <br> - Mendesain Halaman WEB <br> - Styling Halaman Masuk dan Halaman Daftar <br> - Membuat database CURD <br> - Membuat riwayat transaksi <br> - Membuat halaman transaksi </span></p>
        </div>
    </div>

    <div class="team-member">
        <img src="./asset/img-Akmal.png" alt="Muhammad Akmal Ramadhan">
        <div>
            <h3>10523021 - Muhammad Akmal Ramadhan</h3>
            <p>JobDesk: <br><span class="jobdesk"> - Membuat halaman transaksi </span></p>
        </div>
    </div>
  </div>

  <!-- Footer Section -->
  <footer class="footer">
      <div class="footer-content">
        <div class="footer-logo">
          <img src="./asset/logo.png" alt="">
          <p>Jl. Dipati Ukur No.112-116, Lebakgede,<br>
            Kecamatan Coblong, Kota Bandung, Jawa<br>
            Barat 40132
          </p>
        </div>
        <div class="sosmed">
          <div class="footer-social">
            <a href="https://x.com/farizoktaviaan"><img src="./asset/tweeter.png" alt="tweeter"></a>
            <a href="https://www.instagram.com/farizoktaviaan/"><img src="./asset/ig.png" alt="instagram"></a>
            <a href="https://www.facebook.com/profile.php?id=100079199182189"><img src="./asset/facebook.png" alt="facebook"></a>
          </div>
          <div class="footer-copyright">
            <p>© 2025 — Copyright</p>
          </div>
        </div>
    </div>
  </footer>
</body>
</html>

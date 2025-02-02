<?php
session_start();
include 'koneksi.php';

// Ambil semua data dari tabel pesanan
$query = "SELECT * FROM pesanan";
$result = mysqli_query($koneksi, $query);
?>

<?php
if (isset($_SESSION['pesan'])) {
    echo "<script>alert('" . $_SESSION['pesan'] . "');</script>";
    unset($_SESSION['pesan']);
}
?>


<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    /* Navbar */
    .navbar {
        padding: 15px 0;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        z-index: 1000;
        background-color: #1f1f1f;
    }

    .container1 {
        width: 100%;
        max-width: 1200px;
        margin: 0 auto;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0 20px;
    }

    .logo img {
        height: 40px;
    }

    .nav-links ul {
        list-style: none;
        display: flex;
        gap: 20px;
    }

    .nav-links a {
        text-decoration: none;
        color: #fff;
        font-weight: 500;
        font-size: 1rem;
    }

    .nav-links a:hover {
        color: #62518B;
    }

    .auth-buttons {
        display: flex;
        gap: 10px;
    }

    .btn {
        text-decoration: none;
        padding: 8px 16px;
        border-radius: 5px;
        font-weight: bold;
        font-size: 0.9rem;
        transition: all 0.3s ease;
    }

    .btn-primary {
        background-color: #62518B;
        color: #fff;
    }

    .btn-primary:hover {
        background-color: #4a3c6b;
    }

    .btn-secondary {
        background-color: transparent;
        color: #fff;
        border: 1px solid #fff;
    }

    .btn-secondary:hover {
        background-color: #fff;
        color: #1f1f1f;
    }

    /* Body and Table */
    body {
        font-family: Arial, sans-serif;
        background-color: #1f1f1f;
        margin: 0;
        padding-top: 80px; 
        padding-left: 64px;
        padding-right: 64px;
    }

    h1 {
        text-align: center;
        color: #f1f1f1;
        margin-top: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        background-color: #fff; 
        border-radius: 8px; 
        overflow: hidden; 
    }

    th, td {
        padding: 12px 15px;
        text-align: left;
        border-bottom: 1px solid #ddd;
        color: #333; 
    }

    th {
        background-color: #62518B;
        color: #f1f1f1;
    }

    th {
        background-color: #62518B;
        color: #f1f1f1;
    }

    a {
        text-decoration: none;
        color: #62518B;
        font-weight: bold;
    }

    a:hover {
        text-decoration: underline;
    }

    .actions a {
        margin: 0 5px;
    }

    .delete-link {
        color: #dc3545;
    }

    .delete-link:hover {
        text-decoration: underline;
    }
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Daftar Pesanan</title>
</head>
<body>

<!-- Navbar Section -->
<header class="navbar">
    <div class="container1">
      <div class="logo">
        <a href="../halaman.php"><img src="../asset/logo.png" alt="HairlyStudio Logo" class="animate__animated animate__fadeInDown"></a>
      </div>
      <nav class="nav-links">
        <ul>
          <li class="animate__animated animate__fadeInDown"><a href="../halaman.php">Home</a></li>
          <li class="animate__animated animate__fadeInDown"><a href="riwayat.php">Riwayat Pemesanan</a></li>
        </ul>
      </nav>
      <div class="animate__animated animate__fadeInDown auth-buttons">
        <a href="../logout.php" class="btn btn-primary">Logout</a>
      </div>
    </div>
  </header>

<h1>Daftar Pesanan</h1>
<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Waktu</th>
            <th>Tipe Layanan</th>
            <th>Harga</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?= $row['id']; ?></td>
                <td><?= $row['nama']; ?></td>
                <td><?= $row['waktu']; ?></td>
                <td><?= $row['tipe_layanan']; ?></td>
                <td>Rp <?= number_format($row['harga'], 0, ',', '.'); ?></td>
                <td><?= $row['deskripsi']; ?></td>
                <td>
                    <a href="../deletePesanan.php?id=<?= $row['id']; ?>" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>
</body>
</html>

<?php
session_start();
include 'koneksi.php';

// Ambil semua data dari tabel pesanan
$query = "SELECT * FROM pesanan";
$result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Daftar Pesanan</title>
</head>
<body>
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
                    <!-- <td>
                        <a href="edit_pesanan.php?id=<?= $row['id']; ?>">Edit</a> | 
                        <a href="delete_pesanan.php?id=<?= $row['id']; ?>" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                    </td> -->
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>

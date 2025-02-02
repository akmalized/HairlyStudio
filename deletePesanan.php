<?php
session_start();
include 'koneksi.php'; 

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM pesanan WHERE id = ?";
    $stmt = mysqli_prepare($koneksi, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $id);
        $execute = mysqli_stmt_execute($stmt);
        
        if ($execute) {
            $_SESSION['pesan'] = "Pesanan berhasil dihapus!";
        } else {
            $_SESSION['pesan'] = "Gagal menghapus pesanan.";
        }

        mysqli_stmt_close($stmt);
    } else {
        $_SESSION['pesan'] = "Terjadi kesalahan dalam query.";
    }

    header("Location: riwayat.php");
    exit();
} else {
    $_SESSION['pesan'] = "ID pesanan tidak ditemukan.";
    header("Location: riwayat.php");
    exit();
}
?>

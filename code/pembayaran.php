<?php
session_start();
include 'koneksi.php';

// Ambil data dari tabel 'layanan'
$query = "SELECT * FROM layanan";
$result = mysqli_query($koneksi, $query);

// Simpan data layanan ke dalam array
$services = [];
while ($row = mysqli_fetch_assoc($result)) {
    $services[] = $row;
}

// Jika tombol "Pesan Sekarang" diklik
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $waktu = $_POST['waktu'];
    $layanan_id = $_POST['layanan'];

    // Ambil detail layanan berdasarkan id
    $query = "SELECT * FROM layanan WHERE id = '$layanan_id'";
    $result = mysqli_query($koneksi, $query);
    $layanan = mysqli_fetch_assoc($result);

    $tipe_layanan = $layanan['nama_layanan'];
    $harga = $layanan['harga'];
    $deskripsi = $layanan['deskripsi'];

    // Masukkan data ke tabel pesanan
    $insert_query = "INSERT INTO pesanan (nama, waktu, tipe_layanan, harga, deskripsi) 
                     VALUES ('$nama', '$waktu', '$tipe_layanan', '$harga', '$deskripsi')";

    if (mysqli_query($koneksi, $insert_query)) {
        echo "<script>alert('Pesanan berhasil disimpan!');</script>";
    } else {
        echo "<script>alert('Gagal menyimpan pesanan!');</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>Pembayaran</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            background-color: #1f1f1f;
            font-family: 'Raleway', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .payment-container {
            background-color: #f1f1f1;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
            color: #1f1f1f;
            text-align: center;
            width: 400px;
        }
        .payment-container h2 {
            font-size: 22px;
            margin-bottom: 20px;
            border-bottom: 2px solid #1f1f1f;
            padding-bottom: 10px;
        }
        .form-group {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
        }
        .form-group label {
            flex: 1;
            text-align: left;
        }
        .form-group input, .form-group select {
            flex: 2;
            padding: 8px;
            border-radius: 5px;
            border: none;
            border: 1px solid #D1D1D1;
        }
        .buttons {
            display: flex;
            justify-content: space-around;
            margin-top: 20px;
        }
        .buttons button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #62518B;
            color: #f1f1f1;
            font-weight: bold;
            cursor: pointer;
        }
        .buttons button:hover {
            background-color: #d1c4e9;
        }
    </style>
</head>
<body>

<div class="payment-container">
    <h2>PEMBAYARAN</h2>
    <form method="POST" action="">
        <div class="form-group">
            <label>Nama:</label>
            <input type="text" name="nama" required>
        </div>
        
        <div class="form-group">
            <label>Waktu:</label>
            <input type="date" name="waktu" required>
        </div>

        <div class="form-group">
            <label>Tipe Layanan:</label>
            <select name="layanan" id="layanan" required onchange="updateDetails()">
                <option value="">-- Pilih Layanan --</option>
                <?php foreach ($services as $service): ?>
                    <option value="<?= $service['id']; ?>" 
                        data-harga="<?= $service['harga']; ?>" 
                        data-deskripsi="<?= htmlspecialchars($service['deskripsi']); ?>">
                        <?= htmlspecialchars($service['nama_layanan']); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label>Harga :</label>
            <input type="text" id="harga" readonly>
        </div>

        <div class="form-group">
            <label>Deskripsi :</label>
            <input type="text" id="deskripsi" readonly>
        </div>

        <div class="buttons">
            <button type="submit">Pesan Sekarang</button>
            <button type="button" onclick="window.location.href='riwayat.php'">Lihat Pesanan</button>
        </div>
    </form>
</div>

<script>
    function updateDetails() {
        var select = document.getElementById("layanan");
        var hargaField = document.getElementById("harga");
        var deskripsiField = document.getElementById("deskripsi");

        var selectedOption = select.options[select.selectedIndex];
        hargaField.value = 'Rp ' + (selectedOption.getAttribute("data-harga") || '0');
        deskripsiField.value = selectedOption.getAttribute("data-deskripsi") || 'Tidak ada deskripsi';
    }
</script>

</body>
</html>

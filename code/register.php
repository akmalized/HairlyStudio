<?php
session_start();
include 'koneksi.php';

if (isset($_POST['submit'])) {
    
    // Ambil data dari form
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);

    // Validasi jika email sudah terdaftar
    $checkEmailQuery = "SELECT * FROM user WHERE email='$email'";
    $result = mysqli_query($koneksi, $checkEmailQuery);
    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('Email sudah terdaftar!');</script>";
    } else {
        // Jika email belum terdaftar, lakukan insert ke database
        $insertQuery = "INSERT INTO user (nama, email, password) VALUES ('$nama', '$email', '$password')";
        $insertResult = mysqli_query($koneksi, $insertQuery);

        if ($insertResult) {
            echo "<script>alert('Pendaftaran berhasil!');</script>";
            echo "<script type='text/javascript'>window.location.href = '../index.php';</script>";
        } else {
            echo "<script>alert('Terjadi kesalahan saat mendaftar, coba lagi nanti!');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HairlyStudio - Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            }

        body {
            margin: 0;
            font-family: 'Raleway', sans-serif;
            background-color: #1f1f1f;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            background-color: #f1f1f1;
            width: 400px;
            padding: 80px 32px;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .login-container h1 {
            font-size: 24px;
            margin-bottom: 10px;
            font-weight: bold;
            color: #4A4A4A;
        }

        .login-container span {
            color: #6F4A8E;
        }

        .login-container p {
            color: #4A4A4A;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #D1D1D1;
            border-radius: 5px;
            font-size: 16px;
        }

        .form-group input:focus {
            outline: none;
            border-color: #6F4A8E;
            box-shadow: 0 0 5px rgba(111, 74, 142, 0.5);
        }

        .login-button {
            background-color: #6F4A8E;
            color: #FFFFFF;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            width: 100%;
        }

        .login-button:hover {
            background-color: #5A3C75;
        }

        .register-link {
            margin-top: 10px;
            font-size: 14px;
        }

        .register-link a {
            color: #6F4A8E;
            text-decoration: none;
        }

        .register-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>Hairly<span>Studio</span></h1>
        <p>Temukan kenyamanan memesan layanan barbershop kapan saja dan di mana saja.</p>
        <form method="post">
            <div class="form-group">
                <input type="text" name="nama" placeholder="Masukkan Nama" required>
            </div>
            <div class="form-group">
                <input type="email" name="email"  placeholder="Masukkan E-mail" required>
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="Masukkan Kata Sandi" required>
            </div>
            <button type="submit" name="submit" class="login-button">Daftar</button>
        </form>
        <div class="register-link">
            Sudah Punya Akun? <a href="../index.php">Masuk</a>
        </div>
    </div>
</body>
</html>

<?php

session_start();

/* Cek apakah admin sudah login */

if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) { // CRUD/Database: Proteksi Read - Memvalidasi status session login user

    echo "
    <script> // JavaScript: Tag pembuka untuk menyisipkan skrip JS di sisi klien

        alert('Silakan login terlebih dahulu untuk mengakses halaman ini.'); // JavaScript: Menampilkan dialog pesan peringatan di browser

        window.location='login.php'; // JavaScript: Mengalihkan (redirect) halaman browser ke halaman login

    </script> // JavaScript: Tag penutup skrip JS
    ";

    exit();

}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/dashboard.css">
</head>
<body>

<div class="dashboard">

    <div class="sidebar">
        <h2>UPTD SMP 17 Sinjai</h2>

        <a href="dashboard.php">Dashboard</a>
        <a href="siswa.php">Data Siswa</a>
        <a href="logout.php">Logout</a>
    </div>

    <div class="main">

        <div class="topbar">
            <h2>Dashboard</h2>
            <p>Sistem Management Data Siswa UPTD SMPN 17 Sinjai</p>
        </div>

        <div class="content">
            <h3>Selamat Datang!</h3>

            <div class="info-card">
                Anda login sebagai administrator
            </div>
        </div>

    </div>

</div>

</body>
</html>
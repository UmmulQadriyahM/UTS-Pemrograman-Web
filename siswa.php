<?php

session_start();

include "koneksi.php"; // [DATABASE] Koneksi Utama

/* =====================================
   Menghitung jumlah siswa tiap kelas
===================================== */

$kelas7 = mysqli_fetch_row(
    mysqli_query($koneksi, "SELECT COUNT(*) FROM siswa WHERE kelas LIKE '7%'") // [CRUD/DATABASE] Read - Hitung Jumlah Kelas 7
)[0];

$kelas8 = mysqli_fetch_row(
    mysqli_query($koneksi, "SELECT COUNT(*) FROM siswa WHERE kelas LIKE '8%'") // [CRUD/DATABASE] Read - Hitung Jumlah Kelas 8
)[0];

$kelas9 = mysqli_fetch_row(
    mysqli_query($koneksi, "SELECT COUNT(*) FROM siswa WHERE kelas LIKE '9%'") // [CRUD/DATABASE] Read - Hitung Jumlah Kelas 9
)[0];

/* =====================================
   Cek apakah admin sudah login
===================================== */

if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {

    echo "

    <script> // [JAVASCRIPT] Proteksi Halaman Login

        alert('Silakan login terlebih dahulu untuk mengakses halaman ini!');

        window.location='login.php';

    </script>

    ";

    exit();

}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Data Siswa</title>

    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/siswa.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>
<body>

<div class="dashboard">

    <div class="sidebar">
        <h2>UPTD SMPN 17 Sinjai</h2>

        <a href="dashboard.php">Dashboard</a>
        <a href="siswa.php" class="active">Data Siswa</a>
        <a href="logout.php">Logout</a>
    </div>

    <div class="main">

        <div class="topbar">
            <h2>Data Siswa</h2>
            <p>Pilih tingkatan kelas yang ingin dikelola.</p>
        </div>

        <div class="content">

            <div class="container-fluid">

                <div class="text-center mb-5">

                    <h3 class="fw-bold" style="color:#1f3c88;">
                        Pilih Tingkatan Kelas
                    </h3>

                    <p class="text-muted">
                        Silakan pilih tingkatan kelas yang ingin dikelola.
                    </p>

                </div>

                <div class="row g-4 justify-content-center">

                    <div class="col-xl-3 col-lg-4 col-md-6">

                        <a href="kelas7.php" class="card-link">

                            <div class="card shadow border-0 rounded-4 h-100 class-card">

                                <div class="card-body text-center">

                                    <div class="icon-circle bg-primary">
                                        <i class="bi bi-mortarboard-fill"></i>
                                    </div>

                                    <h3 class="mt-4 fw-bold text-primary">
                                        Kelas VII
                                    </h3>

                                    <div class="student-total">
    <?= $kelas7; ?>
</div>

                                    <p class="text-muted mb-4">
                                        Total Siswa
                                    </p>

                                    <div class="card-action">
                                        <span class="card-btn bg-primary">
                                            Kelola Data
                                            <i class="bi bi-arrow-right-short"></i>
                                        </span>
                                    </div>

                                </div>

                            </div>

                        </a>

                    </div>

                    <div class="col-xl-3 col-lg-4 col-md-6">

                        <a href="kelas8.php" class="card-link">

                            <div class="card shadow border-0 rounded-4 h-100 class-card">

                                <div class="card-body text-center">

                                    <div class="icon-circle bg-success">
                                        <i class="bi bi-mortarboard-fill"></i>
                                    </div>

                                    <h3 class="mt-4 fw-bold text-success">
                                        Kelas VIII
                                    </h3>

                                    <div class="student-total">
    <?= $kelas8; ?>
</div>

                                    <p class="text-muted mb-4">
                                        Total Siswa
                                    </p>

                                    <div class="card-action">
                                        <span class="card-btn bg-success">
                                            Kelola Data
                                            <i class="bi bi-arrow-right-short"></i>
                                        </span>
                                    </div>

                                </div>

                            </div>

                        </a>

                    </div>

                    <div class="col-xl-3 col-lg-4 col-md-6">

                        <a href="kelas9.php" class="card-link">

                            <div class="card shadow border-0 rounded-4 h-100 class-card">

                                <div class="card-body text-center">

                                    <div class="icon-circle bg-warning">
                                        <i class="bi bi-mortarboard-fill"></i>
                                    </div>

                                    <h3 class="mt-4 fw-bold text-warning">
                                        Kelas IX
                                    </h3>

                                    <div class="student-total">
    <?= $kelas9; ?>
</div>

                                    <p class="text-muted mb-4">
                                        Total Siswa
                                    </p>

                                    <div class="card-action">
                                        <span class="card-btn bg-warning text-white">
                                            Kelola Data
                                            <i class="bi bi-arrow-right-short"></i>
                                        </span>
                                    </div>

                                </div>

                            </div>

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html><?php

session_start();

include "koneksi.php"; // [DATABASE] Koneksi Utama Duplikat

/* =====================================
   Menghitung jumlah siswa tiap kelas
===================================== */

$kelas7 = mysqli_fetch_row(
    mysqli_query($koneksi, "SELECT COUNT(*) FROM siswa WHERE kelas LIKE '7%'") // [CRUD/DATABASE] Read - Hitung Jumlah Kelas 7 Duplikat
)[0];

$kelas8 = mysqli_fetch_row(
    mysqli_query($koneksi, "SELECT COUNT(*) FROM siswa WHERE kelas LIKE '8%'") // [CRUD/DATABASE] Read - Hitung Jumlah Kelas 8 Duplikat
)[0];

$kelas9 = mysqli_fetch_row(
    mysqli_query($koneksi, "SELECT COUNT(*) FROM siswa WHERE kelas LIKE '9%'") // [CRUD/DATABASE] Read - Hitung Jumlah Kelas 9 Duplikat
)[0];

/* =====================================
   Cek apakah admin sudah login
===================================== */

if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {

    echo "

    <script> // [JAVASCRIPT] Proteksi Halaman Login Duplikat

        alert('Silakan login terlebih dahulu untuk mengakses halaman ini!');

        window.location='login.php';

    </script>

    ";

    exit();

}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Data Siswa</title>

    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/siswa.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>
<body>

<div class="dashboard">

    <div class="sidebar">
        <h2>UPTD SMPN 17 Sinjai</h2>

        <a href="dashboard.php">Dashboard</a>
        <a href="siswa.php" class="active">Data Siswa</a>
        <a href="logout.php">Logout</a>
    </div>

    <div class="main">

        <div class="topbar">
            <h2>Data Siswa</h2>
            <p>Pilih tingkatan kelas yang ingin dikelola.</p>
        </div>

        <div class="content">

            <div class="container-fluid">

                <div class="text-center mb-5">

                    <h3 class="fw-bold" style="color:#1f3c88;">
                        Pilih Tingkatan Kelas
                    </h3>

                    <p class="text-muted">
                        Silakan pilih tingkatan kelas yang ingin dikelola.
                    </p>

                </div>

                <div class="row g-4 justify-content-center">

                    <div class="col-xl-3 col-lg-4 col-md-6">

                        <a href="kelas7.php" class="card-link">

                            <div class="card shadow border-0 rounded-4 h-100 class-card">

                                <div class="card-body text-center">

                                    <div class="icon-circle bg-primary">
                                        <i class="bi bi-mortarboard-fill"></i>
                                    </div>

                                    <h3 class="mt-4 fw-bold text-primary">
                                        Kelas VII
                                    </h3>

                                    <div class="student-total">
    <?= $kelas7; ?>
</div>

                                    <p class="text-muted mb-4">
                                        Total Siswa
                                    </p>

                                    <div class="card-action">
                                        <span class="card-btn bg-primary">
                                            Kelola Data
                                            <i class="bi bi-arrow-right-short"></i>
                                        </span>
                                    </div>

                                </div>

                            </div>

                        </a>

                    </div>

                    <div class="col-xl-3 col-lg-4 col-md-6">

                        <a href="kelas8.php" class="card-link">

                            <div class="card shadow border-0 rounded-4 h-100 class-card">

                                <div class="card-body text-center">

                                    <div class="icon-circle bg-success">
                                        <i class="bi bi-mortarboard-fill"></i>
                                    </div>

                                    <h3 class="mt-4 fw-bold text-success">
                                        Kelas VIII
                                    </h3>

                                    <div class="student-total">
    <?= $kelas8; ?>
</div>

                                    <p class="text-muted mb-4">
                                        Total Siswa
                                    </p>

                                    <div class="card-action">
                                        <span class="card-btn bg-success">
                                            Kelola Data
                                            <i class="bi bi-arrow-right-short"></i>
                                        </span>
                                    </div>

                                </div>

                            </div>

                        </a>

                    </div>

                    <div class="col-xl-3 col-lg-4 col-md-6">

                        <a href="kelas9.php" class="card-link">

                            <div class="card shadow border-0 rounded-4 h-100 class-card">

                                <div class="card-body text-center">

                                    <div class="icon-circle bg-warning">
                                        <i class="bi bi-mortarboard-fill"></i>
                                    </div>

                                    <h3 class="mt-4 fw-bold text-warning">
                                        Kelas IX
                                    </h3>

                                    <div class="student-total">
    <?= $kelas9; ?>
</div>

                                    <p class="text-muted mb-4">
                                        Total Siswa
                                    </p>

                                    <div class="card-action">
                                        <span class="card-btn bg-warning text-white">
                                            Kelola Data
                                            <i class="bi bi-arrow-right-short"></i>
                                        </span>
                                    </div>

                                </div>

                            </div>

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>
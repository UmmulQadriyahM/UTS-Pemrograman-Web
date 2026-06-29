<?php

session_start();


if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {

    echo "

    <script> // JavaScript: Tag pembuka untuk blok kode JavaScript di browser

        alert('Silakan login terlebih dahulu untuk mengakses halaman ini!'); // JavaScript: Menampilkan notifikasi peringatan pop-up di browser halaman klien

        window.location='login.php'; // JavaScript: Melakukan redirect halaman browser pengguna menuju halaman login

    </script> // JavaScript: Tag penutup untuk blok kode JavaScript
    ";

    exit();

}


$tingkat = $_GET['kelas'] ?? "7";
$rombel  = $_GET['rombel'] ?? "";

switch ($tingkat) {

    case "8":
        $judul = "Tambah Data Siswa Kelas VIII";
        $kembali = "kelas8.php";
        $pilihan = ["8A", "8B", "8C"];
        break;

    case "9":
        $judul = "Tambah Data Siswa Kelas IX";
        $kembali = "kelas9.php";
        $pilihan = ["9A", "9B", "9C"];
        break;

    default:
        $judul = "Tambah Data Siswa Kelas VII";
        $kembali = "kelas7.php";
        $pilihan = ["7A", "7B", "7C"];
}

if ($rombel == "") {
    $rombel = $pilihan[0];
}
?>

<!DOCTYPE html>

<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?= $judul ?></title>

    <link rel="stylesheet" href="css/dashboard.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>

<body>

    <div class="dashboard">

        <div class="sidebar">

            <h2>UPTD SMPN 17 Sinjai</h2>

            <a href="dashboard.php">Dashboard</a>

            <a href="siswa.php" class="active">Data Siswa</a>

            <a href="index.php">Logout</a>

        </div>

        <div class="main">

            <div class="topbar">

                <h2><?= $judul ?></h2>

                <p>Lengkapi data siswa dengan benar sebelum disimpan.</p>

            </div>

            <div class="content">

                <div class="container">

                    <div class="row justify-content-center">

                        <div class="col-lg-8">

                            <div class="card border-0 shadow rounded-4">

                                <div class="card-body p-4">

                                    <div class="text-center mb-4">

                                        <h3 class="fw-bold text-primary">

                                            Formulir Data Siswa

                                        </h3>

                                        <p class="text-muted mb-0">

                                            Lengkapi seluruh informasi siswa di bawah ini.

                                        </p>

                                    </div>

                                    <form action="CRUD/simpan.php" method="POST"> <div class="mb-3">

                                            <label class="form-label fw-semibold">

                                                <i class="bi bi-person-fill text-primary me-1"></i>

                                                Nama Siswa

                                            </label>

                                            <input
                                                type="text"
                                                name="nama"
                                                class="form-control"
                                                placeholder="Masukkan nama siswa"
                                                required>

                                        </div>

                                        <div class="mb-3">

                                            <label class="form-label fw-semibold">

                                                <i class="bi bi-credit-card-2-front-fill text-primary me-1"></i>

                                                NISN

                                            </label>

                                            <input
                                                type="text"
                                                name="nisn"
                                                class="form-control"
                                                placeholder="Masukkan NISN"
                                                required>

                                        </div>

                                        <div class="row">

                                            <div class="col-md-6 mb-3">

                                                <label class="form-label fw-semibold">

                                                    <i class="bi bi-building text-primary me-1"></i>

                                                    Rombel

                                                </label>

                                                <select
                                                    name="kelas"
                                                    class="form-select"
                                                    required>

                                                    <?php foreach ($pilihan as $item): ?>

                                                        <option
                                                            value="<?= $item ?>"
                                                            <?= ($rombel == $item) ? "selected" : "" ?>>

                                                            <?php

                                                            switch ($item) {

                                                                case "7A":
                                                                    echo "VII A";
                                                                    break;

                                                                case "7B":
                                                                    echo "VII B";
                                                                    break;

                                                                case "7C":
                                                                    echo "VII C";
                                                                    break;

                                                                case "8A":
                                                                    echo "VIII A";
                                                                    break;

                                                                case "8B":
                                                                    echo "VIII B";
                                                                    break;

                                                                case "8C":
                                                                    echo "VIII C";
                                                                    break;

                                                                case "9A":
                                                                    echo "IX A";
                                                                    break;

                                                                case "9B":
                                                                    echo "IX B";
                                                                    break;

                                                                case "9C":
                                                                    echo "IX C";
                                                                    break;
                                                            }

                                                            ?>

                                                        </option>

                                                    <?php endforeach; ?>

                                                </select>

                                            </div>

                                            <div class="col-md-6 mb-3">

                                                <label class="form-label fw-semibold">

                                                    <i class="bi bi-gender-ambiguous text-primary me-1"></i>

                                                    Jenis Kelamin

                                                </label>

                                                <select
                                                    name="jenis_kelamin"
                                                    class="form-select"
                                                    required>

                                                    <option value="">

                                                        Pilih Jenis Kelamin

                                                    </option>

                                                    <option value="Laki-laki">

                                                        Laki-laki

                                                    </option>

                                                    <option value="Perempuan">

                                                        Perempuan

                                                    </option>

                                                </select>

                                            </div>

                                        </div>

                                        <div class="mb-4">

                                            <label class="form-label fw-semibold">

                                                <i class="bi bi-geo-alt-fill text-primary me-1"></i>

                                                Alamat

                                            </label>

                                            <textarea
                                                name="alamat"
                                                class="form-control"
                                                rows="3"
                                                placeholder="Masukkan alamat lengkap siswa"
                                                required></textarea>

                                        </div>

                                        <hr class="my-4">

                                        <div class="d-flex justify-content-end gap-2">
                                        
                                        <button
                                            type="button"
                                            onclick="window.location.href='<?= $kembali ?>'" // JavaScript: Memanfaatkan objek window browser untuk menavigasi halaman kembali secara dinamis ketika diklik
                                            class="btn btn-primary rounded-pill px-4"
                                            style="
                                                min-width:130px;
                                                height:42px;
                                                box-shadow:0 8px 18px rgba(47,109,246,.25);
                                                "
                                                >
                                                <i class="bi bi-x-circle me-2"></i>
                                                Batal
                                        </button>
                                        
                                        <button
                                        type="submit"
                                        class="btn btn-primary rounded-pill px-4"
                                        style="
                                        min-width:180px;
                                        height:42px;
                                        box-shadow:0 8px 18px rgba(47,109,246,.25);
                                        "
                                        >
                                        <i class="bi bi-check-circle-fill me-2"></i>
                                        Simpan Data
                                    </button>      

                                        </div>

                                    </form>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script> </body>

</html>
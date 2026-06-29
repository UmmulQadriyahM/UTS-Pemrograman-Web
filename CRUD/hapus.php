<?php

session_start();

include "../koneksi.php";

/* =====================================
   Mengambil ID siswa yang akan dihapus
===================================== */

$id = $_GET['id'];

/* =====================================
   Mengambil data siswa terlebih dahulu
   (untuk mengetahui kelasnya)
===================================== */

$data = mysqli_fetch_assoc(
    mysqli_query($koneksi, "SELECT * FROM siswa WHERE id='$id'")
);

if (!$data) {

    echo "<script>
            alert('Data tidak ditemukan!');
            window.history.back();
          </script>";

    exit();

}

/* =====================================
   Menghapus data siswa
===================================== */

$query = mysqli_query(
    $koneksi,
    "DELETE FROM siswa WHERE id='$id'"
);

/* =====================================
   Kembali ke halaman sesuai kelas
===================================== */

if ($query) {

    $tingkat = substr($data['kelas'], 0, 1);

    header("Location: ../kelas".$tingkat.".php");

    exit();

} else {

    echo "<script>
            alert('Data gagal dihapus!');
            window.history.back();
          </script>";

}

?>
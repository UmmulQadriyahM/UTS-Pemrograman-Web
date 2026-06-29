<?php

session_start();

include "../koneksi.php";

/* =====================================
   Mengambil data dari form edit
===================================== */

$id              = $_POST['id'];
$nama            = mysqli_real_escape_string($koneksi, $_POST['nama']);
$nisn            = mysqli_real_escape_string($koneksi, $_POST['nisn']);
$kelas           = mysqli_real_escape_string($koneksi, $_POST['kelas']);
$jenis_kelamin   = mysqli_real_escape_string($koneksi, $_POST['jenis_kelamin']);
$alamat          = mysqli_real_escape_string($koneksi, $_POST['alamat']);

/* =====================================
   Update data siswa berdasarkan ID
===================================== */

$query = mysqli_query($koneksi, "

UPDATE siswa SET

nama='$nama',
nisn='$nisn',
kelas='$kelas',
jenis_kelamin='$jenis_kelamin',
alamat='$alamat'

WHERE id='$id'

");

/* =====================================
   Jika berhasil kembali ke halaman kelas
===================================== */

if($query){

    $tingkat = substr($kelas,0,1);

    header("Location: ../kelas".$tingkat.".php");

    exit();

}

else{

    echo "

    <script>

    alert('Data gagal diupdate!');

    window.history.back();

    </script>

    ";

}

?>
<?php

session_start();

include "../koneksi.php";

$nama            = mysqli_real_escape_string($koneksi, $_POST['nama']);
$nisn            = mysqli_real_escape_string($koneksi, $_POST['nisn']);
$kelas           = mysqli_real_escape_string($koneksi, $_POST['kelas']);
$jenis_kelamin   = mysqli_real_escape_string($koneksi, $_POST['jenis_kelamin']);
$alamat          = mysqli_real_escape_string($koneksi, $_POST['alamat']);

$sql = "INSERT INTO siswa
(
    nama,
    nisn,
    kelas,
    jenis_kelamin,
    alamat
)
VALUES
(
    '$nama',
    '$nisn',
    '$kelas',
    '$jenis_kelamin',
    '$alamat'
)";

$query = mysqli_query($koneksi, $sql);

if($query){

    $tingkat = substr($kelas, 0, 1);

    if($tingkat == "7"){

        header("Location: ../kelas7.php");

    }

    elseif($tingkat == "8"){

        header("Location: ../kelas8.php");

    }

    else{

        header("Location: ../kelas9.php");

    }

    exit();

}

else{

    echo "

    <script>

        alert('Data gagal disimpan!');

        window.history.back();

    </script>

    ";

}

?>
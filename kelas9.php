<?php

session_start();

include "koneksi.php"; // [DATABASE] Koneksi


if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {

    echo "

    <script>

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

    <title>Data Siswa Kelas IX</title>

    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/kelas.css">

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

            <h2>Data Siswa Kelas IX</h2>

            <p>Kelola data siswa kelas IX.</p>

        </div>

        <div class="content">

            <div class="container-fluid mt-2">

                <div class="mb-3">

                    <button
                    type="button"
                    onclick="window.location.href='siswa.php'"
                    class="btn btn-primary rounded-pill px-4">

                        <i class="bi bi-arrow-left"></i>

                        Kembali

                    </button>

                </div>

                <div class="d-flex justify-content-between align-items-center mb-4">

                    <div>

                        <h3 class="fw-bold" style="color:#1f3c88;">

                            Daftar Siswa Kelas IX

                        </h3>

                        <p class="text-muted mb-0">

                            Informasi data siswa yang terdaftar pada kelas ini.

                        </p>

                    </div>

                    <a href="form.php?kelas=9&rombel=9A" class="btn btn-primary rounded-pill px-4">

                        <i class="bi bi-plus-circle"></i>

                        Tambah Siswa

                    </a>

                </div>

                <div class="row mb-4">

                    <div class="col-md-8">

                        <input

                        type="text"

                        id="searchInput"

                        class="form-control"

                        placeholder="🔍 Cari nama siswa...">

                    </div>

                    <div class="col-md-4">

                        <select

                        class="form-select"

                        id="filterKelas">

                            <option>Semua</option>

                            <option>9A</option>

                            <option>9B</option>

                            <option>9C</option>

                        </select>

                    </div>

                </div>

                <div class="table-responsive">

                    <table class="table table-hover align-middle bg-white rounded overflow-hidden">

                        <thead class="table-primary">

                            <tr>

                                <th>No</th>

                                <th>Nama</th>

                                <th>NISN</th>

                                <th>Kelas</th>

                                <th>JK</th>

                                <th>Alamat</th>

                                <th width="140">Aksi</th>

                            </tr>

                        </thead>

                        <tbody id="tableBody">

                        <?php

$no = 1;

$query = mysqli_query(
    $koneksi,
    "SELECT * FROM siswa
     WHERE kelas LIKE '9%'
     ORDER BY kelas ASC, nama ASC"
); // [CRUD/DATABASE] Read Data

while($row = mysqli_fetch_assoc($query)){

?>

<tr>

    <td><?= $no++; ?></td>

    <td><?= htmlspecialchars($row['nama']); ?></td>

    <td><?= htmlspecialchars($row['nisn']); ?></td>

    <td><?= htmlspecialchars($row['kelas']); ?></td>

    <td>

        <?= ($row['jenis_kelamin']=="Laki-laki") ? "L" : "P"; ?>

    </td>

    <td><?= htmlspecialchars($row['alamat']); ?></td>

    <td>

        <a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-warning text-white"> <i class="bi bi-pencil-square"></i>

        </a>

        <a
href="CRUD/hapus.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-danger"
onclick="return confirm('Yakin ingin menghapus data siswa ini?')">

    <i class="bi bi-trash"></i>

</a>

    </td>

</tr>

<?php

}

?>

</tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

</div>

<script> // === [JAVASCRIPT] Fitur Filter & Search Realtime ===

    const searchInput = document.getElementById("searchInput");
const filterKelas = document.getElementById("filterKelas");

function filterTable(){

    const keyword = searchInput.value.toLowerCase();

    const kelas = filterKelas.value;

    const rows = document.querySelectorAll("#tableBody tr");

    rows.forEach(function(row){

        const nama = row.cells[1].textContent.toLowerCase();

        const rombel = row.cells[3].textContent;

        const cocokNama = nama.includes(keyword);

        const cocokKelas = (kelas === "Semua" || rombel === kelas);

        if(cococNama && cocokKelas){

            row.style.display = "";

        }

        else{

            row.style.display = "none";

        }

    });

}

searchInput.addEventListener("keyup", filterTable);

filterKelas.addEventListener("change", filterTable);

</script>

</body>

</html>
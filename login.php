<?php

session_start();

include "koneksi.php";

/* =====================================
   Proses Login
===================================== */

if(isset($_POST['login'])){

    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);

    $query = mysqli_query(
        $koneksi,
        "SELECT * FROM admin
        WHERE username='$username'
        AND password='$password'"
    );

    if(mysqli_num_rows($query) > 0){

        $data = mysqli_fetch_assoc($query);

        $_SESSION['login'] = true;
        $_SESSION['username'] = $data['username'];

        header("Location: dashboard.php");
        exit();

    }

    else{

        echo "<script>
                alert('Username atau Password salah!');
              </script>";

    }

}

?>

<!DOCTYPE html>
<html>

<head>

    <title>Login - SMP 17 Pukkiseng</title>

    <link rel="stylesheet" href="css/auth.css">

</head>

<body>

<div class="login-container">

    <h2>Login Admin</h2>

    <p>Masuk untuk mengelola data sekolah</p>

    <form action="" method="POST">

        <input
            type="text"
            name="username"
            placeholder="Username"
            required
        >

        <input
            type="password"
            name="password"
            placeholder="Password"
            required
        >

        <button
            type="submit"
            name="login">

            Login

        </button>

    </form>

    <a href="index.php" class="back">

        ← Kembali ke Beranda

    </a>

</div>

</body>

</html>
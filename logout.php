<?php

session_start();

/* Menghapus semua session */

session_unset();
session_destroy();

/* Kembali ke halaman awal */

header("Location: index.php");
exit();

?>
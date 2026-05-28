<?php
// ================================================
// FILE: koneksi.php
// Konfigurasi koneksi ke database MySQL
// ================================================

$host   = "localhost";
$user   = "root";
$paswd  = "";           // sesuaikan password Anda
$name   = "db_kampus";

// Proses koneksi
$link = mysqli_connect($host, $user, $paswd, $name);

// Periksa koneksi
if (!$link) {
    die("Koneksi dengan database gagal: "
        . mysqli_connect_errno()
        . " – "
        . mysqli_connect_error());
}

// Set charset agar karakter Indonesia tampil benar
mysqli_set_charset($link, "utf8mb4");
?>

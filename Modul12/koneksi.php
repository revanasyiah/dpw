<?php
// ================================================
// FILE: koneksi.php
// Memuat kelas Database dan membuat instance global
// Modul Praktikum 12 – PHP Database OOP
// ================================================

require_once __DIR__ . '/Database.php';

// Buat satu instance koneksi (Singleton sederhana)
$db = new Database(
    host:   "localhost",
    user:   "root",
    pass:   "",
    dbname: "db_kampus"
);
?>

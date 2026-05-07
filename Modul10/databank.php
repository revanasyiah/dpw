<?php

require_once ('kelas/akunBank.php');

// Buat dua objek akun bank
$data1 = new akunBank("001", 10000);
$data1->setNama("Reva Nasyiah");

$data2 = new akunBank("002", 10000);
$data2->setNama("Ahdina Sabila");

echo "=== DATA BANK ===<br><br>";

// Tampilkan saldo awal
echo $data1->tampilkanUang() . "<br>";
echo $data2->tampilkanUang() . "<br><br>";

// Menambah uang pada akun 1
echo $data1->tambahUang(5000) . "<br>";

// Mengurangi uang pada akun 2
echo $data2->kurangiUang(3000) . "<br><br>";

// Tampilkan saldo akhir
echo $data1->tampilkanUang() . "<br>";
echo $data2->tampilkanUang() . "<br><br>";

// Hitung pajak
echo $data1->hitungPajak() . "<br>";
echo $data2->hitungPajak() . "<br>";
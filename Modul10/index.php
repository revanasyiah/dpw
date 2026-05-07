<?php

require_once ('kelas/Manusia.php');

// Identitas Raveena
$Raveena = new Manusia();
$Raveena->setNama("Raveena");

$Ahdina = new Manusia();
$Ahdina->setNama("Ahdina Sabila");
$Ahdina->setUmur(20);

// Tampilkan nama lengkap $Ahdina
echo "Nama Lengkap: " . $Ahdina->getNama();
echo "<br>";

// Tampilkan NIK (menggunakan wrapper publik)
echo "NIK: " . $Ahdina->tampilkanNIK();
echo "<br>";

// Tampilkan umur $Ahdina
echo "Umur: " . $Ahdina->getUmur() . " tahun";
echo "<br><br>";

// --- Identitas Saya ---
$saya = new Manusia();
$saya->setNama("Reva Nasyiah");
$saya->setUmur(20);

echo "=== Identitas Mahasiswa ===<br>";
echo "Nama Lengkap: " . $saya->getNama();
echo "<br>";
echo "NIK: " . $saya->tampilkanNIK();
echo "<br>";
echo "Umur: " . $saya->getUmur() . " tahun";
echo "<br>";

/*
 * KESIMPULAN:
 * 
 * 1. Class adalah blueprint/cetak biru untuk membuat objek. 
 *    Dalam percobaan ini, kelas Manusia mendefinisikan properti dan method.
 *
 * 2. Access Modifier mengontrol hak akses terhadap properti dan method:
 *    - public   : dapat diakses dari mana saja (dalam maupun luar kelas)
 *    - protected: hanya dapat diakses dari dalam kelas itu sendiri dan kelas turunannya
 *    - private  : hanya dapat diakses dari dalam kelas itu sendiri
 *
 * 3. Properti $name dan $nik bersifat protected sehingga tidak bisa diakses
 *    langsung dari luar kelas. Kita perlu getter dan setter sebagai perantara.
 *
 * 4. Method getNIK() bersifat private sehingga tidak bisa dipanggil langsung
 *    dari luar kelas. Dibuat method tampilkanNIK() sebagai wrapper publik.
 *
 * 5. Getter dan setter memungkinkan kontrol penuh atas nilai properti,
 *    termasuk validasi input sebelum disimpan ke properti.
 *
 * 6. Variabel $umur berhasil ditambahkan beserta getter (getUmur) dan
 *    setter (setUmur) sesuai pola yang sama dengan $name.
 */
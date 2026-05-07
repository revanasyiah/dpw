<?php

require_once ('kelas/mahasiswa.php');

$mhs1 = new mahasiswa("Reva Nasyiah");
$mhs1->setNIM("253307010");
$mhs1->setKelas("2A");
$mhs1->setJurusan("Teknologi Informasi");
$mhs1->setUmur(19);

// tampilkan nama nim dan kelas dari $mhs1
echo "=== DATA MAHASISWA ===<br>";
echo "Nama   : " . $mhs1->getNama() . "<br>";
echo "NIM    : " . $mhs1->getNim() . "<br>";
echo "Kelas  : " . $mhs1->getKelas() . "<br>";
echo "Jurusan: " . $mhs1->getJurusan() . "<br>";
echo "Umur   : " . $mhs1->getUmur() . " tahun<br>";
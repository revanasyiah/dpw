<?php

class buah
{
    public $nama;
    protected $warna;
    private $berat;
}

$mango = new buah();
$mango->nama  = 'Mango';
$mango->warna = 'Yellow';   // ERROR: $warna adalah protected, tidak bisa diakses langsung dari luar kelas
$mango->buah  = '300';      // ERROR: $buah bukan properti yang ada, seharusnya $berat (private)

/*
 * ANALISIS ERROR:
 *
 * Error 1: $mango->warna = 'Yellow';
 *   Penyebab : Properti $warna bersifat PROTECTED.
 *              Protected berarti hanya bisa diakses dari dalam kelas itu sendiri
 *              dan kelas turunannya. Tidak bisa diakses langsung dari luar kelas.
 *   Solusi   : Ubah modifier $warna menjadi public, ATAU
 *              tambahkan method setter: public function setWarna($w){ $this->warna=$w; }
 *
 * Error 2: $mango->buah = '300';
 *   Penyebab : Tidak ada properti bernama $buah di dalam kelas buah.
 *              Properti yang ada adalah $berat (private).
 *              Meskipun nama variabelnya diperbaiki menjadi $berat,
 *              $berat bersifat PRIVATE sehingga tetap tidak bisa diakses langsung.
 *   Solusi   : Tambahkan setter: public function setBerat($b){ $this->berat=$b; }
 *
 * PERBAIKAN:
 */

class buahFixed
{
    public    $nama;
    protected $warna;
    private   $berat;

    public function setWarna($warna)
    {
        $this->warna = $warna;
    }

    public function getWarna()
    {
        return $this->warna;
    }

    public function setBerat($berat)
    {
        $this->berat = $berat;
    }

    public function getBerat()
    {
        return $this->berat;
    }
}

$mango = new buahFixed();
$mango->nama = 'Mango';
$mango->setWarna('Yellow');
$mango->setBerat('300');

echo "Nama  : " . $mango->nama . "<br>";
echo "Warna : " . $mango->getWarna() . "<br>";
echo "Berat : " . $mango->getBerat() . " gram<br>";
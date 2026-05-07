<?php
$jumlah = 1387500;

$pecahan = [100000,50000,20000,10000,5000,2000,500];

foreach ($pecahan as $p) {
    $hasil = intdiv($jumlah, $p);
    $jumlah %= $p;
    echo "Rp$p = $hasil lembar <br>";
}
?>
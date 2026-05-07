<?php
$gaji_pokok = 3250000;
$tunjangan = 1200000;

$gaji_kotor = $gaji_pokok + $tunjangan;
$pajak = 0.1 * $gaji_kotor;

$gaji_bersih = $gaji_kotor - $pajak;

echo "Gaji Bersih: Rp " . $gaji_bersih;
?>
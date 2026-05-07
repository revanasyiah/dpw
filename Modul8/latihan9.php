<?php
function writeMsg($nama) {
    echo "Selamat datang $nama <br>";
}

writeMsg("Ahmad");

function tambah($a, $b) {
    return $a + $b;
}

$hasil = tambah(5,5);
echo $hasil;
?>
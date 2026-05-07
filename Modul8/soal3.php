<?php
$siswa = [
    ["nama"=>"A","poin"=>80],
    ["nama"=>"B","poin"=>90],
    ["nama"=>"C","poin"=>100],
    ["nama"=>"D","poin"=>90],
    ["nama"=>"E","poin"=>75]
];

// a
echo "Poin siswa ke-5: " . $siswa[4]["poin"] . "<br>";

// b
echo "Poin 90:<br>";
foreach ($siswa as $s) {
    if ($s["poin"] == 90) {
        echo $s["nama"] . "<br>";
    }
}

// c
echo "Poin 100:<br>";
$found = false;
foreach ($siswa as $s) {
    if ($s["poin"] == 100) {
        echo $s["nama"] . "<br>";
        $found = true;
    }
}
if (!$found) {
    echo "Tidak ada";
}
?>
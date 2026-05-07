<?php
$t = date("H");

if ($t < 16) {
    echo "Selamat siang<br>";
}

// If Else
if ($t < 20) {
    echo "Selamat sore<br>";
} else {
    echo "Selamat malam<br>";
}

// Nested If
if ($t < 12) {
    echo "Selamat pagi";
} elseif ($t < 16) {
    echo "Selamat sore";
} else {
    echo "Selamat malam";
}
?>
<?php
// FILE: proses_editmatakuliah.php
include 'koneksi.php';

if (isset($_POST['edit'])) {
    $kodeMK = (int) $_POST['kodeMK'];
    $namaMK = mysqli_real_escape_string($link, trim($_POST['namaMK']));
    $sks    = (int) $_POST['sks'];
    $jam    = (int) $_POST['jam'];

    $query  = "UPDATE t_matakuliah
               SET namaMK='$namaMK', sks=$sks, jam=$jam
               WHERE kodeMK=$kodeMK";
    $result = mysqli_query($link, $query);
    if (!$result) die("Query gagal: " . mysqli_errno($link) . " – " . mysqli_error($link));
}

header("location:viewmatakuliah.php?msg=edit");
exit;
?>

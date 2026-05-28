<?php
// FILE: proses_inputmatakuliah.php
include 'koneksi.php';

if (isset($_POST['input'])) {
    $kodeMK = (int) $_POST['kodeMK'];
    $namaMK = mysqli_real_escape_string($link, trim($_POST['namaMK']));
    $sks    = (int) $_POST['sks'];
    $jam    = (int) $_POST['jam'];

    $cek = mysqli_query($link, "SELECT kodeMK FROM t_matakuliah WHERE kodeMK = $kodeMK");
    if (mysqli_num_rows($cek) > 0) {
        header("location:inputmatakuliah.php?err=kode_exists");
        exit;
    }

    $query  = "INSERT INTO t_matakuliah (kodeMK, namaMK, sks, jam)
               VALUES ($kodeMK, '$namaMK', $sks, $jam)";
    $result = mysqli_query($link, $query);
    if (!$result) die("Query gagal: " . mysqli_errno($link) . " – " . mysqli_error($link));
}

header("location:viewmatakuliah.php?msg=add");
exit;
?>

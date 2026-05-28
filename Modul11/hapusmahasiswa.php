<?php
// FILE: hapusmahasiswa.php
include 'koneksi.php';

if (isset($_GET['npm'])) {
    $npm         = (int) $_GET['npm'];
    $query       = "DELETE FROM t_mahasiswa WHERE npm = $npm";
    $hasil_query = mysqli_query($link, $query);

    if (!$hasil_query) {
        die("Gagal menghapus: " . mysqli_errno($link) . " – " . mysqli_error($link));
    }
}

header("location:viewmahasiswa.php?msg=del");
exit;
?>

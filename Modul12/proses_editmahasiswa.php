<?php
require_once 'koneksi.php';

if (isset($_POST['edit'])) {
    $npm     = (int)   $_POST['npm'];
    $namaMhs = trim($_POST['namaMhs']);
    $prodi   = trim($_POST['prodi']);
    $alamat  = trim($_POST['alamat']);
    $noHP    = trim($_POST['noHP']);

    $sql = "UPDATE t_mahasiswa SET namaMhs=?, prodi=?, alamat=?, noHP=? WHERE npm=?";
    $ok  = $db->execute($sql, "ssssi", [$namaMhs, $prodi, $alamat, $noHP, $npm]);

    header($ok ? "location:viewmahasiswa.php?msg=edit" : "location:editmahasiswa.php?npm=$npm");
    exit;
}

header("location:viewmahasiswa.php");
exit;
?>

<?php
require_once 'koneksi.php';

if (isset($_POST['input'])) {
    $npm     = (int)   $_POST['npm'];
    $namaMhs = trim($_POST['namaMhs']);
    $prodi   = trim($_POST['prodi']);
    $alamat  = trim($_POST['alamat']);
    $noHP    = trim($_POST['noHP']);

    $sql = "INSERT INTO t_mahasiswa (npm, namaMhs, prodi, alamat, noHP) VALUES (?,?,?,?,?)";
    $ok  = $db->execute($sql, "issss", [$npm, $namaMhs, $prodi, $alamat, $noHP]);

    header($ok ? "location:viewmahasiswa.php?msg=add" : "location:inputmahasiswa.php");
    exit;
}

header("location:inputmahasiswa.php");
exit;
?>

<?php
require_once 'koneksi.php';

if (isset($_GET['npm'])) {
    $npm = (int) $_GET['npm'];
    $db->execute("DELETE FROM t_mahasiswa WHERE npm = ?", "i", [$npm]);
}

header("location:viewmahasiswa.php?msg=del");
exit;
?>

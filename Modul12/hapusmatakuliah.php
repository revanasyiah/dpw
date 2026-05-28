<?php
require_once 'koneksi.php';

if (isset($_GET['kodeMK'])) {
    $kodeMK = (int) $_GET['kodeMK'];
    $db->execute("DELETE FROM t_matakuliah WHERE kodeMK = ?", "i", [$kodeMK]);
}

header("location:viewmatakuliah.php?msg=del");
exit;
?>

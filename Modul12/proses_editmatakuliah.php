<?php
require_once 'koneksi.php';

if (isset($_POST['edit'])) {
    $kodeMK = (int)   $_POST['kodeMK'];
    $namaMK = trim($_POST['namaMK']);
    $sks    = (int)   $_POST['sks'];
    $jam    = (int)   $_POST['jam'];

    $sql = "UPDATE t_matakuliah SET namaMK=?, sks=?, jam=? WHERE kodeMK=?";
    $ok  = $db->execute($sql, "siii", [$namaMK, $sks, $jam, $kodeMK]);

    header($ok ? "location:viewmatakuliah.php?msg=edit" : "location:editmatakuliah.php?kodeMK=$kodeMK");
    exit;
}

header("location:viewmatakuliah.php");
exit;
?>

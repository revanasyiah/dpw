<?php
require_once 'koneksi.php';

if (isset($_POST['input'])) {
    $kodeMK = (int) $_POST['kodeMK'];
    $namaMK = trim($_POST['namaMK']);
    $sks    = (int) $_POST['sks'];
    $jam    = (int) $_POST['jam'];

    $sql = "INSERT INTO t_matakuliah (kodeMK, namaMK, sks, jam) VALUES (?,?,?,?)";
    $ok  = $db->execute($sql, "isii", [$kodeMK, $namaMK, $sks, $jam]);

    header($ok ? "location:viewmatakuliah.php?msg=add" : "location:inputmatakuliah.php");
    exit;
}

header("location:inputmatakuliah.php");
exit;
?>

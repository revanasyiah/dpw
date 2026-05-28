<?php
// ================================================
// FILE: proses_inputdosen.php
// Memproses INSERT data dosen – Prepared Statement OOP
// ================================================

require_once 'koneksi.php';

if (isset($_POST['input'])) {
    $namaDosen = trim($_POST['namaDosen']);
    $noHP      = trim($_POST['noHP']);

    if ($namaDosen === '' || $noHP === '') {
        header("location:inputdosen.php");
        exit;
    }

    $sql = "INSERT INTO t_dosen (namaDosen, noHP) VALUES (?, ?)";
    $ok  = $db->execute($sql, "ss", [$namaDosen, $noHP]);

    if ($ok) {
        header("location:viewdosen.php?msg=add");
    } else {
        header("location:inputdosen.php");
    }
    exit;
}

header("location:inputdosen.php");
exit;
?>

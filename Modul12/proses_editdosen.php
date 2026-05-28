<?php
// ================================================
// FILE: proses_editdosen.php
// Memproses UPDATE data dosen – Prepared Statement OOP
// ================================================

require_once 'koneksi.php';

if (isset($_POST['edit'])) {
    $idDosen   = (int) $_POST['idDosen'];
    $namaDosen = trim($_POST['namaDosen']);
    $noHP      = trim($_POST['noHP']);

    $sql = "UPDATE t_dosen SET namaDosen = ?, noHP = ? WHERE idDosen = ?";
    $ok  = $db->execute($sql, "ssi", [$namaDosen, $noHP, $idDosen]);

    if ($ok) {
        header("location:viewdosen.php?msg=edit");
    } else {
        header("location:editdosen.php?idDosen=$idDosen");
    }
    exit;
}

header("location:viewdosen.php");
exit;
?>

<?php
// ================================================
// FILE: hapusdosen.php
// Menghapus record dosen – Prepared Statement OOP
// ================================================

require_once 'koneksi.php';

if (isset($_GET['idDosen'])) {
    $id = (int) $_GET['idDosen'];

    $sql = "DELETE FROM t_dosen WHERE idDosen = ?";
    $db->execute($sql, "i", [$id]);
}

header("location:viewdosen.php?msg=del");
exit;
?>

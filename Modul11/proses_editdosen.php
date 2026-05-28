<?php
// ================================================
// FILE: proses_editdosen.php
// Memproses penyimpanan data dosen yang diubah
// ================================================

if (isset($_POST['edit'])) {
    include 'koneksi.php';

    $id        = (int) $_POST['idDosen'];
    $namaDosen = mysqli_real_escape_string($link, trim($_POST['namaDosen']));
    $noHP      = mysqli_real_escape_string($link, trim($_POST['noHP']));

    // Query UPDATE
    $query  = "UPDATE t_dosen
               SET namaDosen = '$namaDosen', noHP = '$noHP'
               WHERE idDosen = '$id'";
    $result = mysqli_query($link, $query);

    if (!$result) {
        die("Query gagal dijalankan: "
            . mysqli_errno($link)
            . " – " . mysqli_error($link));
    }
}

header("location:viewdosen.php?msg=edit");
exit;
?>

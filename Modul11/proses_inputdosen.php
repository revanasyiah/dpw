<?php
// ================================================
// FILE: proses_inputdosen.php
// Memproses penyimpanan data dosen baru ke DB
// ================================================

include 'koneksi.php';

if (isset($_POST['input'])) {

    $namaDosen = mysqli_real_escape_string($link, trim($_POST['namaDosen']));
    $noHP      = mysqli_real_escape_string($link, trim($_POST['noHP']));

    // Query INSERT
    $query  = "INSERT INTO t_dosen (namaDosen, noHP) VALUES ('$namaDosen', '$noHP')";
    $result = mysqli_query($link, $query);

    if (!$result) {
        die("Query gagal dijalankan: "
            . mysqli_errno($link)
            . " – " . mysqli_error($link));
    }
}

// Redirect ke halaman view setelah simpan
header("location:viewdosen.php?msg=add");
exit;
?>

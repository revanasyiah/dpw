<?php
// ================================================
// FILE: proses_inputmahasiswa.php
// Memproses penyimpanan data mahasiswa baru ke DB
// ================================================

include 'koneksi.php';

if (isset($_POST['input'])) {

    $npm     = (int) $_POST['npm'];
    $namaMhs = mysqli_real_escape_string($link, trim($_POST['namaMhs']));
    $prodi   = mysqli_real_escape_string($link, trim($_POST['prodi']));
    $alamat  = mysqli_real_escape_string($link, trim($_POST['alamat']));
    $noHP    = mysqli_real_escape_string($link, trim($_POST['noHP']));

    // Cek apakah NPM sudah ada
    $cek = mysqli_query($link, "SELECT npm FROM t_mahasiswa WHERE npm = $npm");
    if (mysqli_num_rows($cek) > 0) {
        header("location:inputmahasiswa.php?err=npm_exists");
        exit;
    }

    $query  = "INSERT INTO t_mahasiswa (npm, namaMhs, prodi, alamat, noHP)
               VALUES ($npm, '$namaMhs', '$prodi', '$alamat', '$noHP')";
    $result = mysqli_query($link, $query);

    if (!$result) {
        die("Query gagal: " . mysqli_errno($link) . " – " . mysqli_error($link));
    }
}

header("location:viewmahasiswa.php?msg=add");
exit;
?>

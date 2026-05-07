<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Proses Pendaftaran</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 500px; margin: 30px auto; padding: 0 20px; }
        .card { background: #f0f8ff; border: 1px solid #cce; padding: 20px; border-radius: 8px; }
        .back-link { margin-top: 16px; display: inline-block; }
    </style>
</head>
<body>
    <?php
    // Mengambil data dari form dengan metode POST
    // Jika menggunakan GET, ganti $_POST dengan $_GET
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nim       = $_POST["nim"];
        $nama      = $_POST["nama"];
        $email     = $_POST["email"];
        $tempat    = $_POST["tempat"];
        $tgl_lahir = $_POST["tgl_lahir"];
        $alamat    = $_POST["alamat"];
        $gender    = $_POST["gender"];
    } else {
        // Jika menggunakan metode GET
        $nim       = $_GET["nim"]       ?? '';
        $nama      = $_GET["nama"]      ?? '';
        $email     = $_GET["email"]     ?? '';
        $tempat    = $_GET["tempat"]    ?? '';
        $tgl_lahir = $_GET["tgl_lahir"] ?? '';
        $alamat    = $_GET["alamat"]    ?? '';
        $gender    = $_GET["gender"]    ?? '';
    }
    ?>
    <div class="card">
        <h2>Data Pendaftaran</h2>
        <p>Selamat datang <b><?php echo $nama; ?></b><br>
        NIM : <?php echo $nim; ?><br>
        Email : <?php echo $email; ?><br>
        Tempat, tanggal lahir : <?php echo $tempat; ?> , <?php echo $tgl_lahir; ?><br>
        Alamat : <?php echo $alamat; ?><br>
        Jenis Kelamin : <?php echo $gender; ?></p>
    </div>
    <a class="back-link" href="form_pendaftaran.html">&larr; Kembali ke Form</a>
    <?php
    /*
    KESIMPULAN SOAL 1:
    - Metode POST: Data dikirim melalui body HTTP request, tidak terlihat di URL.
      Cocok untuk data sensitif.
    - Metode GET : Data dikirim melalui URL (query string), terlihat di address bar.
      Cocok untuk pencarian/filter, bisa di-bookmark.
    - $_POST dan $_GET adalah superglobal array PHP untuk membaca data form.
    */
    ?>
</body>
</html>
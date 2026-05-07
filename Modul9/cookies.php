<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cookies - Identitas</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 500px; margin: 40px auto; padding: 0 20px; }
        .box { background: #fff8e1; border: 1px solid #ffe082; padding: 24px; border-radius: 8px; }
        input[type="text"], input[type="email"] { width: 100%; box-sizing: border-box; padding: 7px; margin: 4px 0 12px; }
        input[type="submit"] { padding: 8px 16px; cursor: pointer; margin-right: 8px; }
        .info { background: #e8f5e9; border: 1px solid #a5d6a7; padding: 14px; border-radius: 6px; margin-top: 16px; }
        .del-btn { background: #e53935; color: white; border: none; padding: 8px 14px; border-radius: 4px; cursor: pointer; }
        pre { background: #f5f5f5; padding: 10px; font-size: 0.85em; overflow-x: auto; }
    </style>
</head>
<body>
<?php
// ============================================================
// SOAL 6 - COOKIES
// Cookies digunakan untuk menyimpan data di sisi klien (browser)
// Data bertahan selama waktu expire yang ditentukan
// ============================================================

$msg = "";

// Hapus cookie jika diminta
if (isset($_POST["hapus"])) {
    setcookie("nama_user",  "", time() - 3600, "/");
    setcookie("email_user", "", time() - 3600, "/");
    setcookie("kota_user",  "", time() - 3600, "/");
    header("Location: " . $_SERVER["PHP_SELF"]);
    exit;
}

// Simpan cookie jika form dikirim
if (isset($_POST["simpan"])) {
    $nama  = htmlspecialchars(trim($_POST["nama"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $kota  = htmlspecialchars(trim($_POST["kota"]));

    // Simpan cookie selama 30 hari
    $expire = time() + (86400 * 30);
    setcookie("nama_user",  $nama,  $expire, "/");
    setcookie("email_user", $email, $expire, "/");
    setcookie("kota_user",  $kota,  $expire, "/");

    $msg = "✅ Data identitas disimpan dalam cookie selama 30 hari!";
}

// Baca cookie yang tersimpan
$savedNama  = $_COOKIE["nama_user"]  ?? "";
$savedEmail = $_COOKIE["email_user"] ?? "";
$savedKota  = $_COOKIE["kota_user"]  ?? "";
?>
    <div class="box">
        <h2>🍪 Cookies - Data Identitas</h2>

        <?php if ($msg): ?>
            <p style="color:green;font-weight:bold"><?php echo $msg; ?></p>
        <?php endif; ?>

        <form method="post">
            <label>Nama Lengkap:</label>
            <input type="text" name="nama" value="<?php echo $savedNama; ?>" placeholder="Nama anda">

            <label>Email:</label>
            <input type="email" name="email" value="<?php echo $savedEmail; ?>" placeholder="Email anda">

            <label>Kota:</label>
            <input type="text" name="kota" value="<?php echo $savedKota; ?>" placeholder="Kota asal">

            <input type="submit" name="simpan" value="Simpan ke Cookie">
            <button type="submit" name="hapus" class="del-btn">Hapus Cookie</button>
        </form>

        <?php if ($savedNama): ?>
        <div class="info">
            <strong>📋 Data dari Cookie:</strong><br>
            Nama  : <?php echo $savedNama;  ?><br>
            Email : <?php echo $savedEmail; ?><br>
            Kota  : <?php echo $savedKota;  ?>
        </div>
        <?php endif; ?>

        <details style="margin-top:14px">
            <summary>📖 Penjelasan Cookies</summary>
            <pre>
// Menyimpan cookie (setcookie harus sebelum output HTML):
setcookie("nama_kunci", "nilai", waktu_expire, path);

// Membaca cookie:
$nilai = $_COOKIE["nama_kunci"] ?? "";

// Menghapus cookie (set expire ke masa lalu):
setcookie("nama_kunci", "", time() - 3600, "/");

Kelebihan Cookies:
- Data disimpan di browser, bertahan meski browser ditutup
- Bisa diset masa expired (jam, hari, bulan, tahun)
Kekurangan:
- Bisa dilihat/dimanipulasi user
- Tidak cocok untuk data sensitif (gunakan session)
            </pre>
        </details>
    </div>
</body>
</html>
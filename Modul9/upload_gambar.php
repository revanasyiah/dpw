<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload File</title>
    <meta name="description" content="Belajar PHP">
    <meta name="keywords" content="{tulis nim anda disini}">
    <meta name="author"   content="{tulis nama anda disini}">
    <style>
        body { font-family: Arial, sans-serif; max-width: 500px; margin: 40px auto; padding: 0 20px; }
        .box { background: #f5f5f5; border: 1px solid #ddd; padding: 24px; border-radius: 8px; }
        input[type="submit"] { padding: 8px 18px; background: #28a745; color: white; border: none; border-radius: 4px; cursor: pointer; margin-top: 10px; }
        .msg-ok  { color: green; font-weight: bold; margin-top: 10px; }
        .msg-err { color: red;   font-weight: bold; margin-top: 10px; }
        a { display: inline-block; margin-top: 14px; color: #007bff; }
    </style>
</head>
<body>
<div class="box">
    <h2>📤 Upload Gambar</h2>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
          method="post" enctype="multipart/form-data">
        <p><label>Pilih Gambar yang akan di upload: </label><br>
            <input type="file" name="gambar" id="gambar1"></p>
        <input type="submit" value="Upload Image" name="submit">
    </form>

    <?php
    // ============================================================
    // Semua kode pengolahan file HANYA dijalankan saat ada submit
    // Tips: cek isset($_POST["submit"]) mencegah warning saat load pertama
    // ============================================================
    if (isset($_POST["submit"])) {

        $target_dir  = "gambar/";
        $target_file = $target_dir . basename($_FILES["gambar"]["name"]);
        $uploadOk    = 1;
        $tipeGambar  = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // 1. Cek apakah file berupa gambar
        $check = getimagesize($_FILES["gambar"]["tmp_name"]);
        if ($check !== false) {
            echo "<p class='msg-ok'>File berupa citra/gambar - " . $check["mime"] . ".</p>";
            $uploadOk = 1;
        } else {
            echo "<p class='msg-err'>File bukan gambar.</p>";
            $uploadOk = 0;
        }

        // 2. Deteksi apakah ada file dengan nama yang sama
        if (file_exists($target_file)) {
            echo "<p class='msg-err'>Sorry, file already exists.</p>";
            $uploadOk = 0;
        }

        // 3. Check file size (maks 500 KB)
        if ($_FILES["gambar"]["size"] > 500000) {
            echo "<p class='msg-err'>Sorry, file anda terlalu besar.</p>";
            $uploadOk = 0;
        }

        // 4. Filter format yang diizinkan
        if ($tipeGambar != "jpg" && $tipeGambar != "png"
            && $tipeGambar != "jpeg" && $tipeGambar != "gif") {
            echo "<p class='msg-err'>Sorry, hanya file JPG, JPEG, PNG & GIF.</p>";
            $uploadOk = 0;
        }

        // 5. Check $uploadOk dan proses upload
        if ($uploadOk == 0) {
            echo "<p class='msg-err'>Sorry, File anda gagal upload.</p>";
        } else {
            if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
                echo "<p class='msg-ok'>File " . htmlspecialchars(basename($_FILES["gambar"]["name"])) . " berhasil Upload.</p>";
            } else {
                echo "<p class='msg-err'>Sorry, Ada eror saat upload.</p>";
            }
        }
    }
    ?>

    <a href="galery.php">🖼️ Lihat Galeri Gambar</a>
</div>
</body>
</html>
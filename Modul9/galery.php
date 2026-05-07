<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Galeri Gambar</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; background: #f0f0f0; }
        h2 { text-align: center; margin-bottom: 24px; }
        .galeri {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
            gap: 14px;
        }
        .galeri-item {
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0,0,0,0.12);
            text-align: center;
        }
        .galeri-item img {
            width: 100%;
            height: 160px;
            object-fit: cover;
            display: block;
        }
        .galeri-item p {
            font-size: 0.78em;
            padding: 6px;
            margin: 0;
            word-break: break-all;
            color: #444;
        }
        .kosong { text-align: center; color: #888; margin-top: 40px; }
        .back { display: block; text-align: center; margin-top: 20px; }
    </style>
</head>
<body>
    <h2>🖼️ Galeri Gambar</h2>

    <div class="galeri">
    <?php
    // Membaca seluruh file dari folder gambar
    $fileList = glob(pattern: 'gambar/*');
    $ada = false;

    foreach ($fileList as $filename) {
        if (is_file($filename)) {
            $ada = true;
            $namaFile = basename($filename);
            echo "<div class='galeri-item'>";
            echo "  <img src='" . htmlspecialchars($filename) . "' alt='" . htmlspecialchars($namaFile) . "'>";
            echo "  <p>" . htmlspecialchars($namaFile) . "</p>";
            echo "</div>";
        }
    }

    if (!$ada) {
        echo "<p class='kosong'>Belum ada gambar. <a href='upload_gambar.php'>Upload sekarang</a></p>";
    }
    ?>
    </div>

    <a class="back" href="upload_gambar.php">&larr; Kembali ke Upload</a>
</body>
</html>
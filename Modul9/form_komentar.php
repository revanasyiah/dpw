<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form Komentar</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 550px; margin: 30px auto; padding: 0 20px; }
        label { font-weight: bold; }
        input[type="text"], input[type="email"], textarea {
            width: 100%; box-sizing: border-box; padding: 6px; margin: 4px 0 12px;
        }
        input[type="submit"], input[type="reset"] {
            padding: 6px 14px; cursor: pointer; margin-right: 8px;
        }
        .hasil { background: #eaffea; border: 1px solid #9c9; padding: 12px; border-radius: 6px; margin-top: 16px; }
        .warning { background: #fff3cd; border: 1px solid #ffc107; padding: 10px; border-radius: 6px; margin-top: 10px; font-size: 0.9em; }
    </style>
</head>
<body>
    <?php
    // =====================================================
    // FUNGSI FILTER INPUT - mencegah XSS dan injection
    // =====================================================
    function bersihkan_input($data) {
        $data = trim($data);           // hapus spasi awal/akhir
        $data = stripslashes($data);   // hapus backslash
        $data = htmlspecialchars($data); // konversi karakter HTML berbahaya
        return $data;
    }

    // Inisialisasi variabel
    $name    = $email = $comment = "";
    $hasilHTML = "";

    // Proses hanya jika ada pengiriman form (POST)
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Membaca input dengan filter pengaman
        $name    = bersihkan_input($_POST["name"]);
        $email   = bersihkan_input($_POST["email"]);
        $comment = bersihkan_input($_POST["comment"]);

        // Tampilkan hasil
        $hasilHTML = "
        <div class='hasil'>
            <strong>Hasil Komentar:</strong><br>
            Nama    : $name<br>
            Email   : $email<br>
            Komentar: $comment<br>
        </div>";

        /*
        KESIMPULAN SOAL 2:
        - Tanpa filter: Input berbahaya seperti <img src="x" onerror=alert('hacked');>
          akan dieksekusi sebagai HTML/JS → XSS Attack (Cross-Site Scripting).
        - Dengan htmlspecialchars(): karakter < > " & dikonversi menjadi entitas HTML
          sehingga tidak bisa dieksekusi sebagai kode.
        - trim() membersihkan spasi; stripslashes() menghapus escape backslash.
        - Selalu filter/validasi setiap input dari user sebelum digunakan/ditampilkan.
        */
    }
    ?>

    <h2>Form Komentar</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label>Nama:</label>
        <input type="text" name="name"><br>

        <label>E-mail:</label>
        <input type="email" name="email"><br>

        <label>Komentar:</label>
        <textarea name="comment" rows="5" cols="40"></textarea><br>

        <input type="submit" value="simpan">
        <input type="reset" value="Bersihkan">
    </form>

    <?php echo $hasilHTML; ?>

    <div class="warning">
        <strong>⚠️ Catatan Keamanan:</strong><br>
        Coba isi kolom nama dengan: <code>&lt;img src="http://url.to.file./tidak.ada" onerror=alert('hacked');&gt;</code><br>
        Tanpa filter → script dieksekusi. Dengan <code>htmlspecialchars()</code> → aman ditampilkan sebagai teks biasa.
    </div>
</body>
</html>
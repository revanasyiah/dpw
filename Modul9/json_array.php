<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>JSON - Array Nama & Umur</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 750px; margin: 30px auto; padding: 0 20px; }
        h2 { color: #333; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th { background: #3949ab; color: white; padding: 10px; text-align: left; }
        td { padding: 8px 10px; border-bottom: 1px solid #ddd; }
        tr:nth-child(even) td { background: #f5f5f5; }
        .json-box { background: #1e1e1e; color: #9cdcfe; padding: 20px; border-radius: 8px;
                    font-family: monospace; font-size: 0.85em; overflow-x: auto; white-space: pre; margin-top: 14px; }
        .section { margin-top: 30px; }
        .badge { display: inline-block; background: #e8f5e9; border: 1px solid #81c784;
                 color: #2e7d32; padding: 4px 10px; border-radius: 12px; font-size: 0.82em; margin-left: 8px; }
    </style>
</head>
<body>
    <h2>📦 JSON — Array Nama & Umur <span class="badge">15 data</span></h2>

    <?php
    // ============================================================
    // SOAL 9 - ARRAY ASOSIATIF + JSON
    // ============================================================

    // Array dengan index nama dan umur (minimal 15 data)
    $mahasiswa = [
        ["nama" => "Andi Pratama",      "umur" => 20],
        ["nama" => "Budi Santoso",      "umur" => 21],
        ["nama" => "Citra Dewi",        "umur" => 19],
        ["nama" => "Dian Pertiwi",      "umur" => 22],
        ["nama" => "Eko Wahyudi",       "umur" => 20],
        ["nama" => "Fitri Handayani",   "umur" => 21],
        ["nama" => "Galih Nugroho",     "umur" => 23],
        ["nama" => "Hani Ramadhani",    "umur" => 19],
        ["nama" => "Ivan Setiawan",     "umur" => 22],
        ["nama" => "Joko Purnomo",      "umur" => 20],
        ["nama" => "Kartika Sari",      "umur" => 21],
        ["nama" => "Lukman Hakim",      "umur" => 24],
        ["nama" => "Maya Anggraini",    "umur" => 20],
        ["nama" => "Nanda Putradinata", "umur" => 19],
        ["nama" => "Oktavia Putri",     "umur" => 22],
    ];

    // Konversi array PHP ke string JSON
    // JSON_PRETTY_PRINT   → format indentasi rapi
    // JSON_UNESCAPED_UNICODE → karakter unicode tidak di-escape
    $jsonString = json_encode($mahasiswa, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

    // Konversi balik JSON ke array PHP (decode)
    $arrayDariJson = json_decode($jsonString, true);
    ?>

    <!-- Tabel tampilan array -->
    <div class="section">
        <h3>📋 Data Array PHP</h3>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Umur</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($mahasiswa as $index => $data): ?>
                <tr>
                    <td><?php echo $index + 1; ?></td>
                    <td><?php echo htmlspecialchars($data["nama"]); ?></td>
                    <td><?php echo $data["umur"]; ?> tahun</td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Tampilan JSON -->
    <div class="section">
        <h3>🔁 Hasil Konversi ke JSON (<code>json_encode()</code>)</h3>
        <div class="json-box"><?php echo htmlspecialchars($jsonString); ?></div>
    </div>

    <!-- Decode balik -->
    <div class="section">
        <h3>🔄 Hasil Decode JSON kembali ke Array PHP (<code>json_decode()</code>)</h3>
        <table>
            <thead>
                <tr><th>#</th><th>Nama</th><th>Umur</th></tr>
            </thead>
            <tbody>
                <?php foreach ($arrayDariJson as $i => $item): ?>
                <tr>
                    <td><?php echo $i + 1; ?></td>
                    <td><?php echo htmlspecialchars($item["nama"]); ?></td>
                    <td><?php echo $item["umur"]; ?> tahun</td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="section" style="background:#fff3e0;padding:16px;border-radius:8px;font-size:0.88em">
        <strong>📖 Penjelasan JSON:</strong><br>
        JSON (JavaScript Object Notation) adalah format pertukaran data ringan berbasis teks.<br>
        <code>json_encode($array)</code> → mengubah array PHP menjadi string JSON.<br>
        <code>json_decode($string, true)</code> → mengubah string JSON kembali ke array PHP.<br>
        JSON banyak digunakan untuk komunikasi antara server dan client (API REST, AJAX).
    </div>
</body>
</html>
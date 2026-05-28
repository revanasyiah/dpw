<?php
// ================================================
// FILE: insert_dosen.php
// Contoh INSERT data dosen via DML Query (OOP)
// Modul Praktikum 12 – PHP Database OOP
// ================================================

require_once 'koneksi.php';

$pesan   = '';
$berhasil = false;

// ── Proses INSERT jika tombol diklik ────────────
if (isset($_POST['insert'])) {
    $sql = "INSERT INTO t_dosen (idDosen, namaDosen, noHP) VALUES (?, ?, ?)";
    $ok  = $db->execute($sql, "iss", [18, 'Rahmat Dwi Prasetya', 'rahmat@example.com']);

    if ($ok) {
        $pesan    = "✅ Data dosen ID 18 berhasil dimasukkan!";
        $berhasil = true;
    } else {
        $pesan = "❌ Gagal insert (mungkin ID sudah ada).";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Insert Dosen – Akademik OOP</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<nav class="navbar">
  <a href="index.php" class="brand">🎓 <span>Akademik</span>App <span class="oop-badge">OOP</span></a>
  <div class="nav-links">
    <a href="index.php">Dashboard</a>
    <a href="viewdosen.php" class="active">Dosen</a>
    <a href="viewmahasiswa.php">Mahasiswa</a>
    <a href="viewmatakuliah.php">Matakuliah</a>
  </div>
</nav>

<div class="page" style="max-width:680px">

  <div class="breadcrumb">
    <a href="index.php">Dashboard</a><span class="sep">/</span>
    <a href="viewdosen.php">Dosen</a><span class="sep">/</span>
    <span>Insert DML</span>
  </div>

  <div class="page-header">
    <div>
      <div class="page-title">DML — Insert <span>Dosen</span></div>
      <div class="page-subtitle">Demonstrasi query INSERT menggunakan Prepared Statement OOP</div>
    </div>
  </div>

  <div class="info-box">
    💡 File ini mendemonstrasikan pengiriman <strong>Query DML (INSERT)</strong> menggunakan
    method <code>$db->execute()</code> dengan <strong>Prepared Statement</strong> dari kelas <code>Database</code>.
  </div>

  <?php if ($pesan): ?>
    <div class="alert <?= $berhasil ? 'alert-success' : 'alert-danger' ?>"><?= $pesan ?></div>
  <?php endif; ?>

  <div class="card">
    <div class="card-header">
      <div class="card-icon">➕</div>
      <h3>Query INSERT – t_dosen</h3>
    </div>
    <div class="card-body">
      <p style="color:var(--muted);font-size:.88rem;margin-bottom:1.25rem">
        Query yang akan dieksekusi menggunakan Prepared Statement:
      </p>

      <div style="background:var(--surface);border:1px solid var(--border);border-radius:8px;padding:1rem;margin-bottom:1.5rem;font-family:'JetBrains Mono',monospace;font-size:.82rem;color:#b39ddd;line-height:1.8;">
        <span style="color:var(--muted)">// Prepared Statement</span><br>
        <span style="color:var(--accent)">$sql</span> = <span style="color:var(--success)">"INSERT INTO t_dosen (idDosen, namaDosen, noHP) VALUES (?, ?, ?)"</span>;<br>
        <span style="color:var(--accent)">$db</span>-><span style="color:var(--warning)">execute</span>(<span style="color:var(--accent)">$sql</span>, <span style="color:var(--success)">"iss"</span>, [<span style="color:var(--warning)">18</span>, <span style="color:var(--success)">'Rahmat Dwi Prasetya'</span>, <span style="color:var(--success)">'rahmat@example.com'</span>]);
      </div>

      <div class="table-wrap" style="margin-bottom:1.5rem">
        <table>
          <thead>
            <tr><th>Parameter</th><th>Tipe</th><th>Nilai</th></tr>
          </thead>
          <tbody>
            <tr>
              <td><code style="font-family:'JetBrains Mono',monospace;color:var(--accent)">idDosen</code></td>
              <td><span class="chip">integer (i)</span></td>
              <td><span class="id-badge">18</span></td>
            </tr>
            <tr>
              <td><code style="font-family:'JetBrains Mono',monospace;color:var(--accent)">namaDosen</code></td>
              <td><span class="chip">string (s)</span></td>
              <td>Rahmat Dwi Prasetya</td>
            </tr>
            <tr>
              <td><code style="font-family:'JetBrains Mono',monospace;color:var(--accent)">noHP</code></td>
              <td><span class="chip">string (s)</span></td>
              <td>rahmat@example.com</td>
            </tr>
          </tbody>
        </table>
      </div>

      <form method="POST">
        <div class="form-actions">
          <button type="submit" name="insert" class="btn btn-primary btn-lg">
            ▶ Eksekusi INSERT
          </button>
          <a href="viewdosen.php" class="btn btn-ghost">Lihat Tabel Dosen</a>
        </div>
      </form>
    </div>
  </div>

</div>
</body>
</html>

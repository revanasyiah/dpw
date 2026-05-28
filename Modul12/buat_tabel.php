<?php
// ================================================
// FILE: buat_tabel.php
// Membuat tabel t_login menggunakan OOP + Query DDL
// Modul Praktikum 12 – PHP Database OOP
// ================================================

require_once 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Buat Tabel – Akademik OOP</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<nav class="navbar">
  <a href="index.php" class="brand">🎓 <span>Akademik</span>App <span class="oop-badge">OOP</span></a>
  <div class="nav-links">
    <a href="index.php">Dashboard</a>
    <a href="viewdosen.php">Dosen</a>
    <a href="viewmahasiswa.php">Mahasiswa</a>
    <a href="viewmatakuliah.php">Matakuliah</a>
  </div>
</nav>

<div class="page" style="max-width:680px">

  <div class="breadcrumb">
    <a href="index.php">Dashboard</a><span class="sep">/</span>
    <span>Buat Tabel</span>
  </div>

  <div class="page-header">
    <div>
      <div class="page-title">DDL — Buat <span>Tabel</span></div>
      <div class="page-subtitle">Membuat tabel <code style="font-family:'JetBrains Mono',monospace;font-size:.85em;color:var(--accent)">t_login</code> menggunakan Query DDL via OOP</div>
    </div>
  </div>

  <div class="info-box">
    💡 File ini mendemonstrasikan pengiriman <strong>Query DDL</strong> ke database menggunakan method
    <code>$db->getConn()->query()</code> dari kelas <code>Database</code>.
  </div>

  <?php
  // ── Query DDL: CREATE TABLE t_login ──────────
  $sql = "CREATE TABLE IF NOT EXISTS t_login (
      id              INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      username        VARCHAR(30) NOT NULL,
      password        VARCHAR(50) NOT NULL,
      email           VARCHAR(50),
      tgl_registrasi  TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
  )";

  $hasil = $db->getConn()->query($sql);
  ?>

  <div class="card">
    <div class="card-header">
      <div class="card-icon">🗄️</div>
      <h3>Hasil Eksekusi DDL</h3>
    </div>
    <div class="card-body">
      <?php if ($hasil === TRUE): ?>
        <div class="alert alert-success">
          ✅ Tabel <strong>t_login</strong> berhasil dibuat (atau sudah ada).
        </div>
      <?php else: ?>
        <div class="alert alert-danger">
          ❌ Gagal membuat tabel: <?= htmlspecialchars($db->getConn()->error) ?>
        </div>
      <?php endif; ?>

      <p style="color:var(--muted);font-size:.88rem;margin-bottom:1.25rem">
        Struktur tabel <strong style="color:var(--text)">t_login</strong> yang dibuat:
      </p>

      <div class="table-wrap">
        <table>
          <thead>
            <tr>
              <th>#</th>
              <th>Field</th>
              <th>Tipe Data</th>
              <th>Keterangan</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><span class="id-badge">1</span></td>
              <td><code style="font-family:'JetBrains Mono',monospace;color:var(--accent)">id</code></td>
              <td><span class="chip">INT(6) UNSIGNED</span></td>
              <td style="color:var(--muted)">Primary Key, Auto Increment</td>
            </tr>
            <tr>
              <td><span class="id-badge">2</span></td>
              <td><code style="font-family:'JetBrains Mono',monospace;color:var(--accent)">username</code></td>
              <td><span class="chip">VARCHAR(30)</span></td>
              <td style="color:var(--muted)">NOT NULL</td>
            </tr>
            <tr>
              <td><span class="id-badge">3</span></td>
              <td><code style="font-family:'JetBrains Mono',monospace;color:var(--accent)">password</code></td>
              <td><span class="chip">VARCHAR(50)</span></td>
              <td style="color:var(--muted)">NOT NULL</td>
            </tr>
            <tr>
              <td><span class="id-badge">4</span></td>
              <td><code style="font-family:'JetBrains Mono',monospace;color:var(--accent)">email</code></td>
              <td><span class="chip">VARCHAR(50)</span></td>
              <td style="color:var(--muted)">Opsional</td>
            </tr>
            <tr>
              <td><span class="id-badge">5</span></td>
              <td><code style="font-family:'JetBrains Mono',monospace;color:var(--accent)">tgl_registrasi</code></td>
              <td><span class="chip">TIMESTAMP</span></td>
              <td style="color:var(--muted)">Default: CURRENT_TIMESTAMP</td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="form-actions" style="margin-top:1.5rem">
        <a href="index.php" class="btn btn-primary">← Kembali ke Dashboard</a>
      </div>
    </div>
  </div>

</div>
</body>
</html>

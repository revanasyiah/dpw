<?php
// ================================================
// FILE: index.php
// Dashboard utama – Sistem Akademik OOP
// Modul Praktikum 12 – PHP Database OOP
// ================================================

require_once 'koneksi.php';

// Hitung total data menggunakan method count() dari kelas Database
$jmlDosen = $db->count('t_dosen');
$jmlMhs   = $db->count('t_mahasiswa');
$jmlMK    = $db->count('t_matakuliah');
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard – Akademik OOP</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<nav class="navbar">
  <a href="index.php" class="brand">🎓 <span>Akademik</span>App <span class="oop-badge">OOP</span></a>
  <div class="nav-links">
    <a href="index.php" class="active">Dashboard</a>
    <a href="viewdosen.php">Dosen</a>
    <a href="viewmahasiswa.php">Mahasiswa</a>
    <a href="viewmatakuliah.php">Matakuliah</a>
  </div>
</nav>

<div class="page">

  <!-- ── Page header ── -->
  <div class="page-header">
    <div>
      <div class="page-title">Dashboard <span>Akademik</span></div>
      <div class="page-subtitle">Sistem Informasi Akademik — PHP OOP + Prepared Statements + MySQL</div>
    </div>
    <div style="display:flex;gap:.5rem;flex-wrap:wrap">
      <a href="buat_tabel.php" class="btn btn-ghost btn-sm">🗄️ Buat Tabel t_login</a>
      <a href="insert_dosen.php" class="btn btn-ghost btn-sm">➕ Demo INSERT</a>
    </div>
  </div>

  <!-- ── OOP Info Banner ── -->
  <div class="info-box" style="margin-bottom:1.75rem">
    🔧 Modul 12: Seluruh operasi database menggunakan kelas <code>Database</code> dengan
    <strong>Prepared Statements</strong> — lebih aman dari SQL Injection.
    Koneksi dikelola melalui <code>koneksi.php</code> yang memuat <code>Database.php</code>.
  </div>

  <!-- ── Stats ── -->
  <div class="stats-grid">
    <div class="stat-card">
      <div class="stat-icon blue">👨‍🏫</div>
      <div>
        <div class="stat-num"><?= $jmlDosen ?></div>
        <div class="stat-lbl">Total Dosen</div>
      </div>
    </div>
    <div class="stat-card">
      <div class="stat-icon green">🎓</div>
      <div>
        <div class="stat-num"><?= $jmlMhs ?></div>
        <div class="stat-lbl">Total Mahasiswa</div>
      </div>
    </div>
    <div class="stat-card">
      <div class="stat-icon purple">📚</div>
      <div>
        <div class="stat-num"><?= $jmlMK ?></div>
        <div class="stat-lbl">Total Matakuliah</div>
      </div>
    </div>
  </div>

  <!-- ── Quick access cards ── -->
  <div style="display:grid; grid-template-columns:repeat(auto-fit,minmax(300px,1fr)); gap:1rem; margin-bottom:1.5rem">

    <!-- Dosen -->
    <div class="card">
      <div class="card-header">
        <div class="card-icon">👨‍🏫</div>
        <h3>Manajemen Dosen</h3>
        <a href="inputdosen.php" class="btn btn-primary btn-sm" style="margin-left:auto">+ Tambah</a>
      </div>
      <div class="card-body" style="padding:.75rem 1.5rem 1.5rem">
        <p style="color:var(--muted);font-size:.88rem;margin-bottom:1rem">Kelola data dosen: nama dan nomor HP.</p>
        <a href="viewdosen.php" class="btn btn-ghost btn-sm">Lihat Semua Dosen →</a>
      </div>
    </div>

    <!-- Mahasiswa -->
    <div class="card">
      <div class="card-header">
        <div class="card-icon" style="background:rgba(41,199,125,.15);color:var(--success)">🎓</div>
        <h3>Manajemen Mahasiswa</h3>
        <a href="inputmahasiswa.php" class="btn btn-success btn-sm" style="margin-left:auto">+ Tambah</a>
      </div>
      <div class="card-body" style="padding:.75rem 1.5rem 1.5rem">
        <p style="color:var(--muted);font-size:.88rem;margin-bottom:1rem">Kelola data mahasiswa: NPM, nama, prodi, alamat, HP.</p>
        <a href="viewmahasiswa.php" class="btn btn-ghost btn-sm">Lihat Semua Mahasiswa →</a>
      </div>
    </div>

    <!-- Matakuliah -->
    <div class="card">
      <div class="card-header">
        <div class="card-icon" style="background:rgba(124,92,191,.15);color:#b39ddd">📚</div>
        <h3>Manajemen Matakuliah</h3>
        <a href="inputmatakuliah.php" class="btn btn-sm" style="margin-left:auto;background:rgba(124,92,191,.2);color:#b39ddd;border:1px solid rgba(124,92,191,.3)">+ Tambah</a>
      </div>
      <div class="card-body" style="padding:.75rem 1.5rem 1.5rem">
        <p style="color:var(--muted);font-size:.88rem;margin-bottom:1rem">Kelola data matakuliah: kode, nama, SKS, dan jam.</p>
        <a href="viewmatakuliah.php" class="btn btn-ghost btn-sm">Lihat Semua Matakuliah →</a>
      </div>
    </div>

  </div>

  <!-- ── OOP Architecture Card ── -->
  <div class="card">
    <div class="card-header">
      <div class="card-icon" style="background:rgba(124,92,191,.15);color:#b39ddd">🏗️</div>
      <h3>Arsitektur OOP – Modul 12</h3>
    </div>
    <div class="card-body">
      <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:1rem">

        <div style="background:var(--surface);border:1px solid var(--border);border-radius:8px;padding:1rem">
          <div style="font-size:.78rem;font-weight:700;color:var(--accent);text-transform:uppercase;letter-spacing:.6px;margin-bottom:.5rem">Database.php</div>
          <div style="font-size:.82rem;color:var(--muted);line-height:1.7">
            Kelas utama koneksi OOP<br>
            <code style="font-family:'JetBrains Mono',monospace;font-size:.75rem;color:var(--accent);background:rgba(79,142,247,.1);padding:.1rem .3rem;border-radius:3px">select()</code> — SELECT banyak baris<br>
            <code style="font-family:'JetBrains Mono',monospace;font-size:.75rem;color:var(--accent);background:rgba(79,142,247,.1);padding:.1rem .3rem;border-radius:3px">selectOne()</code> — SELECT satu baris<br>
            <code style="font-family:'JetBrains Mono',monospace;font-size:.75rem;color:var(--accent);background:rgba(79,142,247,.1);padding:.1rem .3rem;border-radius:3px">execute()</code> — INSERT/UPDATE/DELETE<br>
            <code style="font-family:'JetBrains Mono',monospace;font-size:.75rem;color:var(--accent);background:rgba(79,142,247,.1);padding:.1rem .3rem;border-radius:3px">count()</code> — Hitung baris
          </div>
        </div>

        <div style="background:var(--surface);border:1px solid var(--border);border-radius:8px;padding:1rem">
          <div style="font-size:.78rem;font-weight:700;color:var(--success);text-transform:uppercase;letter-spacing:.6px;margin-bottom:.5rem">Prepared Statements</div>
          <div style="font-size:.82rem;color:var(--muted);line-height:1.7">
            Semua query menggunakan <code style="font-family:'JetBrains Mono',monospace;font-size:.75rem;color:var(--success);background:rgba(41,199,125,.1);padding:.1rem .3rem;border-radius:3px">?</code> placeholder<br>
            Tipe: <code style="font-family:'JetBrains Mono',monospace;font-size:.75rem;color:var(--warning);background:rgba(247,183,49,.1);padding:.1rem .3rem;border-radius:3px">i</code>=integer &nbsp;
            <code style="font-family:'JetBrains Mono',monospace;font-size:.75rem;color:var(--warning);background:rgba(247,183,49,.1);padding:.1rem .3rem;border-radius:3px">s</code>=string<br>
            Aman dari <strong style="color:var(--danger)">SQL Injection</strong>
          </div>
        </div>

        <div style="background:var(--surface);border:1px solid var(--border);border-radius:8px;padding:1rem">
          <div style="font-size:.78rem;font-weight:700;color:#b39ddd;text-transform:uppercase;letter-spacing:.6px;margin-bottom:.5rem">Fitur Modul 12</div>
          <div style="font-size:.82rem;color:var(--muted);line-height:1.7">
            ✅ OOP Database Class<br>
            ✅ Prepared Statements<br>
            ✅ DDL — buat_tabel.php<br>
            ✅ DML INSERT demo<br>
            ✅ CRUD lengkap 3 tabel
          </div>
        </div>

      </div>
    </div>
  </div>

</div><!-- end .page -->
</body>
</html>

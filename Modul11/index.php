<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sistem Akademik – Dashboard</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<?php include 'koneksi.php'; ?>

<!-- ── Navbar ── -->
<nav class="navbar">
  <a href="index.php" class="brand">🎓 <span>Akademik</span>App</a>
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
      <div class="page-subtitle">Sistem Informasi Pengelolaan Data Akademik – CRUD PHP & MySQL</div>
    </div>
  </div>

  <!-- ── Stats ── -->
  <?php
    $jmlDosen = mysqli_fetch_row(mysqli_query($link,"SELECT COUNT(*) FROM t_dosen"))[0];
    $jmlMhs   = mysqli_fetch_row(mysqli_query($link,"SELECT COUNT(*) FROM t_mahasiswa"))[0];
    $jmlMK    = mysqli_fetch_row(mysqli_query($link,"SELECT COUNT(*) FROM t_matakuliah"))[0];
  ?>
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

  <!-- ── Quick access ── -->
  <div style="display:grid; grid-template-columns:repeat(auto-fit,minmax(300px,1fr)); gap:1rem;">

    <!-- Dosen -->
    <div class="card">
      <div class="card-header">
        <div class="card-icon">👨‍🏫</div>
        <h3>Manajemen Dosen</h3>
        <a href="inputdosen.php" class="btn btn-primary btn-sm" style="margin-left:auto">+ Tambah</a>
      </div>
      <div class="card-body" style="padding:.75rem 1.5rem 1.5rem">
        <p style="color:var(--muted);font-size:.88rem;margin-bottom:1rem">Kelola data dosen termasuk nama dan nomor HP.</p>
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

</div><!-- end .page -->
</body>
</html>

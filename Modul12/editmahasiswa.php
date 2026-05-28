<?php
require_once 'koneksi.php';

if (!isset($_GET['npm'])) { header("location:viewmahasiswa.php"); exit; }

$npm  = (int) $_GET['npm'];
$data = $db->selectOne("SELECT * FROM t_mahasiswa WHERE npm = ?", "i", [$npm]);

if (!$data) { header("location:viewmahasiswa.php"); exit; }
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Mahasiswa – Akademik OOP</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<nav class="navbar">
  <a href="index.php" class="brand">🎓 <span>Akademik</span>App <span class="oop-badge">OOP</span></a>
  <div class="nav-links">
    <a href="index.php">Dashboard</a>
    <a href="viewdosen.php">Dosen</a>
    <a href="viewmahasiswa.php" class="active">Mahasiswa</a>
    <a href="viewmatakuliah.php">Matakuliah</a>
  </div>
</nav>

<div class="page" style="max-width:600px">

  <div class="breadcrumb">
    <a href="index.php">Dashboard</a><span class="sep">/</span>
    <a href="viewmahasiswa.php">Mahasiswa</a><span class="sep">/</span>
    <span>Edit Data</span>
  </div>

  <div class="page-header">
    <div>
      <div class="page-title">Edit <span>Mahasiswa</span></div>
      <div class="page-subtitle">Perbarui informasi data mahasiswa</div>
    </div>
  </div>

  <div class="card">
    <div class="card-header">
      <div class="card-icon" style="background:rgba(41,199,125,.15);color:var(--success)">✏️</div>
      <h3>Form Edit Data Mahasiswa</h3>
    </div>
    <div class="card-body">
      <form action="proses_editmahasiswa.php" method="POST">
        <input type="hidden" name="npm" value="<?= $data['npm'] ?>">
        <div class="form-grid">

          <div class="form-group">
            <label class="form-label">NPM</label>
            <input type="text" class="form-control" value="<?= $data['npm'] ?>" disabled>
            <span class="form-hint">NPM tidak dapat diubah (Primary Key)</span>
          </div>

          <div class="form-group">
            <label class="form-label" for="namaMhs">Nama Mahasiswa</label>
            <input type="text" name="namaMhs" id="namaMhs" class="form-control" required
                   value="<?= htmlspecialchars($data['namaMhs']) ?>">
          </div>

          <div class="form-group">
            <label class="form-label" for="prodi">Program Studi</label>
            <input type="text" name="prodi" id="prodi" class="form-control" required
                   value="<?= htmlspecialchars($data['prodi']) ?>">
          </div>

          <div class="form-group">
            <label class="form-label" for="alamat">Alamat</label>
            <input type="text" name="alamat" id="alamat" class="form-control" required
                   value="<?= htmlspecialchars($data['alamat']) ?>">
          </div>

          <div class="form-group">
            <label class="form-label" for="noHP">Nomor HP</label>
            <input type="text" name="noHP" id="noHP" class="form-control" required
                   value="<?= htmlspecialchars($data['noHP']) ?>">
          </div>

          <div class="form-actions">
            <button type="submit" name="edit" class="btn btn-success btn-lg">💾 Update Data</button>
            <a href="viewmahasiswa.php" class="btn btn-ghost">Batal</a>
          </div>

        </div>
      </form>
    </div>
  </div>

</div>
</body>
</html>

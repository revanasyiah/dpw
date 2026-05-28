<?php
require_once 'koneksi.php';

if (!isset($_GET['kodeMK'])) { header("location:viewmatakuliah.php"); exit; }

$kodeMK = (int) $_GET['kodeMK'];
$data   = $db->selectOne("SELECT * FROM t_matakuliah WHERE kodeMK = ?", "i", [$kodeMK]);

if (!$data) { header("location:viewmatakuliah.php"); exit; }
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Matakuliah – Akademik OOP</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<nav class="navbar">
  <a href="index.php" class="brand">🎓 <span>Akademik</span>App <span class="oop-badge">OOP</span></a>
  <div class="nav-links">
    <a href="index.php">Dashboard</a>
    <a href="viewdosen.php">Dosen</a>
    <a href="viewmahasiswa.php">Mahasiswa</a>
    <a href="viewmatakuliah.php" class="active">Matakuliah</a>
  </div>
</nav>

<div class="page" style="max-width:600px">

  <div class="breadcrumb">
    <a href="index.php">Dashboard</a><span class="sep">/</span>
    <a href="viewmatakuliah.php">Matakuliah</a><span class="sep">/</span>
    <span>Edit Data</span>
  </div>

  <div class="page-header">
    <div>
      <div class="page-title">Edit <span>Matakuliah</span></div>
      <div class="page-subtitle">Perbarui informasi data matakuliah</div>
    </div>
  </div>

  <div class="card">
    <div class="card-header">
      <div class="card-icon" style="background:rgba(124,92,191,.15);color:#b39ddd">✏️</div>
      <h3>Form Edit Data Matakuliah</h3>
    </div>
    <div class="card-body">
      <form action="proses_editmatakuliah.php" method="POST">
        <input type="hidden" name="kodeMK" value="<?= $data['kodeMK'] ?>">
        <div class="form-grid">

          <div class="form-group">
            <label class="form-label">Kode MK</label>
            <input type="text" class="form-control" value="<?= $data['kodeMK'] ?>" disabled>
            <span class="form-hint">Kode MK tidak dapat diubah (Primary Key)</span>
          </div>

          <div class="form-group">
            <label class="form-label" for="namaMK">Nama Matakuliah</label>
            <input type="text" name="namaMK" id="namaMK" class="form-control" required
                   value="<?= htmlspecialchars($data['namaMK']) ?>">
          </div>

          <div style="display:grid;grid-template-columns:1fr 1fr;gap:1rem">
            <div class="form-group">
              <label class="form-label" for="sks">Jumlah SKS</label>
              <input type="number" name="sks" id="sks" class="form-control" required
                     value="<?= $data['sks'] ?>" min="1" max="6">
            </div>
            <div class="form-group">
              <label class="form-label" for="jam">Jumlah Jam</label>
              <input type="number" name="jam" id="jam" class="form-control" required
                     value="<?= $data['jam'] ?>" min="1" max="10">
            </div>
          </div>

          <div class="form-actions">
            <button type="submit" name="edit" class="btn btn-lg"
                    style="background:rgba(124,92,191,.8);color:#fff">💾 Update Data</button>
            <a href="viewmatakuliah.php" class="btn btn-ghost">Batal</a>
          </div>

        </div>
      </form>
    </div>
  </div>

</div>
</body>
</html>

<?php
// ================================================
// FILE: editdosen.php
// Form edit dosen – Prepared Statement OOP
// ================================================

require_once 'koneksi.php';

if (!isset($_GET['idDosen'])) {
    header("location:viewdosen.php");
    exit;
}

$idDosen = (int) $_GET['idDosen'];

// Prepared SELECT – ambil satu data
$data = $db->selectOne(
    "SELECT * FROM t_dosen WHERE idDosen = ?",
    "i",
    [$idDosen]
);

if (!$data) {
    header("location:viewdosen.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Dosen – Akademik OOP</title>
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

<div class="page" style="max-width:600px">

  <div class="breadcrumb">
    <a href="index.php">Dashboard</a><span class="sep">/</span>
    <a href="viewdosen.php">Dosen</a><span class="sep">/</span>
    <span>Edit Data</span>
  </div>

  <div class="page-header">
    <div>
      <div class="page-title">Edit <span>Dosen</span></div>
      <div class="page-subtitle">Perbarui informasi data dosen</div>
    </div>
  </div>

  <div class="card">
    <div class="card-header">
      <div class="card-icon">✏️</div>
      <h3>Form Edit Data Dosen</h3>
    </div>
    <div class="card-body">
      <form action="proses_editdosen.php" method="POST">
        <input type="hidden" name="idDosen" value="<?= $data['idDosen'] ?>">

        <div class="form-grid">

          <div class="form-group">
            <label class="form-label">ID Dosen</label>
            <input type="text" class="form-control"
                   value="<?= $data['idDosen'] ?>" disabled>
            <span class="form-hint">ID tidak dapat diubah (Primary Key)</span>
          </div>

          <div class="form-group">
            <label class="form-label" for="namaDosen">Nama Dosen</label>
            <input type="text" name="namaDosen" id="namaDosen"
                   class="form-control" required
                   value="<?= htmlspecialchars($data['namaDosen']) ?>">
          </div>

          <div class="form-group">
            <label class="form-label" for="noHP">Nomor HP</label>
            <input type="text" name="noHP" id="noHP"
                   class="form-control" required
                   value="<?= htmlspecialchars($data['noHP']) ?>">
          </div>

          <div class="form-actions">
            <button type="submit" name="edit" class="btn btn-primary btn-lg">
              💾 Update Data
            </button>
            <a href="viewdosen.php" class="btn btn-ghost">Batal</a>
          </div>

        </div>
      </form>
    </div>
  </div>

</div>
</body>
</html>

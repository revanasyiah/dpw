<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Tambah Dosen – Akademik OOP</title>
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
    <span>Tambah Data</span>
  </div>

  <div class="page-header">
    <div>
      <div class="page-title">Tambah <span>Dosen</span></div>
      <div class="page-subtitle">Isi formulir untuk menambahkan data dosen baru</div>
    </div>
  </div>

  <div class="card">
    <div class="card-header">
      <div class="card-icon">👨‍🏫</div>
      <h3>Form Input Data Dosen</h3>
    </div>
    <div class="card-body">
      <form action="proses_inputdosen.php" method="POST">
        <div class="form-grid">

          <div class="form-group">
            <label class="form-label" for="namaDosen">Nama Dosen</label>
            <input type="text" name="namaDosen" id="namaDosen"
                   class="form-control" required
                   placeholder="Contoh: Dr. Ahmad Yusuf, M.Sc">
          </div>

          <div class="form-group">
            <label class="form-label" for="noHP">Nomor HP</label>
            <input type="text" name="noHP" id="noHP"
                   class="form-control" required
                   placeholder="Contoh: 081222333444"
                   pattern="[0-9]{8,15}">
            <span class="form-hint">Masukkan nomor HP tanpa spasi atau tanda hubung</span>
          </div>

          <div class="form-actions">
            <button type="submit" name="input" class="btn btn-primary btn-lg">
              💾 Simpan Data
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

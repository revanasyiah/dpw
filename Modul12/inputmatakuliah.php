<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Tambah Matakuliah – Akademik OOP</title>
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
    <span>Tambah Data</span>
  </div>

  <div class="page-header">
    <div>
      <div class="page-title">Tambah <span>Matakuliah</span></div>
      <div class="page-subtitle">Isi formulir untuk menambahkan data matakuliah baru</div>
    </div>
  </div>

  <div class="card">
    <div class="card-header">
      <div class="card-icon" style="background:rgba(124,92,191,.15);color:#b39ddd">📚</div>
      <h3>Form Input Data Matakuliah</h3>
    </div>
    <div class="card-body">
      <form action="proses_inputmatakuliah.php" method="POST">
        <div class="form-grid">

          <div class="form-group">
            <label class="form-label" for="kodeMK">Kode Matakuliah</label>
            <input type="number" name="kodeMK" id="kodeMK"
                   class="form-control" required placeholder="Contoh: 101">
            <span class="form-hint">Kode MK bersifat unik (Primary Key)</span>
          </div>

          <div class="form-group">
            <label class="form-label" for="namaMK">Nama Matakuliah</label>
            <input type="text" name="namaMK" id="namaMK"
                   class="form-control" required placeholder="Contoh: Pemrograman Web">
          </div>

          <div style="display:grid;grid-template-columns:1fr 1fr;gap:1rem">
            <div class="form-group">
              <label class="form-label" for="sks">Jumlah SKS</label>
              <input type="number" name="sks" id="sks"
                     class="form-control" required placeholder="Contoh: 3" min="1" max="6">
            </div>
            <div class="form-group">
              <label class="form-label" for="jam">Jumlah Jam</label>
              <input type="number" name="jam" id="jam"
                     class="form-control" required placeholder="Contoh: 3" min="1" max="10">
            </div>
          </div>

          <div class="form-actions">
            <button type="submit" name="input" class="btn btn-lg"
                    style="background:rgba(124,92,191,.8);color:#fff">
              💾 Simpan Data
            </button>
            <a href="viewmatakuliah.php" class="btn btn-ghost">Batal</a>
          </div>

        </div>
      </form>
    </div>
  </div>

</div>
</body>
</html>

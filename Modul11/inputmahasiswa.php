<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Input Data Mahasiswa</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<nav class="navbar">
  <a href="index.php" class="brand">🎓 <span>Akademik</span>App</a>
  <div class="nav-links">
    <a href="index.php">Dashboard</a>
    <a href="viewdosen.php">Dosen</a>
    <a href="viewmahasiswa.php" class="active">Mahasiswa</a>
    <a href="viewmatakuliah.php">Matakuliah</a>
  </div>
</nav>

<div class="page" style="max-width:620px">

  <div class="breadcrumb">
    <a href="index.php">Dashboard</a><span class="sep">/</span>
    <a href="viewmahasiswa.php">Mahasiswa</a><span class="sep">/</span>
    <span>Tambah Data</span>
  </div>

  <div class="page-header">
    <div>
      <div class="page-title">Tambah <span>Mahasiswa</span></div>
      <div class="page-subtitle">Isi formulir untuk mendaftarkan mahasiswa baru</div>
    </div>
  </div>

  <div class="card">
    <div class="card-header">
      <div class="card-icon" style="background:rgba(41,199,125,.15);color:var(--success)">🎓</div>
      <h3>Form Input Data Mahasiswa</h3>
    </div>
    <div class="card-body">
      <form action="proses_inputmahasiswa.php" method="POST">
        <div class="form-grid">

          <div class="form-group">
            <label class="form-label" for="npm">NPM</label>
            <input type="number" name="npm" id="npm"
                   class="form-control" required
                   placeholder="Contoh: 20210001">
            <span class="form-hint">Nomor Pokok Mahasiswa (unik, tidak boleh duplikat)</span>
          </div>

          <div class="form-group">
            <label class="form-label" for="namaMhs">Nama Mahasiswa</label>
            <input type="text" name="namaMhs" id="namaMhs"
                   class="form-control" required
                   placeholder="Contoh: Andi Pratama">
          </div>

          <div class="form-group">
            <label class="form-label" for="prodi">Program Studi</label>
            <select name="prodi" id="prodi" class="form-control" required>
              <option value="" disabled selected>-- Pilih Prodi --</option>
              <option value="Teknik Informatika">Teknik Informatika</option>
              <option value="Sistem Informasi">Sistem Informasi</option>
              <option value="Teknologi Informasi">Teknologi Informasi</option>
              <option value="Teknik Sipil">Teknik Sipil</option>
            </select>
          </div>

          <div class="form-group">
            <label class="form-label" for="alamat">Alamat</label>
            <input type="text" name="alamat" id="alamat"
                   class="form-control" required
                   placeholder="Contoh: Jl. Merdeka No. 1, Madiun">
          </div>

          <div class="form-group">
            <label class="form-label" for="noHP">Nomor HP</label>
            <input type="text" name="noHP" id="noHP"
                   class="form-control" required
                   placeholder="Contoh: 085111222333">
          </div>

          <div class="form-actions">
            <button type="submit" name="input" class="btn btn-success btn-lg">
              💾 Simpan Data
            </button>
            <a href="viewmahasiswa.php" class="btn btn-ghost">Batal</a>
          </div>

        </div>
      </form>
    </div>
  </div>

</div>
</body>
</html>

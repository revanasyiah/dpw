<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Tabel Mahasiswa</title>
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

<div class="page">

  <div class="breadcrumb">
    <a href="index.php">Dashboard</a><span class="sep">/</span>
    <span>Mahasiswa</span>
  </div>

  <?php if (isset($_GET['msg'])): ?>
    <?php if ($_GET['msg'] === 'add'): ?>
      <div class="alert alert-success">✅ Data mahasiswa berhasil ditambahkan.</div>
    <?php elseif ($_GET['msg'] === 'edit'): ?>
      <div class="alert alert-success">✏️ Data mahasiswa berhasil diperbarui.</div>
    <?php elseif ($_GET['msg'] === 'del'): ?>
      <div class="alert alert-danger">🗑️ Data mahasiswa berhasil dihapus.</div>
    <?php endif; ?>
  <?php endif; ?>

  <div class="page-header">
    <div>
      <div class="page-title">Data <span>Mahasiswa</span></div>
      <div class="page-subtitle">Kelola seluruh data mahasiswa yang terdaftar</div>
    </div>
    <a href="inputmahasiswa.php" class="btn btn-success">+ Tambah Mahasiswa</a>
  </div>

  <?php
    $keyword = isset($_GET['cari']) ? mysqli_real_escape_string($link, trim($_GET['cari'])) : '';
    if ($keyword !== '') {
        $query = "SELECT * FROM t_mahasiswa WHERE namaMhs LIKE '%$keyword%' ORDER BY npm ASC";
    } else {
        $query = "SELECT * FROM t_mahasiswa ORDER BY npm ASC";
    }
    $result = mysqli_query($link, $query);
    if (!$result) die("Query Error: " . mysqli_errno($link) . " – " . mysqli_error($link));
    $total = mysqli_num_rows($result);
  ?>

  <div class="card">
    <div class="card-header">
      <div class="card-icon" style="background:rgba(41,199,125,.15);color:var(--success)">🔍</div>
      <h3>Pencarian Data Mahasiswa</h3>
      <form method="GET" style="margin-left:auto">
        <div class="search-wrap">
          <input type="text" name="cari" class="search-input"
                 placeholder="Cari nama mahasiswa..."
                 value="<?= htmlspecialchars($keyword) ?>">
          <button type="submit" class="btn btn-success btn-sm">Cari</button>
          <?php if ($keyword): ?>
            <a href="viewmahasiswa.php" class="btn btn-ghost btn-sm">Reset</a>
          <?php endif; ?>
        </div>
      </form>
    </div>

    <div class="table-wrap">
      <table>
        <thead>
          <tr>
            <th>NPM</th>
            <th>Nama Mahasiswa</th>
            <th>Program Studi</th>
            <th>Alamat</th>
            <th>No HP</th>
            <th style="text-align:center">Aksi</th>
          </tr>
        </thead>
        <tbody>
        <?php if ($total === 0): ?>
          <tr><td colspan="6">
            <div class="empty">
              <div class="empty-icon">🎓</div>
              <?= $keyword ? "Tidak ada mahasiswa dengan nama \"<b>$keyword</b>\"." : "Belum ada data mahasiswa." ?>
            </div>
          </td></tr>
        <?php else: ?>
          <?php while ($data = mysqli_fetch_assoc($result)): ?>
          <tr>
            <td><span class="id-badge"><?= $data['npm'] ?></span></td>
            <td><b><?= htmlspecialchars($data['namaMhs']) ?></b></td>
            <td><span class="chip"><?= htmlspecialchars($data['prodi']) ?></span></td>
            <td style="font-size:.85rem;color:var(--muted)"><?= htmlspecialchars($data['alamat']) ?></td>
            <td style="font-family:'JetBrains Mono',monospace;font-size:.85rem">
              <?= htmlspecialchars($data['noHP']) ?>
            </td>
            <td style="text-align:center">
              <div style="display:flex;gap:.4rem;justify-content:center">
                <a href="editmahasiswa.php?npm=<?= $data['npm'] ?>"
                   class="btn btn-warning btn-sm">✏️ Edit</a>
                <a href="hapusmahasiswa.php?npm=<?= $data['npm'] ?>"
                   class="btn btn-danger btn-sm"
                   onclick="return confirm('Yakin ingin menghapus mahasiswa ini?')">🗑️ Hapus</a>
              </div>
            </td>
          </tr>
          <?php endwhile; ?>
        <?php endif; ?>
        </tbody>
      </table>
    </div>

    <div style="padding:.75rem 1rem; border-top:1px solid var(--border); color:var(--muted); font-size:.8rem;">
      Menampilkan <b style="color:var(--text)"><?= $total ?></b> data mahasiswa
      <?= $keyword ? "untuk pencarian \"<b style='color:var(--success)'>$keyword</b>\"" : "" ?>
    </div>
  </div>

</div>
</body>
</html>

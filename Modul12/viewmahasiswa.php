<?php
require_once 'koneksi.php';

$keyword = isset($_GET['cari']) ? trim($_GET['cari']) : '';

if ($keyword !== '') {
    $like = "%$keyword%";
    $rows = $db->select(
        "SELECT * FROM t_mahasiswa WHERE namaMhs LIKE ? OR npm LIKE ? ORDER BY npm ASC",
        "ss", [$like, $like]
    );
} else {
    $rows = $db->select("SELECT * FROM t_mahasiswa ORDER BY npm ASC");
}
$total = count($rows);
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Data Mahasiswa – Akademik OOP</title>
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
      <div class="page-subtitle">Kelola seluruh data mahasiswa — Prepared Statement OOP</div>
    </div>
    <a href="inputmahasiswa.php" class="btn btn-success">+ Tambah Mahasiswa</a>
  </div>

  <div class="card">
    <div class="card-header">
      <div class="card-icon" style="background:rgba(41,199,125,.15);color:var(--success)">🔍</div>
      <h3>Pencarian Data Mahasiswa</h3>
      <form method="GET" style="margin-left:auto">
        <div class="search-wrap">
          <input type="text" name="cari" class="search-input"
                 placeholder="Cari nama atau NPM..."
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
            <th>Prodi</th>
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
              <?= $keyword
                ? "Tidak ada mahasiswa dengan kata kunci \"<b>" . htmlspecialchars($keyword) . "</b>\"."
                : "Belum ada data mahasiswa." ?>
            </div>
          </td></tr>
        <?php else: ?>
          <?php foreach ($rows as $data): ?>
          <tr>
            <td><span class="id-badge"><?= $data['npm'] ?></span></td>
            <td><b><?= htmlspecialchars($data['namaMhs']) ?></b></td>
            <td><span class="chip chip-green"><?= htmlspecialchars($data['prodi']) ?></span></td>
            <td style="color:var(--muted);font-size:.85rem"><?= htmlspecialchars($data['alamat']) ?></td>
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
          <?php endforeach; ?>
        <?php endif; ?>
        </tbody>
      </table>
    </div>

    <div style="padding:.75rem 1rem; border-top:1px solid var(--border); color:var(--muted); font-size:.8rem;">
      Menampilkan <b style="color:var(--text)"><?= $total ?></b> data mahasiswa
    </div>
  </div>

</div>
</body>
</html>

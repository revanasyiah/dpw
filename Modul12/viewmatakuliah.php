<?php
require_once 'koneksi.php';

$keyword = isset($_GET['cari']) ? trim($_GET['cari']) : '';

if ($keyword !== '') {
    $like = "%$keyword%";
    $rows = $db->select(
        "SELECT * FROM t_matakuliah WHERE namaMK LIKE ? ORDER BY kodeMK ASC",
        "s", [$like]
    );
} else {
    $rows = $db->select("SELECT * FROM t_matakuliah ORDER BY kodeMK ASC");
}
$total = count($rows);
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Data Matakuliah – Akademik OOP</title>
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

<div class="page">

  <div class="breadcrumb">
    <a href="index.php">Dashboard</a><span class="sep">/</span>
    <span>Matakuliah</span>
  </div>

  <?php if (isset($_GET['msg'])): ?>
    <?php if ($_GET['msg'] === 'add'): ?>
      <div class="alert alert-success">✅ Data matakuliah berhasil ditambahkan.</div>
    <?php elseif ($_GET['msg'] === 'edit'): ?>
      <div class="alert alert-success">✏️ Data matakuliah berhasil diperbarui.</div>
    <?php elseif ($_GET['msg'] === 'del'): ?>
      <div class="alert alert-danger">🗑️ Data matakuliah berhasil dihapus.</div>
    <?php endif; ?>
  <?php endif; ?>

  <div class="page-header">
    <div>
      <div class="page-title">Data <span>Matakuliah</span></div>
      <div class="page-subtitle">Kelola seluruh data matakuliah — Prepared Statement OOP</div>
    </div>
    <a href="inputmatakuliah.php" class="btn btn-sm" style="background:rgba(124,92,191,.25);color:#b39ddd;border:1px solid rgba(124,92,191,.4);font-size:.85rem;padding:.55rem 1.1rem;border-radius:8px;font-weight:700;text-decoration:none;display:inline-flex;align-items:center;gap:.4rem">+ Tambah Matakuliah</a>
  </div>

  <div class="card">
    <div class="card-header">
      <div class="card-icon" style="background:rgba(124,92,191,.15);color:#b39ddd">🔍</div>
      <h3>Pencarian Data Matakuliah</h3>
      <form method="GET" style="margin-left:auto">
        <div class="search-wrap">
          <input type="text" name="cari" class="search-input"
                 placeholder="Cari nama matakuliah..."
                 value="<?= htmlspecialchars($keyword) ?>">
          <button type="submit" class="btn btn-sm" style="background:rgba(124,92,191,.25);color:#b39ddd;border:1px solid rgba(124,92,191,.4)">Cari</button>
          <?php if ($keyword): ?>
            <a href="viewmatakuliah.php" class="btn btn-ghost btn-sm">Reset</a>
          <?php endif; ?>
        </div>
      </form>
    </div>

    <div class="table-wrap">
      <table>
        <thead>
          <tr>
            <th>Kode MK</th>
            <th>Nama Matakuliah</th>
            <th style="text-align:center">SKS</th>
            <th style="text-align:center">Jam</th>
            <th style="text-align:center">Aksi</th>
          </tr>
        </thead>
        <tbody>
        <?php if ($total === 0): ?>
          <tr><td colspan="5">
            <div class="empty">
              <div class="empty-icon">📚</div>
              <?= $keyword
                ? "Tidak ada matakuliah dengan kata kunci \"<b>" . htmlspecialchars($keyword) . "</b>\"."
                : "Belum ada data matakuliah." ?>
            </div>
          </td></tr>
        <?php else: ?>
          <?php foreach ($rows as $data): ?>
          <tr>
            <td><span class="id-badge"><?= $data['kodeMK'] ?></span></td>
            <td><b><?= htmlspecialchars($data['namaMK']) ?></b></td>
            <td style="text-align:center">
              <span class="chip"><?= $data['sks'] ?> SKS</span>
            </td>
            <td style="text-align:center;font-family:'JetBrains Mono',monospace;font-size:.85rem">
              <?= $data['jam'] ?> jam
            </td>
            <td style="text-align:center">
              <div style="display:flex;gap:.4rem;justify-content:center">
                <a href="editmatakuliah.php?kodeMK=<?= $data['kodeMK'] ?>"
                   class="btn btn-warning btn-sm">✏️ Edit</a>
                <a href="hapusmatakuliah.php?kodeMK=<?= $data['kodeMK'] ?>"
                   class="btn btn-danger btn-sm"
                   onclick="return confirm('Yakin ingin menghapus matakuliah ini?')">🗑️ Hapus</a>
              </div>
            </td>
          </tr>
          <?php endforeach; ?>
        <?php endif; ?>
        </tbody>
      </table>
    </div>

    <div style="padding:.75rem 1rem; border-top:1px solid var(--border); color:var(--muted); font-size:.8rem;">
      Menampilkan <b style="color:var(--text)"><?= $total ?></b> data matakuliah
    </div>
  </div>

</div>
</body>
</html>

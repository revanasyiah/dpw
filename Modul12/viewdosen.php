<?php
// ================================================
// FILE: viewdosen.php
// Menampilkan data t_dosen dengan Prepared Statement
// Modul Praktikum 12 – PHP Database OOP
// ================================================

require_once 'koneksi.php';

// ── Prepared SELECT dengan filter opsional ───────
$keyword = isset($_GET['cari']) ? trim($_GET['cari']) : '';

if ($keyword !== '') {
    $like = "%$keyword%";
    $rows = $db->select(
        "SELECT * FROM t_dosen WHERE namaDosen LIKE ? ORDER BY idDosen ASC",
        "s",
        [$like]
    );
} else {
    $rows = $db->select("SELECT * FROM t_dosen ORDER BY idDosen ASC");
}

$total = count($rows);
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Data Dosen – Akademik OOP</title>
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

<div class="page">

  <div class="breadcrumb">
    <a href="index.php">Dashboard</a><span class="sep">/</span>
    <span>Dosen</span>
  </div>

  <?php if (isset($_GET['msg'])): ?>
    <?php if ($_GET['msg'] === 'add'): ?>
      <div class="alert alert-success">✅ Data dosen berhasil ditambahkan.</div>
    <?php elseif ($_GET['msg'] === 'edit'): ?>
      <div class="alert alert-success">✏️ Data dosen berhasil diperbarui.</div>
    <?php elseif ($_GET['msg'] === 'del'): ?>
      <div class="alert alert-danger">🗑️ Data dosen berhasil dihapus.</div>
    <?php endif; ?>
  <?php endif; ?>

  <div class="page-header">
    <div>
      <div class="page-title">Data <span>Dosen</span></div>
      <div class="page-subtitle">Kelola seluruh data dosen — menggunakan Prepared Statement OOP</div>
    </div>
    <a href="inputdosen.php" class="btn btn-primary">+ Tambah Dosen</a>
  </div>

  <div class="card">
    <div class="card-header">
      <div class="card-icon">🔍</div>
      <h3>Pencarian Data Dosen</h3>
      <form method="GET" style="margin-left:auto">
        <div class="search-wrap">
          <input type="text" name="cari" class="search-input"
                 placeholder="Cari nama dosen..."
                 value="<?= htmlspecialchars($keyword) ?>">
          <button type="submit" class="btn btn-primary btn-sm">Cari</button>
          <?php if ($keyword): ?>
            <a href="viewdosen.php" class="btn btn-ghost btn-sm">Reset</a>
          <?php endif; ?>
        </div>
      </form>
    </div>

    <div class="table-wrap">
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Nama Dosen</th>
            <th>No HP</th>
            <th style="text-align:center">Aksi</th>
          </tr>
        </thead>
        <tbody>
        <?php if ($total === 0): ?>
          <tr><td colspan="4">
            <div class="empty">
              <div class="empty-icon">🔍</div>
              <?= $keyword
                ? "Tidak ada dosen dengan nama \"<b>" . htmlspecialchars($keyword) . "</b>\"."
                : "Belum ada data dosen." ?>
            </div>
          </td></tr>
        <?php else: ?>
          <?php foreach ($rows as $data): ?>
          <tr>
            <td><span class="id-badge"><?= $data['idDosen'] ?></span></td>
            <td><b><?= htmlspecialchars($data['namaDosen']) ?></b></td>
            <td style="font-family:'JetBrains Mono',monospace;font-size:.85rem">
              <?= htmlspecialchars($data['noHP']) ?>
            </td>
            <td style="text-align:center">
              <div style="display:flex;gap:.4rem;justify-content:center">
                <a href="editdosen.php?idDosen=<?= $data['idDosen'] ?>"
                   class="btn btn-warning btn-sm">✏️ Edit</a>
                <a href="hapusdosen.php?idDosen=<?= $data['idDosen'] ?>"
                   class="btn btn-danger btn-sm"
                   onclick="return confirm('Yakin ingin menghapus dosen ini?')">🗑️ Hapus</a>
              </div>
            </td>
          </tr>
          <?php endforeach; ?>
        <?php endif; ?>
        </tbody>
      </table>
    </div>

    <div style="padding:.75rem 1rem; border-top:1px solid var(--border); color:var(--muted); font-size:.8rem;">
      Menampilkan <b style="color:var(--text)"><?= $total ?></b> data dosen
      <?= $keyword ? "untuk pencarian \"<b style='color:var(--accent)'>" . htmlspecialchars($keyword) . "</b>\"" : "" ?>
    </div>
  </div>

</div>
</body>
</html>

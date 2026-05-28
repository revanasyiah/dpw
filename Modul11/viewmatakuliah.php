<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Tabel Matakuliah</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<nav class="navbar">
  <a href="index.php" class="brand">🎓 <span>Akademik</span>App</a>
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
      <div class="alert alert-success">✅ Matakuliah berhasil ditambahkan.</div>
    <?php elseif ($_GET['msg'] === 'edit'): ?>
      <div class="alert alert-success">✏️ Matakuliah berhasil diperbarui.</div>
    <?php elseif ($_GET['msg'] === 'del'): ?>
      <div class="alert alert-danger">🗑️ Matakuliah berhasil dihapus.</div>
    <?php endif; ?>
  <?php endif; ?>

  <div class="page-header">
    <div>
      <div class="page-title">Data <span>Matakuliah</span></div>
      <div class="page-subtitle">Kelola seluruh data matakuliah yang tersedia</div>
    </div>
    <a href="inputmatakuliah.php" class="btn btn-sm"
       style="background:rgba(124,92,191,.8);color:#fff;font-weight:700;padding:.55rem 1.1rem;border-radius:8px">
      + Tambah Matakuliah
    </a>
  </div>

  <?php
    $keyword = isset($_GET['cari']) ? mysqli_real_escape_string($link, trim($_GET['cari'])) : '';
    if ($keyword !== '') {
        $query = "SELECT * FROM t_matakuliah WHERE namaMK LIKE '%$keyword%' ORDER BY kodeMK ASC";
    } else {
        $query = "SELECT * FROM t_matakuliah ORDER BY kodeMK ASC";
    }
    $result = mysqli_query($link, $query);
    if (!$result) die("Query Error: " . mysqli_errno($link) . " – " . mysqli_error($link));
    $total = mysqli_num_rows($result);
  ?>

  <div class="card">
    <div class="card-header">
      <div class="card-icon" style="background:rgba(124,92,191,.15);color:#b39ddd">🔍</div>
      <h3>Pencarian Data Matakuliah</h3>
      <form method="GET" style="margin-left:auto">
        <div class="search-wrap">
          <input type="text" name="cari" class="search-input"
                 placeholder="Cari nama matakuliah..."
                 value="<?= htmlspecialchars($keyword) ?>">
          <button type="submit" class="btn btn-sm"
                  style="background:rgba(124,92,191,.8);color:#fff">Cari</button>
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
            <th style="text-align:center">Jam / Minggu</th>
            <th style="text-align:center">Aksi</th>
          </tr>
        </thead>
        <tbody>
        <?php if ($total === 0): ?>
          <tr><td colspan="5">
            <div class="empty">
              <div class="empty-icon">📚</div>
              <?= $keyword ? "Tidak ada matakuliah dengan nama \"<b>$keyword</b>\"." : "Belum ada data matakuliah." ?>
            </div>
          </td></tr>
        <?php else: ?>
          <?php while ($data = mysqli_fetch_assoc($result)): ?>
          <tr>
            <td><span class="id-badge"><?= $data['kodeMK'] ?></span></td>
            <td><b><?= htmlspecialchars($data['namaMK']) ?></b></td>
            <td style="text-align:center">
              <span style="background:rgba(79,142,247,.12);color:var(--accent);
                           padding:.2rem .6rem;border-radius:5px;font-weight:700">
                <?= $data['sks'] ?> SKS
              </span>
            </td>
            <td style="text-align:center;color:var(--muted);font-family:'JetBrains Mono',monospace">
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
          <?php endwhile; ?>
        <?php endif; ?>
        </tbody>
      </table>
    </div>

    <div style="padding:.75rem 1rem; border-top:1px solid var(--border); color:var(--muted); font-size:.8rem;">
      Menampilkan <b style="color:var(--text)"><?= $total ?></b> data matakuliah
      <?= $keyword ? "untuk pencarian \"<b style='color:#b39ddd'>$keyword</b>\"" : "" ?>
    </div>
  </div>

</div>
</body>
</html>

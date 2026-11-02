<?php
include "../config.php";
cek_login();
$result = mysqli_query($conn, "SELECT * FROM products ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Dashboard Admin - My Store</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-dark bg-dark px-3">
  <span class="navbar-brand">🛒 Dashboard Admin My Store</span>
  <span class="text-white">Halo, <?= $_SESSION['admin'] ?> |
    <a href="../logout.php" class="btn btn-sm btn-danger">Logout</a></span>
</nav>
<div class="container my-4">
  <div class="d-flex justify-content-between mb-3">
    <h4>Data Produk</h4>
    <a href="create.php" class="btn btn-success">+ Tambah Produk</a>
  </div>
  <table class="table table-bordered table-striped">
    <thead class="table-dark">
      <tr><th>No</th><th>Nama</th><th>Kategori</th><th>Harga</th><th>Stok</th><th>Aksi</th></tr>
    </thead>
    <tbody>
    <?php $no=1; while ($r = mysqli_fetch_assoc($result)) { ?>
      <tr>
        <td><?= $no++ ?></td>
        <td><?= htmlspecialchars($r['nama']) ?></td>
        <td><?= htmlspecialchars($r['kategori']) ?></td>
        <td>Rp <?= number_format($r['harga'],0,',','.') ?></td>
        <td><?= $r['stok'] ?></td>
        <td>
          <a href="update.php?id=<?= $r['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
          <a href="delete.php?id=<?= $r['id'] ?>" class="btn btn-sm btn-danger"
             onclick="return confirm('Hapus produk ini (discontinued)?')">Hapus</a>
        </td>
      </tr>
    <?php } ?>
    </tbody>
  </table>
</div>
</body>
</html>
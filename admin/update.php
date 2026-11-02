<?php
include "../config.php";
cek_login();
$id = (int)$_GET['id'];

if (isset($_POST['update'])) {
    $stmt = mysqli_prepare($conn, "UPDATE products SET nama=?, kategori=?, harga=?, stok=? WHERE id=?");
    mysqli_stmt_bind_param($stmt, "ssiii", $_POST['nama'], $_POST['kategori'], $_POST['harga'], $_POST['stok'], $id);
    mysqli_stmt_execute($stmt);
    header("Location: index.php");
    exit;
}
$p = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM products WHERE id=$id"));
if (!$p) { header("Location: index.php"); exit; }
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Produk</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container my-4" style="max-width:600px">
  <div class="card shadow"><div class="card-body">
    <h4>Edit Produk</h4>
    <form method="post">
      <div class="mb-3"><label>Nama Produk</label>
        <input type="text" name="nama" class="form-control" value="<?= htmlspecialchars($p['nama']) ?>" required></div>
      <div class="mb-3"><label>Kategori</label>
        <input type="text" name="kategori" class="form-control" value="<?= htmlspecialchars($p['kategori']) ?>" required></div>
      <div class="mb-3"><label>Harga</label>
        <input type="number" name="harga" class="form-control" value="<?= $p['harga'] ?>" required></div>
      <div class="mb-3"><label>Stok</label>
        <input type="number" name="stok" class="form-control" value="<?= $p['stok'] ?>" required></div>
      <button name="update" class="btn btn-warning">Update</button>
      <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>
  </div></div>
</div>
</body>
</html>
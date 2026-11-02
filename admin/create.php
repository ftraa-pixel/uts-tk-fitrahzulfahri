<?php
include "../config.php";
cek_login();
if (isset($_POST['simpan'])) {
    $stmt = mysqli_prepare($conn, "INSERT INTO products (nama,kategori,harga,stok) VALUES (?,?,?,?)");
    mysqli_stmt_bind_param($stmt, "ssii", $_POST['nama'], $_POST['kategori'], $_POST['harga'], $_POST['stok']);
    mysqli_stmt_execute($stmt);
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Produk</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container my-4" style="max-width:600px">
  <div class="card shadow"><div class="card-body">
    <h4>Tambah Produk Baru</h4>
    <form method="post">
      <div class="mb-3"><label>Nama Produk</label><input type="text" name="nama" class="form-control" required></div>
      <div class="mb-3"><label>Kategori</label><input type="text" name="kategori" class="form-control" required></div>
      <div class="mb-3"><label>Harga</label><input type="number" name="harga" class="form-control" required></div>
      <div class="mb-3"><label>Stok</label><input type="number" name="stok" class="form-control" required></div>
      <button name="simpan" class="btn btn-success">Simpan</button>
      <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>
  </div></div>
</div>
</body>
</html>
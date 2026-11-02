<?php
include "config.php";
$error = "";
if (isset($_POST['login'])) {
    $u = $_POST['username'];
    $p = md5($_POST['password']);
    $stmt = mysqli_prepare($conn, "SELECT id FROM users WHERE username=? AND password=?");
    mysqli_stmt_bind_param($stmt, "ss", $u, $p);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    if (mysqli_stmt_num_rows($stmt) == 1) {
        $_SESSION['admin'] = $u;
        header("Location: admin/index.php");
        exit;
    }
    $error = "Username atau password salah!";
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login Admin - My Store</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center" style="height:100vh">
  <div class="container" style="max-width:400px">
    <div class="card shadow">
      <div class="card-body p-4">
        <h4 class="text-center mb-3">🛒 My Store - Login Admin</h4>
        <?php if ($error) echo "<div class='alert alert-danger'>$error</div>"; ?>
        <form method="post">
          <div class="mb-3"><label>Username</label>
            <input type="text" name="username" class="form-control" required></div>
          <div class="mb-3"><label>Password</label>
            <input type="password" name="password" class="form-control" required></div>
          <button name="login" class="btn btn-primary w-100">Login</button>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
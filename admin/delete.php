<?php
include "../config.php";
cek_login();
$id = (int)$_GET['id'];
mysqli_query($conn, "DELETE FROM products WHERE id=$id");
header("Location: index.php");
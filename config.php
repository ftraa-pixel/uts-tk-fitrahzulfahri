<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "my_store");
if (!$conn) { die("Koneksi gagal: " . mysqli_connect_error()); }

function cek_login() {
    if (!isset($_SESSION['admin'])) {
        header("Location: ../login.php");
        exit;
    }
}
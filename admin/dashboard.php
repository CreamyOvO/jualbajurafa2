<?php 
session_start();
if ($_SESSION['role'] != 'admin') {
    header("Location: ../index.php");
    exit();
}
?>

<h1>Dashboard Admin</h1>
<a href="../logout.php">Logout</a>
<a href="tambah_product.php">+ Tambah Produk</a>
<a href="lihat_product.php">Lihat Produk</a>
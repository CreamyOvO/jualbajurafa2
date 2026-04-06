<?php 
session_start();
include "../includes/koneksi.php";

if ($_SESSION['role'] != 'admin') {
    header("Location: ../login.php");
    exit();
} 

$query = "SELECT * FROM products";
$hasil = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Produk</title>
    <link rel="stylesheet" href="../css/baju1.css">
</head>
<body>

<h2>Daftar Produk</h2>
<a href="tambah_product.php">+ Tambah Produk</a><br><br>

<div class="container">
<?php while($row = mysqli_fetch_assoc($hasil)): ?>
    <div class="card">
        <img src="../uploads/<?= $row['gambar']; ?>" width="100%">
        <h3><?= $row['nama_produk']; ?></h3>
        <p class="price">Rp <?= number_format($row['harga']); ?></p>
        <p>Stok: <?= $row['stok']; ?></p>
        <p><?= $row['deskripsi']; ?></p>

        <a href="edit_product.php?id=<?= $row['id']; ?>">Edit</a> |
        <a href="delete_product.php?id=<?= $row['id']; ?>">Delete</a>
    </div>
<?php endwhile; ?>
</div>

</body>
</html>
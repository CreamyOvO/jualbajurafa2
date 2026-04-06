<?php 
session_start();
include "../includes/koneksi.php";
if ($_SESSION['role'] != 'user') {
    header("Location: ../index.php");
    exit();
}

$query = "SELECT * FROM products";
$hasil = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Shop</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<h2>Welcome, <?= $_SESSION['username']; ?> 👋</h2>
<a href="../logout.php">Logout</a><br><br>

<div class="container">
<?php while($row = mysqli_fetch_assoc($hasil)): ?>
    <div class="card">
        <img src="../uploads/<?= $row['gambar']; ?>" alt="">
        <h3><?= $row['nama_produk']; ?></h3>
        <p class="price">Rp <?= number_format($row['harga']); ?></p>
        <p><?= $row['deskripsi']; ?></p>

        <a href="cart.php?add=<?= $row['id']; ?>">+ Keranjang</a>
    </div>
<?php endwhile; ?>
</div>

</body>
</html>
<?php 
session_start();
include "../includes/koneksi.php";

$id = $_GET['id'];
$user_id = $_SESSION['username']; 

$data = mysqli_query($conn, "SELECT * FROM products WHERE id=$id");
$row = mysqli_fetch_assoc($data);

$total = $row['harga'];

mysqli_query($conn, "INSERT INTO orders (user_id, total_harga) VALUES ('$user_id', '$total;");

echo "Berhasil dibeli!";
echo "<br><a href="dashboard.php">Kembali</a>";
?>
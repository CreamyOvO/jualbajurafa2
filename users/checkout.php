<?php 
session_start();
include "../includes/koneksi.php";

if (empty($_SESSION['cart'])) {
    echo "Keranjang kosong, buruan isi gih!";
    exit();
}

$total = 0;

foreach ($_SESSION['cart'] as $id => $qty) {
    $data = mysqli_query($conn, "SELECT * FROM products WHERE id=$id");
    $row = mysqli_fetch_assoc($data);

    $total += $row['harga'] * $qty;
}

$user_id = $_SESSION['id'];

mysqli_query($conn, "INSERT INTO orders (user_id, total_harga) VALUES ('$user_id', '$total')");

unset($_SESSION['cart']);

echo "Checkout Berhasil!";
echo "<br><a href='dashboard.php'>Kembali</a>";
?>
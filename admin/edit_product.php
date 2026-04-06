<?php 
include "../includes/koneksi.php";

$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM products WHERE id=$id");
$row = mysqli_fetch_assoc($data);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $deskripsi = $_POST['deskripsi'];

    mysqli_query($conn, "UPDATE products SET nama_produk='$nama', harga='$harga', stok='$stok', deskripsi='$deskripsi' WHERE id=$id");

    header("Location: lihat_product.php");
}
?>

<h2>Edit Produk</h2>

<form method="POST">
    <input type="text" name="nama_produk" value="<?= $row['nama_produk']; ?>"><br><br>
    <input type="number" name="harga" value="<?= $row['harga']; ?>"><br><br>
    <input type="number" name="stok" value="<?= $row['stok']; ?>"><br><br>
    <textarea name="deskripsi"><?= $row['deskripsi']; ?></textarea><br><br>
    <button type="submit">Update</button>
</form>
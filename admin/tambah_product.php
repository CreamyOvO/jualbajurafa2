<?php 
session_start();
include "../includes/koneksi.php";

if ($_SESSION['role'] != 'admin') {
    header("Location: ../login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $deskripsi = $_POST ['deskripsi'];
    $gambar = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];

    move_uploaded_file($tmp, "../uploads/".$gambar);

    $query = "INSERT INTO products (nama_produk, harga, stok, deskripsi, gambar) VALUES ('$nama', '$harga', '$stok', '$deskripsi', '$gambar')";

    if (mysqli_query($conn, $query)) {
        echo "Produk berhasil ditambahkan!";
    } else {
        echo "Error: ".mysqli_error($conn);
    }
}
?>

<h2>Tambah Produk</h2>

<form method="POST" enctype="multipart/form-data">
    <input type="text" name="nama_produk" placeholder="Nama Produk" required><br><br>
    <input type="file" name="gambar"><br><br>
    <input type="number" name="harga" placeholder="Harga" required><br><br>
    <input type="number" name="stok" placeholder="Stok" required><br><br>
    <textarea name="deskripsi" placeholder="Deskripsi"></textarea><br><br>
    <button type="submit">Tambah</button>
</form>

<a href="dashboard.php">Kembali</a>
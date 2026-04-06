<?php 
session_start();
include "../includes/koneksi.php";

if (isset($_GET['add'])) {
    $id = $_GET['add'];

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]++;
    } else {
        $_SESSION['cart'][$id] = 1;
    }
}

if (isset($_GET['remove'])) {
    $id = $_GET['remove'];
    unset($_SESSION['cart'][$id]);
}
?>

<h2>Keranjang</h2>
<a href="dashboard.php">← Kembali</a><br><br>

<?php if (!empty($_SESSION['cart'])): ?>
<table border="1" cellpadding="10">
    <tr>
        <th>Produk</th>
        <th>Harga</th>
        <th>Jumlah</th>
        <th>Subtotal</th>
        <th>Aksi</th>
    </tr>

<?php
$total = 0;

foreach ($_SESSION['cart'] as $id => $qty):
    $data = mysqli_query($conn, "SELECT * FROM products WHERE id=$id");
    $row = mysqli_fetch_assoc($data);

    $subtotal = $row['harga'] * $qty;
    $total += $subtotal;
?>

<tr>
    <td><?= $row['nama_produk']; ?></td>
    <td><?= $row['harga']; ?></td>
    <td><?= $qty; ?></td>
    <td><?= $subtotal; ?></td>
    <td><a href="?remove=<?= $id; ?>">Hapus</a></td>
</tr>

<?php endforeach; ?>

</table>

<h3>Total: Rp <?= number_format($total); ?></h3>

<a href="checkout.php">Checkout</a>

<?php else: ?>
<p>Keranjang kosong.</p>
<?php endif; ?>
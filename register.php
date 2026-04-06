<?php 
session_start();
include "includes/koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $password_berhash = md5($password);

    $cek = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");

    if (mysqli_num_rows($cek) > 0) {
        echo "Username atau Password telah terpakai";
    } else {
        mysqli_query($conn, "INSERT INTO users (username, password, role) VALUES ('$username', '$password_berhash', 'user')");

        echo "Registrasi telah berhasil!";
        echo "<br><a href='login.php'>Ayo Masuk</a>";
    }
}
?>
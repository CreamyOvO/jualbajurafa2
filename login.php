<?php
session_start();
include "includes/koneksi.php";


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    if ($user && md5($password) == $user['password']) {
        $_SESSION['login'] = true;
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];
        $_SESSION['id'] = $user['id'];

        if ($user['role'] == 'admin') {
            header("Location: admin/dashboard.html");
        } else {
            header("Location: users/dashboard.html");
        }
        exit();
    } else {
        echo "Login gagal!";
    }
}
?>
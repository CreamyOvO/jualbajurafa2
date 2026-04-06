<?php 
$host = "localhost";
$user = "root";
$db_password = "";
$db = "db_jualbaju";

$conn = mysqli_connect($host, $user, $db_password, $db);

if (!$conn) {
    die("Koneksi gagal: ".mysqli_connect_error());
}

?>
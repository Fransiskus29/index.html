<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "valdo_barbershop";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi gagal");
}
?>
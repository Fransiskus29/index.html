<?php
session_start();
include 'koneksi.php';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $query = mysqli_query($conn, "SELECT * FROM users WHERE username='$username' AND password='$password'");
    if (mysqli_num_rows($query) > 0) {
        $_SESSION['login'] = true;
        $_SESSION['username'] = $username;
        header("Location: dashboard.php");
    } else {
        echo "<script>alert('Username atau Password salah!'); window.location='index.php';</script>";
    }
}
?>
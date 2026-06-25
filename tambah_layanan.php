<?php
session_start();
if (!isset($_SESSION['login'])) { header("Location: index.php"); exit; }
include 'koneksi.php';

if (isset($_POST['submit'])) {
    $nama = $_POST['nama_layanan'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];
    mysqli_query($conn, "INSERT INTO layanan (nama_layanan, harga, deskripsi) VALUES ('$nama', '$harga', '$deskripsi')");
    header("Location: layanan.php");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Layanan</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="form-container">
        <h2>Tambah Data Layanan</h2>
        <form method="POST">
            <input type="text" name="nama_layanan" placeholder="Nama Layanan (Contoh: Haircut Regular)" required>
            <input type="number" name="harga" placeholder="Harga (Contoh: 50000)" required>
            <textarea name="deskripsi" placeholder="Deskripsi Layanan" rows="4"></textarea>
            <button type="submit" name="submit">Simpan</button>
            <a href="layanan.php">Batal</a>
        </form>
    </div>
</body>
</html>
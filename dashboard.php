<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: index.php");
    exit;
}
include 'koneksi.php';

$query = mysqli_query($conn, "SELECT COUNT(*) as total FROM layanan");
$data = mysqli_fetch_assoc($query);
$total_layanan = $data['total'];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Valdo Barbershop</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <nav>
        <div>
            <strong>Valdo Barbershop</strong>
        </div>
        <div>
            <a href="dashboard.php">Dashboard</a>
            <a href="layanan.php">Data Layanan</a>
            <a href="logout.php">Logout</a>
        </div>
    </nav>
    <div class="container">
        <h2>Selamat Datang, <?php echo $_SESSION['username']; ?></h2>
        <p>Aplikasi web ini digunakan untuk mengelola data operasional Valdo Barbershop.</p>
        <div class="card">
            <h3>Total Layanan Tersedia</h3>
            <h1><?php echo $total_layanan; ?></h1>
        </div>
    </div>
</body>
</html>
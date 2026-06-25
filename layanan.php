<?php
session_start();
if (!isset($_SESSION['login'])) { header("Location: index.php"); exit; }
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Layanan</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="container">
        <h2>Manajemen Layanan Barbershop</h2>
        <a href="dashboard.php" class="btn btn-back">Kembali</a>
        <a href="tambah_layanan.php" class="btn btn-add">+ Tambah Layanan</a>
        <div class="table-wrapper">
            <table>
                <tr>
                    <th>No</th>
                    <th>Nama Layanan</th>
                    <th>Harga (Rp)</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
            <?php
            $query = mysqli_query($conn, "SELECT * FROM layanan ORDER BY id DESC");
            $no = 1;
            while ($row = mysqli_fetch_assoc($query)) {
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $row['nama_layanan']; ?></td>
                <td><?php echo number_format($row['harga'], 0, ',', '.'); ?></td>
                <td><?php echo $row['deskripsi']; ?></td>
                <td>
                    <a href="edit_layanan.php?id=<?php echo $row['id']; ?>" class="btn btn-edit">Edit</a>
                    <a href="hapus_layanan.php?id=<?php echo $row['id']; ?>" class="btn btn-delete" onclick="return confirm('Hapus data ini?')">Hapus</a>
                </td>
            </tr>
            <?php } ?>
            </table>
        </div>
    </div>
</body>
</html>
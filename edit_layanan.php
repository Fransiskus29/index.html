<?php
session_start();
if (!isset($_SESSION['login'])) { header("Location: index.php"); exit; }
include 'koneksi.php';

$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM layanan WHERE id='$id'");
$data = mysqli_fetch_assoc($query);

if (isset($_POST['submit'])) {
    $nama = $_POST['nama_layanan'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];
    mysqli_query($conn, "UPDATE layanan SET nama_layanan='$nama', harga='$harga', deskripsi='$deskripsi' WHERE id='$id'");
    header("Location: layanan.php");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Layanan</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="form-container">
        <h2>Edit Data Layanan</h2>
        <form method="POST">
            <input type="text" name="nama_layanan" value="<?php echo $data['nama_layanan']; ?>" required>
            <input type="number" name="harga" value="<?php echo $data['harga']; ?>" required>
            <textarea name="deskripsi" rows="4"><?php echo $data['deskripsi']; ?></textarea>
            <button type="submit" name="submit">Update</button>
            <a href="layanan.php">Batal</a>
        </form>
    </div>
</body>
</html>
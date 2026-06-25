<?php
session_start();
if (!isset($_SESSION['login'])) { header("Location: index.php"); exit; }
include 'koneksi.php';

$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM layanan WHERE id='$id'");
header("Location: layanan.php");
?>
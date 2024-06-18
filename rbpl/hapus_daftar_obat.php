<?php
session_start();
include 'koneksi.php';

$kode_obat = $_GET['kode_obat'];
$query = mysqli_query($konek, "delete from obat where kode_obat='$kode_obat' ");

if ($query && $_SESSION['job'] == "admin") {
    header("location:daftar_obat_apoteker.php");
} else if ($query && $_SESSION['job'] == "apoteker") {
    header("location:daftar_obat_apoteker1.php");
} else {
    echo "Gagal";
}

?>
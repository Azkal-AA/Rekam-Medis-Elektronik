<?php
session_start();
include 'koneksi.php';

$no_rm = $_GET['no_rm'];
$query = mysqli_query($konek, "delete from pendataan where no_rm='$no_rm' ");

if ($query && $_SESSION['job'] == "admin") {
    header("location:daftar_pasien_admin.php");
} else if ($query && $_SESSION['job'] == "resepsionis") {
    header("location:daftar_pasien.php");
} else {
    echo "data gagal dihapus";
}

?>
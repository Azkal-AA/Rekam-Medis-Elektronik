<?php
session_start();
include 'koneksi.php';


$delete_query = mysqli_query($konek, "DELETE FROM antrian");

if ($delete_query) {

    $alter_query = mysqli_query($konek, "ALTER TABLE antrian AUTO_INCREMENT = 1");

    if ($alter_query && $_SESSION['job'] == "admin") {

        header("Location: daftar_antrian_admin.php");
    } else if ($alter_query && $_SESSION['job'] == "resepsionis") {
        header("location:daftar_antrian_resepsionis.php");
    } else {

        echo "Gagal reset AUTO_INCREMENT.";
    }
} else {

    echo "Gagal menghapus data.";
}
?>

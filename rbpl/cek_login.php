<?php
session_start();
include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

$data = mysqli_query($konek, "select * from user where username='$username' and password='$password'") or die(mysqli_error($query));

$cek = mysqli_num_rows($data);
if ($cek > 0) {

    $info = mysqli_fetch_assoc($data);

    if ($info['job'] == "admin") {
        $_SESSION['username'] = $username;
        $_SESSION['job'] = "admin";
        $_SESSION['status'] = "login";
        $_SESSION['nama'] = $info['nama'];
        header("location:pendataan_admin.php");
    } else if ($info['job'] == "resepsionis") {
        $_SESSION['username'] = $username;
        $_SESSION['job'] = "resepsionis";
        $_SESSION['status'] = "login";
        $_SESSION['nama'] = $info['nama'];
        header("location:pendataan.php");
    } else if ($info['job'] == "dokter1") {
        $_SESSION['username'] = $username;
        $_SESSION['job'] = "dokter";
        $_SESSION['status'] = "login";
        $_SESSION['nama'] = $info['nama'];
        header("location:daftar_antrian_dokter.php");
    } else if ($info['job'] == "apoteker") {
        $_SESSION['username'] = $username;
        $_SESSION['job'] = "apoteker";
        $_SESSION['status'] = "login";
        $_SESSION['nama'] = $info['nama'];
        header("location:daftar_obat_apoteker1.php");
    }

} else {
    header("location:login.php?pesan=gagal");
}
?>
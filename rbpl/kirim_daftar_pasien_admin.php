<?php
session_start();
include 'koneksi.php';

$no_rm = $_GET['no_rm'];


$no_rm = mysqli_real_escape_string($konek, $no_rm);


$data = mysqli_query($konek, "SELECT * FROM pendataan WHERE no_rm='$no_rm'");


if ($data) {

    $row = mysqli_fetch_assoc($data);

    if ($row) {
        $no_rm = $row['no_rm'];
        $nama = $row['nama'];
        $nik = $row['nik'];
        $tempat_lahir = $row['tempat_lahir'];
        $tanggal_lahir = $row['tanggal_lahir'];
        $jenis_kelamin = $row['jenis_kelamin'];
        $pekerjaan = $row['pekerjaan'];
        $nomor_hp = $row['nomor_hp'];
        $alamat = $row['alamat'];


        $query = mysqli_query($konek, "INSERT INTO antrian (no_rm, nama, nik, tempat_lahir, tanggal_lahir, jenis_kelamin, pekerjaan, nomor_hp, alamat) VALUES ('$no_rm','$nama', '$nik', '$tempat_lahir', '$tanggal_lahir', '$jenis_kelamin', '$pekerjaan', '$nomor_hp', '$alamat')");


        if ($query && $_SESSION['job'] == "admin") {
            header("location:daftar_antrian_admin.php");
        } else if ($query && $_SESSION['job'] == "resepsionis") {
            header("location:daftar_antrian_resepsionis.php");
        } else {
            echo "data gagal dikirim";
        }
    } else {
        echo "No data found with the given ID.";
    }
} else {
    echo "Query failed.";
}
?>
<?php
include 'koneksi.php';
if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $nik = $_POST['nik'];
    $ttl = $_POST['ttl'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $pekerjaan = $_POST['pekerjaan'];
    $nomor_hp = $_POST['nomor_hp'];
    $alamat = $_POST['alamat'];

    $query = mysqli_query($konek, "INSERT INTO pendataan VALUES ('', '$nama','$nik','$ttl','$jenis_kelamin','$pekerjaan','$nomor_hp','$alamat')");

    if ($query) {
        header("location: daftar_pasien_admin.php");
    } else {
        echo "Maaf, terjadi kesalahan saat mencoba menyimpan data ke database";
    }
}

?>
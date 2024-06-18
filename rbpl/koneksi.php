<?php
//deklarasi
$hostname = "localhost";
$username = "root";
$password = "";
$database = "rumah_sakit";

//membuat koneksi
$konek = mysqli_connect($hostname, $username, $password, $database);

//cek koneksi
if (!$konek) {
	die("koneksi gagal" . mysqli_connect_error());
} else {
	echo "";
}

?>
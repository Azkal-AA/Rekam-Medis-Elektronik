<?php
include 'koneksi.php';

$id = $_GET['id'];
$query = mysqli_query($konek, "delete from pendataan where id='$id' ");

if ($query) {
    header("location:output.php");

} else {
    echo "Gagal";
}

?>
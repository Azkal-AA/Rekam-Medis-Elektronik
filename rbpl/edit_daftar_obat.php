<?php
session_start();
if (empty($_SESSION['username'])) {
    header("location:index.php?pesan=belum_login");
}
include 'koneksi.php';
if (isset($_POST['update'])) {
    $kode_obat = $_POST['kode_obat'];
    $nama = $_POST['nama'];
    $bentuk = $_POST['bentuk'];
    $konsumen = $_POST['konsumen'];
    $kegunaan = $_POST['kegunaan'];
    $keterangan = $_POST['keterangan'];


    $query = mysqli_query($konek, "UPDATE obat SET kode_obat= '$kode_obat', nama= '$nama' , bentuk='$bentuk', konsumen='$konsumen', kegunaan='$kegunaan', keterangan='$keterangan'  where kode_obat='$kode_obat'");
    if ($query && $_SESSION['job'] == "admin") {
        header("location:daftar_obat_apoteker.php");
    } else if ($query && $_SESSION['job'] == "apoteker") {
        header("location:daftar_obat_apoteker1.php");
    } else {
        echo "data gagal diubah";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Edit Obat</title>
    <link rel="icon" type="image/x-icon" href="images/rsud.png">
    <link rel="stylesheet" href="style2.css" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>
    <nav class="navbar sticky-top navbar-expand-lg bg-success">
        <div class="container">
            <a class="navbar-brand p-3 text-light" href="halaman_admin.php">
                Rekam Medis Elektronik
            </a>
            <div class="d-flex me-2 gap-2 p-3">
                <p class="text-light">Halo <b><?php echo $_SESSION['nama']; ?></b> Anda telah login
                    sebagai
                    <b><?php echo $_SESSION['job']; ?></b>.
                </p>
                <a href="logout.php" type="button" class="btn btn-outline-light">Logout</a>
            </div>
        </div>
    </nav>

    <div class="content">
        <?php
        $kode_obat = $_GET['kode_obat'];
        $data = mysqli_query($konek, "select * from obat where kode_obat ='$kode_obat'");
        while ($result = mysqli_fetch_array($data)) {
            ?>
            <center>
                <div class="container bg-light rounded p-3 position-absolute top-50 start-50 translate-middle">
                    <form action="" method="POST">
                        Kode Obat : <input type="text" name="kode_obat" value="<?php echo $result['kode_obat']; ?>"
                            class="form-control mb-2">
                        Nama : <input type="text" name="nama" value="<?php echo $result['nama'] ?>"
                            class="form-control mb-2">
                        Bentuk : <input type="text" name="bentuk" value="<?php echo $result['bentuk'] ?>"
                            class="form-control mb-2">
                        Konsumen : <input type="text" name="konsumen" value="<?php echo $result['konsumen'] ?>"
                            class="form-control mb-2">
                        Kegunaan :
                        <input type="text" name="kegunaan" value="<?php echo $result['kegunaan'] ?>"
                            class="form-control mb-2">
                        Keternagan : <input type="text" name="keterangan" value="<?php echo $result['keterangan'] ?>"
                            class="form-control mb-2">


                        <input type="submit" name="update" value="UBAH" class="btn btn-success">

                    </form>
                </div>
            </center>
            <?php
        }

        ?>
    </div>
</body>

</html>
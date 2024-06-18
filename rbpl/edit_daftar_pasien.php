<?php
session_start();
if (empty($_SESSION['username'])) {
    header("location:index.php?pesan=belum_login");
}
include 'koneksi.php';
if (isset($_POST['update'])) {
    $no_rm = $_POST['no_rm'];
    $nama = $_POST['nama'];
    $nik = $_POST['nik'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $pekerjaan = $_POST['pekerjaan'];
    $nomor_hp = $_POST['nomor_hp'];
    $alamat = $_POST['alamat'];

    $query = mysqli_query($konek, "UPDATE pendataan SET nama= '$nama' , nik='$nik', tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', jenis_kelamin='$jenis_kelamin' , pekerjaan='$pekerjaan', nomor_hp='$nomor_hp', alamat='$alamat'where no_rm='$no_rm'");
    if ($query && $_SESSION['job'] == "admin") {
        header("location:daftar_pasien_admin.php");
    } else if ($query && $_SESSION['job'] == "resepsionis") {
        header("location:daftar_pasien.php");
    } else {
        echo "data gagal diubah";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Edit Daftar Pasien</title>
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
                Rumah Sakit - <?php echo $_SESSION['job']; ?>
            </a>
            <div class="d-flex me-2 gap-2 p-3">
                <p class="text-light">Halo <b><?php echo $_SESSION['username']; ?></b> Anda telah login
                    sebagai
                    <b><?php echo $_SESSION['job']; ?></b>.
                </p>
                <a href="logout.php" type="button" class="btn btn-outline-light">Logout</a>
            </div>
        </div>
    </nav>

    <div class="content">
        <?php
        $no_rm = $_GET['no_rm'];
        $data = mysqli_query($konek, "select * from pendataan where no_rm ='$no_rm'");
        while ($result = mysqli_fetch_array($data)) {
            ?>
            <center>
                <div class="container bg-light rounded p-3 position-absolute top-50 start-50 translate-middle">
                    <form action="" method="POST">
                        <input type="hidden" name="no_rm" value="<?php echo $result['no_rm']; ?>">
                        Nama : <input type="text" name="nama" value="<?php echo $result['nama'] ?>"
                            class="form-control mb-2">
                        NIK : <input type="text" name="nik" value="<?php echo $result['nik'] ?>" class="form-control mb-2">
                        Tempat Lahir : <input type="text" name="tempat_lahir" value="<?php echo $result['tempat_lahir'] ?>"
                            class="form-control mb-2">
                        Tanggal Lahir : <input type="date" name="tanggal_lahir"
                            value="<?php echo $result['tanggal_lahir'] ?>" class="form-control mb-2">
                        Jenis Kelamin :
                        <select id="jenis_kelamin" name="jenis_kelamin" required class="form-control mb-2">
                            <option value=""><?php echo $result['jenis_kelamin'] ?></option>
                            <option value="laki-laki">Laki-laki</option>
                            <option value="perempuan">Perempuan</option>
                        </select>
                        Pekerjaan : <input type="text" name="pekerjaan" value="<?php echo $result['pekerjaan'] ?>"
                            class="form-control mb-2">
                        Nomor HP : <input type="text" name="nomor_hp" value="<?php echo $result['nomor_hp'] ?>"
                            class="form-control mb-2">
                        Alamat : <input type="text" name="alamat" value="<?php echo $result['alamat'] ?>"
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
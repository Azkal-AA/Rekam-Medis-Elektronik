<?php
session_start();
if (empty($_SESSION['username'])) {
    header("location:index.php?pesan=belum_login");
}
?>
<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>Perawatan Pasien</title>
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
    <?php if ($_SESSION['job'] == "admin") { ?>
        <div class="sidebar">
            <button class="dropdown-btn">Resepsionis
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-container">
                <a href="pendataan_admin.php">Pendataan Pasien</a>
                <a href="daftar_pasien_admin.php">Daftar Pasien</a>
                <a href="daftar_antrian_admin.php">Daftar Antrian</a>
            </div>
            <button class="dropdown-btn">Dokter
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-container">
                <a href="daftar_antrian_dokter_admin.php">Daftar Antrian</a>
                <a href="riwayat_perawatan.php">Riwayat Perawatan</a>
                <a href="daftar_obat.php">Daftar Obat</a>
            </div>
            <button class="dropdown-btn">Apoteker
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-container">
                <a href="daftar_obat_apoteker.php">Daftar Obat</a>
            </div>
        </div>
    <?php } else if ($_SESSION['job'] == "dokter") { ?>
            <div class="sidebar">
                <button class="dropdown-btn">Dokter
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-container">
                    <a href="daftar_antrian_dokter.php">Daftar Antrian</a>
                    <a href="riwayat_perawatan_dokter.php">Riwayat Perawatan</a>
                    <a href="daftar_obat_dokter.php">Daftar Obat</a>
                </div>
            </div>
    <?php } ?>

    <div class="content">
        <div class="container bg-light  rounded p-3 shadow ">
            <h2>Formulir Perawatan dan Pengobatan Pasien</h2>


            <div class="form-container bg-body-secondary rounded p-3 border border-dark ">
                <?php
                $no_antrian = $_GET['no_rm'];
                $data = mysqli_query($konek, "select * from antrian where no_rm = '$no_antrian'");
                while ($d = mysqli_fetch_array($data)) {
                    ?>
                    <table>
                        <tr>
                            <td><b> Antrian </b> </td>
                            <td><b> : </b></td>
                            <td><?php echo $d['no_antrian']; ?></td>
                        </tr>
                        <tr>
                            <td><b> No Rekam Medis </b> </td>
                            <td><b> : </b></td>
                            <td><?php echo $d['no_rm']; ?></td>
                        </tr>
                        <tr>
                            <td> <b> Nama </b> </td>
                            <td><b> : </b></td>
                            <td><?php echo $d['nama']; ?></td>
                        </tr>
                        <tr>
                            <td> <b> Jenis Kelamin </b> </td>
                            <td><b> : </b></td>
                            <td><?php echo $d['jenis_kelamin']; ?></td>
                        </tr>
                        <tr>
                            <td> <b> Tanggal Lahir </b> </td>
                            <td><b> : </b></td>
                            <td><?php echo $d['tanggal_lahir']; ?></td>
                        </tr>

                    </table>
                <?php } ?>
            </div>
            <hr>
            <a href="periksa_pasien_admin.php" class="btn btn-outline-danger disabled">Pemeriksaan</a>
            <a href="" class="btn btn-primary">Perawatan dan Pengobatan</a>

        </div>
        <style>
            table,
            th,
            td {

                padding: 5px;
            }
        </style>
        <div class="container bg-light  rounded p-3 shadow mt-3">
            <form action="" method="POST">
                <div class="mt-1">
                    <center>
                        <table>
                            <tr>
                                <th>
                                    <h4>Perawatan</h4>
                                </th>
                                <th></th>
                                <th>
                                    <h4>Obat</h4>
                                </th>
                                <th></th>
                                <th>
                                    <h4>Keterangan</h4>
                                </th>
                            </tr>
                            <tr>
                                <?php
                                $no_rm = $_GET['no_rm'];
                                $data = mysqli_query($konek, "select * from perawatan where no_rm ='$no_rm'");
                                while ($result = mysqli_fetch_array($data)) { ?>
                                <tr></tr>
                                <td><textarea name="perawatan" id="perawatan" class="form-control-lg"
                                        disabled> <?php echo $result['perawatan']; ?></textarea></td>
                                <td></td>
                                <td><input type="text" class="form-control" value="<?php echo $result['obat']; ?>" disabled>
                                </td>

                                <td></td>
                                <td><textarea name="keterangan" id="keterangan" class="form-control-lg"
                                        disabled> <?php echo $result['keterangan']; ?></textarea></td>
                            <?php } ?>
                            </tr>
                        </table>
                    </center>
                </div>
                <hr>
                <div class="">
                    <a href="
                    <?php if ($_SESSION['job'] == "admin") {
                        echo "daftar_antrian_dokter_admin.php" ?><?php } else if ($_SESSION['job'] == "dokter") {
                        echo "daftar_antrian_dokter.php"
                            ?><?php } ?>" class="btn btn-success text-white">SELESAI</a>
                    <a href="lihat_periksa_pasien_admin.php?no_rm=<?php echo $_GET['no_rm']; ?>"
                        class="btn btn-warning text-white">KEMBALI</a>
                </div>
            </form>
        </div>
    </div>
    <script>
        var dropdown = document.getElementsByClassName("dropdown-btn");
        var i;

        for (i = 0; i < dropdown.length; i++) {
            dropdown[i].addEventListener("click", function () {
                this.classList.toggle("active");
                var dropdownContent = this.nextElementSibling;
                if (dropdownContent.style.display === "block") {
                    dropdownContent.style.display = "none";
                } else {
                    dropdownContent.style.display = "block";
                }
            });
        }
    </script>
</body>

</html>
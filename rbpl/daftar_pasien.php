<?php
session_start();
if (empty($_SESSION['username'])) {
    header("location:index.php?pesan=belum_login");
}
include 'koneksi.php';
?>
<!DOCTYPE html>
<html>

<head>
    <title>Daftar Pasien</title>
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
    <div class="sidebar">
        <button class="dropdown-btn">Resepsionis
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-container">
            <a href="pendataan.php">Pendataan Pasien</a>
            <a href="daftar_pasien.php">Daftar Pasien</a>
            <a href="daftar_antrian_resepsionis.php">Daftar Antrian</a>
        </div>
    </div>

    <div class="content">

        <div class="container p-3 ">
            <h2>Daftar Data Pasien</h2>
            <form class="form-inline" action="daftar_pasien.php" method="get">
                <input class="form-control " type="search" placeholder="Cari" name="cari">
                <button class="btn btn-outline-success mt-3" type="submit">Cari</button>
            </form>
            <?php
            if (isset($_GET['cari'])) {
                $cari = $_GET['cari'];
                echo "<b>Hasil pencarian : " . $cari . "</b>";
            }
            ?>

            <table class="table">

                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">No RM</th>
                        <th scope="col">Nama</th>
                        <th scope="col">NIK</th>
                        <th scope="col">Tempat Lahir</th>
                        <th scope="col">Tanggal Lahir</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Pekerjaan</th>
                        <th scope="col">Nomor HP</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <?php
                if (isset($_GET['cari'])) {
                    $cari = $_GET['cari'];
                    $data = mysqli_query($konek, "select * from pendataan where nama like '%" . $cari . "%'");
                } else {
                    $data = mysqli_query($konek, "select * from pendataan");
                }
                $no = 1;
                while ($d = mysqli_fetch_array($data)) {
                    ?>
                    <tbody>
                        <tr>
                            <th scope="row"><?php echo $no++;
                            ; ?></th>
                            <td><?php echo $d['no_rm']; ?></td>
                            <td><?php echo $d['nama']; ?></td>
                            <td><?php echo $d['nik']; ?></td>
                            <td><?php echo $d['tempat_lahir']; ?></td>
                            <td><?php echo $d['tanggal_lahir']; ?></td>
                            <td><?php echo $d['jenis_kelamin']; ?></td>
                            <td><?php echo $d['pekerjaan']; ?></td>
                            <td><?php echo $d['nomor_hp']; ?></td>
                            <td><?php echo $d['alamat']; ?></td>
                            <td>
                                <a href="edit_daftar_pasien.php?no_rm=<?php echo $d['no_rm']; ?>"
                                    class="btn btn-outline-warning btn-sm">EDIT</a>
                                <a href="hapus_daftar_pasien_admin.php?no_rm=<?php echo $d['no_rm']; ?>"
                                    class="btn btn-outline-danger btn-sm">HAPUS</a>
                                <a href="kirim_daftar_pasien_admin.php?no_rm=<?php echo $d['no_rm']; ?>"
                                    class="btn btn-outline-info btn-sm">KIRIM</a>
                            </td>
                        </tr>
                    </tbody>

                <?php } ?>
            </table>




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
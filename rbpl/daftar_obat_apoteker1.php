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
    <title>Daftar Obat</title>
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
        <button class="dropdown-btn">Apoteker
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-container">
            <a href="daftar_obat_apoteker1.php">Daftar Obat</a>
        </div>
    </div>

    <div class="content">

        <div class="container p-3 ">
            <h2>Daftar Obat</h2>
            <div class="container mt-3">
                <table class="table">
                    <tr>
                        <td>
                            <form class="form-inline d-flex" action="daftar_obat_apoteker1.php" method="get">
                                <input class="form-control me-2" type="search" placeholder="Cari" name="cari">
                                <button class="btn btn-outline-success" type="submit">Cari</button>
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="tambah_obat.php" class="btn btn-outline-primary mt-3">Tambah</a>
                        </td>
                    </tr>
                </table>
            </div>

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
                        <th scope="col">Kode Obat</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Bentuk</th>
                        <th scope="col">Konsumen</th>
                        <th scope="col">Kegunaan</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <?php
                if (isset($_GET['cari'])) {
                    $cari = $_GET['cari'];
                    $data = mysqli_query($konek, "select * from obat where nama like '%" . $cari . "%' order by kode_obat asc");
                } else {
                    $data = mysqli_query($konek, "select * from obat order by kode_obat asc");
                }
                $no = 1;
                while ($d = mysqli_fetch_array($data)) {
                    ?>
                    <tbody>
                        <tr>
                            <th scope="row"><?php echo $no++;
                            ; ?></th>
                            <td><?php echo $d['kode_obat']; ?></td>
                            <td><?php echo $d['nama']; ?></td>
                            <td><?php echo $d['bentuk']; ?></td>
                            <td><?php echo $d['konsumen']; ?></td>
                            <td><?php echo $d['kegunaan']; ?></td>
                            <td><?php echo $d['keterangan']; ?></td>

                            <td>
                                <a href="edit_daftar_obat.php?kode_obat=<?php echo $d['kode_obat']; ?>"
                                    class="btn btn-outline-warning btn-sm">EDIT</a>
                                <a href="hapus_daftar_obat.php?kode_obat=<?php echo $d['kode_obat']; ?>"
                                    class="btn btn-outline-danger btn-sm">HAPUS</a>

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
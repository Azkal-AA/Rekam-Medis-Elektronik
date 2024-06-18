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
    <title>Daftar Antrian</title>
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

    <div class="content">
        <div class="container p-3">
            <h2>Daftar Antrian Pasien</h2>
            <table class="table">

                <thead>
                    <tr>
                        <th scope="col">Antrian</th>
                        <th scope="col">No RM</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Tanggal Lahir</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Aksi</th>
                        <th scope="col">Status</th>

                    </tr>
                </thead>
                <?php
                $data = mysqli_query($konek, "select * from antrian");
                while ($d = mysqli_fetch_array($data)) {
                    ?>
                    <tbody>
                        <tr>
                            <th scope="row"><?php echo $d['no_antrian'];
                            ; ?></th>
                            <td><?php echo $d['no_rm']; ?></td>
                            <td><?php echo $d['nama']; ?></td>
                            <td><?php echo $d['tanggal_lahir']; ?></td>
                            <td><?php echo $d['jenis_kelamin']; ?></td>
                            <td>
                                <?php if ($d['status'] == "belum") { ?>
                                    <a href="periksa_pasien_admin.php?no_rm=<?php echo $d['no_rm']; ?>"
                                        class="btn btn-outline-primary btn-sm">PERIKSA</a>

                                <?php } else { ?>
                                    <a href="lihat_periksa_pasien_admin.php?no_rm=<?php echo $d['no_rm']; ?>"
                                        class="btn btn-outline-warning btn-sm">LIHAT</a>
                                <?php } ?>


                            </td>
                            <td>
                                <?php if ($d['status'] == "sudah") { ?>
                                    <button class="btn btn-success btn-sm">SUDAH DIPERIKSA</button>
                                <?php } else { ?>
                                    <button class="btn btn-danger btn-sm">BELUM DIPERIKSA</button>
                                <?php } ?>


                            </td>

                    </tbody>
                <?php } ?>
        </div>
    </div>
    <script>
        /* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
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
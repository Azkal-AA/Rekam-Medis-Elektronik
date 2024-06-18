<?php
session_start();
if (empty($_SESSION['username'])) {
    header("location:index.php?pesan=belum_login");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin</title>
    <link rel="stylesheet" href="style.css" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body style="background: url(assets/bg2.jpg) no-repeat center center fixed; background-size: cover;">
    <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-dark bg-dark bg-opacity-50">
        <div class="container">
            <a class="navbar-brand p-3 text-light" href="halaman_admin.php">
                Rumah Sakit - Admin
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

    <form action=""></form>

</body>

</html>
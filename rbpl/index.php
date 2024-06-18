<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <link rel="icon" type="image/x-icon" href="images/rsud.png">
    <link rel="stylesheet" href="style.css" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body style="background: url(assets/bg2.jpg) no-repeat center center fixed; background-size: cover;">
    <nav class="navbar sticky-top navbar-expand-lg bg-success">
        <div class="container">
            <a class="navbar-brand p-3 text-light" href="">
                Rekam Medis Elektronik
            </a>
            <div class="d-flex me-2 gap-2 p-3">

            </div>
        </div>
    </nav>


    <div class="position-absolute top-50 start-50 translate-middle">
        <form method="POST" action="cek_login.php">
            <div
                class="container d-flex justify-content-center align-items-center h-100 bg-secondary bg-opacity-50 shadow p-5 rounded">
                <div class="col text-center text-light ">
                    <div class="row">
                        <h1>Sign In</h1>
                        <h5 class="text-light mt-3">Enter your username and password</h5>
                        <div class="text-light">
                            <?php
                            if (isset($_GET['pesan'])) {
                                if ($_GET['pesan'] == "gagal") {
                                    echo "Login failed! username and password is incorrect!";
                                } else if ($_GET['pesan'] == "logout") {
                                    echo "You have sucessfully Logout";
                                } elseif ($_GET['pesan'] == "belum_login") {
                                    echo "You need to login to access the page!";
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <input class="form-control form-control-lg" type="text" name="username" placeholder="username">
                    </div>
                    <div class="row mt-3">
                        <input class="form-control form-control-lg" type="password" name="password"
                            placeholder="password" required="reuired">
                    </div>
                    <div class="row mt-3">
                        <input class="btn btn-outline-light btn-md" type="submit" value="Login">
                    </div>

                </div>
            </div>

        </form>
    </div>


</body>

</html>
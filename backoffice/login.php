<?php
include('config.php');
include('fungsi.php');

session_start(); // Menciptakan session

if (cek_login($mysqli) == true) {
    header('location: dashboard');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['username']) and isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];


        $secret = '6LekPFYUAAAAANn9cgc_t4JbULtGV_E_rkyi_zIn';
        $user_ip = $_SERVER['REMOTE_ADDR'];

        if (login($username, $password, $mysqli) == true) {

            $lastlogin = gmdate("Y-m-d H:i:s", gmmktime(gmdate("H") + 7));
            $dbq1 = "INSERT INTO login_session SET
            username = '$username',
            string = '$secret',
            lastlogin = '$lastlogin'";
            $res = mysqli_query($koneksi, $dbq1);

            // Berhasil login
            header('location: dashboard.php');
            exit();
        } else {

            $_SESSION["error"] = "Username atau Password Salah";

            // Gagal login
            header('location: login.php');
            exit();
        }
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content />
    <meta name="author" content />
    <title>Login | Tombo Ati</title>
    <link href="../assets/css/styles.css" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="../assets/img/logo_tomboati.png" />
    <style>
        .bg-login {
            background-color: transparent;
            background: url('../assets/img/bg-green-idfitri.svg') no-repeat center center fixed;
            height: 100%;
            background-size: cover;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
        }

        .center {
            margin: 0;
            position: absolute;
            top: 50%;
            left: 50%;
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }

        .col-lg-13 {
            flex: 0 0 400px;
            max-width: 100%;
        }
    </style>
</head>

<body class="bg-login">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="center">
                        <div class="row justify-content-center">
                            <div class="col-lg-13">
                                <!-- Basic login form-->
                                <div class="card shadow-lg border-0 rounded-lg ">
                                    <div class="card-header justify-content-center">
                                        <div class="strong form-group d-flex align-items-center justify-content-center mt-4 mb-0">
                                            <img style="width:12%" src="https://tomboatitour.biz/assets/img/logo_tomboati.png">
                                            TomboAti
                                        </div>
                                        <h3 class="font-weight-light my-4 text-md-center">Login</h3>
                                        <?php
                                        if (isset($_SESSION["error"])) {
                                            $error = $_SESSION["error"];
                                            echo "<center><span>$error</span></center>";
                                        }
                                        ?>
                                    </div>
                                    <div class="card-body">
                                        <!-- Login form-->
                                        <form action="" method="POST">
                                            <div class="form-group">
                                                <label class="small mb-1" for="username">Username</label>
                                                <input type="text" class="form-control py-4" name="username" placeholder="Masukkan Username" required />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="password">Password</label>
                                                <input type="password" class="form-control py-4" name="password" placeholder="Masukan Password" required />
                                            </div>
                                            <div class="form-group d-flex align-items-center justify-content-center mt-4 mb-0">
                                                <a class="small"></a>
                                                <input type="submit" class="btn btn-primary " value="Login" />
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="footer mt-auto footer-dark ">
                <div class="container-fluid">
                    <div class="form-group d-flex align-items-center justify-content-center mt-5 mb-0">
                        <div class="row ">
                            <div class="col-md-50 small">Copyright &#xA9; Tombo Ati</div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

</body>

</html>

<?php
unset($_SESSION["error"]);
?>
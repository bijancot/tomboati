<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content />
    <meta name="author" content />
    <title>Login | Tombo Ati</title>
    <link href="<?= base_url(); ?>assets/css/styles.css" rel="stylesheet" />
    <link href="<?= base_url(); ?>assets/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <link rel="icon" type="image/x-icon" href="<?= base_url(); ?>assets/img/logo_tomboati.png" />
    <style>
        .bg-login {
            background-color: transparent;
            background: url(<?php echo base_url('assets/img/bg-tomboati.svg') ?>) no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }
    </style>
</head>

<body class="bg-login">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <!-- Basic login form-->
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header justify-content-center">
                                    <div class="strong form-group d-flex align-items-center justify-content-center mt-4 mb-0">
                                        <img src="<?= base_url(); ?>assets/img/logo_tomboati.png">
                                        TomboAti
                                    </div>
                                    <h3 class="font-weight-light my-4 text-md-center">Login</h3>
                                </div>
                                <div class="card-body">
                                    <!-- Login form-->
                                    <form action="<?= base_url('login/auth_admin') ?>" method="POST">
                                        <div class="form-group">
                                            <label class="small mb-1" for="email">Email</label>
                                            <input type="email" class="form-control py-4" name="email" placeholder="Masukan Email" required />
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
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="footer mt-auto footer-dark ">
                <div class="container-fluid">
                    <div class="form-group d-flex align-items-center justify-content-center mt-4 mb-0">
                        <div class="row ">
                            <div class="col-md-50 small">Copyright &#xA9; Tombo Ati</div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

</body>

</html
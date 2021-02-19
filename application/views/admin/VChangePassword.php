<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content />
    <meta name="author" content />
    <title><?= $title; ?></title>
    <link href="<?= base_url(); ?>assets/css/styles.css" rel="stylesheet" />
    <link href="<?= base_url(); ?>assets/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <link rel="icon" type="image/x-icon" href="<?= base_url(); ?>assets/img/logo_tomboati.png" />

    <!-- Plugin JS -->
    <script src="<?= base_url(); ?>assets/js/plugin/feather-icons/4.27.0/feather.min.js" crossorigin="anonymous"></script>
    <script data-search-pseudo-elements defer src="<?= base_url(); ?>assets/js/plugin/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>

<body class="nav-fixed">
    <nav class="topnav navbar navbar-expand shadow navbar-light bg-white" id="sidenavAccordion">
        <img style="width:3%" class="navbar-brand-img ml-3 image" src="<?= base_url(); ?>assets/img/logo_tomboati.png"></img>
        <a class="navbar-brand"> Tombo Ati </a>
    </nav>
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-9">
        <div class="container">
            <div class="page-header-content pt-6">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="key"></i></div>
                            <?= $title; ?>
                        </h1>
                        <!-- Change Password -->
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container mt-n8">
        <hr class="mt-0 mb-4" />
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-header">Change Password</div>
                    <div class="card-body">
                        <form>
                            <!-- Form Group (current password)-->
                            <!-- <div class="form-group">
                            <label class="small mb-1" for="currentPassword">Current Password</label>
                            <input class="form-control" id="currentPassword" type="password" placeholder="Masukan Password Sekarang" />
                        </div> -->
                            <!-- Form Group (new password)-->
                            <div class="form-group">
                                <label class="small mb-1" for="newPassword">New Password</label>
                                <input class="form-control" id="newPassword" type="password" placeholder="Masukan Password Baru" />
                            </div>
                            <!-- Form Group (confirm password)-->
                            <div class="form-group">
                                <label class="small mb-1" for="confirmPassword">Confirm Password</label>
                                <input class="form-control" id="confirmPassword" type="password" placeholder="Konfirmasi Password Baru" />
                            </div>
                            <button class="btn btn-primary" type="button">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view("template/script.php") ?>

</body>
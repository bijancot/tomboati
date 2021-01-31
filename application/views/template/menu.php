<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content />
    <meta name="author" content />
    <link href="<?= base_url(); ?>assets/css/styles.css" rel="stylesheet" />
    <link href="<?= base_url(); ?>assets/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <link rel="icon" type="image/x-icon" href="<?= base_url(); ?>assets/img/logo_tomboati.png" />
    <script src="<?= base_url(); ?>assets/js/plugin/feather-icons/4.27.0/feather.min.js" crossorigin="anonymous"></script>
    <script data-search-pseudo-elements defer src="<?= base_url(); ?>assets/js/plugin/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>

</head>

<body>
    <nav class="sidenav shadow-right sidenav-light">
        <div class="sidenav-menu">
            <div class="nav accordion" id="accordionSidenav">

                <a class="nav-link " href="<?php echo site_url('Dashboard'); ?>">
                    <div class="nav-link-icon ml-2"><i data-feather="globe"></i></div>
                    Dashboard
                </a>
                <a class="nav-link collapsed" href="javascript:void(0);" data-toggle="collapse" data-target="#collapseDashboards" aria-expanded="false" aria-controls="collapseDashboards">
                    <div class="nav-link-icon ml-2"><i data-feather="home"></i></div>
                    Umroh
                    <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseDashboards" data-parent="#accordionSidenav">
                    <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                        <a class="nav-link" href="<?php echo site_url('#'); ?>">
                            <div class="nav-link-icon ml-2"><i data-feather="home"></i></div>
                            PROMO
                        </a>
                        <a class="nav-link" href="<?php echo site_url('#'); ?>">
                            <div class="nav-link-icon ml-2"><i data-feather="home"></i></div>
                            HEMAT
                        </a>
                        <a class="nav-link" href="<?php echo site_url('#'); ?>">
                            <div class="nav-link-icon ml-2"><i data-feather="home"></i></div>
                            BISNIS
                        </a>
                        <a class="nav-link" href="<?php echo site_url('#'); ?>">
                            <div class="nav-link-icon ml-2"><i data-feather="home"></i></div>
                            VIP
                        </a>
                        <a class="nav-link" href="<?php echo site_url('#'); ?>">
                            <div class="nav-link-icon ml-2"><i data-feather="home"></i></div>
                            PLUS
                        </a>
                    </nav>
                </div>

                <a class="nav-link collapsed" href="javascript:void(0);" data-toggle="collapse" data-target="#collapseHaji" aria-expanded="false" aria-controls="collapseHaji">
                    <div class="nav-link-icon ml-2"><i data-feather="trending-up"></i></div>
                    Haji
                    <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseHaji" data-parent="#accordionSidenav">
                    <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                        <a class="nav-link" href="<?php echo site_url('#'); ?>">
                            <div class="nav-link-icon ml-2"><i data-feather="trending-up"></i></div>
                            REGULER
                        </a>
                        <a class="nav-link" href="<?php echo site_url('#'); ?>">
                            <div class="nav-link-icon ml-2"><i data-feather="trending-up"></i></div>
                            PLUS
                        </a>
                        <a class="nav-link" href="<?php echo site_url('#'); ?>">
                            <div class="nav-link-icon ml-2"><i data-feather="trending-up"></i></div>
                            TANPA ANTRI
                        </a>
                        <a class="nav-link" href="<?php echo site_url('#'); ?>">
                            <div class="nav-link-icon ml-2"><i data-feather="trending-up"></i></div>
                            TALANGAN
                        </a>
                        <a class="nav-link" href="<?php echo site_url('umroh/plus'); ?>">
                            <div class="nav-link-icon ml-2"><i data-feather="trending-up"></i></div>
                            BADAL
                        </a>
                    </nav>
                </div>

                <a class="nav-link collapsed" href="javascript:void(0);" data-toggle="collapse" data-target="#collapseWisataHalal" aria-expanded="false" aria-controls="collapseWisataHalal">
                    <div class="nav-link-icon ml-2"><i data-feather="compass"></i></div>
                    Wisata Halal
                    <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseWisataHalal" data-parent="#accordionSidenav">
                    <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                        <a class="nav-link" href="<?php echo site_url('#'); ?>">
                            <div class="nav-link-icon ml-2"><i data-feather="compass"></i></div>
                            INTERNASIONAL
                        </a>
                        <a class="nav-link" href="<?php echo site_url('#'); ?>">
                            <div class="nav-link-icon ml-2"><i data-feather="compass"></i></div>
                            NASIONAL
                        </a>
                        <a class="nav-link" href="<?php echo site_url('#'); ?>">
                            <div class="nav-link-icon ml-2"><i data-feather="compass"></i></div>
                            ZIARAH WALI
                        </a>
                    </nav>
                </div>

                <a class="nav-link " href="<?php echo site_url('news'); ?>">
                    <div class="nav-link-icon ml-2"><i data-feather="activity"></i></div>
                    News
                </a>

                <a class="nav-link " href="<?php echo site_url('Komunitas'); ?>">
                    <div class="nav-link-icon ml-2"><i data-feather="users"></i></div>
                    Komunitas
                </a>

                <a class="nav-link " href="<?php echo site_url('KataMutiara'); ?>">
                    <div class="nav-link-icon ml-2"><i data-feather="book-open"></i></div>
                    Kata-Kata Mutiara
                </a>

                <a class="nav-link " href="javascript:void(0);">
                    <div class="nav-link-icon ml-2"><i data-feather="user"></i></div>
                    User
                </a>

                <a class="nav-link " href="javascript:void(0);">
                    <div class="nav-link-icon ml-2"><i data-feather="user-check"></i></div>
                    Jamaah
                </a>

                <a class="nav-link" href="<?php echo site_url('Pembayaran'); ?>">
                    <div class="nav-link-icon ml-2"><i data-feather="dollar-sign"></i></div>
                    Pembayaran
                </a>

                <a class="nav-link " href="<?php echo site_url('Chat'); ?>">
                    <div class="nav-link-icon ml-2"><i data-feather="message-circle"></i></div>
                    Chat
                </a>
            </div>
        </div>
        <div class="sidenav-footer">
            <div class="sidenav-footer-content">
                <div class="sidenav-footer-subtitle">Login Sebagai:</div>
                <div class="sidenav-footer-title">Admin</div>
            </div>
        </div>
    </nav>

    <script src="<?= base_url(); ?>assets/js/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="<?= base_url(); ?>assets/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="<?= base_url(); ?>assets/js/scripts.js"></script>
    <script src="<?= base_url(); ?>assets/js/plugin/datatables/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="<?= base_url(); ?>assets/js/plugin/datatables/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="<?= base_url(); ?>assets/js/demo/datatables-demo.js"></script>

</body>

</html>
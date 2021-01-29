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
                <a class="nav-link collapsed" href="javascript:void(0);" data-toggle="collapse" data-target="#collapseDashboards" aria-expanded="false" aria-controls="collapseDashboards">
                    <div class="nav-link-icon"><img class="logo" src="<?= base_url(); ?>assets/img/ic_umroh.svg"></img></div>
                    Umroh
                    <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseDashboards" data-parent="#accordionSidenav">
                    <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                        <a class="nav-link" href="<?php echo site_url('umroh/paket/Promo'); ?>">
                            <img class="logo" src="<?= base_url(); ?>assets/img/ic_umroh_promo.svg"></img>
                            PROMO
                        </a>
                        <a class="nav-link" href="<?php echo site_url('umroh/paket/Hemat'); ?>">
                            <img class="logo" src="<?= base_url(); ?>assets/img/ic_umroh_hemat.svg"></img>
                            HEMAT
                        </a>
                        <a class="nav-link" href="<?php echo site_url('umroh/paket/Bisnis'); ?>">
                            <img class="logo" src="<?= base_url(); ?>assets/img/ic_umroh_bisnis.svg"></img>
                            BISNIS
                        </a>
                        <a class="nav-link" href="<?php echo site_url('umroh/paket/Vip'); ?>">
                            <img class="logo" src="<?= base_url(); ?>assets/img/ic_umroh_vip.svg"></img>
                            VIP
                        </a>
                        <a class="nav-link" href="<?php echo site_url('umroh/paket/Plus'); ?>">
                            <img class="logo" src="<?= base_url(); ?>assets/img/ic_umroh_plus.svg"></img>
                            PLUS
                        </a>
                    </nav>
                </div>

                <a class="nav-link collapsed" href="javascript:void(0);" data-toggle="collapse" data-target="#collapseHaji" aria-expanded="false" aria-controls="collapseHaji">
                    <div class="nav-link-icon"><img class="logo" src="<?= base_url(); ?>assets/img/ic_haji.svg"></img></div>
                    Haji
                    <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseHaji" data-parent="#accordionSidenav">
                    <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                        <a class="nav-link" href="<?php echo site_url('#'); ?>">
                            <img class="logo" src="<?= base_url(); ?>assets/img/ic_haji_reguler.svg"></img>
                            REGULER
                        </a>
                        <a class="nav-link" href="<?php echo site_url('#'); ?>">
                            <img class="logo" src="<?= base_url(); ?>assets/img/ic_haji_plus.svg"></img>
                            PLUS
                        </a>
                        <a class="nav-link" href="<?php echo site_url('#'); ?>">
                            <img class="logo" src="<?= base_url(); ?>assets/img/ic_haji_tanpaantri.svg"></img>
                            TANPA ANTRI
                        </a>
                        <a class="nav-link" href="<?php echo site_url('#'); ?>">
                            <img class="logo" src="<?= base_url(); ?>assets/img/ic_haji_talangan.svg"></img>
                            TALANGAN
                        </a>
                        <a class="nav-link" href="<?php echo site_url('umroh/plus'); ?>">
                            <img class="logo" src="<?= base_url(); ?>assets/img/ic_haji_badal.svg"></img>
                            BADAL
                        </a>
                    </nav>
                </div>

                <a class="nav-link collapsed" href="javascript:void(0);" data-toggle="collapse" data-target="#collapseWisataHalal" aria-expanded="false" aria-controls="collapseWisataHalal">
                    <div class="nav-link-icon"><img class="logo" src="<?= base_url(); ?>assets/img/ic_wisata.svg"></img></div>
                    Wisata Halal
                    <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseWisataHalal" data-parent="#accordionSidenav">
                    <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                        <a class="nav-link" href="<?php echo site_url('#'); ?>">
                            <img class="logo" src="<?= base_url(); ?>assets/img/ic_internasional.svg"></img>
                            INTERNASIONAL
                        </a>
                        <a class="nav-link" href="<?php echo site_url('#'); ?>">
                            <img class="logo" src="<?= base_url(); ?>assets/img/ic_nasional.svg"></img>
                            NASIONAL
                        </a>
                        <a class="nav-link" href="<?php echo site_url('#'); ?>">
                            <img class="logo" src="<?= base_url(); ?>assets/img/ic_wali.svg"></img>
                            ZIARAH WALI
                        </a>
                    </nav>
                </div>

                <a class="nav-link " href="<?php echo site_url('news'); ?>">
                    <div class="nav-link-icon"><img class="logo" src="<?= base_url(); ?>assets/img/ic_news.svg"></img></div>
                    News
                </a>

                <a class="nav-link " href="<?php echo site_url('#'); ?>">
                    <div class="nav-link-icon"><img class="logo" src="<?= base_url(); ?>assets/img/ic_komunitas.svg"></img></div>
                    Komunitas
                </a>

                <a class="nav-link " href="<?php echo site_url('#'); ?>">
                    <div class="nav-link-icon"><img class="logo" src="<?= base_url(); ?>assets/img/ic_katamutiara.svg"></img></div>
                    Kata-Kata Mutiara
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
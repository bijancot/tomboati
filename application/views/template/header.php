<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Tombo Ati Project" />
    <meta name="author" content />
    <title><?= $title; ?></title>
    <link rel="icon" type="image/x-icon" href="<?= base_url(); ?>assets/img/logo_tomboati.png" />
    <link href="<?= base_url(); ?>assets/css/styles.css" rel="stylesheet" />
    <link href="<?= base_url(); ?>assets/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />

    <script src="<?= base_url(); ?>assets/js/jquery-3.5.1.min.js" crossorigin="anonymous"></script>

    <!-- Global JS -->

    <!-- datepicker -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.standalone.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>

    <!-- Plugin JS -->
    <script src="<?= base_url(); ?>assets/js/plugin/feather-icons/4.27.0/feather.min.js" crossorigin="anonymous"></script>
    <script data-search-pseudo-elements defer src="<?= base_url(); ?>assets/js/plugin/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>

    <!-- CK editor JS harus di taruh sebelum, initialisasi editor pada textarea -->
    <script src="https://cdn.ckeditor.com/ckeditor5/25.0.0/classic/ckeditor.js"></script>

    <!-- Pusher -->
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <!-- Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        /* General CSS Setup */

        /* CSS talk bubble */
        .talk-bubble-user {
            margin: 5px;
            display: inline-block;
            position: relative;
            width: auto;
            max-width: 450px;
            height: auto;
            background-color: #262d31;
            background-color: #ffffff;
            background-color:#ffffff;
            margin-left: 20px;
            border-radius: 0px 5px 5px 5px;
        }

        .talk-bubble-admin {
            margin: 5px;
            display: inline-block;
            position: relative;
            width: auto;
            max-width: 450px;
            height: auto;
            background-color: #e2ffc7;
            margin-right: 25px;
            border-radius: 5px 0px 5px 5px;
        }

        .border {
            border: 8px solid #e2ffc7;
        }

        /* Right triangle placed top left flush. */
        .tri-right.border.left-top:before {
            content: ' ';
            position: absolute;
            width: 0;
            height: 0;
            left: -40px;
            right: auto;
            top: -8px;
            bottom: auto;
            border: 32px solid;
            border-color: #262d31 transparent transparent transparent;
            border-color: #ffffff transparent transparent transparent;
            border-color:#ffffff transparent transparent transparent;
        }

        .tri-right.left-top:after {
            content: ' ';
            position: absolute;
            width: 0;
            height: 0;
            left: -20px;
            right: auto;
            top: 0px;
            bottom: auto;
            border: 22px solid;
            border-color: #262d31 transparent transparent transparent;
            border-color: #ffffff transparent transparent transparent;
            border-color:#ffffff transparent transparent transparent;
        }

        /* Right triangle, right side slightly down*/
        .tri-right.border.right-in:before {
            content: ' ';
            position: absolute;
            width: 0;
            height: 0;
            left: auto;
            right: -40px;
            top: -8px;
            bottom: auto;
            border: 20px solid;
            border-color: #e2ffc7 transparent transparent #666;
        }

        .tri-right.right-in:after {
            content: ' ';
            position: absolute;
            width: 0;
            height: 0;
            left: auto;
            right: -20px;
            top: 0px;
            bottom: auto;
            border: 12px solid;
            border-color: #e2ffc7 transparent transparent #e2ffc7;
        }

        /* Right triangle placed top right flush. */
        .tri-right.border.right-top:before {
            content: ' ';
            position: absolute;
            width: 0;
            height: 0;
            left: auto;
            right: -40px;
            top: -8px;
            bottom: auto;
            border: 32px solid;
            border-color: #e2ffc7 transparent transparent transparent;
        }

        .tri-right.right-top:after {
            content: ' ';
            position: absolute;
            width: 0;
            height: 0;
            left: auto;
            right: -20px;
            top: 0px;
            bottom: auto;
            border: 20px solid;
            border-color: #e2ffc7 transparent transparent transparent;
        }

        /* talk bubble contents */
        .talktext {
            padding: 8px;
            text-align: left;
            line-height: 1.5em;
            color: #000000;
        }

        .talktext p {
            /* remove webkit p margins */
            -webkit-margin-before: 0em;
            -webkit-margin-after: 0em;
        }

        .talktext span {
            text-align: left;
            color: #859f70;
            font-size: 12px;
        }

        .scrollbar {
            /* margin-left: 30px; */
            float: left;
            height: 500px;
            width: 100%;
            overflow-y: scroll;
            overflow-x: hidden;
            margin-bottom: 25px;
        }

        .force-overflow {
            min-height: auto;
        }

        #wrapper {
            text-align: center;
            width: 100%;
            margin: auto;
        }

        #style-3::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
            background-color: #F5F5F5;
        }

        #style-3::-webkit-scrollbar {
            width: 6px;
            background-color: #F5F5F5;
        }

        #style-3::-webkit-scrollbar-thumb {
            background-color: #000000;
        }

        .fas .fa-check {
            color: #ffffff;
        }
    </style>
</head>

<body class="nav-fixed">
    <nav class="topnav navbar navbar-expand shadow navbar-light bg-white" id="sidenavAccordion">
        <img style="width:3%" class="navbar-brand-img ml-3" src="<?= base_url(); ?>assets/img/logo_tomboati.png"></img>
        <a class="navbar-brand" href="<?php echo site_url('Dashboard'); ?>"> Tombo Ati </a>
        <button class="btn btn-icon btn-transparent-dark order-1 order-lg-0 mr-lg-2 ml-0" id="sidebarToggle" href="assets/#"><i data-feather="menu"></i></button>
        <ul class="navbar-nav align-items-center ml-auto">
            <li class="nav-item dropdown no-caret mr-3 dropdown-notifications list-pemberitahuan">
                <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownMessages" href="javascript:void(0);" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-bell"></i>&nbsp;
                    <span class="badge badge-danger bg-danger"><?php echo ($countJamaahDaftar+$countJamaahBayar); ?></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right border-0 shadow animated--fade-in-up" aria-labelledby="navbarDropdownAlerts">
                    <h6 class="dropdown-header dropdown-notifications-header">
                        <i class="mr-2" data-feather="bell"></i>
                        Pemberitahuan
                    </h6>
                    <?php
                    if ($countJamaahDaftar == 0 && $countJamaahBayar == 0) {
                    ?>
                        <a class="dropdown-item dropdown-notifications-item notifikasi">
                            Tidak Ada Pemberitahuan
                        </a>
                        
                        <?php }else if($countJamaahDaftar > 0 ){ ?>
                        <a class="dropdown-item dropdown-notifications-item notifikasi" href="<?php echo site_url('Jamaah/notifJamaah'); ?>">
                            <i class="fas fa-user"></i>&nbsp;&nbsp;
                            <div class="dropdown-notifications-item-content">
                                <div class="dropdown-notifications-item-content-text">Pendaftaran Jamaah</div>
                                    <div class="dropdown-notifications-item-content-details">Terdapat <?php echo $countJamaahDaftar?> pendaftaran jamaah baru</div>
                            </div>
                        </a>
                        
                        <?php }else if( $countJamaahBayar > 0){ ?>
                        <a class="dropdown-item dropdown-notifications-item notifikasi" href="<?php echo site_url('Pembayaran/notifPembayaran'); ?>">
                            <i class="fas fa-user"></i>&nbsp;&nbsp;
                            <div class="dropdown-notifications-item-content">
                                <div class="dropdown-notifications-item-content-text">Pembayaran Jamaah</div>
                                    <div class="dropdown-notifications-item-content-details">Terdapat <?php echo $countJamaahBayar?> pembayaran baru</div>
                            </div>
                        </a>
                    <?php }?>                    
                </div>
            </li>
            <li class="nav-item dropdown no-caret mr-3 dropdown-notifications list-notifikasi">
                <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownMessages" href="javascript:void(0);" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-envelope"></i>&nbsp;
                    <span class="badge badge-primary bg-primary"><?php echo $countMessage; ?></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right border-0 shadow animated--fade-in-up" aria-labelledby="navbarDropdownMessages">
                    <h6 class="dropdown-header dropdown-notifications-header">
                        <i class="mr-2" data-feather="mail"></i>
                        Chat
                    </h6>
                    <?php
                    if ($countMessage == 0) {
                        ?>
                        <a class="dropdown-item dropdown-notifications-item notifikasi">
                            Tidak Ada Chat
                        </a>
                    <?php } ?>
                    <?php
                    foreach ($dataNotifChat as $data) {
                        ?>
                        <a class="dropdown-item dropdown-notifications-item notifikasi" href="<?php echo base_url('Chat/detailChatNotif/' . $data->ID_CHAT_ROOM . '') ?>">
                            <img class="dropdown-notifications-item-img" src="<?php echo $data->FOTO ?>" />
                            <div class="dropdown-notifications-item-content">
                                <div class="dropdown-notifications-item-content-text"><?php echo $data->MESSAGE ?></div>
                                <div class="dropdown-notifications-item-content-details"><?php echo $data->NAMALENGKAP ?> &#xB7; <?php echo $data->CREATEDAT ?></div>
                            </div>
                        </a>
                    <?php } ?>
                    <a class="dropdown-item dropdown-notifications-footer" href="<?php echo base_url('Chat') ?>">Lihat Semua Chat</a>
                </div>
            </li>
            <li class="nav-item dropdown no-caret mr-2 dropdown-user">
                <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownUserImage" href="assets/javascript:void(0);" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="img-fluid" /> <i data-feather="user"></i></a>
                <div class="dropdown-menu dropdown-menu-right border-0 shadow animated--fade-in-up" aria-labelledby="navbarDropdownUserImage">
                    <h6 class="dropdown-header d-flex align-items-center">
                        <i data-feather="user"></i>
                        <div class="dropdown-user-details">
                            <div class="dropdown-user-details-name">Admin</div>
                        </div>
                    </h6>
                    <div class="dropdown-divider"></div>
                    <!-- <a class="dropdown-item" href="<?php echo site_url('Admin/ChangePassword'); ?>">
                        <div class="dropdown-item-icon"><i data-feather="key"></i></div>
                        Change Password
                    </a> -->
                    <a type="button" class="dropdown-item" data-toggle="modal" data-target="#KonfirmasiModal">
                        <div class="dropdown-item-icon"><i data-feather="log-out"></i></div>
                        Logout
                    </a>
                </div>
            </li>
        </ul>
    </nav>
    <!--Modal Konfirmasi-->
    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" id="KonfirmasiModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Logout</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5>Apakah anda yakin keluar ? </h5>
                </div>
                <div class="modal-footer">
                    <a href="<?= base_url('Admin') ?>" type="button" class="btn btn-danger"><i class="fa fa-sign-out-alt mr-1"></i>Keluar</a>
                    <button type="button" class="btn btn-light" data-dismiss="modal"><i class="fa fa-times mr-1"></i>Tutup</button>
                </div>
            </div>
        </div>
    </div>
    <!--Akhir Modal Konfirmasi-->
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sidenav shadow-right sidenav-light">
                <div class="sidenav-menu">
                    <div class="nav accordion" id="accordionSidenav">
                        <?php $this->load->view('template/menu'); ?>
                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>

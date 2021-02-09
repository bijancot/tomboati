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
    <!-- datepicker -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.standalone.min.css" rel="stylesheet" />

    <!-- Global JS -->
    <script src="<?= base_url(); ?>assets/js/plugin/feather-icons/4.27.0/feather.min.js" crossorigin="anonymous"></script>
    <script data-search-pseudo-elements defer src="<?= base_url(); ?>assets/js/plugin/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>

    <script src="<?= base_url(); ?>assets/js/jquery-3.5.1.min.js" crossorigin="anonymous"></script>

    <!-- Plugin JS -->
    <!-- CK editor JS harus di taruh sebelum, initialisasi editor pada textarea -->
    <script src="https://cdn.ckeditor.com/ckeditor5/25.0.0/classic/ckeditor.js"></script>

    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>

    <style>
        /* General CSS Setup */

        /* CSS talk bubble */
        .talk-bubble-user {
            margin: 5px;
            display: inline-block;
            position: relative;
            width: 500px;
            height: auto;
            background-color: #262d31;
            margin-left: 20px;
        }

        .talk-bubble-admin {
            margin: 5px;
            display: inline-block;
            position: relative;
            width: 500px;
            height: auto;
            background-color: #128C7E;
            margin-right: 25px;
        }

        .border {
            border: 8px solid #128C7E;
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
            border-color: #128C7E transparent transparent #666;
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
            border-color: #128C7E transparent transparent #128C7E;
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
            border-color: #128C7E transparent transparent transparent;
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
            border-color: #128C7E transparent transparent transparent;
        }

        /* talk bubble contents */
        .talktext {
            padding: 1em;
            text-align: left;
            line-height: 1.5em;
            color: #ffffff;
        }

        .talktext p {
            /* remove webkit p margins */
            -webkit-margin-before: 0em;
            -webkit-margin-after: 0em;
        }

        .talktext span {
            text-align: left;
            color: #ffffff;
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
        <img class="navbar-brand-img ml-3" src="<?= base_url(); ?>assets/img/logo_tomboati.png"></img>
        <a class="navbar-brand" href="<?php echo site_url('umroh'); ?>"> Tombo Ati </a>
        <button class="btn btn-icon btn-transparent-dark order-1 order-lg-0 mr-lg-2 ml-0" id="sidebarToggle" href="assets/#"><i data-feather="menu"></i></button>
        <form class="form-inline mr-auto d-none d-md-block">
            <div class="input-group input-group-joined input-group-solid">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" />
                <div class="input-group-append">
                    <div class="input-group-text"><i data-feather="search"></i></div>
                </div>
            </div>
        </form>
        <ul class="navbar-nav align-items-center ml-auto">
            <li class="nav-item dropdown no-caret mr-3 dropdown-notifications">
                <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownAlerts" href="javascript:void(0);" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="bell"></i></a>
                <div class="dropdown-menu dropdown-menu-right border-0 shadow animated--fade-in-up" aria-labelledby="navbarDropdownAlerts">
                    <h6 class="dropdown-header dropdown-notifications-header">
                        <i class="mr-2" data-feather="bell"></i>
                        Alerts Center
                    </h6>
                    <a class="dropdown-item dropdown-notifications-item" href="#!">
                        <div class="dropdown-notifications-item-icon bg-warning"><i data-feather="activity"></i></div>
                        <div class="dropdown-notifications-item-content">
                            <div class="dropdown-notifications-item-content-details">December 29, 2019</div>
                            <div class="dropdown-notifications-item-content-text">This is an alert message. It&apos;s nothing serious, but it requires your attention.</div>
                        </div>
                    </a>
                    <a class="dropdown-item dropdown-notifications-footer" href="#!">View All Alerts</a>
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
                        Message Center
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
                    <a class="dropdown-item dropdown-notifications-footer" href="<?php echo base_url('Chat') ?>">Read All Messages</a>
                </div>
            </li>
            <li class="nav-item dropdown no-caret mr-2 dropdown-user">
                <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownUserImage" href="assets/javascript:void(0);" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="img-fluid" /> <i data-feather="user"></i></a>
                <div class="dropdown-menu dropdown-menu-right border-0 shadow animated--fade-in-up" aria-labelledby="navbarDropdownUserImage">
                    <h6 class="dropdown-header d-flex align-items-center">
                        <i data-feather="user"></i>

                        <div class="dropdown-user-details">
                            <div class="dropdown-user-details-name">Mr. Fakhri Fahreza</div>
                        </div>
                    </h6>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo site_url('#'); ?>">
                        <div class="dropdown-item-icon"><i data-feather="settings"></i></div>
                        Account
                    </a>
                    <a class="dropdown-item" href="<?php echo site_url('#'); ?>">
                        <div class="dropdown-item-icon"><i data-feather="log-out"></i></div>
                        Logout
                    </a>
                </div>
            </li>
        </ul>
    </nav>
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
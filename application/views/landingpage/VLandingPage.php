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

    <!-- Style -->
    <style>
        header {
            background: #FFF;
            padding-left: 20px;
            position: relative;
            z-index: 10;
            overflow: hidden;
        }

        .all-wrap {
            height: 100%;
            background: #C8B093;
        }

        .img-size-1 {
            max-width: 90%;
            height: auto;
        }

        .border-left-1{
            border-left: 3px solid black;
        }
    </style>
</head>

<body>
    <div class="all-wrap">
        <header class="header">
            <div class="branding">
                <div class="container-fluid position-relative py-2">
                    <div class="logo-wrapper">
                        <div class="site-logo">
                            <a href="#" class="navbar-brand"><img class="logo-icon me-2" src="<?= base_url(); ?>assets/img/logo_tomboati.png" alt="logo" style="width:80px;" />
                            </a>
                        </div>
                    </div>
                    <!--//docs-logo-wrapper-->
                </div>
                <!--//container-->
            </div>
            <!--//branding-->
        </header>
        <!--//header-->

        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="pt-3">
                        <img class="img-size-1 mb-3" src="<?= base_url('images/landingPage/1.PNG') ?>" alt="tombo ati" />
                        <img class="img-size-1" src="<?= base_url('images/landingPage/2.PNG') ?>" alt="tombo ati" />
                    </div>
                </div>
                <div class="col align-self-center">
                    <img class="img-fluid" src="<?= base_url('images/landingPage/3(2).png') ?>" alt="tombo ati" />
                </div>
                <div class="col align-self-center border-left-1">
                    <h1 class="text-center">Segera Download Aplikasi Tombo Ati <br> Dengan SCAN QR CODE ini</h1>
                    <div class="d-flex justify-content-center">
                        <img class="img-fluid" src="<?= base_url('images/landingPage/qr_code.png') ?>" alt="qr code" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
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
            background: #C8B093;
            padding-left: 20px;
            position: relative;
            z-index: 10;
            overflow: hidden;
        }

        .all-wrap {
            background: #FFF;
        }

        .img-size-1{
            max-width: 90%;
            height: auto;
        }
    </style>
</head>

<body>
    <div class="all-wrap">
        <header class="header">
            <div class="branding">
                <div class="container-fluid position-relative py-3">
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
                <!-- IMAGE -->
                <div class="col-12 col-md-8 mt-3 align-self-center">
                    <div class="row">
                        <div class="col">
                            <img class="img-size-1 mb-3" src="<?= base_url('images/landingPage/1.png') ?>" alt="tombo ati" />
                            <img class="img-size-1" src="<?= base_url('images/landingPage/2.png') ?>" alt="tombo ati" />
                        </div>
                        <div class="col align-self-center">
                            <img class="img-fluid" src="<?= base_url('images/landingPage/3(2).png') ?>" alt="tombo ati" />
                        </div>
                    </div>
                </div>

                <!-- QR-CODE -->
                <div class="col-12 col-md-4 pt-5 mb-5 align-self-center">
                    <div class="promo pe-md-3 pe-lg-5">
                        <h1 class="headline mb-3 text-justify">
                            Download Aplikasi nya <br> dengan Scan Barcode ini
                        </h1>
                        <img class="img-fluid" src="<?= base_url('images/landingPage/qr_code.png') ?>" alt="qr code" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
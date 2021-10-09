 <?php
    include('config.php');
    include('fungsi.php');
    ini_set('display_errors', 'off');

    session_start();

    if (cek_login($mysqli) == false) {
        echo "<script type='text/javascript'>document.location.href = 'logout.php';</script>";
        exit();
    }

    $stmt = $mysqli->prepare("SELECT userid FROM mebers WHERE id = ?");
    $stmt->bind_param('i', $_SESSION['id']);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($username);
    $stmt->fetch();

    $sql = mysqli_query($koneksi, "SELECT * FROM mebers WHERE id = '$_SESSION[id]' ");
    $row = mysqli_fetch_assoc($sql);
    $ref = $row['ref'];
    $username = $row['userid'];
    $name = $row['name'];
    $email = $row['email'];
    $id = $row['id'];
    $file_idcard = $row['photo_idcard'];
    $file_kk = $row['photo_kk'];
    $data_idcard = $row['idcard'];
    $data_kk = $row['evocash_account'];


    $res = mysqli_query($koneksi, "SELECT sum(amount) FROM hm2_history where user_id='$row[id]' ");
    $rowsum = mysqli_fetch_row($res);
    $sum = $rowsum[0];
    $sum2 = number_format($sum, 0, "." . ".");

    $res_cw = mysqli_query($koneksi, "SELECT sum(amount) FROM hm2_history where user_id='$row[id]' AND type='cw' ");
    $rowsum_cw = mysqli_fetch_row($res_cw);
    $sum_cw = $rowsum_cw[0];
    $sum2_cw = number_format($sum_cw, 0, "." . ".");

    $res_pw = mysqli_query($koneksi, "SELECT sum(amount) FROM hm2_history where user_id='$row[id]' AND type='pw' ");
    $rowsum_pw = mysqli_fetch_row($res_pw);
    $sum_pw = $rowsum_pw[0];
    $sum2_pcw = number_format($sum_pw, 0, "." . ".");

    $res_rw = mysqli_query($koneksi, "SELECT sum(amount) FROM hm2_history where user_id='$row[id]' AND type='rw' ");
    $rowsum_rw = mysqli_fetch_row($res_rw);
    $sum_rw = $rowsum_rw[0];
    $sum2_rw = number_format($sum_rw, 0, "." . ".");

    $res_addfund = mysqli_query($koneksi, "SELECT sum(amount) FROM hm2_history where user_id='$row[id]' AND type='add_funds' ");
    $rowsum_addfund = mysqli_fetch_row($res_addfund);
    $sum_addfund = $rowsum_addfund[0];
    $sum2_addfund = number_format($sum_addfund, 0, "." . ".");

    $res_deposit = mysqli_query($koneksi, "SELECT sum(amount) FROM hm2_pending_deposits WHERE user_id='$row[id]' AND status='processed'");
    $rowsum_deposit = mysqli_fetch_row($res_deposit);
    $sum_deposit = $rowsum_deposit[0];
    $sum2_deposit = number_format($sum_deposit, 0, "." . ".");

    $res_commissions1 = mysqli_query($koneksi, "SELECT sum(amount) FROM hm2_history where type='commissions' AND user_id='$row[id]'");
    $rowsum_commissions1 = mysqli_fetch_row($res_commissions1);
    $sum_commissions1 = $rowsum_commissions1[0];
    $sum2_commissions1 = number_format($sum_commissions1, 0, "." . ".");

    $res_commissions2 = mysqli_query($koneksi, "SELECT sum(amount) FROM hm2_history where type='commissions2' AND user_id='$row[id]'");
    $rowsum_commissions2 = mysqli_fetch_row($res_commissions2);
    $sum_commissions2 = $rowsum_commissions2[0];
    $sum2_commissions2 = number_format($sum_commissions2, 0, "." . ".");

    $res_commissions3 = mysqli_query($koneksi, "SELECT sum(amount) FROM hm2_history where type='commissions3' AND user_id='$row[id]'");
    $rowsum_commissions3 = mysqli_fetch_row($res_commissions3);
    $sum_commissions3 = $rowsum_commissions3[0];
    $sum2_commissions3 = number_format($sum_commissions3, 0, "." . ".");

    $res_trf = mysqli_query($koneksi, "SELECT sum(amount) FROM hm2_history where type='internal_transaction_spend' AND user_id='$row[id]'");
    $rowsum_trf = mysqli_fetch_row($res_trf);
    $sum_trf = $rowsum_trf[0];
    $sum2_trf = number_format($sum_trf, 0, "." . ".");

    $res_withdrawal = mysqli_query($koneksi, "SELECT sum(amount) FROM hm2_history where type='withdrawal' AND user_id='$row[id]'");
    $rowsum_withdrawal = mysqli_fetch_row($res_withdrawal);
    $sum_withdrawal = $rowsum_withdrawal[0];
    $sum2_withdrawal = number_format($sum_withdrawal, 0, "." . ".");


    $sum_commissions = $sum_commissions1 + $sum_commissions2 + $sum_commissions3;
    $sum2_commissions = number_format($sum_commissions, 0, "." . ".");

    $res_earning = mysqli_query($koneksi, "SELECT sum(amount) FROM hm2_history where type='earning' AND user_id='$row[id]'");
    $rowsum_earning = mysqli_fetch_row($res_earning);
    $sum_earning = $rowsum_earning[0];
    $sum2_earning = number_format($sum_earning, 0, "." . ".");

    $query_set = mysqli_query($koneksi, "SELECT * FROM set_bonus");
    $data_set  = mysqli_fetch_assoc($query_set);

    //notifikasi
    $get_all_data_register_paket_user = mysqli_query($koneksi, "SELECT * FROM mebers WHERE paket='BARU' AND is_seen_notifikasi = 0");
    $get_rows_paket_user = mysqli_num_rows($get_all_data_register_paket_user);

    date_default_timezone_set('Asia/Jakarta')

    ?>


 <head>

     <style>
         .bg-white {
             background-color: #fff !important;
         }

         a.bg-white:hover,
         a.bg-white:focus,
         button.bg-white:hover,
         button.bg-white:focus {
             background-color: #e6e6e6 !important;
         }

         .bg-white {
             background-color: #fff !important;
         }

         a.bg-white:hover,
         a.bg-white:focus,
         button.bg-white:hover,
         button.bg-white:focus {
             background-color: #e6e6e6 !important;
         }

         .myDropDown {
             height: 170px !important;
             overflow: scroll !important;
         }

         .notif::-webkit-scrollbar {
             display: none;
         }

         .notif {
             -ms-overflow-style: none;
             scrollbar-width: none;
         }

         .bg-danger{background-color:#dc3545!important}
         a.bg-danger:focus,
         a.bg-danger:hover,
         button.bg-danger:focus,
         button.bg-danger:hover{background-color:#bd2130!important}
         
     </style>
     <meta charset="UTF-8">
     <meta name="robots" content="noindex" />
     <!-- <title>Tombo Ati</title> -->
     <link rel="icon" href="https://tomboatitour.biz/assets/img/logo_tomboati.png" type="image/x-icon" />
     <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

     <link href="dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
     <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
     <link href="//code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css" rel="stylesheet" type="text/css" />
     <link href="css/morris/morris.css" rel="stylesheet" type="text/css" />
     <link href="css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
     <link href="css/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
     <link href="css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
     <link href="css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
     <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />
     <link href="css/util.css" rel="stylesheet" type="text/css" />
     <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
     <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
     <script type="text/javascript">
         function newPopup(url) {
             popupWindow = window.open(url, 'popUpWindow', 'height=500,width=700,left=300,top=300,resizable=yes,scrollbars=no,toolbar=no,menubar=no,location=no,directories=no,status=yes')
         }
     </script>

     <script type="text/javascript">
         /*
   Replacing Submit Button with 'Loading' Image
   Version 2.0
   December 18, 2012

   Will Bontrager Software, LLC
   http://www.willmaster.com/
   Copyright 2012 Will Bontrager Software, LLC

   This software is provided "AS IS," without 
   any warranty of any kind, without even any 
   implied warranty such as merchantability 
   or fitness for a particular purpose.
   Will Bontrager Software, LLC grants 
   you a royalty free license to use or 
   modify this software provided this 
   notice appears on all copies. 
*/
         function ButtonClicked() {
             document.getElementById("formsubmitbutton").style.display = "none"; // to undisplay
             document.getElementById("buttonreplacement").style.display = ""; // to display
             return true;
         }
         var FirstLoading = true;

         function RestoreSubmitButton() {
             if (FirstLoading) {
                 FirstLoading = false;
                 return;
             }
             document.getElementById("formsubmitbutton").style.display = ""; // to display
             document.getElementById("buttonreplacement").style.display = "none"; // to undisplay
         }
         // To disable restoring submit button, disable or delete next line.
         document.onfocus = RestoreSubmitButton;
     </script>


     <!-- Favicon -->
     <link rel="apple-touch-icon" sizes="57x57" href="../ico/apple-icon-57x57.png">
     <link rel="apple-touch-icon" sizes="60x60" href="../ico/apple-icon-60x60.png">
     <link rel="apple-touch-icon" sizes="72x72" href="../ico/apple-icon-72x72.png">
     <link rel="apple-touch-icon" sizes="76x76" href="../ico/apple-icon-76x76.png">
     <link rel="apple-touch-icon" sizes="114x114" href="../ico/apple-icon-114x114.png">
     <link rel="apple-touch-icon" sizes="120x120" href="../ico/apple-icon-120x120.png">
     <link rel="apple-touch-icon" sizes="144x144" href="../ico/apple-icon-144x144.png">
     <link rel="apple-touch-icon" sizes="152x152" href="../ico/apple-icon-152x152.png">
     <link rel="apple-touch-icon" sizes="180x180" href="../ico/apple-icon-180x180.png">
     <link rel="icon" type="image/png" sizes="192x192" href="../ico/android-icon-192x192.png">
     <link rel="icon" type="image/png" sizes="32x32" href="../ico/favicon-32x32.png">
     <link rel="icon" type="image/png" sizes="96x96" href="../ico/favicon-96x96.png">
     <link rel="icon" type="image/png" sizes="16x16" href="../ico/favicon-16x16.png">
     <link rel="manifest" href="../ico/manifest.json">
     <meta name="msapplication-TileColor" content="#ffffff">
     <meta name="msapplication-TileImage" content="../ico/ms-icon-144x144.png">
     <meta name="theme-color" content="#ffffff">
 </head>


 <body class="skin-blue">
     <!-- header logo: style can be found in header.less -->
     <header class="header">
         <a href="index.php" class="logo">
             Admin Area
         </a>
         <nav class="navbar navbar-static-top" role="navigation">
             <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                 <span class="sr-only">Toggle navigation</span>
                 <span class="icon-bar"></span>
                 <span class="icon-bar"></span>
                 <span class="icon-bar"></span>
             </a>
             <div class="navbar-right">
                 <ul class="nav navbar-nav">

                     <li class="dropdown user user-menu">
                         <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                             <i class="glyphicon glyphicon-bell"></i>
                             <span class="badge badge-danger bg-danger "><?php if ($get_rows_paket_user != 0) echo '!'?></span>
                             <span> <i class="caret"></i></span>
                         </a>
                         <ul class="dropdown-menu text-white notif myDropDown">
                             <!-- User image -->
                             <li class="user-header bg-light-blue">
                                 <?php
                                    if ($get_rows_paket_user == 0) {
                                    ?>
                                     <a class="badge badge-white bg-white">
                                         <div class="text-bold fs-14">
                                             Tidak Ada Pemberitahuan
                                         </div>
                                     </a>
                                 <?php } else { ?>
                                     <a class="badge badge-white bg-white" href="VPermintaanMitra.php">
                                         <div class="dropdown-notifications-item-content">
                                             <div class="text-left text-bold fs-14">Permintaan Mitra Baru</div>
                                             <div class="text-left fs-12">Terdapat Permintaan Mitra Baru</div>
                                         </div>
                                     </a>
                                 <?php } ?>
                             </li>
                         </ul>
                     </li>
                     <!-- User Account: style can be found in dropdown.less -->
                     <li class="dropdown user user-menu">
                         <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                             <i class="glyphicon glyphicon-user"></i>
                             <span><?php echo $row['name']; ?> <i class="caret"></i></span>
                         </a>
                         <ul class="dropdown-menu">
                             <!-- User image -->
                             <li class="user-header bg-light-blue">
                                 <img src="<?php echo $row['photo']; ?>" class="img-circle" alt="User Image" />
                                 <p>
                                     <?php echo $row['name']; ?>

                                 </p>
                             </li>

                             <!-- Small Menu -->
                             <!-- Menu Footer-->
                             <li class="user-footer">
                                 <div class="pull-left">
                                     <a href="profile.php" class="btn btn-default btn-flat"> Profile </a>
                                 </div>
                                 <div class="pull-right">
                                     <a href="logout.php" class="btn btn-default btn-flat" onclick="return confirm ('Apakah Anda Akan Keluar.?');"> Logout </a>
                                 </div>
                             </li>
                         </ul>
                     </li>
                 </ul>
             </div>
         </nav>
     </header>


     <div class="wrapper row-offcanvas row-offcanvas-left">
         <!-- Left side column. contains the logo and sidebar -->
         <aside class="left-side sidebar-offcanvas">
             <!-- sidebar: style can be found in sidebar.less -->
             <section class="sidebar">
                 <!-- Sidebar user panel -->
                 <div class="user-panel">
                     <div class="pull-left image">
                         <img src="<?php echo $row['photo']; ?>" class="img-circle" alt="User Image" style="border: 2px solid #3C8DBC;" />
                     </div>
                     <div class="pull-left info">
                         <p>Welcome,<br /><?php echo $row['name']; ?></p>

                         <a href="#"><i class="fa fa-circle text-success"></i> Online</a>

                         <br>
                         <a href="#"><i class="fa fa-circle text-success"></i>

                             <?PHP
                                function getUserIP()
                                {
                                    $client  = @$_SERVER['HTTP_CLIENT_IP'];
                                    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
                                    $remote  = $_SERVER['REMOTE_ADDR'];
                                    if (filter_var($client, FILTER_VALIDATE_IP)) {
                                        $ip = $client;
                                    } elseif (filter_var($forward, FILTER_VALIDATE_IP)) {
                                        $ip = $forward;
                                    } else {
                                        $ip = $remote;
                                    }
                                    return $ip;
                                }
                                $user_ip = getUserIP();
                                echo "IP $user_ip";
                                ?>

                         </a>


                     </div>
                 </div>

                 <?php
                    if ($username == 'company') {
                        $menu = 'menu-admin.php';
                    } else {
                        $menu = 'logout.php';
                    }
                    ?>
                 <?php include "$menu"; ?>

             </section>
             <!-- /.sidebar -->
         </aside>
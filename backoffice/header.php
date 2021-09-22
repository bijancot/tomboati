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

    $res_deposit = mysqli_query($koneksi, "SELECT sum(amount) FROM hm2_pending_deposits WHERE user_id='$row[id]' AND status='processed' ");
    $rowsum_deposit = mysqli_fetch_row($res_deposit);
    $sum_deposit = $rowsum_deposit[0];

    // YANG LAMA
    // $query_total = mysqli_query($koneksi, "SELECT SUM(bonus) as 'bonus_total_sponsor' FROM bonus_sponsor WHERE userid='$row[userid]' ");
    // $query_total2 = mysqli_fetch_array($query_total);
    // $bonus_sponsor_total = $query_total2['bonus_total_sponsor'];

    // $query_titik = mysqli_query($koneksi, "SELECT SUM(bonus) as 'bonus_total_titik' FROM bonus_titik WHERE userid='$row[userid]' ");
    // $querytitik = mysqli_fetch_array($query_titik);
    // $bonus_titik_total = $querytitik['bonus_total_titik'];

    // $query_point = mysqli_query($koneksi, "SELECT SUM(point) as 'bonus_total_point' FROM bonus_titik WHERE userid='$row[userid]' ");
    // $querypoint = mysqli_fetch_array($query_point);
    // $bonus_point_total = $querypoint['bonus_total_point'];

    // $query_point = mysqli_query($koneksi, "SELECT SUM(jumlah) as 'total_point' FROM hm2_pending_deposits WHERE status='processed' AND type='point' AND user_id='$row[id]' ");
    // $query_total2 = mysqli_fetch_array($query_point);
    // $point_total = $query_total2['total_point'];

    // $query_wd = mysqli_query($koneksi, "SELECT SUM(amount) as 'total_wd' FROM hm2_history WHERE user_id='$row[id]' ");
    // $query_wd2 = mysqli_fetch_array($query_wd);
    // $wd_total = $query_wd2['total_wd'];

    // $tampil_ref = mysqli_query($koneksi, "select * from mebers where sponsor='$row[userid]' ");
    // $total_ref = mysqli_num_rows($tampil_ref);

    // $tampil_ref_reseller = mysqli_query($koneksi, "select * from mebers where sponsor='$row[userid]' AND paket='RESELLER'");
    // $total_ref_reseller = mysqli_num_rows($tampil_ref_reseller);

    // $sum = $bonus_sponsor_total + $bonus_titik_total - $wd_total;
    // $sum_register = $point_total - $total_ref;

    $tampil_deposit=mysqli_query($koneksi, "select * FROM hm2_pending_deposits WHERE user_id='$row[id]' AND type='upgrade' ");
    $total_deposit=mysqli_num_rows($tampil_deposit);
    
    $query_total = mysqli_query($koneksi,"SELECT SUM(bonus) as 'bonus_total_sponsor' FROM bonus_sponsor WHERE userid='$row[userid]' ");
    $query_total2=mysqli_fetch_array($query_total);
    $bonus_sponsor_total=$query_total2['bonus_total_sponsor'];
    
    $query_titik = mysqli_query($koneksi,"SELECT SUM(bonus) as 'bonus_total_titik' FROM bonus_titik WHERE userid='$row[userid]' ");
    $querytitik=mysqli_fetch_array($query_titik);
    $bonus_titik_total=$querytitik['bonus_total_titik'];
    
    $query_point = mysqli_query($koneksi,"SELECT SUM(point) as 'bonus_total_point' FROM bonus_titik WHERE userid='$row[userid]' ");
    $querypoint=mysqli_fetch_array($query_point);
    $bonus_point_total=$querypoint['bonus_total_point'];
    
    $query_point = mysqli_query($koneksi,"SELECT SUM(jumlah) as 'total_point' FROM hm2_pending_deposits WHERE status='processed' AND type='point' AND user_id='$row[id]' ");
    $query_total2=mysqli_fetch_array($query_point);
    $point_total=$query_total2['total_point'];
    
    $query_wd = mysqli_query($koneksi,"SELECT SUM(amount) as 'total_wd' FROM hm2_history WHERE user_id='$row[id]' ");
    $query_wd2=mysqli_fetch_array($query_wd);
    $wd_total=$query_wd2['total_wd'];
    
    $tampil_ref=mysqli_query($koneksi, "select * from mebers where sponsor='$row[userid]' ");
    $total_ref=mysqli_num_rows($tampil_ref);
    
    $tampil_ref_reseller=mysqli_query($koneksi, "select * from mebers where sponsor='$row[userid]' AND paket='RESELLER'");
    $total_ref_reseller=mysqli_num_rows($tampil_ref_reseller);
    
    $sum=$bonus_sponsor_total+$bonus_titik_total-$wd_total;
    $sum_register=$point_total-$total_ref;
    
    // echo 'UserIDMu'.$row['userid'];
    //notifikasi
    $get_all_data_register_paket_user = mysqli_query($koneksi, "SELECT * FROM mebers WHERE sponsor='$row[userid]' AND paket='MITRA' AND is_seen_notifikasi_mitra = 0");    
    $get_rows_paket_user = mysqli_num_rows($get_all_data_register_paket_user);

    date_default_timezone_set('Asia/Jakarta')

    ?>
 <!doctype html>
 <html class="no-js" lang="en">

 <head>

     <style>
         .dropdown-notifications {
             position: static;
         }

         .dropdown-notifications .dropdown-menu {
             padding-top: 0;
             padding-bottom: 0;
             width: calc(100% - 1.5rem);
             right: 0.75rem;
             max-height: 19rem;
             overflow-x: hidden;
             overflow-y: hidden;
         }

         .dropdown-notifications .dropdown-menu::-webkit-scrollbar {
             width: 0.75rem;
         }

         .dropdown-notifications .dropdown-menu::-webkit-scrollbar-thumb {
             border-radius: 10rem;
             border-width: 0.2rem;
             border-style: solid;
             background-clip: padding-box;
             background-color: rgba(31, 45, 65, 0.2);
             border-color: transparent;
         }

         .dropdown-notifications .dropdown-menu::-webkit-scrollbar-button {
             width: 0;
             height: 0;
             display: none;
         }

         .dropdown-notifications .dropdown-menu::-webkit-scrollbar-corner {
             background-color: transparent;
         }

         .dropdown-notifications .dropdown-menu::-webkit-scrollbar-track {
             background: transparent;
         }

         @media (pointer: fine) and (hover: hover) {
             .dropdown-notifications .dropdown-menu:hover {
                 overflow-y: overlay;
             }
         }

         @media (pointer: coarse) and (hover: none) {
             .dropdown-notifications .dropdown-menu {
                 overflow-y: overlay;
             }
         }

         .dropdown-notifications .dropdown-menu .dropdown-notifications-header {
             background-color: #0061f2;
             color: #fff;
             padding-top: 1rem;
             padding-bottom: 1rem;
             line-height: 1;
         }

         .dropdown-notifications .dropdown-menu .dropdown-notifications-header svg {
             height: 0.7rem;
             width: 0.7rem;
             opacity: 0.7;
         }

         .dropdown-notifications .dropdown-menu .dropdown-notifications-item {
             padding-top: 1rem;
             padding-bottom: 1rem;
             border-bottom: 1px solid #e3e6ec;
         }

         .dropdown-notifications .dropdown-menu .dropdown-notifications-item .dropdown-notifications-item-icon,
         .dropdown-notifications .dropdown-menu .dropdown-notifications-item .dropdown-notifications-item-img {
             height: 2.5rem;
             width: 2.5rem;
             border-radius: 100%;
             margin-right: 1rem;
             flex-shrink: 0;
         }

         .dropdown-notifications .dropdown-menu .dropdown-notifications-item .dropdown-notifications-item-icon {
             background-color: #0061f2;
             display: flex;
             align-items: center;
             justify-content: center;
         }

         .dropdown-notifications .dropdown-menu .dropdown-notifications-item .dropdown-notifications-item-icon svg {
             text-align: center;
             font-size: 0.85rem;
             color: #fff;
             height: 0.85rem;
         }

         .dropdown-notifications .dropdown-menu .dropdown-notifications-item .dropdown-notifications-item-content .dropdown-notifications-item-content-details {
             color: #a2acba;
             font-size: 0.7rem;
         }

         .dropdown-notifications .dropdown-menu .dropdown-notifications-item .dropdown-notifications-item-content .dropdown-notifications-item-content-text {
             font-size: 0.9rem;
             max-width: calc(100vw - 8.5rem);
             white-space: nowrap;
             overflow: hidden;
             text-overflow: ellipsis;
         }

         .dropdown-notifications .dropdown-menu .dropdown-notifications-item .dropdown-notifications-item-content .dropdown-notifications-item-content-actions .btn-sm,
         .dropdown-notifications .dropdown-menu .dropdown-notifications-item .dropdown-notifications-item-content .dropdown-notifications-item-content-actions .btn-group-sm>.btn {
             font-size: 0.7rem;
             padding: 0.15rem 0.35rem;
             cursor: pointer;
         }

         .dropdown-notifications .dropdown-menu .dropdown-notifications-footer {
             justify-content: center;
             font-size: 0.8rem;
             padding-top: 0.75rem;
             padding-bottom: 0.75rem;
             color: #a2acba;
             cursor: pointer;
         }

         .dropdown-notifications .dropdown-menu .dropdown-notifications-footer .dropdown-notifications-footer-icon {
             height: 1em;
             width: 1em;
             margin-left: 0.25rem;
         }

         .dropdown-notifications .dropdown-menu .dropdown-notifications-footer:active {
             color: #fff;
         }

         @media (min-width: 576px) {
             .dropdown-notifications {
                 position: relative;
             }

             .dropdown-notifications .dropdown-menu {
                 width: auto;
                 min-width: 18.75rem;
                 right: 0;
             }

             .dropdown-notifications .dropdown-menu .dropdown-notifications-item .dropdown-notifications-item-content .dropdown-notifications-item-content-text {
                 max-width: 13rem;
             }
         }
     </style>
     <meta charset="utf-8">
     <meta http-equiv="x-ua-compatible" content="ie=edge">
     <title>Dashboard | Tombo Ati</title>
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="viewport" content="width=device-width, initial-scale=1">

     <link rel="icon" href="https://tomboati.bgskr-project.my.id/assets/img/logo_tomboati.png" type="image/x-icon" />

     <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">

     <link rel="stylesheet" href="plugins/bootstrap/dist/css/bootstrap.min.css">
     <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
     <link rel="stylesheet" href="plugins/icon-kit/dist/css/iconkit.min.css">
     <link rel="stylesheet" href="plugins/ionicons/dist/css/ionicons.min.css">
     <link rel="stylesheet" href="plugins/perfect-scrollbar/css/perfect-scrollbar.css">
     <link rel="stylesheet" href="plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
     <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap.css">
     <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/build/css/tempusdominus-bootstrap-4.min.css">
     <link rel="stylesheet" href="plugins/weather-icons/css/weather-icons.min.css">
     <link rel="stylesheet" href="plugins/c3/c3.min.css">
     <link rel="stylesheet" href="plugins/owl.carousel/dist/assets/owl.carousel.min.css">
     <link rel="stylesheet" href="plugins/owl.carousel/dist/assets/owl.theme.default.min.css">
     <link rel="stylesheet" href="dist/css/theme.min.css">
     <script src="src/js/vendor/modernizr-2.8.3.min.js"></script>
 </head>

 <body>
     <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

     <div class="wrapper">
         <header class="header-top" header-theme="light">
             <div class="container-fluid">
                 <div class="d-flex justify-content-between">
                     <div class="top-menu d-flex align-items-center">
                         <button type="button" class="btn-icon mobile-nav-toggle d-lg-none"><span></span></button>
                         <div class="header-search">
                             <div class="input-group">
                                 <span class="input-group-addon search-close"><i class="ik ik-x"></i></span>
                                 <input type="text" class="form-control">
                                 <span class="input-group-addon search-btn"><i class="ik ik-search"></i></span>
                             </div>
                         </div>
                         <button type="button" id="navbar-fullscreen" class="nav-link"><i class="ik ik-maximize"></i></button>
                     </div>

                     <ul class="navbar-nav align-items-center ml-auto">
                         <li class="nav-item dropdown no-caret mr-3 dropdown-notifications list-notif-daftar">
                             <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownMessages" href="javascript:void(0);" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 <i class="fas fa-bell"></i>&nbsp;
                                 <span class="badge badge-warning bg-primary"><?php echo $get_rows_paket_user?></span>
                             </a>
                             <div class="dropdown-menu dropdown-menu-right border-0 shadow animated--fade-in-up" aria-labelledby="navbarDropdownAlerts">
                                 <h6 class="dropdown-header dropdown-notifications-header text-center ">
                                     <i class="fas fa-bell mr-2 "></i>
                                     Pemberitahuan
                                 </h6>
                                 <?php 
                                    if($get_rows_paket_user == 0){
                                 ?>
                                 <a class="dropdown-item dropdown-notifications-item badge">
                                    <p> Tidak Ada Pemberitahuan</p>
                                 </a>
                                 <?php }else{?>
                                 <a class="dropdown-item notification-dropdown badge text-left" href="register.php">
                                     <div class="dropdown-notifications-item-content">
                                         <p class="dropdown-item-content-text notification-dropdown lg">Mitra Baru</h3>
                                         <div class="dropdown-item-content-details notification-dropdown">Terdapat <?php echo $get_rows_paket_user ?> Mitra Baru</div>
                                     </div>
                                 </a>
                                 <?php }?>
                                 <a class="dropdown-item dropdown-notifications-footer text-center" href="#!">Lihat Semua</a>
                             </div>
                         </li>
                     </ul>
                     <div class="top-menu d-flex align-items-center">
                         <button type="button" class="nav-link ml-10" id="apps_modal_btn" data-toggle="modal" data-target="#appsModal"><i class="ik ik-grid"></i></button>
                         <div class="dropdown">
                             <a class="dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="avatar" src="<?php echo $row['photo']; ?>" alt=""></a>
                             <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                                 <a class="dropdown-item" href="profile.php"><i class="ik ik-user dropdown-icon"></i> Profile</a>
                                 <a class="dropdown-item" href="logout.php"><i class="ik ik-power dropdown-icon"></i> Logout</a>
                             </div>
                         </div>

                     </div>
                 </div>
             </div>
         </header>
         <div class="page-wrap">
             <div class="app-sidebar colored">
                 <div class="sidebar-header">
                     <a class="header-brand" href="dashboard.php">
                         <span class="text"><img src="https://lifeforwin.co.id/assets/images/logo.png" width="70%" class="header-brand-img" alt="<?php include "$username"; ?>"></span>
                     </a>
                     <button type="button" class="nav-toggle"><i data-toggle="expanded" class="ik ik-toggle-right toggle-icon"></i></button>
                     <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
                 </div>

                 <div class="sidebar-content">
                     <div class="nav-container">

                         <?php
                            if ($username == 'company') {
                                $menu = '
                                <div class="nav-item active">
                                    <a href="../dashboard/index.php"><i class="ik ik-bar-chart-2"></i><span>Admin Area</span></a>
                                </div>
';
                            }
                            ?>
                         <nav id="main-menu-navigation" class="navigation-main">
                             <div class="nav-lavel">Navigation</div>
                             <?php echo "$menu"; ?>

                             <div class="nav-item active">
                                 <a href="dashboard.php"><i class="ik ik-monitor"></i><span>Dashboard</span></a>
                             </div>
                             <div class="nav-item">
                                 <a href="profile.php"><i class="ik ik-user-check"></i><span>Profile</span></a>
                             </div>
                             <div class="nav-item">
                                 <a href="index.php"><i class="ik ik-link"></i><span>My Referral</span></a>
                             </div>
                             
                             <div class="nav-lavel">Freelance</div>

                             <div class="nav-item">
                                 <a href="pengguna-baru.php"><i class="ik ik-users"></i><span>Pengguna Baru</span></a>
                             </div>
                             <div class="nav-item">
                                 <a href="register.php"><i class="ik ik-users"></i><span>Register Mitra</span></a>
                             </div>
                             <div class="nav-item">
                                 <a href="direct-mitra.php"><i class="ik ik-users"></i><span>Referensi Jamaah</span></a>
                             </div>


                             <div class="nav-lavel">Royalty</div>
                             <div class="nav-item has-sub">
                                 <a href="#"><i class="ik ik-box"></i><span>Fee & Free</span></a>
                                 <div class="submenu-content">
                                     <a href="fee-awal.php" class="menu-item">Fee Awal</a>
                                     <a href="fee-akhir.php" class="menu-item">Fee Akhir</a>
                                 </div>
                             </div>

                             <div class="nav-item has-sub">
                                 <a href="javascript:void(0)"><i class="ik ik-users"></i><span>Hadiah</span></a>
                                 <div class="submenu-content">
                                     <a href="hadiah-point.php" class="menu-item">Hadiah Poin</a>
                                     <a href="hadiah-wisata.php" class="menu-item">Hadiah Wisata</a>
                                 </div>
                             </div>

                             <div class="nav-lavel">Finansial</div>

                             <div class="nav-item has-sub">
                                 <a href="#"><i class="">Rp.</i><span>Topup</span></a>
                                 <div class="submenu-content">
<?php
if ($total_deposit==0){$menu_popup="<a href=\"upgrade-process.php\" class=\"menu-item\">Topup</a>";}
echo $menu_popup;
?>
<a href="topup-history.php" class="menu-item">History</a>
                                 </div>
                             </div>

                             <div class="nav-item has-sub">
                                 <a href="#"><i class="">Rp.</i><span>Hak Register</span></a>
                                 <div class="submenu-content">
                                     <a href="point-add.php" class="menu-item">Order</a>
                                     <a href="point-history.php" class="menu-item">History</a>
                                 </div>
                             </div>

                             <div class="nav-item has-sub">
                                 <a href="#"><i class="">Rp.</i><span>Withdrawal</span></a>
                                 <div class="submenu-content">
                                     <a href="wd-request.php" class="menu-item">WD Request</a>
                                     <a href="wd-history.php" class="menu-item">History</a>
                                 </div>
                             </div>

                             <div class="nav-lavel">Security</div>
                             <div class="nav-item">
                                 <a href="logout.php"><i class="ik ik-lock"></i><span>Logout</span></a>
                             </div>

                         </nav>

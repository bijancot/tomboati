<?php
session_start();

include 'header.php';
?>

<head>
    <title>Dashboard | Tombo Ati</title>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" href="modalstyle.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
</head>
<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>Admin Area</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <?php
                $tampil_user = mysqli_query($koneksi, "select * from mebers WHERE paket IN('USER', 'MiTRA','RESELLER') order by id desc");
                $total_user = mysqli_num_rows($tampil_user);

                $tampil_reseller = mysqli_query($koneksi, "select * from mebers WHERE paket='RESELLER' order by id desc");
                $total_reseller = mysqli_num_rows($tampil_reseller);

                $tampil_mitra = mysqli_query($koneksi, "select * from mebers WHERE paket='MITRA' order by id desc");
                $total_mitra = mysqli_num_rows($tampil_mitra);

                $tampil_point = mysqli_query($koneksi, "select * from hm2_pending_deposits WHERE type='point' AND status='processed' order by id desc");
                $total_point = mysqli_num_rows($tampil_point);


                ?>
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>
                            <?php echo number_format($total_user, 0, ",", "."); ?>
                        </h3>
                        <p>
                            Total User
                        </p>
                    </div>
                    <div class="icon">
                        <span class="glyphicon glyphicon-user"></span>
                    </div>
                    <a href="VPenggunaBaru.php" class="small-box-footer">
                        User List <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>
                            <?php echo number_format($total_mitra, 0, ",", "."); ?>
                        </h3>
                        <p>
                            Total Mitra
                        </p>
                    </div>
                    <div class="icon">
                        <span class="glyphicon glyphicon-user"></span>
                    </div>
                    <a href="admin-all-member-on.php" class="small-box-footer">
                        Mitra List<span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>
                            <?php echo number_format($total_reseller, 0, ",", "."); ?>
                        </h3>
                        <p>
                            Total Reseller
                        </p>
                    </div>
                    <div class="icon">
                        <span class="glyphicon glyphicon"></span>
                    </div>
                    <a href="admin-all-point-new.php" class="small-box-footer">
                        Reseller List <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <?php $tampil3 = mysqli_query($koneksi, "select * from mebers order by id desc");
                $user = mysqli_num_rows($tampil3);
                ?>
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>
                            <?php echo number_format($total_point, 0, ",", "."); ?>
                        </h3>
                        <p>
                            Total Hak Register
                        </p>
                    </div>
                    <div class="icon">
                        <span class="glyphicon fa fa-sitemap"></span>
                    </div>
                    <a href="binary-tree.php" class="small-box-footer">
                        Binary Tree <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                </div>
            </div><!-- ./col -->
        </div><!-- /.row -->

        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->






                <div class="small-box bg-aqua">
                    <div class="inner">
                        <font size="5"><b>
                                IDR <?php echo number_format($sum, 0, ',', '.'); ?>
                        </font></b>
                        <p>
                            Total Balance
                        </p>
                    </div>
                    <div class="icon">
                        <span class="glyphicon glyphicon-user"></span>
                    </div>
                    <!-- <a href="../wallet/wallet-report.php" class="small-box-footer"> -->
                    <a href="wallet-report.php" class="small-box-footer">
                        History Mutasi <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <font size="5"><b>
                                IDR <?php echo number_format($sum_deposit, 0, ',', '.'); ?>
                                <!--<sup style="font-size: 20px">%</sup>-->
                        </font></b>
                        <p>
                            Total Deposit
                        </p>
                    </div>
                    <div class="icon">
                        <span class="glyphicon glyphicon-sort-by-attributes"></span>
                    </div>
                    <a href="topup-history.php" class="small-box-footer">
                        Deposit Record <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->

                <div class="small-box bg-yellow">
                    <div class="inner">
                        <font size="5"><b>
                                IDR <?php echo number_format(ltrim($sum_withdrawal, '-'), 0, ',', '.'); ?>
                        </font></b>
                        <p>
                            Total Withdrawal
                        </p>
                    </div>
                    <div class="icon">
                        <span class="glyphicon glyphicon-stats"></span>
                    </div>
                    <!-- <a href="../wallet/withdrawal-processed.php" class="small-box-footer"> -->
                    <a href="withdrawal-processed.php" class="small-box-footer">
                        Record Withdrawal <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <font size="5"><b>
                                IDR <?php echo number_format(ltrim($bonus_sponsor_total + $total_bonus_pasangan, '-'), 0, ',', '.'); ?>
                        </font></b>
                        <p>
                            Total Bonus
                        </p>
                    </div>
                    <div class="icon">
                        <span class="glyphicon glyphicon-signal"></span>
                    </div>
                    <!-- <a href="../wallet/pin-order.php" class="small-box-footer"> -->
                    <a href="pin-order.php" class="small-box-footer">
                        Order PIN Aktivasi<span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                </div>
            </div><!-- ./col -->
        </div><!-- /.row -->


        <!-- Main row -->
        <div class="row">
            <!-- center col -->










            <div class="col-lg-12">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-signal"></span> Order Hak Register</h3>
                    </div>
                    <div class="panel-body">

                        <div class="table-responsive">
                            <?php
                            $query_deposit = "select * from hm2_pending_deposits WHERE status!='processed' AND type='point' ORDER BY id DESC";
                            $tampil_deposit = mysqli_query($koneksi, $query_deposit) or die(mysqli_error());
                            ?>
                            <table id="example" class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>
                                            <center>No. </center>
                                        </th>
                                        <th>
                                            <center>Username</i></center>
                                        </th>
                                        <th>
                                            <center>Name</i></center>
                                        </th>
                                        <th>
                                            <center>Jumlah</i></center>
                                        </th>
                                        <th>
                                            <center>Amount</i></center>
                                        </th>
                                        <th>
                                            <center>Gateway</i></center>
                                        </th>
                                        <th>
                                            <center>Code</i></center>
                                        </th>
                                        <th>
                                            <center>Date</i></center>
                                        </th>
                                        <th>
                                            <center>Bukti Bayar</i></center>
                                        </th>
                                        <th>
                                            <center>Status </center>
                                        </th>
                                    </tr>
                                </thead>
                                <?php
                                $no = 0;
                                while ($data_deposit = mysqli_fetch_array($tampil_deposit)) {
                                    $no++; ?>
                                    <tbody>
                                        <tr>

                                            <td>
                                                <center><?php echo $no; ?>.</center>
                                            </td>
                                            <?php
                                            $statusproses = $data_deposit['status'];
                                            $id_order = $data_deposit['id'];
                                            if ($statusproses == 'pending' or $statusproses == 'new') {
                                                $statusprosesxx = "
<a href=\"admin-update-point-1.php?id=$id_order\" class=\"btn btn-sm btn-warning\"><i class=\"fa fa-arrow-circle-right\"> PROCESS</i></a>
";
                                            } else {
                                                $statusprosesxx = '';
                                            }

                                            $dataphoto = $data_deposit['photo'];
                                            if ($dataphoto != '') {
                                                $photo = "<a href=\"https://tomboatitour.com/backoffice/$dataphoto\" target=\"_blank\"><img src=\"https://tomboatitour.com/backoffice/$dataphoto\" width=\"15%\">";
                                            } else {
                                                $photo = "";
                                            }

                                            $tampil_user_id = $data_deposit['user_id'];
                                            $sqlTampilx = mysqli_query($koneksi, "SELECT * FROM mebers WHERE id='$tampil_user_id' ");
                                            $dataTampilx = mysqli_fetch_assoc($sqlTampilx);
                                            ?>

                                            <td>
                                                <center><?php echo $dataTampilx['userid']; ?></center>
                                            </td>
                                            <td>
                                                <center><?php echo $dataTampilx['name']; ?></center>
                                            </td>

                                            <td align="right">
                                                <center><?php echo number_format($data_deposit['jumlah'], 0, ', ', '.'); ?></center>
                                            </td>
                                            <td align="right">
                                                <center><?php echo number_format($data_deposit['amount'], 0, ', ', '.'); ?></center>
                                            </td>
                                            <td>
                                                <center><?php echo $data_deposit['gateway']; ?></center>
                                            </td>
                                            <td>
                                                <center><?php echo $data_deposit['code']; ?></center>
                                            </td>
                                            <td>
                                                <center><?php echo $data_deposit['date']; ?></center>
                                            </td>
                                            <td>
                                                <center>
                                                    <a data-target='#modalBukti<?= $data_deposit['id'] ?>' class="btn btn-sm btn-light ml-1" type="button" data-toggle="modal"><i class="far fa-file-invoice-dollar fa-2x"></i></a>
                                                </center>
                                            </td>
                                            <td>
                                                <center><?php echo $statusprosesxx; ?></center>
                                            </td>
                                        </tr>
                        </div>
                        <!-- modal detail -->
                        <div class="modal fade" id="modalBukti<?= $data_deposit['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <h4 class="modal-title" id="myModal">Bukti Bayar</h4>
                                    </div>
                                    <div class="modal-body">
                                        <center>
                                            <img src="https://tomboatitour.biz/backoffice/<?php echo $data_deposit['photo']; ?>" width="400px" height="400px">
                                        </center>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary mb-4" data-dismiss="modal"><i class="fa fa-times mr-3"></i>Tutup</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end modal -->
                    <?php
                                }
                    ?>
                    </tbody>
                    </table>
                    </div>
                    <div class="table-responsive">
                    </div>
                </div>
            </div>
        </div>
    </section>






    <div class="col-lg-12">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title"><span class="glyphicon glyphicon-signal"></span> Topup</h3>
            </div>
            <div class="panel-body">

                <div class="table-responsive">
                    <?php
                    $query1 = "SELECT * FROM hm2_pending_deposits WHERE status='pending' AND type='upgrade' ORDER BY id DESC";
                    $tampil = mysqli_query($koneksi, $query1) or die(mysqli_error());
                    $total_baris = mysqli_num_rows($tampil);
                    ?>
                    <table id="example" class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>
                                    <center>No. </center>
                                </th>
                                <th>
                                    <center>Username</i></center>
                                </th>
                                <th>
                                    <center>Name</i></center>
                                </th>
                                <th>
                                    <center>Amount</i></center>
                                </th>
                                <th>
                                    <center>Gateway</i></center>
                                </th>
                                <th>
                                    <center>Code</i></center>
                                </th>
                                <th>
                                    <center>Date</i></center>
                                </th>
                                <th>
                                    <center>Status </center>
                                </th>
                            </tr>
                        </thead>
                        <?php
                        $no = 0;
                        while ($data_deposit = mysqli_fetch_array($tampil)) {
                            $no++;

                            $status = $data_deposit['status'];
                            if ($status == 'pending') {
                                $statusprosesxx = '
<a href="admin-update-deposit-1?id=' . $data_deposit['id'] . '" class="btn btn-sm btn-warning"><i class="fa fa-arrow-circle-right"> PROCESS</i></a>
';
                            } else {
                                $statusprosesxx = '';
                            }


                            $dataphoto = $data_deposit['photo'];
                            if ($dataphoto != '') {
                                $photo = "<a href=\"https://tomboatitour.com/backoffice/$dataphoto\" target=\"_blank\"><img src=\"https://tomboatitour.com/backoffice/$dataphoto\" width=\"15%\">";
                            } else {
                                $photo = "";
                            }

                            $tampil_user_id = $data_deposit['user_id'];
                            $sqlTampilx = mysqli_query($koneksi, "SELECT * FROM mebers WHERE id='$tampil_user_id' ");
                            $dataTampilx = mysqli_fetch_assoc($sqlTampilx);

                        ?>
                            <td>
                                <center><?php echo $no; ?>.</center>
                            </td>
                            <td>
                                <center><?php echo $dataTampilx['userid']; ?></center>
                            </td>
                            <td>
                                <center><?php echo $dataTampilx['name']; ?></center>
                            </td>
                            <td align="right">
                                <center><?php echo number_format($data_deposit['amount'], 0, ', ', '.'); ?></center>
                            </td>
                            <td>
                                <center><?php echo $data_deposit['gateway']; ?></center>
                            </td>
                            <td>
                                <center><?php echo $data_deposit['code']; ?></center>
                            </td>
                            <td>
                                <center><?php echo $data_deposit['date']; ?></center>
                            </td>
                            <td>
                                <center>
                                    <a data-target='#modalBukti<?= $data_deposit['id'] ?>' class="btn btn-sm btn-light ml-1" type="button" data-toggle="modal"><i class="far fa-file-invoice-dollar fa-2x"></i></a>
                                </center>
                            </td>
                            <td>
                                <center><?php echo $statusprosesxx; ?></center>
                            </td>
                            </tr>
                </div>
                <!-- modal detail -->
                <div class="modal fade" id="modalBukti<?= $data_deposit['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <h4 class="modal-title" id="myModal">Bukti Bayar</h4>
                            </div>
                            <div class="modal-body">
                                <center>
                                    <img src="https://tomboatitour.biz/backoffice/<?php echo $data_deposit['photo']; ?>" width="400px" height="400px">
                                </center>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary mb-4" data-dismiss="modal"><i class="fa fa-times mr-3"></i>Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end modal -->
            <?php
                        }
            ?>
            </tbody>
            </table>
            </div>
            <div class="table-responsive">
            </div>
        </div>
    </div>
    </div>
    </section>

    </div>
    <script type="text/javascript">
        function closeModal() {
            $('.modal-backdrop').hide();
            $('body').removeClass('modal-open');
            $('#myModal').modal('hide');
            $('#<%=hfImg.ClientID%>').val("");
        }
        $(function() {
            $(document.body).on('show.bs.modal', function() {
                $(window.document).find('html').addClass('modal-open');
            });
            $(document.body).on('hide.bs.modal', function() {
                $(window.document).find('html').removeClass('modal-open');
            });
        });
    </script>
    <?php include 'footer.php'; ?>
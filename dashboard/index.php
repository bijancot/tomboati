<?php
session_start();

include 'header.php';
?>
<head>
  <title>Dashboard | Tombo Ati</title>
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
$tampil_user=mysqli_query($koneksi, "select * from mebers WHERE paket='USER' order by id desc");
$total_user=mysqli_num_rows($tampil_user);

$tampil_reseller=mysqli_query($koneksi, "select * from mebers WHERE paket='RESELLER' order by id desc");
$total_reseller=mysqli_num_rows($tampil_reseller);

$tampil_mitra=mysqli_query($koneksi, "select * from mebers WHERE paket='MITRA' order by id desc");
$total_mitra=mysqli_num_rows($tampil_mitra);

$tampil_point=mysqli_query($koneksi, "select * from hm2_pending_deposits WHERE type='point' AND status='processed' order by id desc");
$total_point=mysqli_num_rows($tampil_point);


?>
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3>
                                        <?php echo number_format($total_user,0,",","."); ?>
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
                                        <?php echo number_format($total_mitra,0,",",".");?>
                                    </h3>
                                    <p>
                                        Total Mitra
                                    </p>
                                </div>
                                <div class="icon">
                                    <span class="glyphicon glyphicon"></span>
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
                                        <?php echo number_format($total_reseller,0,",",".");?> 
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
                        <?php $tampil3=mysqli_query($koneksi, "select * from mebers order by id desc");
                        $user=mysqli_num_rows($tampil3);
                    ?>
                            <!-- small box -->
                            <div class="small-box bg-red">
                                <div class="inner">
                                    <h3>
                                       <?php echo number_format($total_point,0,",",".");?>
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
                                        IDR <?php echo number_format($sum, 0, ',', '.');?>
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
                                        IDR <?php echo number_format($sum_deposit, 0, ',', '.');?><!--<sup style="font-size: 20px">%</sup>-->
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
                                       IDR <?php echo number_format(ltrim($sum_withdrawal,'-'), 0, ',', '.');?> 
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
                                       IDR <?php echo number_format(ltrim($bonus_sponsor_total + $total_bonus_pasangan,'-'), 0, ',', '.');?>
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
                        <!-- Left col -->










<div class="col-lg-12">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-signal"></span> Deposit History</h3> 
                        </div>
                        <div class="panel-body">

                       <div class="table-responsive">
                    <?php
                    $query_deposit="select * from hm2_pending_deposits WHERE status='pending' ORDER BY id DESC";
                    $tampil_deposit=mysqli_query($koneksi, $query_deposit) or die(mysqli_error());
                    ?>
                  <table id="example" class="table table-hover table-bordered">
                  <thead>
                      <tr>
                        <th><center>No. </center></th>
                        <th><center>Amount</i></center></th>
                        <th><center>Gateway</i></center></th>
                        <th><center>Date</i></center></th>
                        <th><center>Code Trx</i></center></th>
                        <th><center>Process</i></center></th>
                      </tr>
                  </thead>
                     <?php 
                     $no=0;
                     while($data_deposit=mysqli_fetch_array($tampil_deposit))
                    { $no++; ?>
                    <tbody>
                    <tr>

                    <td><left><?php echo $no; ?>.</center></td>
<?php
$status = $data_deposit['status'];
if($status=='pending'){
$statusx="<a href=\"admin-update-deposit-1.php?id=$data_deposit[id]\" class=\"btn btn-sm btn-success\">process <i class=\"fa fa-arrow-circle-right\"></i></a> 
<a href=\"#\" class=\"btn btn-sm btn-warning\">cancel <i class=\"fa fa-arrow-circle-right\"></i></a>"
;} 
else {$statusx="<a href=\"#\" class=\"btn btn-sm btn-warning\">processed <i class=\"fa fa-arrow-circle-right\"></i></a>";}

?>

                    <td align="right">IDR <?php echo number_format($data_deposit['amount'],0,",",".");?></td>
                    <td><left><?php echo $data_deposit['gateway']; ?></center></td>
                    <td><left><?php echo $data_deposit['date']; ?></center></td>
                    <td><left><?php echo $data_deposit['code']; ?></center></td>
                    <td><center><?php echo $statusx; ?></center></td>
                    </tr>
</div>
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

<?php include 'footer.php'; ?>
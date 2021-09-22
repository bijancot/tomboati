<?php
session_start();
include 'header.php';

$hapus = $_GET['hapus'];
$idx = $_GET['code'];
IF ($hapus=='yes'){
$delete = mysqli_query($koneksi, "DELETE FROM hm2_pending_deposits WHERE code='$idx'");
header("Location: admin-all-deposit-pending.php");
			} else {

?>

<head>
  <title>Deposit Pending | Tombo Ati</title>
</head>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                </section>

                <!-- Main content -->
                <section class="content">

                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                    
              </div>
           <!-- /.row -->
                    <!-- Main row -->
                    <div class="row">
<div class="col-lg-12">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-signal"></span> Deposit History</h3> 
                        </div>
                        <div class="panel-body">

                       <div class="table-responsive">
                    <?php
                    $query_deposit="select * from hm2_pending_deposits WHERE status='pending' ORDER BY date DESC";
                    $tampil_deposit=mysqli_query($koneksi, $query_deposit) or die(mysqli_error());
                    ?>
                  <table id="example" class="table table-hover table-bordered">
                  <thead>
                      <tr>
                        <th><center>No. </center></th>
                        <th><center>Username</i></center></th>
                        <th><center>Amount</i></center></th>
                        <th><center>Gateway</i></center></th>
                        <th><center>Code</i></center></th>
                        <th><center>Date</i></center></th>
                        <th><center>Status </center></th>
                        <th><center>Setting </center></th>
                      </tr>
                  </thead>
                     <?php 
                     $no=0;
                     while($data_deposit=mysqli_fetch_array($tampil_deposit))
                    { $no++; 

$statusproses = $data_deposit['status'];
$statusid = $data_deposit['id'];
if ($statusproses == 'pending'){$statusprosesxx='
<a href="admin-update-deposit-1.php?id='.$data_deposit[id].'" class="btn btn-sm btn-SUCCESS">Process <i class="fa fa-arrow-circle-right"></i></a>
<a href="admin-all-deposit-pending.php?hapus=yes&code='.$data_deposit[code].'" class="btn btn-sm btn-warning">delete <i class="fa fa-arrow-circle-right"></i></a>
';} else {$statusprosesxx='';}

?>
                    <tbody>
                    <tr>

                    <td><left><?php echo $no; ?>.</center></td>
<?
$tampil_user_id=$data_deposit['user_id'];
$sqlTampilx = mysqli_query($koneksi, "SELECT * FROM hm2_users WHERE id='$tampil_user_id' ");
$dataTampilx = mysqli_fetch_assoc($sqlTampilx);
?>

                    <td align="left"><? echo $dataTampilx['username'];?></td>
                    <td align="right"><left><?php echo $data_deposit['amount'];?></center></td>
                    <td><left><?php echo $data_deposit['gateway']; ?></center></td>
                    <td><left><?php echo $data_deposit['code']; ?></center></td>
                    <td><left><?php echo $data_deposit['date']; ?></center></td>
                    <td><left><?php echo $data_deposit['status']; ?></center></td>
                    <td><center><?php echo $statusprosesxx; ?></center></td>
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
</section><?php include 'footer.php'; ?>
<?php
;}
?>
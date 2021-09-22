<?php
include 'header.php';
$total_left=$row['totfoot_left'];
$total_right=$row['totfoot_right'];
if 
($total_left > '2' AND $total_right > '2' AND $total_left < '4' AND $total_right < '4') {$reward="Kualifikasi Promo Umrah";} else if 
($total_left > '3' AND $total_right > '3' AND $total_left < '30' AND $total_right < '30') {$reward="Kualifikasi Gratis Umrah";}
?>
<head>
  <title>Bonus Reward | Tombo Ati</title>
</head>
            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Reward
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">

                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                    
              </div>
           <!-- /.row -->
                    <br />
                    <!-- Main row -->
                    <div class="row">
                        <div class="col-lg-12">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-gift"></i> Fast Reward</h3> 
                        </div>
                        <div class="panel-body">
                       <!-- <div class="table-responsive"> -->
                    <?php


$urutan = $_GET['urutan'];

                    $query1="select * from bonus_titik where userid='$row[userid]' and level='1000' order by id $urutan ";
                    $tampil1=mysqli_query($koneksi, "select * from bonus_titik where userid='$row[userid]' and level='1000' ");
                    $dept2=mysqli_num_rows($tampil1);
                    $dept_titik=$dept2*15000;
                    
                    if(isset($_POST['qcari'])){
	                $qcari=$_POST['qcari'];
	                $query1="SELECT * FROM  bank 
	                where nama_bank like '%$qcari%'
	                or nasabah like '%$qcari%'  ";
                    }
                    $tampil=mysqli_query($koneksi, $query1) or die(mysqli_error());
                    ?>
                  <table id="example" class="table table-hover table-bordered">
                  <thead>
                      <tr>
                        <th><center>Fase </center></th>
                        <th><center>Reward </center></th>
                       <th><center>Posisi </center></th>
                       <th><center>Status </center></th>
                      </tr>
                  </thead>

                    <tbody>
<?
$posisi_l = 500-$row['totfoot_left'];
$posisi_r = 500-$row['totfoot_right'];

$posisi_l2 = 1000-$row['totfoot_left'];
$posisi_r2 = 1000-$row['totfoot_right'];
?>

                    <tr>
                    <td><center>#1</left></td>
                    <td align='left'>500L | 500R Mitsubishi Expander Senilai Rp. 250.000.000 (duaratus juta rupiah)</td>
                    <td><center><a href="#" class="btn btn-sm btn-warning"><?php echo "$row[totfoot_left]"; ?> L | <?php echo "$row[totfoot_right]"; ?> R</span></a></center></td>
                    <td><center><a href="#" class="btn btn-sm btn-warning">-<?php echo "$posisi_l"; ?> L | -<?php echo "$posisi_r"; ?> R</span></a></center></td>
                    <td><center><a href="ticket-add-claim-1.php" class="btn btn-sm btn-warning">Claim</span></a></center></td>
                    </tr>
                    <tr>
                    <td><center>#2</left></td>
                    <td align='left'>1.000L | 1.000R Mitsubishi Pajero Senilai Rp. 500.000.000 (limaratus juta rupiah)</td>
                    <td><center><a href="#" class="btn btn-sm btn-success"><?php echo "$row[totfoot_left]"; ?> L | <?php echo "$row[totfoot_right]"; ?> R</span></a></center></td>
                    <td><center><a href="#" class="btn btn-sm btn-success">-<?php echo "$posisi_l2"; ?> L | -<?php echo "$posisi_r2"; ?> R</span></a></center></td>
                    <td><center><a href="ticket-add-claim-2.php" class="btn btn-sm btn-success">Claim</span></a></center></td>
                    </tr>


</div>
                   </tbody>
                   </table>
                  <!-- </div>-->
              </div> 
              </div>

            </div><!-- col-lg-12--> 
<?php include 'footer.php'; ?>
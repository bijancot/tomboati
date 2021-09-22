<?php
session_start();
include 'header.php';
?>
<head>
  <title>Bonus Pasangan | Tombo Ati</title>
</head>
            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Bonus
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
                        <h3 class="panel-title"><i class="fa fa-usd"></i> Bonus Pasangan</h3> 
                        </div>
                        <div class="panel-body">
                       <!-- <div class="table-responsive"> -->
                    <?php
$urutan = $_GET['urutan'];
                    $query1="select * from bonus_pasangan where userid='$row[userid]' order by id $urutan ";
                    $tampil1=mysqli_query($koneksi, "select * from bonus_pasangan where userid='$row[userid]' ");
                    $dept2=mysqli_num_rows($tampil1);
                    $query1="select * from bonus_pasangan where userid='$row[userid]' order by id $urutan ";

$querysum = mysqli_query($koneksi, "SELECT SUM(bonus) AS pasangan FROM bonus_pasangan where userid='$row[userid]' ");
$querysum2 = mysqli_fetch_array($querysum); 
$sum_pasangan = $querysum2[pasangan];

        $query_total = mysqli_query($koneksi,"SELECT SUM(bonus) as 'bonus_total' FROM bonus_pasangan WHERE userid='$row[userid]' ");
        $query_total2=mysqli_fetch_array($query_total);
        $bonus_pasangan_total=$query_total2['bonus_total'];


                    $dept_sponsor=$dept2*50000;
                   
                    $tampil=mysqli_query($koneksi, $query1) or die(mysqli_error());
                    ?>
                  <table id="example" class="table table-hover table-bordered">
                  <thead>
                      <tr>
                        <th><center>No. </center></th>
                        <th><center>Tanggal </i></center></th>
                        <th><center>Pasangan </i></center></th>
                        <th><center>Bonus </center></th>
                        <th><center>Nilai Bonus </center></th>
                        <th><center>Nilai Bonus </center></th>
                        <th><center>Today L </center></th>
                        <th><center>Today R </center></th>
                        <th><center>Status </center></th>
                      </tr>
                  </thead>
                     <?php 
                     $no=0;
                     while($data=mysqli_fetch_array($tampil))
                    { $no++; 

$pasanganx = $data['pasangan'];
$bonus_pasangan = $data['bonus'];
$nilai_bonus = $data['nilai_bonus'];
?>
                    <tbody>
                    <tr>
                    <td><left><?php echo $no; ?>.</left></td>
                    <td><center><?php echo $data['timer'];?></center></td>
                    <td><center><?php echo $data['pasangan'];?></center></td>
                    <td align='right'><?php echo number_format($bonus_pasangan,0,",",".");?></td>
                    <td align='right'>Rp. <?php echo number_format($nilai_bonus,0,",",".");?></td>
                    <td align='right'>Rp. <?php echo number_format($bonus_pasangan + $promo_pasangan,0,",",".");?></td>
                    <td><center><?php echo $data['todayfl'];?></center></td>
                    <td><center><?php echo $data['todayfr'];?></center></td>


<?
                            if ($data['paid'] == '0'){
								$statusnya='<span class="label label-warning">On Proces</span>';
							}
                            else if ($data['paid'] == '1' ){
								$statusnya='<span class="label label-success">Processed</span>';
							}
?>


                    <td><center><?php echo $statusnya; ?></center></td>
                    </tr>
</div>
                 <?php   
              } 
              ?>
                   </tbody>
                   </table>
                  <!-- </div>-->
                <div class="text-right"><td align='right'><font color="blue" size="4">Total Bonus Pairing = Rp. <?php echo number_format($bonus_pasangan_total,0,",",".");?></font></td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <a href="bonus-pasangan.php?urutan=desc" class="btn btn-sm btn-primary">DESC  <i class="glyphicon glyphicon-download"></i></a>
                  <a href="bonus-pasangan.php?urutan=asc" class="btn btn-sm btn-primary">ASC  <i class="glyphicon glyphicon-upload"></i></a></td>
              
                </div>
              </div> 
              </div>
            </div><!-- col-lg-12--> 
<?php include 'footer.php'; ?>
<?php
session_start();
include 'header.php';
?>
<head>
  <title> Bonus Leadership| Tombo Ati</title>
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
                        <h3 class="panel-title"><i class="fa fa-usd"></i> Bonus Leadership</h3> 
                        </div>
                        <div class="panel-body">
                       <!-- <div class="table-responsive"> -->
                    <?php
$urutan = $_GET['urutan'];
                    $query1="select * from bonus_titik where userid='$row[userid]' order by id $urutan ";
                    $tampil1=mysqli_query($koneksi, "select * from bonus_leadership where userid='$row[userid]' ");
                    $dept2=mysqli_num_rows($tampil1);
                    $dept_sponsor=$dept2*100000;
                   
        $query_total = mysqli_query($koneksi,"SELECT SUM(bonus) as 'bonus_total' FROM bonus_titik WHERE userid='$row[userid]' ");
        $query_total2=mysqli_fetch_array($query_total);
        $bonus_sponsor_total=$query_total2['bonus_total'];




                    $tampil=mysqli_query($koneksi, $query1) or die(mysqli_error());
                    ?>
                  <table id="example" class="table table-hover table-bordered">
                  <thead>
                      <tr>
                        <th><center>No. </center></th>
                        <th><center>Tanggal </i></center></th>
                        <th><center>Bonus From</center></th>
                        <th><center>Level</center></th>
                        <th><center>Name</center></th>
                        <th><center>Nilai Bonus </center></th>
                        <th><center>Status </center></th>
                      </tr>
                  </thead>
                     <?php 
                     $no=0;
                     while($data=mysqli_fetch_array($tampil))
                    { $no++; 

$tampil_nama=mysqli_query($koneksi, "select * from mebers where userid='$data[bonusfrom]' ");
$data_nama=mysqli_fetch_array($tampil_nama);
?>
                    <tbody>
                    <tr>
                    <td><left><?php echo $no; ?>.</left></td>
                    <td><center><?php echo $data['timer'];?></center></td>
                    <td><left><?php echo $data['bonusfrom'];?></left></td>
                    <td><left><?php echo $data['level'];?></left></td>
                    <td><left><?php echo $data_nama['name'];?></left></td>
                    <td align='right'>Rp. <?php echo number_format($data['bonus'],0,",",".");?></td>


<?
                            if ($data['paid'] == '0'){
								$statusnya='<span class="label label-warning">On Proces</span> <a href="bonus-send.php?id='.$data['timer'].'" title="topup bonus ke wallet balance"><span class="label label-success">Send to Wallet</span></a>';
								
							}
                            else if ($data['paid'] == '1' ){
								$statusnya='<span class="label label-success">Processed</span>';
							}
?>


                    <td><center><?php echo $statusnya; ?> </center></td>
                    </tr>
</div>
                 <?php   
              } 
              ?>
                   </tbody>
                   </table>
                  <!-- </div>-->
                <div class="text-right"><td align='right'><font color="blue" size="4">Total Bonus Leadership = Rp. <?php echo number_format($bonus_sponsor_total,0,",",".");?></font></td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <a href="bonus-leadership.php?urutan=desc" class="btn btn-sm btn-primary">DESC  <i class="glyphicon glyphicon-download"></i></a>
                  <a href="bonus-leadership.php?urutan=asc" class="btn btn-sm btn-primary">ASC  <i class="glyphicon glyphicon-upload"></i></a></td>
              
                </div>
              </div> 
              </div>
            </div><!-- col-lg-12--> 
<?php include 'footer.php'; ?>
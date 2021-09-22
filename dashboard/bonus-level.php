<?php
session_start();
include 'header.php';
?>
<head>
  <title>Bonus Level | Tombo Ati </title>
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
                        <h3 class="panel-title"><i class="fa fa-usd"></i> Bonus Pasangan Level 1</h3> 
                        </div>
                        <div class="panel-body">
                       <!-- <div class="table-responsive"> -->
                    <?php

$sql_level_1 = mysqli_query($koneksi, "SELECT * FROM mebers WHERE userid='$row[userid]' ");
$level = mysqli_fetch_assoc($sql_level_1);
$level_1_kiri=$level[foot1];
$level_1_kanan=$level[foot2];

$sql_omset_level_1_l = mysqli_query($koneksi, "SELECT * FROM mebers WHERE userid='$level_1_kiri' ");
$level_omset_l = mysqli_fetch_assoc($sql_omset_level_1_l);
$level_omset_1_l_kiri=$level_omset_l[omset_l];
$level_omset_1_l_kanan=$level_omset_l[omset_r];

$sql_omset_level_1_r = mysqli_query($koneksi, "SELECT * FROM mebers WHERE userid='$level_1_kanan' ");
$level_omset_r = mysqli_fetch_assoc($sql_omset_level_1_r);
$level_omset_1_r_kiri=$level_omset_r[omset_l];
$level_omset_1_r_kanan=$level_omset_r[omset_r];


                    ?>
                  <table id="example" class="table table-hover table-bordered">
                  <thead>
                      <tr>
                        <td><left><b>Posisi</center></td>
                        <td><center><b>Left </center></td>
                        <td><center><b>Right </center></td>
                      </tr>
                  </thead>
                    <tbody>
                    <tr>
                    <td><left><b>Username</center></td>
                    <td><center><?php echo $level_1_kiri;?></center></td>
                    <td><center><?php echo $level_1_kanan;?></center></td>
                    </tr>

                    <tr>
                    <td align='left'><b>Today Omset</td>
                    <td align='center'><?php echo number_format($level_omset_1_l_kiri+$level_omset_1_l_kanan,0,",",".");?></td>
                    <td align='center'><?php echo number_format($level_omset_1_r_kiri+$level_omset_1_r_kanan,0,",",".");?></td>
                    </tr>
                    <tr>
                    <td align='left'><b>Total Omset</td>
                    <td align='center'><?php echo number_format($level_omset_1_l_kiri+$level_omset_1_l_kanan,0,",",".");?></td>
                    <td align='center'><?php echo number_format($level_omset_1_r_kiri+$level_omset_1_r_kanan,0,",",".");?></td>
                    </tr>
</div>
                   </tbody>
                   </table>
                  <!-- </div>-->

              </div> 
              </div>
              </div>
<!-- col-lg-12--> 


                        <div class="col-lg-12">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-usd"></i> Bonus Pasangan Level 2</h3> 
                        </div>
                        <div class="panel-body">
                       <!-- <div class="table-responsive"> -->
                    <?php

$sql_level_2_1 = mysqli_query($koneksi, "SELECT * FROM mebers WHERE userid='$level_1_kiri' ");
$level2 = mysqli_fetch_assoc($sql_level_2_1);
$level2_1_kiri=$level2[foot1];
$level2_1_kanan=$level2[foot2];


$sql_level_2_2 = mysqli_query($koneksi, "SELECT * FROM mebers WHERE userid='$level_1_kanan' ");
$level2b = mysqli_fetch_assoc($sql_level_2_2);
$level2_2_kiri=$level2b[foot1];
$level2_2_kanan=$level2b[foot2];


$sql_omset_level_2_l = mysqli_query($koneksi, "SELECT * FROM mebers WHERE userid='$level2_1_kiri' ");
$level_omset_2l = mysqli_fetch_assoc($sql_omset_level_2_l);
$level_omset_2_l_kiri=$level_omset_2l[omset_l];
$level_omset_2_l_kanan=$level_omset_2l[omset_r];

$sql_omset_level_2_r = mysqli_query($koneksi, "SELECT * FROM mebers WHERE userid='$level2_1_kanan' ");
$level_omset_2r = mysqli_fetch_assoc($sql_omset_level_2_r);
$level_omset_2_r_kiri=$level_omset_2r[omset_l];
$level_omset_2_r_kanan=$level_omset_2r[omset_r];



                    ?>
                  <table id="example" class="table table-hover table-bordered">
                  <thead>
                      <tr>
                        <td><left><b>Posisi</center></td>
                        <td><center><b>Left </center></td>
                        <td><center><b>Right </center></td>
                      </tr>
                  </thead>
                    <tbody>
                    <tr>
                    <td><left><b>Username</center></td>
                    <td><center><?php echo $level2_1_kiri;?> [<?php echo $level_omset_2_l_kiri;?>]</center></td>
                    <td><center><?php echo $level2_2_kiri;?> [<?php echo $level_omset_2_l_kiri;?>]</center></td>
                    </tr>
                    <tr>
                    <td><left><b> </center></td>
                    <td><center><?php echo $level2_1_kanan;?> [<?php echo $level_omset_2_r_kanan;?>]</center></td>
                    <td><center><?php echo $level2_2_kanan;?> [<?php echo $level_omset_2_r_kanan;?>]</center></td>
                    </tr>

                    <tr>
                    <td align='left'><b>Today Omset</td>
                    <td align='center'><?php echo number_format($level_omset_2_l_kiri,0,",",".");?></td>
                    <td align='center'><?php echo number_format($level_omset_2_r_kanan,0,",",".");?></td>
                    </tr>
                    <tr>
                    <td align='left'><b>Total Omset</td>
                    <td align='center'><?php echo number_format($level_omset_2_l_kiri,0,",",".");?></td>
                    <td align='center'><?php echo number_format($level_omset_2_r_kanan,0,",",".");?></td>
                    </tr>
</div>
                   </tbody>
                   </table>
                  <!-- </div>-->

              </div> 
              </div>
              </div>

                        <div class="col-lg-12">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-usd"></i> Bonus Pasangan Level 3</h3> 
                        </div>
                        <div class="panel-body">
                       <!-- <div class="table-responsive"> -->
                    <?php

$sql_level_3_1 = mysqli_query($koneksi, "SELECT * FROM mebers WHERE userid='$level2_1_kiri' ");
$level3a = mysqli_fetch_assoc($sql_level_3_1);
$level3_1_kiri=$level3a[foot1];
$level3_1_kanan=$level3a[foot2];

$sql_level_3_2 = mysqli_query($koneksi, "SELECT * FROM mebers WHERE userid='$level2_1_kanan' ");
$level3b = mysqli_fetch_assoc($sql_level_3_2);
$level3_2_kiri=$level3b[foot1];
$level3_2_kanan=$level3b[foot2];

$sql_level_3_3 = mysqli_query($koneksi, "SELECT * FROM mebers WHERE userid='$level2_2_kiri' ");
$level3c = mysqli_fetch_assoc($sql_level_3_3);
$level3_3_kiri=$level3c[foot1];
$level3_3_kanan=$level3c[foot2];

$sql_level_3_4 = mysqli_query($koneksi, "SELECT * FROM mebers WHERE userid='$level2_2_kanan' ");
$level3d = mysqli_fetch_assoc($sql_level_3_4);
$level3_4_kiri=$level3d[foot1];
$level3_4_kanan=$level3d[foot2];


                    ?>
                  <table id="example" class="table table-hover table-bordered">
                  <thead>
                      <tr>
                        <td><left><b>Posisi</center></td>
                        <td><center><b>Left </center></td>
                        <td><center><b>Right </center></td>
                      </tr>
                  </thead>
                    <tbody>
                    <tr>
                    <td><left><b>Username</center></td>
                    <td><center><?php echo $level3_1_kiri;?> [<?php echo $level_omset_2_l_kiri;?>]</center></td>
                    <td><center><?php echo $level3_3_kiri;?> [<?php echo $level_omset_2_l_kanan;?>]</center></td>
                    </tr>
                    <tr>
                    <td><left><b> </center></td>
                    <td><center><?php echo $level3_1_kanan;?> [<?php echo $level_omset_2_l_kiri;?>]</center></td>
                    <td><center><?php echo $level3_3_kanan;?> [<?php echo $level_omset_2_l_kiri;?>]</center></td>
                    </tr>
                    <tr>
                    <td><left><b> </center></td>
                    <td><center><?php echo $level3_2_kiri;?> [<?php echo $level_omset_2_l_kiri;?>]</center></td>
                    <td><center><?php echo $level3_4_kiri;?> [<?php echo $level_omset_2_l_kiri;?>]</center></td>
                    </tr>
                    <tr>
                    <td><left><b> </center></td>
                    <td><center><?php echo $level3_2_kanan;?> [<?php echo $level_omset_2_l_kiri;?>]</center></td>
                    <td><center><?php echo $level3_4_kanan;?> [<?php echo $level_omset_2_l_kiri;?>]</center></td>
                    </tr>

                    <tr>
                    <td align='left'><b>Today Omset</td>
                    <td align='center'><?php echo number_format($level_omset_2_l_kiri,0,",",".");?></td>
                    <td align='center'><?php echo number_format($level_omset_2_r_kanan,0,",",".");?></td>
                    </tr>
                    <tr>
                    <td align='left'><b>Total Omset</td>
                    <td align='center'><?php echo number_format($level_omset_2_l_kiri,0,",",".");?></td>
                    <td align='center'><?php echo number_format($level_omset_2_r_kanan,0,",",".");?></td>
                    </tr>


</div>
                   </tbody>
                   </table>
                  <!-- </div>-->

              </div> 
              </div>
<!-- col-lg-12--> 
<?php include 'footer.php'; ?>
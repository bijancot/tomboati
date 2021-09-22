<?php
session_start();
include 'header.php';
?>


                        </div>
                    </div>
                </div>
                <div class="main-content">
                    <div class="container-fluid">
                        <div class="page-header">
                            <div class="row align-items-end">
                                <div class="col-lg-8">
                                    <div class="page-header-title">
                                        <i class="ik ik-credit-card bg-blue"></i>
                                        <div class="d-inline">
                                            <h5></h5>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="col-lg-4">
                                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a href="index"><i class="ik ik-home"></i></a>
                                            </li>
                                       </ol>
                                    </nav>
                                </div> -->
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header d-block">
                                        <h3>Hadiah Wisata</h3>
                                    </div>
                                    <div class="card-body p-0 table-border-style">
                                        <div class="table-responsive">
                    <?php
$urutan = $_GET['urutan'];
                    $query1="select * from bonus_titik where userid='$row[userid]' AND level<='6' order by id $urutan ";
                    $tampil1=mysqli_query($koneksi, "select * from bonus_titik WHERE userid='$row[userid]' AND level<='6' ");
                    $dept2=mysqli_num_rows($tampil1);
                    $dept_sponsor=$dept2*100000;
                   
        $query_total = mysqli_query($koneksi,"SELECT SUM(bonus) as 'bonus_total' FROM bonus_titik WHERE userid='$row[userid]' AND level<='6' ");
        $query_total2=mysqli_fetch_array($query_total);
        $bonus_titik_total=$query_total2['bonus_total'];

                    $tampil=mysqli_query($koneksi, $query1) or die(mysqli_error());
                    ?>

                                            <table class="table">
                                                <thead>
                                                    <tr>
                        <th><center>No. </center></th>
                        <th><center>Tanggal </i></center></th>
                        <th><center>Username</center></th>
                        <th><center>Nama Jamaah</center></th>
                        <th><center>Membership </center></th>
                        <th><center>Level </center></th>
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
                    <td><left><?php echo $data_nama['name'];?></left></td>
                    <td align='right'><?php echo $data_nama['paket'];?></td>
                    <td align='right'><?php echo $data['level'];?></td>


<?php
                            if ($data['paid'] == '0'){
								$statusnya='<a href="#" class="btn btn-sm btn-warning">On Process</a>';
								
							}
                            else if ($data['paid'] == '1' ){
								$statusnya='<a href="#" class="btn btn-sm btn-success">Process</a>';
							}
?>

                    <td><center><?php echo $statusnya;?></center></td>

                                                    </tr>
                 <?php   
              } 
              ?>

                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>



                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
<?php
include 'footer.php';
?>
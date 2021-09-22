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
                                            <h5>Fee & Free</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a href="index"><i class="ik ik-home"></i></a>
                                            </li>
                                       </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header d-block">
                                        <h3>Fee Akhir</h3>
                                    </div>
                                    <div class="card-body p-0 table-border-style">
                                        <div class="table-responsive">
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

                                            <table class="table">
                                                <thead>
                                                    <tr>
                        <th><center>No. </center></th>
                        <th><center>Tanggal </i></center></th>
                        <th><center>Username</center></th>
                        <th><center>Nama Jamaah</center></th>
                        <th><center>Peserta</center></th>
                        <th><center>Status </center></th>
                        <th><center>Fee Awal </center></th>
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
                    <td><left><?php echo $data['bonusfrom'];?></left></td>
                    <td><left><?php echo $data_nama['name'];?></left></td>
                    <td><left><?php echo $data['status'];?></left></td>
                    <td align='right'>Rp. <?php echo number_format($data['bonus'],0,",",".");?></td>


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
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
                    $query1="select * from mebers WHERE sponsor='$row[userid]' AND paket='RESELLER' order by id $urutan ";
                    $dept2=mysqli_num_rows($query1);
                    $dept_sponsor=$dept2*1100000;
                    $tampil=mysqli_query($koneksi, $query1) or die(mysqli_error());
                    ?>

                                            <table class="table">
                                                <thead>
                                                    <tr>
                        <th><center>No. </center></th>
                        <th><center>Tanggal </i></center></th>
                        <th><center>Username</center></th>
                        <th><center>Nama Jamaah</center></th>
                        <th><center>Klaim </center></th>
                        <th><center>Fee Akhir </center></th>
                        <th><center>Status </center></th>

                                                    </tr>
                                                </thead>
                     <?php 
                     $no=0;
                     while($data=mysqli_fetch_array($tampil))
                    { $no++; 
                        
                        if ($data['klaim'] == '0'){
                            $status_klaim='<a href="#" class="btn btn-sm btn-warning">FREE</a> <a href="#" class="btn btn-sm btn-success">FEE</a>';
                            
                        }
                        else if ($data['klaim'] == '1' ){
                            $status_klaim='<a href="#" class="btn btn-sm btn-success">FEE</a>';
                        }
?>

                                                <tbody>
                                                    <tr>
                    <td><left><?php echo $no; ?>.</left></td>
                    <td><center><?php echo $data['timer'];?></center></td>
                    <td><left><?php echo $data['userid'];?></left></td>
                    <td><left><?php echo $data['name'];?></left></td>
                    <td><left><?php echo $status_klaim;?></left></td>
                    <td align='right'>Rp. <?php echo number_format(1100000,0,",",".");?></td>


<?php
                            if ($data['status'] == 'ON'){
								$statusnya='<a href="#" class="btn btn-sm btn-warning">On Process</a>';
								
							}
                            else if ($data['status'] == 'OFF' ){
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
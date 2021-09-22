<?php
session_start();
include 'header.php';
?>
                        </div>
                    </div>
                </div>


                <div class="main-content">
                    <div class="container-fluid">
                        <div class="row clearfix">


                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="widget">
                                    <div class="widget-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="state">
                                                <h6>Fee Awal</h6>

                                                <h2><?php echo number_format($bonus_sponsor_total,0,",","."); ?></h2>
                                            </div>
                                            <div class="icon">
                                                <i class="ik ik-award"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="62" aria-valuemin="0" aria-valuemax="100" style="width: 62%;"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="widget">
                                    <div class="widget-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="state">
                                                <h6>Fee Akhir</h6>
                                                <h2><?php echo number_format($total_ref_reseller*1100000,0,",","."); ?></h2>
                                            </div>
                                            <div class="icon">
                                                <i class="ik ik-thumbs-up"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100" style="width: 78%;"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="widget">
                                    <div class="widget-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="state">
                                                <h6>Saldo Fee</h6>
                                                <h2><?php echo number_format($sum,0,",",".");?></h2>
                                            </div>
                                            <div class="icon">
                                                <i class="ik ik-calendar"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="31" aria-valuemin="0" aria-valuemax="100" style="width: 31%;"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="widget">
                                    <div class="widget-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="state">
                                                <h6>Total Fee</h6>
                                                <h2><?php echo number_format($bonus_sponsor_total+$bonus_titik_total,0,",",".");?></h2>
                                            </div>
                                            <div class="icon">
                                                <i class="ik ik-message-square"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%;"></div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="widget">
                                    <div class="widget-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="state">
                                                <h6>Hak Register</h6>
                                                <h2><?php echo $sum_register;?></h2>
                                            </div>
                                            <div class="icon">
                                                <i class="ik ik-award"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="62" aria-valuemin="0" aria-valuemax="100" style="width: 62%;"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="widget">
                                    <div class="widget-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="state">
                                                <h6>Hadiah Poin</h6>
                                                <h2><?php echo round($bonus_point_total,2);?></h2>
                                            </div>
                                            <div class="icon">
                                                <i class="ik ik-thumbs-up"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100" style="width: 78%;"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="widget">
                                    <div class="widget-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="state">
                                                <h6>Withdrawal</h6>
                                                <h2><?php echo number_format(ltrim($wd_total,'-'), 0, ',', '.');?></h2>
                                            </div>
                                            <div class="icon">
                                                <i class="ik ik-calendar"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="31" aria-valuemin="0" aria-valuemax="100" style="width: 31%;"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="widget">
                                    <div class="widget-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="state">
                                                <h6>Jumlah Jamaah</h6>
                                                <h2><?php echo "$total_ref"; ?></h2>
                                            </div>
                                            <div class="icon">
                                                <i class="ik ik-message-square"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%;"></div>
                                    </div>
                                </div>
                            </div>






                        <div class="card">
                            <div class="card-body">
                    <?php
                    $query_deposit="select * from hm2_pending_deposits WHERE user_id=$row[id] AND type='point' AND status='new' ORDER BY id DESC";
                    $tampil_deposit=mysqli_query($koneksi, $query_deposit) or die(mysqli_error());
                    ?>

                                <table id="advanced_table" class="table">ORDER HAK REGISTER
                                    <thead>
                                        <tr>
                        <th><center>Tanggal</i></center></th>
                        <th><center>Nominal</i></center></th>
                        <th><center>Gateway</i></center></th>
                        <th><center>Code Trx</i></center></th>
                                        </tr>
                                    </thead>
                     <?php 
                     $no=0;
                     while($data_deposit=mysqli_fetch_array($tampil_deposit))
                    { $no++; ?>

                                    <tbody>
                                        <tr>
<?php
$status = $data_deposit['status'];
if($status=='new'){
$statusx="<a href=\"point-process.php?code=$data_deposit[code]\" class=\"btn btn-sm btn-success\">process <i class=\"fa fa-arrow-circle-right\"></i></a> 
<a href=\"point-delete.php?hapus=yes&code=$data_deposit[code]\" class=\"btn btn-sm btn-warning\">cancel <i class=\"fa fa-arrow-circle-right\"></i></a>"
;} 
if($status=='processed'){
$statusx="<a href=\"#\" class=\"btn btn-sm btn-warning\">processed <i class=\"fa fa-arrow-circle-right\"></i></a>";}
if($status=='on process'){
$statusx="<a href=\"#\" class=\"btn btn-sm btn-info\">pending <i class=\"fa fa-arrow-circle-right\"></i></a>";}

?>

                    <td><left><?php echo $data_deposit['date']; ?></center></td>
                    <td align="right"> <?php echo number_format($data_deposit['amount'],0,",",".");?></td>
                    <td><left><?php echo $data_deposit['gateway']; ?></center></td>
                    <td><left><?php echo $data_deposit['code']; ?></center></td>
                    <td><center><?php echo $statusx; ?></center></td>
                                        </tr>

                 <?php   
              } 
              ?></div>


                                    </tbody>
                                </table>
                            </div>
                        </div>











                        <div class="card">
                            <div class="card-body">
                    <?php
                    $query_deposit="select * from hm2_pending_deposits WHERE user_id=$row[id] AND type='upgrade' AND status='processed' ORDER BY id DESC";
                    $tampil_deposit=mysqli_query($koneksi, $query_deposit) or die(mysqli_error());
                    ?>

                                <table id="advanced_table" class="table">
                                    <thead>
                                        <tr>
                        <th><center>Amount</i></center></th>
                        <th><center>Gateway</i></center></th>
                        <th><center>Date</i></center></th>
                        <th><center>Code Trx</i></center></th>
                                        </tr>
                                    </thead>
                     <?php 
                     $no=0;
                     while($data_deposit=mysqli_fetch_array($tampil_deposit))
                    { $no++; ?>

                                    <tbody>
                                        <tr>
<?php
$status = $data_deposit['status'];
if($status=='new'){
$statusx="<a href=\"point-process.php?code=$data_deposit[code]\" class=\"btn btn-sm btn-success\">process <i class=\"fa fa-arrow-circle-right\"></i></a> 
<a href=\"point-delete.php?hapus=yes&code=$data_deposit[code]\" class=\"btn btn-sm btn-warning\">cancel <i class=\"fa fa-arrow-circle-right\"></i></a>"
;} 
if($status=='processed'){
$statusx="<a href=\"#\" class=\"btn btn-sm btn-warning\">processed <i class=\"fa fa-arrow-circle-right\"></i></a>";}
if($status=='on process'){
$statusx="<a href=\"#\" class=\"btn btn-sm btn-info\">pending <i class=\"fa fa-arrow-circle-right\"></i></a>";}

?>


                    <td><left><?php echo $data_deposit['date']; ?></center></td>
                    <td align="right"> <?php echo number_format($data_deposit['amount'],0,",",".");?></td>
                    <td><left><?php echo $data_deposit['gateway']; ?></center></td>
                    <td><left><?php echo $data_deposit['code']; ?></center></td>
                    <td><center><?php echo $statusx; ?></center></td>
                                        </tr>

                 <?php   
              } 
              ?></div>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>







            </div>
        </div>
        
        
        
<?php
include 'footer.php';
?>
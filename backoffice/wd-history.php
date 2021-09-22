<?php
session_start();
include 'header.php';
            $query = mysqli_query($koneksi, "SELECT * FROM product_order WHERE userid='$row[userid]' ");
            $data  = mysqli_fetch_array($query);

                    $kodeku = $_SESSION['id'];
                    $query1="select * from product_order WHERE userid='$row[userid]' ";
                    $hasil=mysqli_query($koneksi, $query1) or die(mysqli_error());

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
                                            <h5>Withdrawal</h5>
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
                                        <h3>On Process</h3>
                                    </div>
                                    <div class="card-body p-0 table-border-style">
                                        <div class="table-responsive">
                    <?php
                    $query1="select * from hm2_history where user_id='$row[id]' and type='withdraw_pending' ";
                    $tampil=mysqli_query($koneksi, $query1) or die(mysqli_error());
                    ?>

                                            <table class="table">
                                                <thead>
                                                    <tr>
                        <th><center>No. </center></th>
                        <th><center>Amount </i></center></th>
                        <th><center>Description </center></th>
                        <th><center>Date </center></th>
                                                    </tr>
                                                </thead>
                     <?php 
                     $no=0;
                     while($data=mysqli_fetch_array($tampil))
                    { $no++; ?>

                                                <tbody>
                                                    <tr>
                    <td><left><?php echo $no; ?>.</center></td>
                    <td align="right"><?php echo number_format(ltrim($data['amount'],'-'),0,",",".");?></td>
                    <td><left><?php echo $data['description'];?></center></td>
                    <td><left><?php echo $data['date']; ?></center></td>

<?php
                            if ($data['paid'] == '0'){
								$statusnya='<span class="btn btn-sm btn-info">On Proces</span>';
								
							}
                            else if ($data['paid'] == '1' ){
								$statusnya='<span class="btn btn-sm btn-success">Processed</span>';
							}
?>


                    <td><center><?php echo $statusnya; ?> </center></td>
                                                    </tr>
                 <?php   
              } 
              ?>

                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>









                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header d-block">
                                        <h3>Processed</h3>
                                    </div>
                                    <div class="card-body p-0 table-border-style">
                                        <div class="table-responsive">
                    <?php
                    $query1="select * from hm2_history where user_id='$row[id]' and type='withdrawal' ";
                    $tampil=mysqli_query($koneksi, $query1) or die(mysqli_error());
                    ?>

                                            <table class="table">
                                                <thead>
                                                    <tr>
                        <th><center>No. </center></th>
                        <th><center>Amount </i></center></th>
                        <th><center>Description </center></th>
                        <th><center>Date </center></th>
                                                    </tr>
                                                </thead>
                     <?php 
                     $no=0;
                     while($data=mysqli_fetch_array($tampil))
                    { $no++; ?>

                                                <tbody>
                                                    <tr>
                    <td><left><?php echo $no; ?>.</center></td>
                    <td align="right"><?php echo number_format(ltrim($data['amount'],'-'),0,",",".");?></td>
                    <td><left><?php echo $data['description'];?></center></td>
                    <td><left><?php echo $data['date']; ?></center></td>

<?php
                            if ($data['paid'] == '0'){
								$statusnya='<span class="btn btn-sm btn-info">On Proces</span>';
								
							}
                            else if ($data['paid'] == '1' ){
								$statusnya='<span class="btn btn-sm btn-success">Processed</span>';
							}
?>


                    <td><center><?php echo $statusnya; ?> </center></td>
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
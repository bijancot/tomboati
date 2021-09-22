<?php
include 'header.php';
?>
<head>
  <title>Pin Order History | Tombo Ati</title>
</head>
            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->

                <!-- Main content -->
                <section class="content">

           <!-- /.row -->
                    <br />
                    <!-- Main row -->
                    <?php
            $query = mysqli_query($koneksi, "SELECT * FROM pin_request WHERE userid='$row[userid]' ");
            $data  = mysqli_fetch_array($query);
            ?>



<!-- col-lg-12--> 



<section class="col-lg-12 connectedSortable">                            




                            <div class="panel panel-success">
                        <div class="panel-heading">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-book"></span> History Order Pin</h3> 
                        </div>
                        <div class="panel-body">
                       <div class="table-responsive">
											 <br>
                       
                    <?php
                    $kodeku = $_SESSION['id'];
                    $query1="select * from pin_request WHERE userid='$row[userid]' ORDER BY id DESC";
                    $hasil=mysqli_query($koneksi, $query1) or die(mysqli_error());
                    ?>

                  <table id="example" class="table table-hover table-bordered">
                  <thead>
                      <tr>
                        <th><center>No. </center></th>
                        <th><center>Jumlah Pin</center></th>
                        <th><center>Package</center></th>
                        <th><center>Amount</center></th>
                        <th><center>Date</center></th>
                        <th><center>Code </center></th>
                        <th><center>Gateway </center></th>
                        <th><center>Status </center></th>
                      </tr>
                  </thead>
                     <?php 
$no=0;
                     while($data=mysqli_fetch_array($hasil))
                    {  $no++;

$dataid=$data['id'];

if ($data['status']==0){
$status='<a href="#" class="btn btn-sm btn-warning">pending</a>';
$tindakan='process';
$delete='delete';
$class='btn btn-sm btn-danger';
$class2='btn btn-sm btn-primary';
} else if ($data['status']==1){
$status='<a href="#" class="btn btn-sm btn-warning">pending</a>';
$tindakan='<a href="#" class="btn btn-sm btn-warning">on process</a>';
$delete='';
$class='';
$class2='';
} else {
$status='<a href="#" class="btn btn-sm btn-success">paid</a>';
$tindakan='<a href="#" class="btn btn-sm btn-success">processed</a>';
$delete='';
$class='';
$class2='';
}

?>
                    <tbody>
                    <td><?php echo $no; ?>.</center></td>
                    <td><?php echo $data['jumlahpin'];?></center></td>
                    <td><?php echo $data['paket'];?></center></td>
                    <td align="right">Rp. <?php echo number_format($data['amount'],0,",",".");?></center></td>
                    <td><center><?php echo $data['tanggal'];?></center></td>
                    <td><center><?php echo $data['code'];?></center></td>
                    <td><center><?php echo $data['gateway'];?></center></td>
                    <td><center><a href="pin-order-process.php?code=<?php echo $data['code'];?>" class="<?php echo $class2;?>"><?php echo $tindakan;?></a> <a href="pin-order-delete.php?code=<?php echo $data['code'];?>" class="<?php echo $class;?>"><?php echo $delete;?></a>
<br><br><img src="<?php echo $data['photo']; ?>" class="img-rounded" width="50" style="border: 2px solid #666;" />
</center></td>
                    </tr></div>
                 <?php   
              } 
              ?>
                   </tbody>
                   </table>
                  </div>
              </div> 
              </div>


</section>







          		</div>

<?php include 'footer.php'; ?>
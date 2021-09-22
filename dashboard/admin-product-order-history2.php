<?php
session_start();
include 'header.php';
?>
<head>
  <title>Product History 2 | Tombo Ati</title>
</head>
            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">

           <!-- /.row -->
                    <br />
                    <!-- Main row -->


<!-- col-lg-12--> 



<section class="col-lg-12 connectedSortable">                            




                            <div class="panel panel-success">
                        <div class="panel-heading">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-book"></span> History Order Product</h3> 
                        </div>
                        <div class="panel-body">
                       <div class="table-responsive">
											 <br>
                       
                    <?php
                    $query1="select * from product_order WHERE status='2' ";
                    $hasil=mysqli_query($koneksi, $query1) or die(mysqli_error());
                    ?>

                  <table id="example" class="table table-hover table-bordered">
                  <thead>
                      <tr>
                        <th><center>No. </center></th>
                        <th><center>Username</center></th>
                        <th><center>Jumlah</center></th>
                        <th><center>Product</center></th>
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

if ($data['status']==2){
$status='<a href="#" class="btn btn-sm btn-success">paid</a>';
$tindakan='<a href="#" class="btn btn-sm btn-success">processed</a>';
$delete='';
$class='';
$class2='';
}

            $query_product = mysqli_query($koneksi, "SELECT * FROM products WHERE code='$data[code_product]' ");
            $data_product  = mysqli_fetch_array($query_product);

?>
                    <tbody>
                    <td><?php echo $no; ?>.</center></td>
                    <td><?php echo $data['userid'];?></center></td>
                    <td><?php echo $data['jumlah'];?></center></td>
                    <td><?php echo $data_product['title'];?><br><?php echo $data_product['description'];?></center></td>
                    <td align="right">Rp. <?php echo number_format($data['amount'],0,",",".");?></center></td>
                    <td><center><?php echo $data['tanggal'];?></center></td>
                    <td><center><?php echo $data['code'];?></center></td>
                    <td><center><?php echo $data['gateway'];?></center></td>
                    <td><center><a href="admin-product-order-process.php?code=<?php echo $data['code'];?>" class="<?php echo $class2;?>"><?php echo $tindakan;?></a> <a href="admin-product-order-delete.php?code=<?php echo $data['code'];?>" class="<?php echo $class;?>"><?php echo $delete;?></a></center></td>
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
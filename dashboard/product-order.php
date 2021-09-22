<?php
session_start();
include 'header.php';

                    $kodeku = $_SESSION['id'];
                    $query1="select * from products ORDER BY id DESC";
                    $hasil=mysqli_query($koneksi, $query1) or die(mysqli_error());
?>
<head>
  <title>Product Order | Tombo Ati </title>
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
            $query = mysqli_query($koneksi, "SELECT * FROM ticket WHERE userid='$row[username]'");
            $data  = mysqli_fetch_array($query);
            ?>



<!-- col-lg-12--> 



                    <div class="row">
                        <div class="col-lg-12">
                        <div class="panel panel-success">
                        <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-book"></i> Order Product (Repeat Order)</h3> 
                        </div>
                        <div class="panel-body">
                  <div class="form-panel">
                      <form class="form-horizontal style-form" action="product-order2.php" method="post" name="form1" id="form1">
                                  <input name="id" type="hidden" id="id" class="form-control" value="<?php echo $_SESSION[id];?>" readonly="readonly" autofocus="on" />
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Username</label>
                              <div class="col-sm-10">
                                  <input name="userid" type="text" id="userid" class="form-control" value="<?php echo $row['userid'];?>" readonly />
                              </div>
                          </div>


                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Jumlah Product</label>
                              <div class="col-sm-10">

<input name="jumlah" type="number" id="jumlah" value="" class="form-control" />

                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Product Package</label>
                              <div class="col-sm-10">

<select class="form-control" name="code_product" required>
<option value="">------------------------------------</option>

                     <?php 
                    $query12="select * from products ORDER BY id DESC";
                    $hasil2=mysqli_query($koneksi, $query12) or die(mysqli_error());
                     while($data2=mysqli_fetch_array($hasil2))
                    {  $no++;
                    ?>
<option value="<?php echo $data2['code'];?>">Code <?php echo $data2['code'];?> - <?php echo $data2['title'];?></option>
<?php
}
?>
</select>

                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-10">
                                  <input type="submit" name="product-order" value="Next"  class="btn btn-sm btn-primary"/>&nbsp;
	                              <a href="index.php" class="btn btn-sm btn-danger">Batal </a>
                              </div>
                          </div>
                      </form>
                  </div>
                  </div>
                  </div>
          		</div>


<section class="col-lg-12 connectedSortable">                            




                            <div class="panel panel-success">
                        <div class="panel-heading">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-book"></span> Products List</h3> 
                        </div>
                        <div class="panel-body">
                       <div class="table-responsive">
                       
                  <table id="example" class="table table-hover table-bordered">
                  <thead>
                      <tr>
                        <th><center>No. </center></th>
                        <th><center>Code</center></th>
                        <th><center>Diskripsi </center></th>
                        <th><center>Harga </center></th>
                      </tr>
                  </thead>
                     <?php 
$no=0;
                     while($data2=mysqli_fetch_array($hasil))
                    {  $no++;
?>
                    <tbody>
                    <td><left><?php echo $no; ?>.</center></td>
                    <td><left><?php echo $data2['code'];?></center></td>
                    <td><?php echo $data2['title'];?><br><br><img src="<?php echo $data2['file_name'];?>" width="200"><br><br><?php echo $data2['description'];?></td>
                    <td align="right">Rp. <?php echo number_format($data2['bruto'],0,",",".");?></center></td>
                    </tr></div>
                 <?php   
              } 
              ?>
                   </tbody>
                   </table>
                  </div>
                <div class="text-right">
                </div>
              </div> 
              </div>

</section>

<?php include 'footer.php'; ?>
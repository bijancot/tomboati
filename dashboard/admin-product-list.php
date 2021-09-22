<?php
session_start();
include 'header.php';

                    $kodeku = $_SESSION['id'];
                    $query1="select * from products ORDER BY id DESC";
                    $hasil=mysqli_query($koneksi, $query1) or die(mysqli_error());
?>
<head>
  <title>Product List | Tombo Ati</title>
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



                    <div class="row">


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
                        <th><center>Category</i></center></th>
                        <th><center>Code</center></th>
                        <th><center>Diskripsi </center></th>
                        <th><center>Harga </center></th>
                        <th><center>Setting </center></th>
                      </tr>
                  </thead>
                     <?php 
$no=0;
                     while($data2=mysqli_fetch_array($hasil))
                    {  $no++;
?>
                    <tbody>
                    <td><left><?php echo $no; ?>.</center></td>
                    <td><left><?php echo $data2['category'];?></center></td>
                    <td><left><?php echo $data2['code'];?></center></td>
                    <td><?php echo $data2['title'];?><br><br><img src="<?php echo $data2['file_name'];?>" width="100"><br><br><?php echo $data2['description'];?></td>
                    <td align="right">Rp. <?php echo number_format($data2['bruto'],0,",",".");?></center></td>
                    <td align="right"><a href="admin-product-edit.php?code=<?php echo $data2['code'];?>" class="btn btn-sm btn-danger"> EDIT </a>
<a href="admin-product-upload.php?code=<?php echo $data2['code'];?>" class="btn btn-sm btn-primary"> UPLOAD </a>
</center></td>
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

<section class="col-lg-12 connectedSortable">                            




                            <div class="panel panel-success">
                        <div class="panel-heading">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-book"></span> Products List</h3> 
                        </div>
                        <div class="panel-body">
                       <div class="table-responsive">
                       
                  <div class="form-panel">
                      <form class="form-horizontal style-form" action="admin-product-list2.php" method="post" name="form1" id="form1">
                                  <input name="id" type="hidden" id="id" class="form-control" value="<?php echo $_SESSION[id];?>" autofocus="on" />
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Title</label>
                              <div class="col-sm-10">
                                  <input name="title" type="text" id="title" class="form-control" value="<?php echo $row['title'];?>"  />
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Description</label>
                              <div class="col-sm-10">
                                  <textarea class="form-control" name="description" rows="5" cols="70" required><?php echo $row['description'];?></textarea>
                              </div>
                          </div>


                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Jumlah Product</label>
                              <div class="col-sm-10">

<input name="jumlah" type="number" id="jumlah" value="" class="form-control" />

                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Category</label>
                              <div class="col-sm-10">

<select class="form-control" name="category" required>
<option value="">------------------------------------</option>
<option value="PARFUM">PARFUM</option>
</select>

                              </div>
                          </div>



                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Tanggal</label>
                              <div class="col-sm-10">
                                  <input name="tangggal" class="form-control" id="tangggal" type="text" value="<?php echo $timer;?>" readonly />
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
                <div class="text-right">
                </div>
              </div> 
              </div>

</section>

<?php include 'footer.php'; ?>
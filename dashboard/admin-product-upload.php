<?php
session_start();
include 'header.php';

$error = $_GET['error'];
$code = $_GET['code'];


                            if ($error == '1'){
								$statusnya='<span class="label label-success">upload photo success</span>';
							}

                            if ($error == '2'){
								$statusnya='<span class="label label-success">upload kyc success</span>';
							}

                            if ($error == '3'){
								$statusnya='<span class="label label-success">update password success</span>';
							}

                            if ($error == '4'){
								$statusnya='<span class="label label-success">update transaction password success</span>';
							}

                            if ($error == '6'){
								$statusnya='<span class="label label-success">update product success</span>';
							}

                            if ($error == '7'){
								$statusnya='<span class="label label-success">update address success</span>';
							}

                            if ($error == '8'){
								$statusnya='<span class="label label-success">update doge account success</span>';
							}

                            if ($error == '9'){
								$statusnya='<span class="label label-warning">update status account success</span>';
							}

?>
<head>
  <title>Product Upload | Tombo Ati</title>
</head>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Product
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">

           <!-- /.row -->
                    <br />
                    <!-- Main row -->
                    <?php
            $query = mysqli_query($koneksi, "SELECT * FROM products WHERE code='$_GET[code]'");
            $data  = mysqli_fetch_array($query);

            $query_sponsor = mysqli_query($koneksi, "SELECT * FROM mebers WHERE userid='$data[sponsor]'");
            $data_sponsor  = mysqli_fetch_array($query_sponsor);
            ?>

<!-- col-lg-12--> 
                    <div class="row">
                        <div class="col-lg-12">
                        <div class="panel panel-success">
                        <div class="panel-body">
                  <div class="form-panel">

                              <div class="col-sm-3">
                            <?php echo $statusnya; ?>
                            </div>

                  </div>
                  </div>
                  </div>


<!-- col-lg-12--> 

                    <div class="row">
                        <div class="col-lg-12">
                        <div class="panel panel-success">
                        <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-photo"></i> Upload Product Image</h3> 
                        </div>
                        <div class="panel-body">
                  <div class="form-panel">
                      <form class="form-horizontal style-form" action="admin-product-upload2.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
                                  
<input name="code" type="hidden" id="code" value="<?php echo $code; ?>" class="form-control" autocomplete="off" placeholder="Auto Number Tidak perlu di isi"/>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-3">
                            <img src="<?php echo $row['file_name']; ?>" class="img-rounded" width="150" height="200" style="border: 2px solid #666;" /> 
                            </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Foto</label>
                              <div class="col-sm-3">
                            <input name="nama_file" type="file" id="nama_file" class="form-control" required />
                            </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-10">
                                  <input type="submit" name="upload-product" value="Upload" class="btn btn-sm btn-primary" />&nbsp;
	                              <a href="profile.php" class="btn btn-sm btn-danger">Batal </a>
                              </div>
                          </div>
                      </form>
                  </div>
                  </div>
                  </div>



<!-- col-lg-12--> 
          		</div>

<?php include 'footer.php'; ?>
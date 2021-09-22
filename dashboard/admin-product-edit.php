<?php
session_start();
include 'header.php';

$error = $_GET['error'];
$username_member = $_GET['userid'];


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
  <title>Edit Product | Tombo Ati</title>
</head>
            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Edit Profile
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
                        <h3 class="panel-title"><i class="fa fa-user"></i> Edit Product</h3> 
                        </div>
                        <div class="panel-body">
                  <div class="form-panel">
                      <form class="form-horizontal style-form" action="admin-product-edit2.php" method="post" name="form1" id="form1">
                                  <input name="id" type="hidden" id="id" class="form-control" value="<?php echo $data['id'];?>" readonly="readonly" autofocus="on" />
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Code</label>
                              <div class="col-sm-10">
                                  <input name="code" type="text" id="code" class="form-control" value="<?php echo $data['code'];?>" required  readonly="readonly" />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Category</label>
                              <div class="col-sm-10">
                                  <input name="category" type="text" id="category" class="form-control" value="<?php echo $data['category'];?>" required />
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Name</label>
                              <div class="col-sm-10">
                                  <input name="title" class="form-control" id="title" type="text" value="<?php echo $data['title'];?>" required />
                              </div>
                          </div>
                           <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Description</label>
                              <div class="col-sm-10">
                                  <input name="description" class="form-control" id="description" type="text" value="<?php echo $data['description'];?>" required />
                              </div>
                          </div>
                         <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Harga Product</label>
                              <div class="col-sm-10">
                                  <input name="bruto" type="text" id="bruto" class="form-control" value="<?php echo $data['bruto'];?>" required/>
                              </div>
                          </div>
                         <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Stock Product</label>
                              <div class="col-sm-10">
                                  <input name="stock" type="text" id="stock" class="form-control" value="<?php echo $data['stock'];?>" required/>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Bonus RO Level 1</label>
                              <div class="col-sm-10">
                                  <input name="bonusreorder1" type="number" id="bonusreorder1" class="form-control" value="<?php echo $data['bonusreorder1'];?>" required/>
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Bonus RO Level 2</label>
                              <div class="col-sm-10">
                                  <input name="bonusreorder2" type="number" id="bonusreorder2" class="form-control" value="<?php echo $data['bonusreorder2'];?>" required/>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Bonus RO Level 3</label>
                              <div class="col-sm-10">
                                  <input name="bonusreorder3" type="number" id="bonusreorder3" class="form-control" value="<?php echo $data['bonusreorder3'];?>" required/>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Bonus RO Level 4</label>
                              <div class="col-sm-10">
                                  <input name="bonusreorder4" type="number" id="bonusreorder4" class="form-control" value="<?php echo $data['bonusreorder4'];?>" required/>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Bonus RO Level 5</label>
                              <div class="col-sm-10">
                                  <input name="bonusreorder5" type="number" id="bonusreorder5" class="form-control" value="<?php echo $data['bonusreorder5'];?>" required/>
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Bonus RO Level 6</label>
                              <div class="col-sm-10">
                                  <input name="bonusreorder6" type="number" id="bonusreorder6" class="form-control" value="<?php echo $data['bonusreorder6'];?>" required/>
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Bonus RO Level 7</label>
                              <div class="col-sm-10">
                                  <input name="bonusreorder7" type="number" id="bonusreorder7" class="form-control" value="<?php echo $data['bonusreorder7'];?>" required/>
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Bonus RO Level 8</label>
                              <div class="col-sm-10">
                                  <input name="bonusreorder8" type="number" id="bonusreorder8" class="form-control" value="<?php echo $data['bonusreorder8'];?>" required/>
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Bonus RO Level 9</label>
                              <div class="col-sm-10">
                                  <input name="bonusreorder9" type="number" id="bonusreorder9" class="form-control" value="<?php echo $data['bonusreorder9'];?>" required/>
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Bonus RO Level 10</label>
                              <div class="col-sm-10">
                                  <input name="bonusreorder10" type="number" id="bonusreorder10" class="form-control" value="<?php echo $data['bonusreorder10'];?>" required/>
                              </div>
                          </div>


                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-10">
                                  <input type="submit" name="update-product" value="Change Product"  class="btn btn-sm btn-primary"/>&nbsp;
	                              <a href="index.php" class="btn btn-sm btn-danger">Cancel </a>
                              </div>
                          </div>
                      </form>
                  </div>
                  </div>
                  </div>



<!-- col-lg-12--> 

          		</div>

<?php include 'footer.php'; ?>
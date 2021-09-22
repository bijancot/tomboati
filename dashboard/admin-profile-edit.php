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
								$statusnya='<span class="label label-success">update profile success</span>';
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
  <title>Edit Profile | Tombo Ati</title>
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
            $query = mysqli_query($koneksi, "SELECT * FROM mebers WHERE userid='$username_member'");
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
                        <h3 class="panel-title"><i class="fa fa-user"></i> Edit Status Account</h3> 
                        </div>
                        <div class="panel-body">
                  <div class="form-panel">
                      <form class="form-horizontal style-form" action="admin-update-status.php" method="post" name="form1" id="form1">
                                  <input name="id" type="hidden" id="id" class="form-control" value="<?php echo $data['id'];?>" readonly="readonly" autofocus="on" />
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Account</label>
                              <div class="col-sm-10">
                                  <input name="username" type="text" id="username" class="form-control" value="<?php echo $data['userid'];?>" required  readonly="readonly" />
                                  <!--<span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>-->
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">New Peringkat</label>
                              <div class="col-sm-10">
<select name="paket" REQUIRED>
<option value="<?php echo $data['paket'];?>"><?php echo $data['paket'];?></option>
<option value="">-------------</option>
<option value="USER">USER</option>
<option value="MITRA">MITRA</option>
</select>
                              </div>
                          </div>


                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-10">
                                  <input type="submit" name="update-status" value="Change Status"  class="btn btn-sm btn-primary"/>&nbsp;
	                              <a href="index.php" class="btn btn-sm btn-danger">Cancel </a>
                              </div>
                          </div>
                      </form>
                  </div>
                  </div>
                  </div>

<!-- col-lg-12--> 

                    <div class="row">
                        <div class="col-lg-12">
                        <div class="panel panel-success">
                        <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-key"></i> Edit Password</h3> 
                        </div>
                        <div class="panel-body">
                  <div class="form-panel">
                      <form class="form-horizontal style-form" action="admin-update-password.php" method="post" name="form1" id="form1">
                                  <input name="id" type="hidden" id="id" class="form-control" value="<?php echo $data['id'];?>" readonly="readonly" autofocus="on" />
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Account</label>
                              <div class="col-sm-10">
                                  <input name="username" type="text" id="username" class="form-control" value="<?php echo $data['userid'];?>" required  readonly="readonly" />
                                  <!--<span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>-->
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">New Password</label>
                              <div class="col-sm-10">
                                  <input name="password1" type="text" id="password1" class="form-control" value="" required />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-10">
                                  <input type="submit" name="update-password" value="Change Password"  class="btn btn-sm btn-primary"/>&nbsp;
	                              <a href="index.php" class="btn btn-sm btn-danger">Cancel </a>
                              </div>
                          </div>
                      </form>
                  </div>
                  </div>
                  </div>

<!-- col-lg-12--> 


                    <div class="row">
                        <div class="col-lg-12">
                        <div class="panel panel-success">
                        <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-key"></i> Edit Transaction Password</h3> 
                        </div>
                        <div class="panel-body">
                  <div class="form-panel">
                      <form class="form-horizontal style-form" action="admin-update-tpassword.php" method="post" name="form1" id="form1">
                                  <input name="id" type="hidden" id="id" class="form-control" value="<?php echo $data['id'];?>" readonly="readonly" autofocus="on" />
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Account</label>
                              <div class="col-sm-10">
                                  <input name="username" type="text" id="username" class="form-control" value="<?php echo $data['userid'];?>" required  readonly="readonly" />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">New Transaction Password</label>
                              <div class="col-sm-10">
                                  <input name="password1" type="text" id="password1" class="form-control" value="" required />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-10">
                                  <input type="submit" name="update-tpassword" value="Change TPassword"  class="btn btn-sm btn-primary"/>&nbsp;
	                              <a href="index.php" class="btn btn-sm btn-danger">Cancel </a>
                              </div>
                          </div>
                      </form>
                  </div>
                  </div>
                  </div>

<!-- col-lg-12--> 

                    <div class="row">
                        <div class="col-lg-12">
                        <div class="panel panel-success">
                        <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-user"></i> Edit Profile</h3> 
                        </div>
                        <div class="panel-body">
                  <div class="form-panel">
                      <form class="form-horizontal style-form" action="admin-update-profile.php" method="post" name="form1" id="form1">
                                  <input name="id" type="hidden" id="id" class="form-control" value="<?php echo $data['id'];?>" readonly="readonly" autofocus="on" />
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Account</label>
                              <div class="col-sm-10">
                                  <input name="username" type="text" id="username" class="form-control" value="<?php echo $data['userid'];?>" required  readonly="readonly" />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Username Sponsor</label>
                              <div class="col-sm-10">
                                  <input name="sponsor" type="text" id="sponsor" class="form-control" value="<?php echo $data_sponsor['userid'];?>" required readonly />
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Name</label>
                              <div class="col-sm-10">
                                  <input name="name" class="form-control" id="name" type="text" value="<?php echo $data['name'];?>" required />
                              </div>
                          </div>
                           <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">KTP</label>
                              <div class="col-sm-10">
                                  <input name="ktp" class="form-control" id="ktp" type="text" value="<?php echo $data['ktp'];?>" required />
                              </div>
                          </div>
                         <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Email</label>
                              <div class="col-sm-10">
                                  <input name="email" type="text" id="email" class="form-control" value="<?php echo $data['email'];?>" required/>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Mobile</label>
                              <div class="col-sm-10">
                                  <input name="hp" type="text" id="hp" class="form-control" value="<?php echo $data['hphone'];?>" required/>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-10">
                                  <input type="submit" name="update-profile" value="Change Profile"  class="btn btn-sm btn-primary"/>&nbsp;
	                              <a href="index.php" class="btn btn-sm btn-danger">Cancel </a>
                              </div>
                          </div>
                      </form>
                  </div>
                  </div>
                  </div>


<!-- col-lg-12--> 

                    <div class="row">
                        <div class="col-lg-12">
                        <div class="panel panel-success">
                        <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-home"></i> Edit Address</h3> 
                        </div>
                        <div class="panel-body">
                  <div class="form-panel">
                      <form class="form-horizontal style-form" action="admin-update-address.php" method="post" name="form1" id="form1">
                                  <input name="id" type="hidden" id="id" class="form-control" value="<?php echo $data['id'];?>" readonly="readonly" autofocus="on" />
                                  <input name="username" type="hidden" id="username" class="form-control" value="<?php echo $data['userid'];?>" readonly="readonly" autofocus="on" />
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Address</label>
                              <div class="col-sm-10">
                                  <input name="address" type="text" id="address" class="form-control" value="<?php echo $data['address'];?>" required />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">City</label>
                              <div class="col-sm-10">
                                  <input name="city" class="form-control" id="city" type="text" value="<?php echo $data['kota'];?>" required />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Provinsi</label>
                              <div class="col-sm-10">
                                  <input name="state" class="form-control" id="state" type="text" value="<?php echo $data['propinsi'];?>" required />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Zip</label>
                              <div class="col-sm-10">
                                  <input name="zip" class="form-control" id="zip" type="text" value="<?php echo $data['kode_pos'];?>" required />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Country</label>
                              <div class="col-sm-10">
                                  <input name="country" class="form-control" id="country" type="text" value="<?php echo $data['country'];?>" required />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-10">
                                  <input type="submit" name="update-address" value="Change Address"  class="btn btn-sm btn-primary"/>&nbsp;
	                              <a href="index.php" class="btn btn-sm btn-danger">Cancel </a>
                              </div>
                          </div>
                      </form>
                  </div>
                  </div>
                  </div>



<!-- col-lg-12--> 

                    <div class="row">
                        <div class="col-lg-12">
                        <div class="panel panel-success">
                        <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-bank"></i> Edit Bank Account</h3> 
                        </div>
                        <div class="panel-body">
                  <div class="form-panel">
                      <form class="form-horizontal style-form" action="admin-update-bank.php" method="post" name="form1" id="form1">
                                  <input name="id" type="hidden" id="id" class="form-control" value="<?php echo $data['id'];?>" readonly="readonly" autofocus="on" />
                                  <input name="username" type="hidden" id="username" class="form-control" value="<?php echo $data['userid'];?>" readonly="readonly" autofocus="on" />
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Bank</label>
                              <div class="col-sm-10">
                                  <input name="bank" type="text" id="bank" class="form-control" value="Bank" readonly />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">No Rekening</label>
                              <div class="col-sm-10">
                                  <input name="rekening" class="form-control" id="rekening" type="text" value="<?php echo $data['rekening'];?>" required />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Atas Nama</label>
                              <div class="col-sm-10">
                                  <input name="atasnama" class="form-control" id="atasnama" type="text" value="<?php echo $data['atasnama'];?>" required />
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-10">
                                  <input type="submit" name="update-bank" value="Update Bank"  class="btn btn-sm btn-primary"/>&nbsp;
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
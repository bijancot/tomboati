<?php
include('config.php');
include('fungsi.php');

session_start();

if(cek_login($mysqli) == false){ // Jika user tidak login
	header('location: login.php'); // Alihkan ke halaman login (login.php)
	exit();	
}

$stmt = $mysqli->prepare("SELECT userid FROM mebers WHERE id = ?");
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($username);
$stmt->fetch();

$sql = mysqli_query($koneksi, "SELECT * FROM mebers WHERE id = '$_SESSION[id]' ");
$row = mysqli_fetch_assoc($sql);

include 'header.php';
?>
<head>
  <title>Tombo Ati | Edit Profile  </title>
</head>
            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Dashboard
                        <small>Edit Profile</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Seller</a></li>
                        <li class="active">Edit Data Seller</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">

           <!-- /.row -->
                    <br />
                    <!-- Main row -->
                    <?php
            $query = mysqli_query($koneksi, "SELECT * FROM mebers WHERE id='$_SESSION[id]'");
            $data  = mysqli_fetch_array($query);
            ?>




                    <div class="row">
                        <div class="col-lg-12">
                        <div class="panel panel-success">
                        <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-photo"></i> Upload Photo</h3> 
                        </div>
                        <div class="panel-body">
                  <div class="form-panel">
                      <form class="form-horizontal style-form" action="update-customer.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
                                  
<input name="id" type="hidden" id="id" value="<?php echo $row['id']; ?>" class="form-control" autocomplete="off" placeholder="Auto Number Tidak perlu di isi"/>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-3">
                            <img src="<?php echo $row['photo']; ?>" class="img-rounded" width="150" height="200" style="border: 2px solid #666;" /> 
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
                                  <input type="submit" name="update" value="Simpan" class="btn btn-sm btn-primary" />&nbsp;
	                              <a href="profile.php" class="btn btn-sm btn-danger">Batal </a>
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
                        <h3 class="panel-title"><i class="fa fa-user"></i> Update Password</h3> 
                        </div>
                        <div class="panel-body">
                  <div class="form-panel">
                      <form class="form-horizontal style-form" action="update-password.php" method="post" name="form1" id="form1">
                                  <input name="id" type="hidden" id="id" class="form-control" value="<?php echo $data['id'];?>" readonly="readonly" autofocus="on" />
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Username</label>
                              <div class="col-sm-10">
                                  <input name="username" type="text" id="username" class="form-control" value="<?php echo $data['userid'];?>" required  readonly="readonly" />
                                  <!--<span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>-->
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Password</label>
                              <div class="col-sm-10">
                                  <input name="password" type="password" id="password" class="form-control" value="<?php echo $data['passw'];?>" required />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Ulangi Password</label>
                              <div class="col-sm-10">
                                  <input name="password2" type="password" id="password2" class="form-control" value="<?php echo $data['passw2'];?>" required />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-10">
                                  <input type="submit" name="update-password" value="Rubah Password"  class="btn btn-sm btn-primary"/>&nbsp;
	                              <a href="profile.php" class="btn btn-sm btn-danger">Batal </a>
                              </div>
                          </div>
                      </form>
                  </div>
<font size="2" color="red"><center>perubahan password tidak berhasil >> silahkan diulangi lagi...</center></font>

                  </div>
                  </div>

<!-- col-lg-12--> 


                    <div class="row">
                        <div class="col-lg-12">
                        <div class="panel panel-success">
                        <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-user"></i> Update Profile</h3> 
                        </div>
                        <div class="panel-body">
                  <div class="form-panel">
                      <form class="form-horizontal style-form" action="update-profile.php" method="post" name="form1" id="form1">
                                  <input name="id" type="hidden" id="id" class="form-control" value="<?php echo $data['id'];?>" readonly="readonly" autofocus="on" />
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Username</label>
                              <div class="col-sm-10">
                                  <input name="username" type="text" id="username" class="form-control" value="<?php echo $data['userid'];?>" required  readonly="readonly" />
                                  <!--<span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>-->
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Nama</label>
                              <div class="col-sm-10">
                                  <input name="fullname" class="form-control" id="fullname" type="text" value="<?php echo $data['name'];?>" required />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Email</label>
                              <div class="col-sm-10">
                                  <input name="email" type="text" id="email" class="form-control" value="<?php echo $data['email'];?>" required />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">HP</label>
                              <div class="col-sm-10">
                                  <input name="hphone" type="text" id="password" class="form-control" value="<?php echo $data['hphone'];?>" required />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-10">
                                  <input type="submit" name="update-profile" value="Simpan Data"  class="btn btn-sm btn-primary"/>&nbsp;
	                              <a href="profile.php" class="btn btn-sm btn-danger">Batal </a>
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
                      <form class="form-horizontal style-form" action="update-address.php" method="post" name="form1" id="form1">
                                  <input name="id" type="hidden" id="id" class="form-control" value="<?php echo $data['id'];?>" readonly="readonly" autofocus="on" />
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Alamat</label>
                              <div class="col-sm-10">
                                  <input name="address" type="text" id="address" class="form-control" value="<?php echo $data['address'];?>" required />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Kota</label>
                              <div class="col-sm-10">
                                  <input name="kota" class="form-control" id="kota" type="text" value="<?php echo $data['kota'];?>" required />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Kodepos</label>
                              <div class="col-sm-10">
                                  <input name="kode_pos" class="form-control" id="kode_pos" type="text" value="<?php echo $data['kode_pos'];?>" required />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-10">
                                  <input type="submit" name="update-address" value="Simpan Alamat"  class="btn btn-sm btn-primary"/>&nbsp;
	                              <a href="profile.php" class="btn btn-sm btn-danger">Batal </a>
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
                      <form class="form-horizontal style-form" action="update-bank.php" method="post" name="form1" id="form1">
                                  <input name="id" type="hidden" id="id" class="form-control" value="<?php echo $data['id'];?>" readonly="readonly" autofocus="on" />
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Bank</label>
                              <div class="col-sm-10">
                                  <input name="bank" type="text" id="bank" class="form-control" value="<?php echo $data['bank'];?>" required />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Rekening</label>
                              <div class="col-sm-10">
                                  <input name="no_rekening" class="form-control" id="no_rekening" type="text" value="<?php echo $data['no_rekening'];?>" required />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Nama Nasabah</label>
                              <div class="col-sm-10">
                                  <input name="atas_nama" class="form-control" id="atas_nama" type="text" value="<?php echo $data['atas_nama'];?>" required />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-10">
                                  <input type="submit" name="update-bank" value="Simpan Bank"  class="btn btn-sm btn-primary"/>&nbsp;
	                              <a href="profile.php" class="btn btn-sm btn-danger">Batal </a>
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
                        <h3 class="panel-title"><i class="fa fa-book"></i> Edit Paspor</h3> 
                        </div>
                        <div class="panel-body">
                  <div class="form-panel">
                      <form class="form-horizontal style-form" action="update-cryptocurrency.php" method="post" name="form1" id="form1">
                                  <input name="id" type="hidden" id="id" class="form-control" value="<?php echo $data['id'];?>" readonly="readonly" autofocus="on" />
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">No Paspor</label>
                              <div class="col-sm-10">
                                  <input name="bitcoin" type="text" id="bitcoin" class="form-control" value="<?php echo $data['bitcoin'];?>" />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Masa Berlaku</label>
                              <div class="col-sm-10">
                                  <input name="edinar" class="form-control" id="edinar" type="text" value="<?php echo $data['edinar'];?>" />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Nama Paspor</label>
                              <div class="col-sm-10">
                                  <input name="litecoin" class="form-control" id="litecoin" type="text" value="<?php echo $data['litecoin'];?>" />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-10">
                                  <input type="submit" name="update-cryptocurrency" value="Simpan Ecurrency"  class="btn btn-sm btn-primary"/>&nbsp;
	                              <a href="profile.php" class="btn btn-sm btn-danger">Batal </a>
                              </div>
                          </div>
                      </form>
                  </div>
                  </div>
                  </div>






          		</div>

<?php include 'footer.php'; ?>
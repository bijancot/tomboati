<?php
session_start();
include 'header.php';

$error = $_GET['error'];


                            if ($error == '1'){
								$statusnya='<span class="label label-success">upload photo berhasil</span>';
							}

                            if ($error == '2'){
								$statusnya='<span class="label label-success">upload kyc berhasil</span>';
							}

                            if ($error == '3'){
								$statusnya='<span class="label label-success">update password berhasil</span>';
							}

                            if ($error == '4'){
								$statusnya='<span class="label label-success">update transaction password berhasil</span>';
							}

                            if ($error == '6'){
								$statusnya='<span class="label label-success">update profile berhasil</span>';
							}

                            if ($error == '7'){
								$statusnya='<span class="label label-success">update alamat berhasil</span>';
							}

                            if ($error == '8'){
								$statusnya='<span class="label label-success">update bank account berhasil</span>';
							}

                            if ($error == '9'){
								$statusnya='<span class="label label-warning">silahkan update profile dan upload kyc untuk verifikasi data</span>';
							}

if(isset($_POST['update-wd'])){

$id = $_POST['id'];
$userid = $_POST['userid'];
$status = $_POST['status'];
$amount = $_POST['amount'];
$rekening = $_POST['rekening'];

$query = mysqli_query($koneksi, "UPDATE hm2_history SET type='withdrawal', description='WD to $rekening' WHERE id='$id'")or die(mysql_error());

header('location:admin-withdrawal-onprocess.php');

}

?>
<head>
  <title>Update WD | Tombo Ati</title>
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
            $query = mysqli_query($koneksi, "SELECT * FROM mebers WHERE id='$_SESSION[id]'");
            $data  = mysqli_fetch_array($query);
            ?>

<!-- col-lg-12--> 


                    <?php
            $query = mysqli_query($koneksi, "SELECT * FROM hm2_history WHERE id='$_GET[id];'");
            $data  = mysqli_fetch_array($query);

$tampil_user_id=$data['user_id'];
$sqlTampilx = mysqli_query($koneksi, "SELECT * FROM mebers WHERE id='$tampil_user_id' ");
$dataTampilx = mysqli_fetch_assoc($sqlTampilx);

            ?>


                    <div class="row">
                        <div class="col-lg-12">
                        <div class="panel panel-success">
                        <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-user"></i> Update Deposit</h3> 
                        </div>
                        <div class="panel-body">
                  <div class="form-panel">
                      <form class="form-horizontal style-form" action="" method="post" name="form1" id="form1">

                                  <input name="id" type="hidden" id="id" class="form-control" value="<?php echo $_GET['id'];?>" readonly="readonly" autofocus="on" />
                                  <input name="userid" type="hidden" id="id" class="form-control" value="<?php echo $tampil_user_id;?>" readonly="readonly" autofocus="on" />

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Username</label>
                              <div class="col-sm-10">
                                  <input name="username" type="text" id="username" class="form-control" value="<?php echo $dataTampilx['userid'];?>" readonly />
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Name</label>
                              <div class="col-sm-10">
                                  <input name="topic" type="text" id="topic" class="form-control" value="<?php echo $dataTampilx['name'];?>" readonly />
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">HP</label>
                              <div class="col-sm-10">
                                  <input name="hp" type="text" id="hp" class="form-control" value="<?php echo $dataTampilx['hphone'];?>" readonly />
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Email</label>
                              <div class="col-sm-10">
                                  <input name="email" type="text" id="email" class="form-control" value="<?php echo $dataTampilx['email'];?>" readonly />
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Bank</label>
                              <div class="col-sm-10">
                                  <input name="bank" type="text" id="bank" class="form-control" value="<?php echo $dataTampilx['bank'];?>" readonly />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Rekening</label>
                              <div class="col-sm-10">
                                  <input name="rekening" type="text" id="rekening" class="form-control" value="<?php echo $dataTampilx['rekening'];?>" readonly />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">A.n.</label>
                              <div class="col-sm-10">
                                  <input name="atasnama" type="text" id="atasnama" class="form-control" value="<?php echo $dataTampilx['atasnama'];?>" readonly />
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Amount</label>
                              <div class="col-sm-10">
                                  <input name="amount" type="text" id="amount" class="form-control" value="<?php echo $data['amount'];?>" readonly/>
                              </div>
                          </div>


                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Status</label>
                              <div class="col-sm-10">
<select name="status" required >
<option value="">-----------------------------------------</option>
<option value="processed">processed</option>
</select>
                              </div>
                          </div>





                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-10">
                                  <a href="index.php" class="btn btn-sm btn-danger">Batal </a> <input type="submit" name="update-wd" value="Next >>"  class="btn btn-sm btn-primary"/>&nbsp;
	                              
                              </div>
                          </div>
                      </form>
                  </div>
                  </div>
                  </div>


<!-- col-lg-12--> 


          		</div>

<?php include 'footer.php'; ?>
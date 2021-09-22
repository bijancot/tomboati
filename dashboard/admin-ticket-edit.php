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
  <title>Edit Ticket | Tombo Ati</title>
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
            $query = mysqli_query($koneksi, "SELECT * FROM ticket WHERE userid='$username_member'");
            $data  = mysqli_fetch_array($query);

            $query_user = mysqli_query($koneksi, "SELECT * FROM mebers WHERE userid='$data[sponsor]'");
            $data_user  = mysqli_fetch_array($query_user);
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
                      <form class="form-horizontal style-form" action="admin-ticket-edit2.php" method="post" name="form1" id="form1">
                                  <input name="id" type="hidden" id="id" class="form-control" value="<?php echo $data['id'];?>" readonly="readonly" autofocus="on" />
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Account</label>
                              <div class="col-sm-10">
                                  <input name="username" type="text" id="username" class="form-control" value="<?php echo $data['userid'];?>" required  readonly="readonly" />
                              </div>
                          </div>                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Subject</label>
                              <div class="col-sm-10">
                                  <input name="subject" type="text" id="subject" class="form-control" value="<?php echo $data['subject'];?>" required  readonly="readonly" />
                              </div>
                          </div>
                         <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Content</label>
                              <div class="col-sm-10">
<textarea name="content" rows="5" cols="70" class="form-control" required><?php echo $data['content'];?></textarea>

                              </div>
                          </div>



                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">New Status</label>
                              <div class="col-sm-10">
<select name="status">
<option value="<?php echo $data['status'];?>"><?php echo $data['status'];?></option>
<option value="on process">on process</option>
<option value="processed">processed</option>
</select>
                              </div>
                          </div>


                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-10">
                                  <input type="submit" name="update-ticket" value="Change Status"  class="btn btn-sm btn-primary"/>&nbsp;
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
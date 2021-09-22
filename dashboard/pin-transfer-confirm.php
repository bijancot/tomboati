<?php
include 'header.php';
?>
<head>
  <title>Pin Tranfer Confirm | Tombo Ati</title>
</head>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        PIN Aktivasi
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">

           <!-- /.row -->
                    <br />
                    <!-- Main row -->
                    <?php

if(isset($_POST['pin-transfer'])){

$pinfor = $_POST['pinfor'];
$transfer = $_POST['transfer'];
$pin = $_POST['pin'];

            $query_member = mysqli_query($koneksi, "SELECT * FROM mebers WHERE userid='$transfer' ");
            $data_member  = mysqli_fetch_array($query_member);
$nama_member=$data_member['name'];

if ($nama_member==""){
header('location:pin-transfer.php?pin='.$pin.'&error=gagal-username tidak valid');	
}

           ?>



<!-- col-lg-12--> 


                    <div class="row">
                        <div class="col-lg-12">
                        <div class="panel panel-success">
                        <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-key"></i> Transfer PIN Aktivasi</h3> 
                        </div>
                        <div class="panel-body">
                  <div class="form-panel">
                      <form class="form-horizontal style-form" action="pin-transfer-2" method="post" name="form1" id="form1">

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">PIN Aktivasi</label>
                              <div class="col-sm-10">
                                  <input name="pinfor" type="hidden" id="pinfor" class="form-control" value="<?php echo $pinfor;?>" required readonly/>
                                  <input name="pin" type="text" id="pin" class="form-control" value="<?php echo $pin;?>" required readonly/>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Send To</label>
                              <div class="col-sm-10">
                                  <input name="transfer" type="transfer" id="transfer" class="form-control" value="<?php echo $transfer;?>" required readonly/>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Name</label>
                              <div class="col-sm-10">
                                  <input name="name" type="name" id="name" class="form-control" value="<?php echo $nama_member;?>" required readonly/>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Transaction Password</label>
                              <div class="col-sm-10">
                                  <input name="tpassword" type="tpassword" id="tpassword" class="form-control" value="" required />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-10">
                                  <input type="submit" name="pin-transfer" value="PIN Transfer"  class="btn btn-sm btn-primary"/>&nbsp;
	                              <a href="pin.php" class="btn btn-sm btn-danger">cancel </a>
                              </div>
                          </div>
                      </form>
                  </div>
                  </div>
                  </div>
<?php
}
?>

<!-- col-lg-12--> 




          		</div>

<?php include 'footer.php'; ?>
<?php
include 'header.php';
?>
<head>
  <title>Pin Transfer | Tombo Ati</title>
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
            $query = mysqli_query($koneksi, "SELECT * FROM mebers WHERE id='$_SESSION[id]'");
            $data  = mysqli_fetch_array($query);

$pin = $_GET['pin'];

            $query_pin = mysqli_query($koneksi, "SELECT * FROM pin WHERE pin='$pin'");
            $data_pin  = mysqli_fetch_array($query_pin);

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
                      <form class="form-horizontal style-form" action="pin-transfer-confirm.php" method="post" name="form1" id="form1">
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"> </label>
                              <div class="col-sm-10">
                                  <a href="#" class="btn btn-sm btn-danger"> <?php echo $_GET['error'];?> </a>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Username</label>
                              <div class="col-sm-10">
                                  <input name="pinfor" type="text" id="pinfor" class="form-control" value="<?php echo $data_pin['pinfor'];?>" required  readonly="readonly" />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">PIN Aktivasi</label>
                              <div class="col-sm-10">
                                  <input name="pin" type="text" id="pin" class="form-control" value="<?php echo $data_pin['pin'];?>" required  readonly="readonly" />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Send To</label>
                              <div class="col-sm-10">
                                  <input name="transfer" type="transfer" id="transfer" class="form-control" value="" required />
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


<!-- col-lg-12--> 




          		</div>

<?php include 'footer.php'; ?>
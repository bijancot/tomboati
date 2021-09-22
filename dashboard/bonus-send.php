<?php
include 'header.php';
?>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <!-- Main content -->
                <section class="content">

           <!-- /.row -->
                    <br />
                    <!-- Main row -->
                    <?php
            $query = mysqli_query($koneksi, "SELECT * FROM bonus_sponsor WHERE timer='$_GET[id]'");
            $data  = mysqli_fetch_array($query);
            ?>

<head>
  <title>Bonus Send | Tombo Ati </title>
</head>

<!-- col-lg-12--> 



                    <div class="row">
                        <div class="col-lg-12">
                        <div class="panel panel-success">
                        <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-book"></i> SEND TO WALLET</h3> 
                        </div>
                        <div class="panel-body">
                  <div class="form-panel">
                      <form class="form-horizontal style-form" action="bonus-send2?id='.$data['timer'].'" method="post" name="form1" id="form1">
                                  <input name="id" type="hidden" id="id" class="form-control" value="<?php echo $_SESSION[id];?>" readonly="readonly" autofocus="on" />
                                  <input name="paid" type="hidden" id="paid" class="form-control" value="<?php echo $data['paid'];?>" readonly="readonly" autofocus="on" />

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">User Id</label>
                              <div class="col-sm-10">
                                  <input name="userid" type="text" id="bank" class="form-control" value="<?php echo $data['userid'];?>" readonly />
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Bonus From</label>
                              <div class="col-sm-10">
                                  <input name="code" type="text" id="code" class="form-control" value="<?php echo $data['bonusfrom'];?>" readonly />
                              </div>
                          </div>


                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Nilai Transfer</label>
                              <div class="col-sm-10">
                                  <input name="amount" type="hidden" id="amount" class="form-control" value="<?php echo $data['bonus'];?>" readonly />
                                  <input name="amountx" type="text" id="amountx" class="form-control" value="<?php echo number_format($data['bonus'],0,",",".");?>" readonly />


                              </div>
                          </div>


                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Date </label>
                              <div class="col-sm-10">
                                  <input name="tanggal" class="form-control" id="atas_nama" type="text" value="<?php echo $data['timer'];?>" readonly />
                              </div>
                          </div>


                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-10">
	                              <a href="bonus-sponsor.php" class="btn btn-sm btn-danger">Cancel </a>


                                  <input type="submit" name="send-bonus" onclick="ButtonClicked()" value="SEND" class="btn btn-sm btn-primary" />
 <div id="buttonreplacement" style="margin-left:30px; display:none;">
<img src="loading.gif" alt="loading...">

                              </div>
                          </div>
                      </form>
                  </div>
                  </div>
                  </div>







          		</div>

<?php include 'footer.php'; ?>
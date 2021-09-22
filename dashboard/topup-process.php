<?php
session_start();
include 'header.php';
?>
<head>
  <title>Topup Process | Tombo Ati</title>
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
            $query = mysqli_query($koneksi, "SELECT * FROM hm2_pending_deposits WHERE code='$_GET[code]'");
            $data  = mysqli_fetch_array($query);
            ?>



<!-- col-lg-12--> 



                    <div class="row">
                        <div class="col-lg-12">
                        <div class="panel panel-success">
                        <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-book"></i> ORDER PROCESS</h3> 
                        </div>
                        <div class="panel-body">
                  <div class="form-panel">
                      <form class="form-horizontal style-form" action="topup-process2" method="post" name="form1" id="form1">
                                  <input name="id" type="hidden" id="id" class="form-control" value="<?php echo $_SESSION[id];?>" readonly="readonly" autofocus="on" />

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">User Id</label>
                              <div class="col-sm-10">
                                  <input name="userid" type="text" id="bank" class="form-control" value="<?php echo $row['userid'];?>" readonly />
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Code</label>
                              <div class="col-sm-10">
                                  <input name="code" type="text" id="code" class="form-control" value="<?php echo $data['code'];?>" readonly />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Unik</label>
                              <div class="col-sm-10">
                                  <input name="unik" type="text" id="unik" class="form-control" value="<?php echo $data['unik'];?>" readonly />
                              </div>
                          </div>


                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Nilai Transfer</label>
                              <div class="col-sm-10">
                                  <input name="amount" type="hidden" id="amount" class="form-control" value="<?php echo $data['amount'];?>" readonly />
                                  <input name="amountx" type="text" id="amountx" class="form-control" value="<?php echo number_format($data['amount'],0,",",".");?>" readonly />


                              </div>
                          </div>


                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Date </label>
                              <div class="col-sm-10">
                                  <input name="tangggal" class="form-control" id="atas_nama" type="text" value="<?php echo $data['date'];?>" readonly />
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Payment Gateway</label>
                              <div class="col-sm-10">


<script type="text/javascript">
function go()
{
window.location=document.getElementById("link").value
}
</script>

<select id="link" onchange="go()" class="form-control">
<option value="">------------------------</option>
<option value="topup-process-mandiri?code=<?php echo $data['code'];?>"> Bank Mandiri 14005 8880 7777</option>
<!-- 
<option value="topup-process-bni?code=<?php echo $data['code'];?>"> Bank BNI 881 165 9000</option>
<option value="topup-process-bca?code=<?php echo $data['code'];?>"> Bank BCA 440 165 9000</option>
<option value="pin-order-process-bri?code=<?php echo $data['code'];?>"> BRI 0000000</option>
 -->
</select>

                              </div>
                          </div>



                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-10">
	                              <a href="pin-order-history.php" class="btn btn-sm btn-danger">Cancel </a>
                              </div>
                          </div>
                      </form>
                  </div>
                  </div>
                  </div>







          		</div>

<?php include 'footer.php'; ?>
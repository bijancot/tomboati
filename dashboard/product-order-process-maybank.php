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
  <title>Tombo Ati | Product Order Process Maybank </title>
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
            $query = mysqli_query($koneksi, "SELECT * FROM product_order WHERE code='$_GET[code]'");
            $data  = mysqli_fetch_array($query);

function acak($panjang)
{
	$karakter= '1234567890';
	$string = '';
	for ($i = 0; $i < $panjang; $i++) {
		$pos = rand(0, strlen($karakter)-1);
		$string .= $karakter{$pos};
	}
	return $string;
}
$unik=acak(3);

$amountunik = $data['amount'] + $unik;

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
                      <form class="form-horizontal style-form" action="product-order-process-maybank2.php" method="post" name="form1" id="form1">
                                  <input name="id" type="hidden" id="id" class="form-control" value="<?php echo $_SESSION[id];?>" readonly="readonly" autofocus="on" />

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Userid</label>
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
                              <label class="col-sm-2 col-sm-2 control-label">Jumlah Product</label>
                              <div class="col-sm-10">
                                  <input name="jumlahpin" type="text" id="jumlahpin" class="form-control" value="<?php echo $data['jumlahpin'];?>" readonly />
                              </div>
                          </div>


                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Bank </label>
                              <div class="col-sm-10">
                                  <input name="MAYBANK" class="form-control" id="MAYBANK" type="text" value="MAYBANK" readonly />
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">No Rekening </label>
                              <div class="col-sm-10">
                                  <input name="2716000930" class="form-control" id="2716000930" type="text" value="2716000930" readonly />
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">a.n. </label>
                              <div class="col-sm-10">
                                  <input name="CV MITRA KASIH PERKASA" class="form-control" id="CV MITRA KASIH PERKASA" type="text" value="CV MITRA KASIH PERKASA" readonly />
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Nilai Transfer (Rp.)</label>
                              <div class="col-sm-10">
                                  <input name="amount" type="hidden" id="amount" class="form-control" value="<?php echo $amountunik;?>" readonly />
                                  <input name="amountx" type="text" id="amountx" class="form-control" value="<?php echo number_format($amountunik,0,",",".");?>" readonly />
                                  <input name="unik" type="hidden" id="unik" class="form-control" value="<?php echo $unik;?>" readonly />
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Message</label>
                              <div class="col-sm-10">
<textarea class="form-control" cols="100%" rows="3" name="message" value="" required />Detail Konfirmasi Transfer :</textarea>
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-10">
                                  <input type="submit" name="order-process" value="Konfirmasi Tranfer"  class="btn btn-sm btn-primary"/>&nbsp;
	                              <a href="pin-order-history.php" class="btn btn-sm btn-danger">Cancel </a>
                              </div>
                          </div>

                      </form>
                  </div>
                  </div>
                  </div>







          		</div>

<?php include 'footer.php'; ?>
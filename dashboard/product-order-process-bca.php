<?php
include 'header.php';
?>
<head>
  <title>Product Order Process BCA | Tombo Ati </title>
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
	$karakter= '123456789';
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
                      <form class="form-horizontal style-form" action="product-upload-photo-bca.php" method="post" enctype="multipart/form-data" name="form1" id="form1">

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
                                  <input name="jumlahproduk" type="text" id="jumlahproduk" class="form-control" value="<?php echo $data['jumlah'];?>" readonly />
                              </div>
                          </div>


                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Bank </label>
                              <div class="col-sm-10">
                                  <input name="BCA" class="form-control" id="BCA" type="text" value="BCA" readonly />
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">No Rekening </label>
                              <div class="col-sm-10">
                                  <input name="4401659000" class="form-control" id="4401659000" type="text" value="4401659000" readonly />
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">a.n. </label>
                              <div class="col-sm-10">
                                  <input name="PT. Maxima Goo Indonesia" class="form-control" id="PT. Maxima Goo Indonesia" type="text" value="PT. Maxima Goo Indonesia" readonly />
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




                  <div class="form-panel">
                      
                                  
<input name="id" type="hidden" id="id" value="<?php echo $row['id']; ?>" class="form-control" autocomplete="off" placeholder="Auto Number Tidak perlu di isi"/>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-3">
                            <img src="gambar_pin/bukti_transfer.jpg" class="img-rounded" width="100" style="border: 2px solid #666;" /> 
                            </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Foto</label>
                              <div class="col-sm-3">
                            <input name="file" type="file" id="file" class="form-control" required />
                            </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-10">
                                  <input type="submit" name="Upload Image" value="Upload" class="btn btn-sm btn-primary" />&nbsp;
	                              <a href="product-order-history.php" class="btn btn-sm btn-danger">Cancel </a>
                              </div>
                          </div>
                      </form>
                  </div>

                  </div>
                  </div>







          		</div>

<?php include 'footer.php'; ?>
<?php
session_start();
include 'header.php';
?>
<head>
  <title>Product Order Process | Tombo Ati</title>
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
            $data  = mysqli_fetch_assoc($query);

            $query_product = mysqli_query($koneksi, "SELECT * FROM products WHERE code='$data[code_product]'");
            $data_product  = mysqli_fetch_assoc($query_product);
$bonusreorder1 = $data_product['bonusreorder1'];
$bonusreorder2 = $data_product['bonusreorder2'];
$bonusreorder3 = $data_product['bonusreorder3'];
$bonusreorder4 = $data_product['bonusreorder4'];
$bonusreorder5 = $data_product['bonusreorder5'];
$bonusreorder6 = $data_product['bonusreorder6'];
$bonusreorder7 = $data_product['bonusreorder7'];
$bonusreorder8 = $data_product['bonusreorder8'];
$bonusreorder9 = $data_product['bonusreorder9'];
$bonusreorder10 = $data_product['bonusreorder10'];
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
                      <form class="form-horizontal style-form" action="admin-product-order-process2.php" method="post" name="form1" id="form1">
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Userid</label>
                              <div class="col-sm-10">
                                  <input name="userid" type="text" id="userid" class="form-control" value="<?php echo $data['userid'];?>" readonly />
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Code Transaksi</label>
                              <div class="col-sm-10">
                                  <input name="code" type="text" id="code" class="form-control" value="<?php echo $data['code'];?>" readonly />
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Code Product</label>
                              <div class="col-sm-10">
                                  <input name="codeproduct" type="text" id="codeproduct" class="form-control" value="<?php echo $data['code_product'];?>" readonly />
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Jumlah Product</label>
                              <div class="col-sm-10">
                                  <input name="jumlah" type="text" id="jumlah" class="form-control" value="<?php echo $data['jumlah'];?>" readonly />
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
                                  <input name="8035839999" class="form-control" id="8035839999" type="text" value="8035839999" readonly />
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">a.n. </label>
                              <div class="col-sm-10">
                                  <input name="xxxx" class="form-control" id="xxxx" type="text" value="REKENING MAXGOO" readonly />
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Nilai Transfer (Rp.)</label>
                              <div class="col-sm-10">
                                  <input name="amount" type="hidden" id="amount" class="form-control" value="<?php echo $data['amount'];?>" readonly />
                                  <input name="amountx" type="text" id="amountx" class="form-control" value="<?php echo number_format($data['amount'],0,",",".");?>" readonly />
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Message</label>
                              <div class="col-sm-10">
<textarea class="form-control" cols="100%" rows="3" name="message" value="" required />Detail Konfirmasi Transfer :</textarea>
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Generasi 1 </label>
                              <div class="col-sm-10">
                                  <input name="bonusreorder1" class="form-control" id="bonusreorder1" type="text" value="<?php echo $bonusreorder1;?>" readonly />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Generasi 2 </label>
                              <div class="col-sm-10">
                                  <input name="bonusreorder2" class="form-control" id="bonusreorder2" type="text" value="<?php echo $bonusreorder2;?>" readonly />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Generasi 3 </label>
                              <div class="col-sm-10">
                                  <input name="bonusreorder3" class="form-control" id="bonusreorder3" type="text" value="<?php echo $bonusreorder3;?>" readonly />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Generasi 4 </label>
                              <div class="col-sm-10">
                                  <input name="bonusreorder4" class="form-control" id="bonusreorder4" type="text" value="<?php echo $bonusreorder4;?>" readonly />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Generasi 5 </label>
                              <div class="col-sm-10">
                                  <input name="bonusreorder5" class="form-control" id="bonusreorder5" type="text" value="<?php echo $bonusreorder5;?>" readonly />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Generasi 6 </label>
                              <div class="col-sm-10">
                                  <input name="bonusreorder6" class="form-control" id="bonusreorder6" type="text" value="<?php echo $bonusreorder6;?>" readonly />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Generasi 7 </label>
                              <div class="col-sm-10">
                                  <input name="bonusreorder7" class="form-control" id="bonusreorder7" type="text" value="<?php echo $bonusreorder7;?>" readonly />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Generasi 8 </label>
                              <div class="col-sm-10">
                                  <input name="bonusreorder8" class="form-control" id="bonusreorder8" type="text" value="<?php echo $bonusreorder8;?>" readonly />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Generasi 9 </label>
                              <div class="col-sm-10">
                                  <input name="bonusreorder9" class="form-control" id="bonusreorder9" type="text" value="<?php echo $bonusreorder9;?>" readonly />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Generasi 10 </label>
                              <div class="col-sm-10">
                                  <input name="bonusreorder10" class="form-control" id="bonusreorder10" type="text" value="<?php echo $bonusreorder10;?>" readonly />
                              </div>
                          </div>



                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-10">
                                  <input type="submit" name="order-process" value="Posting Bonus RO"  class="btn btn-sm btn-primary"/>&nbsp;
	                              <a href="pin-order-history.php" class="btn btn-sm btn-danger">Cancel </a>
                              </div>
                          </div>

                      </form>
                  </div>
                  </div>
                  </div>







          		</div>

<?php include 'footer.php'; ?>
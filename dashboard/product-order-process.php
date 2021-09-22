<?php
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
                      <form class="form-horizontal style-form" action="pin-order-process2.php" method="post" name="form1" id="form1">
                                  <input name="id" type="hidden" id="id" class="form-control" value="<?php echo $_SESSION[id];?>" readonly="readonly" autofocus="on" />

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Username</label>
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
                              <label class="col-sm-2 col-sm-2 control-label">Jumlah</label>
                              <div class="col-sm-10">
                                  <input name="jumlah" type="text" id="jumlah" class="form-control" value="<?php echo $data['jumlah'];?>" readonly />
                              </div>
                          </div>
<?php
            $query_product = mysqli_query($koneksi, "SELECT * FROM products WHERE code='$data[code_product]' ");
            $data_product  = mysqli_fetch_array($query_product);
?>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Title</label>
                              <div class="col-sm-10">
                                  <input name="title" type="text" id="title" class="form-control" value="<?php echo $data_product['title'];?>" readonly />
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Title</label>
                              <div class="col-sm-10">
                                  <textarea name="diskripsi" rows="5" cols="70" readonly class="form-control" ><?php echo $data_product['description'];?></textarea>
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
                                  <input name="tangggal" class="form-control" id="atas_nama" type="text" value="<?php echo $data['tanggal'];?>" readonly />
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
<option value="#?code=<?php echo $data['code'];?>"> Transfer Bank</option>
<option value="#?code=<?php echo $data['code'];?>"> Potong Saldo</option>
<!-- 
<option value="product-order-process-maybank.php?code=<?php echo $data['code'];?>"> MAYBANK 00000000000000</option>
<option value="product-order-process-bca.php?code=<?php echo $data['code'];?>"> Bank BCA 440 165 9000</option>
<option value="product-order-process-mandiri.php?code=<?php echo $data['code'];?>"> Bank Mandiri 144 009 165 9000</option>
<option value="product-order-process-bni.php?code=<?php echo $data['code'];?>"> Bank BNI 881 165 9000</option>
 -->
</select>

                              </div>
                          </div>



                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-10">
	                              <a href="product-order-history.php" class="btn btn-sm btn-danger">Cancel </a>
                              </div>
                          </div>
                      </form>
                  </div>
                  </div>
                  </div>







          		</div>

<?php include 'footer.php'; ?>
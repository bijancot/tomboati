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
$rowvarian = mysqli_fetch_assoc($sql);
$sid=$rowvarian['userid'];

/////////////////////////////////////////

	include '../connect.php';
	include '../session-varian.php';
	include '../class/payment.php';
	include '../class/product.php';



	include_once('../veritrans-php-snap/Veritrans.php');
	Veritrans_Config::$serverKey = "VT-server-15H4o1h54vdy8RYa9WMnehl4";
	Veritrans_Config:$isProduction = true;
	Veritrans_Config::$isSanitized = true;

	// Comment to disable 3D-Secure
	Veritrans_Config::$is3ds = true;
	
	$produk= new Product();
	
	$shopcart=new Cart();
	$userid=$sid;
	$query="select * from mebers WHERE userid='000001'";
	$result=mysql_query($query);
	$data=mysql_fetch_array($result);
	$namadepan=$data['name'];
	$namabelakang=$data['name'];
	$email=$data['email'];
	$notelp=$data['hphone'];
	$cicilanpembeli=$_POST['cicilan'];
	$detailproduct=array();
	$totalharga=0;
	
	if(empty($_POST['cicilan']))
	{
		$cicilanpembeli=0;
	}
	$query="select tblProduct.*, tblCart.jumlah as jumlah,tblCart.harga as hargacart,(tblCart.harga*tblCart.jumlah) as 'subtotal',tblCart.jumlah as 'jumlah', tblCart.idcart from tblProduct,tblCart where tblCart.idproduct = tblProduct.idbarang and idsession='$userid'";
	$result=mysql_query($query);
	
	while($row=mysql_fetch_array($result))
	{
		$totalharga=$totalharga+$row['hargacart'];
		array_push($detailproduct, array('id' => $row['idbarang'], 'price' => 5000000,  'quantity' => 1, 'name' => 'Membership Gold'));
	}
	
	
	$item_details = $detailproduct;
	
	$notapemesanan="GL-".date('Y-m-d H:i:s')."";
	$transaction_details = array(
		'order_id' => $notapemesanan,
		'gross_amount' => $totalharga, // no decimal allowed for creditcard
	);
	
	$customer_details = array(
    'first_name'    => $namadepan, //optional
    'last_name'     => $namabelakang, //optional
    'email'         => "$email", //mandatory
    'phone'         => "$notelp, ", //mandatory
    'billing_address'  => "", //optional
    'shipping_address' => "" //optional
    );
	
	$credit_card = array(
		'secure' => true,
		'channel' => "migs",
		'bank' => "maybank",
		
		"installment" => array(
			  "required" => false,
			  "terms" => array(
				  "maybank" => [3, 6]
			   )
		),
		
		'whitelist_bins ' => array("maybank")
	);
	
	$enable_payments = array("credit_card", "mandiri_clickpay", "cimb_clicks", "bca_klikbca", "bca_klikpay", "bri_epay", "telkomsel_cash", "echannel", "bbm_money", "xl_tunai", "indosat_dompetku", "mandiri_ecash", "permata_va","bca_va", "other_va", "kioson", "indomaret", "gci");
	
	$transaction = array(
		'enabled_payments' => $enable_payments,
		'credit_card' => $credit_card,
		'transaction_details' => $transaction_details,
		'item_details' => $item_details,
		'customer_details' => $customer_details,
	);
	
	$snapToken = Veritrans_Snap::getSnapToken($transaction);



//////////////////////////

include 'header.php';



?>
<head>
  <title>Pin Order Process CC | Tombo Ati </title>
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
            $query_varian = mysqli_query($koneksi, "SELECT * FROM pin_request WHERE code='$_GET[code]'");
            $data  = mysqli_fetch_array($query_varian);

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
                      <form class="form-horizontal style-form" action="pin-order-process-bca2.php" method="post" name="form1" id="form1">
                                  <input name="id" type="hidden" id="id" class="form-control" value="<?php echo $_SESSION[id];?>" readonly="readonly" autofocus="on" />

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">User Id</label>
                              <div class="col-sm-10">
                                  <input name="userid" type="text" id="bank" class="form-control" value="<?php echo $rowvarian['userid'];?>" readonly />
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Code</label>
                              <div class="col-sm-10">
                                  <input name="code" type="text" id="code" class="form-control" value="<?php echo $data['code'];?>" readonly />
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Jumlah Pin</label>
                              <div class="col-sm-10">
                                  <input name="jumlahpin" type="text" id="jumlahpin" class="form-control" value="<?php echo $data['jumlahpin'];?>" readonly />
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






<head>
<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Satisfy' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="../styles/style.css">
<link rel="stylesheet" type="text/css" href="../styles/framework.css">
<link rel="stylesheet" type="text/css" href="../styles/font-awesome.css">
<script type="text/javascript" src="../scripts/jquery.js"></script>
<script type="text/javascript" src="../scripts/plugins.js"></script>
<script type="text/javascript" src="../scripts/custom.js"></script>
<script type="text/javascript"
	src="https://app.midtrans.com/snap/snap.js"
	data-client-key="VT-client-VU5odk7215VhZxFI">
</script>
</head>

<body>
<div id="page-transitions">
   

<div id="page-content" class="page-content">
    <div id="page-content-scroll">
       
        <div class="content">       
            <div class="store-cart-1">
                <div class="clear"></div>

                <div class="cart-costs">
					<form action="../payment.php" method="post">
						<div class="store-input">
<input name="cicilan" value="0" type="hidden">

							<center><h3>Nomor Credit Card</h3></center>
							<input type="number" name="nomorcc" id="nomorcc">
							<center><h3>Nama Pemegang Kartu</h3></center>
							<input type="text"name="namapemilik" id="namapemilik">

						</div>
					</form>
                </div>
                <div class="clear"></div>
				
				<div class="cart-costs">
					<button class="button button-green button-fullscreen half-top" id="pay-button">Process</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="background"></div>
</div>








<script type="text/javascript">
  var payButton = document.getElementById('pay-button');
  function changeResult(type,data){
	console.log(type);
	console.log(data);
	var cicilan= document.getElementById("cicilan").value;
	var nomorcc= document.getElementById("nomorcc").value;
	var namapemilik= document.getElementById("namapemilik").value;
	if(type=="success" || type=="pending")
	{
		window.location.replace("../paymentproses.php?cicilan="+cicilan+"&nomorcc="+nomorcc+"&namapemilik="+namapemilik);
	}
	else
	{
		alert("Maaf Transaksi Gagal Silahkan Ulangi Kembali");
	}
	//resultType.innerHTML = type;
	//resultData.innerHTML = JSON.stringify(data);
  }
  payButton.onclick = function(){
	snap.pay('<?=$snapToken?>', {
	  onSuccess: function(result){changeResult('success', result)},
	  onPending: function(result){changeResult('pending', result)},
	  onError: function(result){changeResult('error', result)}
	});
	
	//window.location.replace("../paymentproses.php?cicilan="+cicilan+"");
  };
</script>
<?php include 'footer.php'; ?>
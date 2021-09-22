<?php

session_start();
if (isset($_GET['ref']) != '') 
{
$refid = $_GET['ref'];
$_SESSION['ref'] = $refid; 
$sid=$_SESSION['ref'];
} 

$totalpembayaran=$_GET['total'];

	include '../connect.php';
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
	$userid=$_SESSION['ref'];
	$query="select * from mebers where userid='$userid'";
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
		array_push($detailproduct, array('id' => DHRYCV, 'price' => $totalpembayaran,  'quantity' => 1, 'name' => 'Membership Gold'));
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
?>
<!DOCTYPE HTML>

<head>
	<title>Payment | Tombo Ati </title>
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
					<form action="payment.php" method="post">
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
		window.location.replace("paymentproses.php?cicilan="+cicilan+"&nomorcc="+nomorcc+"&namapemilik="+namapemilik);
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
	
	//window.location.replace("paymentproses.php?cicilan="+cicilan+"");
  };
</script>

</body>
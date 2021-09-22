<?php
include('config.php');
include('fungsi.php');

if(isset($_POST['pin-order'])){

function acak($panjang)
{
	$karakter= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$string = '';
	for ($i = 0; $i < $panjang; $i++) {
		$pos = rand(0, strlen($karakter)-1);
		$string .= $karakter{$pos};
	}
	return $string;
}
$code=acak(6);

$id = $_POST['id'];
$userid = $_POST['userid'];
$jumlahpin = $_POST['jumlahpin'];
$paket = $_POST['paket'];

if ($paket=='BRONZE') {$amount='750000';}
if ($paket=='SILVER') {$amount='2250000';}
if ($paket=='GOLD') {$amount='5250000';}
if ($paket=='PLATINUM') {$amount='11850000';}

$totalamount = $amount * $jumlahpin;

$insert = mysqli_query($koneksi, "INSERT INTO pin_request (userid, jumlahpin, amount, paket, code, tanggal) VALUES('$userid', '$jumlahpin', '$totalamount', '$paket', '$code', now())") or die(mysqli_error());

header('location:pin-order-history');	
    }
?>
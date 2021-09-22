<?php
include('config.php');
include('fungsi.php');

if(isset($_POST['topup'])){

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
$amount = $_POST['amount'];
$unik = $_POST['unik'];

$insert = mysqli_query($koneksi, "INSERT INTO hm2_pending_deposits (user_id, amount, unik, code, date) VALUES('$id', '$amount', '$unik', '$code', now())") or die(mysqli_error());

header('location:topup-history.php');	
    }
?>
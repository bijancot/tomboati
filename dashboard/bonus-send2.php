<?php
include('config.php');
include('fungsi.php');

if(isset($_POST['send-bonus'])){

$id = $_POST['id'];
$userid = $_POST['userid'];
$amount = $_POST['amount'];
$tanggal = $_POST['tanggal'];
$paid = $_POST['paid'];

if($paid==1){
	header('location: bonus-sponsor.php');
	exit();	
} else {
$insert = mysqli_query($koneksi, "INSERT INTO hm2_history (user_id, amount, type, description, date)
VALUES('$id', '$amount', 'commissions', 'Bonus Sponsor $tanggal', now())") or die(mysqli_error());
$query = mysqli_query($koneksi, "UPDATE bonus_sponsor SET paid='1' WHERE timer='$tanggal'")or die(mysql_error());
}
header('location:bonus-sponsor.php');	
}
?>
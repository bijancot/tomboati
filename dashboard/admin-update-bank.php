<?php
include('config.php');
include('fungsi.php');

if(isset($_POST['update-bank'])){


$id = $_POST['id'];
$username = $_POST['username'];
$bank = $_POST['bank'];
$rekening = $_POST['rekening'];
$atasnama = $_POST['atasnama'];

$query = mysqli_query($koneksi, "UPDATE mebers SET bank='$bank', rekening='$rekening', atasnama='$atasnama' WHERE userid='$username' ")or die(mysql_error());
}
if ($query){
header('location:admin-profile-edit.php?userid='.$username.'&error=8');	
} else {
	echo "gagal";
    }
?>
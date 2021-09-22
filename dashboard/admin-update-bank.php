<?php
include('config.php');
include('config2.php');
include('fungsi.php');

if(isset($_POST['update-bank'])){


$id = $_POST['id'];
$username = $_POST['username'];
$bank = $_POST['bank'];
$rekening = $_POST['rekening'];
$atasnama = $_POST['atasnama'];

$query = mysqli_query($koneksi, "UPDATE mebers SET bank='$bank', rekening='$rekening', atasnama='$atasnama' WHERE userid='$username' ")or die(mysql_error());
$query2 = mysqli_query($koneksi2, "UPDATE USER_REGISTER SET BANK='$bank', REKENING='$rekening', ATASNAMA='$atasnama' WHERE USERNAME='$username' ");

}
if ($query && $query2){

header('location:admin-profile-edit.php?userid='.$username.'&error=8');	
} else {
	echo "gagal";
    }
?>
<?php
include('config.php');
include('config2.php');
include('fungsi.php');

if(isset($_POST['update-status'])){

$id = $_POST['id'];
$username = $_POST['username'];
$paket = $_POST['paket'];

$query = mysqli_query($koneksi, "UPDATE mebers SET paket='$paket' WHERE userid='$username' ")or die(mysql_error());
$query2 = mysqli_query($koneksi2, "UPDATE USER_REGISTER SET STATUS_USER='$paket' WHERE USERNAME='$username' ");

}
if ($query && $query2){
header('location:admin-profile-edit.php?userid='.$username.'&error=9');	
} else {
	echo "Perubahan Status Gagal";
    }
?>
<?php
include('config.php');
include('fungsi.php');

if(isset($_POST['update-status'])){

$id = $_POST['id'];
$username = $_POST['username'];
$paket = $_POST['paket'];

$query = mysqli_query($koneksi, "UPDATE mebers SET paket='$paket' WHERE userid='$username' ")or die(mysql_error());
}
if ($query){
header('location:admin-profile-edit.php?userid='.$username.'&error=9');	
} else {
	echo "Perubahan Password Gagal";
    }
?>
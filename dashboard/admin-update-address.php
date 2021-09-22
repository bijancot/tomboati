<?php
include('config.php');
include('config2.php');
include('fungsi.php');

if(isset($_POST['update-address'])){

$id = $_POST['id'];
$username = $_POST['username'];
$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zip'];
$country = $_POST['country'];

$query = mysqli_query($koneksi, "UPDATE mebers SET address='$address', kota='$city', propinsi='$state', kode_pos='$zip', country='$country' WHERE userid='$username'")or die(mysql_error());
$query2 = mysqli_query($koneksi2, "UPDATE USER_REGISTER SET ALAMAT='$address', KOTA='$city', PROVINSI='$state', KODEPOS='$zip', NEGARA='$country' WHERE USERNAME='$username' ");

}
if ($query && $query2){
header('location:admin-profile-edit.php?userid='.$username.'&error=7');	
} else {
	echo "gagal";
    }
?>
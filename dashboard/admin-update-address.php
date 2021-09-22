<?php
include('config.php');
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
}
if ($query){
header('location:admin-profile-edit.php?userid='.$username.'&error=7');	
} else {
	echo "gagal";
    }
?>
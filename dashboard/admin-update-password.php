<?php
include('config.php');
include('config2.php');
include('fungsi.php');

if(isset($_POST['update-password'])){

$id = $_POST['id'];
$username = $_POST['username'];
$password1 = $_POST['password1'];
$enc_password1 = md5 ($password1);

$query = mysqli_query($koneksi, "UPDATE mebers SET passw='$password1', passenc='$enc_password1' WHERE userid='$username' ")or die(mysql_error());
$query2 = mysqli_query($koneksi2, "UPDATE USER_REGISTER SET PASSWORD='$password1' WHERE USERNAME='$username' ");

}
if ($query && $query2){
header('location:admin-profile-edit.php?userid='.$username.'&error=3');	
} else {
	echo "Perubahan Password Gagal";
    }
?>
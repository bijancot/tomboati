<?php
include('config.php');
include('fungsi.php');

if(isset($_POST['update-tpassword'])){

$id = $_POST['id'];
$username = $_POST['username'];
$password1 = $_POST['password1'];
$enc_password1 = md5 ($password1);

$query = mysqli_query($koneksi, "UPDATE mebers SET tpassw='$password1' WHERE userid='$username' ")or die(mysql_error());
}
if ($query){
header('location:admin-profile-edit.php?userid='.$username.'&error=4');	
} else {
	echo "Perubahan Password Gagal";
    }
?>
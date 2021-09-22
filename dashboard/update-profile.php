<?php
include('config.php');
include('fungsi.php');

if(isset($_POST['update-profile'])){

$id = $_POST['id'];
$username = $_POST['username'];
$password = $_POST['password'];
$fullname = $_POST['fullname'];
$hphone = $_POST['hphone'];
$email = $_POST['email'];
$ktp = $_POST['ktp'];
$npwp = $_POST['npwp'];
$ipaddress = $_SERVER['REMOTE_ADDR'];
$data="$username - $fullname - $hphone - $email - $ktp";

$query = mysqli_query($koneksi, "UPDATE mebers SET email='$email', hphone='$hphone', ktp='$ktp', npwp='$npwp' WHERE id='$id' ")or die(mysql_error());
$save="INSERT INTO logupdate SET
               userid='$username',
               data='$data',
               type='profile',
               ip='$ipaddress',
               timer=now()";
$result=mysqli_query($koneksi,$save) or display_html(mysqli_error(), "error.html");

}
if ($query){
header('location:profile.php');	
} else {
	echo "gagal";
    }
?>
<?php
include('config.php');
include('config2.php');
include('fungsi.php');

if(isset($_POST['update-profile'])){

$id = $_POST['id'];
$sponsor = $_POST['sponsor'];
$username = $_POST['username'];
$name = $_POST['name'];
$ktp = $_POST['ktp'];
$hp = $_POST['hp'];
$email = $_POST['email'];

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
header("Location: admin-profile-edit.php?userid='.$username.'&error=1&name=$name&email=$email&hp=$hp");
} 

else if (!preg_match("/^[0-9-_]*$/",$hp)) {
header("Location: admin-profile-edit.php?userid='.$username.'&?error=2&name=$name&email=$email&hp=$hp");
} else {

$query = mysqli_query($koneksi, "UPDATE mebers SET name='$name', email='$email', hphone='$hp', ktp='$ktp' WHERE userid='$username'")or die(mysql_error());
$query2 = mysqli_query($koneksi2, "UPDATE USER_REGISTER SET NAMALENGKAP='$name', EMAIL='$email', NOMORHP='$hp', NOMORKTP='$ktp' WHERE USERNAME='$username' ");


if ($query && $query2){
header('location:admin-profile-edit.php?userid='.$username.'&error=6');	
}
}
}
?>
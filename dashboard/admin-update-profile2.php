<?php
include('config.php');
include('fungsi.php');

if(isset($_POST['update-profile'])){

$id = $_POST['id'];
$username = $_POST['username'];
$ref = $_POST['ref'];
$name = $_POST['name'];
$idcard = $_POST['idcard'];
$hp = $_POST['hp'];
$email = $_POST['email'];
$pass=md5($_POST['password']);

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
header("Location: admin-profile-edit2.php?username='.$username.'&error=1&name=$name&email=$email&hp=$hp");
} 

else if (!preg_match("/^[0-9-_]*$/",$hp)) {
header("Location: admin-profile-edit2.php?username='.$username.'&?error=2&name=$name&email=$email&hp=$hp");
} else {

$query = mysqli_query($koneksi, "UPDATE hm2_users SET name='$name', ref='$ref', email='$email', eeecurrency_account='$hp', idcard='$idcard' WHERE username='$username'")or die(mysql_error());
if ($query){
header('location:admin-profile-edit2.php?username='.$username.'&error=6');	
}
}
}
?>
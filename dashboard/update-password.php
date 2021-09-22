<?php
include('config.php');
include('fungsi.php');

if(isset($_POST['update-password'])){

$id = $_POST['id'];
$username = $_POST['username'];
$tpassword = $_POST['tpassword'];
$password = $_POST['password'];
$password2 = $_POST['password2'];
$fullname = $_POST['fullname'];
$hphone = $_POST['hphone'];
$email = $_POST['email'];

            $query = mysqli_query($koneksi, "SELECT * FROM mebers WHERE userid='$username'");
            $data  = mysqli_fetch_array($query);

$tpass=$data['transaction_code'];

if ($tpassword==$tpass){
$query = mysqli_query($koneksi, "UPDATE mebers SET passw='$password' WHERE id='$id' ")or die(mysql_error());
header('location:../backoffice/profile-edit.php?error=PERUBAHAN PASSWORD BERHASIL');	
} else {
header('location:../backoffice/profile-edit.php?error=PERUBAHAN PASSWORD GAGAL');	
    }
    }
?>
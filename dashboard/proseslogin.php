<?php
include ("../conn.php");
date_default_timezone_set('Asia/Jakarta');
session_start();
$username = $_POST['username'];
$password = $_POST['password'];

if (empty($username) && empty($password)) {
header('location:index.php?error1');
break;

} else if (empty($username)) {
header('location:index.php?error=2');
break;

} else if (empty($password)) {
header('location:index.php?error=3');
break;
}

$q = mysqli_query($koneksi, "select * from user where username='$username' and password='$password'");
$row = mysqli_fetch_array ($q);

if (mysqli_num_rows($q) == 1) {
$_SESSION['user_id'] = $row['user_id'];
$_SESSION['username'] = $username;
$_SESSION['fullname'] = $row['fullname'];
$_SESSION['gambar'] = $row['gambar'];	

header('location:index.php');
} else {
header('location:index.php?error=4');
}
?>
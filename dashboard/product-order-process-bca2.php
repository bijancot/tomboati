<?php
include('config.php');
include('fungsi.php');

if(isset($_POST['order-process'])){

$id = $_POST['id'];
$unik = $_POST['unik'];
$userid = $_POST['userid'];
$message = $_POST['message'];
$code = $_POST['code'];

$query = mysqli_query($koneksi, "UPDATE product_order SET unik='$unik', status='2', message='$message', gateway='BCA', date=now() WHERE code='$code' AND userid='$userid' ")or die(mysql_error());

header('location:product-order-history.php');	
    }
?>
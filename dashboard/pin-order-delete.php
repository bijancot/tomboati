<?php
include('config.php');
include('fungsi.php');

$code = $_GET['code'];
$query = "DELETE FROM pin_request WHERE code='$code'";
$result = mysqli_query($koneksi, $query);

header('location:pin-order-history.php');	
?>
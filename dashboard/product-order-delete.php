<?php
include('config.php');
include('fungsi.php');

$code = $_GET['code'];
$query = "DELETE FROM product_order WHERE code='$code'";
$result = mysqli_query($koneksi, $query);

header('location:product-order-history.php');	
?>
<?php
include('config.php');
include('fungsi.php');

$code = $_GET['code'];
$query = "DELETE FROM product_order WHERE code='$code'";
$result = mysqli_query($koneksi, $query);

header('location:admin-product-order-history3.php');	
?>
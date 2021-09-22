<?php
include('config.php');
include('fungsi.php');

$code = $_GET['code'];
$query = "DELETE FROM hm2_pending_deposits WHERE code='$code'";
$result = mysqli_query($koneksi, $query);

header('location:topup-history.php');	
?>
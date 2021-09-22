<?php
include('../dashboard/config.php');
include('../dashboard/fungsi.php');

$code = $_GET['code'];
$query = "DELETE FROM hm2_pending_deposits WHERE code='$code'";
$result = mysqli_query($koneksi, $query);

echo "<script type='text/javascript'>document.location.href = 'point-history';</script>";
?>
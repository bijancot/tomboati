<?php
include('config.php');
include('fungsi.php');

if(isset($_POST['update-deposit'])){

$id = $_POST['id'];
$userid = $_POST['userid'];
$status = $_POST['status'];
$amount = $_POST['amount'];
$jumlah = $_POST['jumlah'];
$gateway = $_POST['gateway'];

$query = mysqli_query($koneksi, "UPDATE hm2_pending_deposits SET amount='$amount', jumlah='$jumlah', status='processed' WHERE id='$id' ") or die(mysql_error());

header('location:admin-all-point-new.php');
}
?>
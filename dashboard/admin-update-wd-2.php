<?php
include('config.php');
include('fungsi.php');

if(isset($_POST['update-wd'])){

$id = $_POST['id'];
$userid = $_POST['userid'];
$status = $_POST['status'];
$amount = $_POST['amount'];
$rekening = $_POST['rekening'];

$query = mysqli_query($koneksi, "UPDATE hm2_history SET status='$status', type='withdrawal', description='WD to Doge $rekening' WHERE id='$id' AND user_id='$userid' ")or die(mysql_error());

header('location:index.php');

}
?>
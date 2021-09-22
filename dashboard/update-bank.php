<?php
include('config.php');
include('fungsi.php');

$username = $_POST['username'];
$bank = $_POST['bank'];
$cabang = $_POST['cabang'];
$rekening = $_POST['rekening'];
$atasnama = $_POST['atasnama'];
$ipaddress = $_SERVER['REMOTE_ADDR'];
$data="$username - $bank - $no_rekening - $atas_nama";

$query = mysqli_query($koneksi, "UPDATE mebers_profile SET nama_bank='$bank', no_rek='$rekening', nama_rek='$atasnama', cabang='$cabang' WHERE username='$username' ")or die(mysql_error());
$save="INSERT INTO logupdate SET
               userid='$username',
               data='$data',
               type='bank',
               ip='$ipaddress',
               timer=now()";
$result=mysqli_query($koneksi,$save) or display_html(mysqli_error(), "error.html");
header('location:profile-edit.php');	
?>
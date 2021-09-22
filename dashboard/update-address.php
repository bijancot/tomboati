<?php
include('config.php');
include('fungsi.php');

$username = $_POST['username'];
$address = $_POST['address'];
$kota = $_POST['kota'];
$kecamatan = $_POST['kecamatan'];
$propinsi = $_POST['propinsi'];
$kode_pos = $_POST['kode_pos'];

$query = mysqli_query($koneksi, "UPDATE mebers_profile SET alamat='$address', kota='$kota', kecamatan='$kecamatan', propinsi='$propinsi', kode_pos='$kode_pos' WHERE username='$username' ")or die(mysql_error());

header('location:profile-edit.php');	

?>
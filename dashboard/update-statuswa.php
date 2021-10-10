<?php
include('config.php');

$id = $_POST['id'];

$query = mysqli_query($koneksi, "UPDATE mebers SET is_wa='1' WHERE id='$id' ") or die(mysql_error());

header('location:VPenggunaBaru.php');
?>

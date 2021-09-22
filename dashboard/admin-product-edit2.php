<?php
include('config.php');
include('fungsi.php');

if(isset($_POST['update-product'])){

$id = $_POST['id'];
$code = $_POST['code'];
$category = $_POST['category'];
$title = $_POST['title'];
$description = $_POST['description'];
$bruto = $_POST['bruto'];
$stock = $_POST['stock'];
$bonusreorder1 = $_POST['bonusreorder1'];
$bonusreorder2 = $_POST['bonusreorder2'];
$bonusreorder3 = $_POST['bonusreorder3'];
$bonusreorder4 = $_POST['bonusreorder4'];
$bonusreorder5 = $_POST['bonusreorder5'];
$bonusreorder6 = $_POST['bonusreorder6'];
$bonusreorder7 = $_POST['bonusreorder7'];
$bonusreorder8= $_POST['bonusreorder8'];
$bonusreorder9 = $_POST['bonusreorder9'];
$bonusreorder10 = $_POST['bonusreorder10'];

$query = mysqli_query($koneksi, "UPDATE products SET 
category='$category', 
title='$title', 
description='$description', 
bruto='$bruto',
stock='$stock',
bonusreorder1='$bonusreorder1',
bonusreorder2='$bonusreorder2',
bonusreorder3='$bonusreorder3',
bonusreorder4='$bonusreorder4',
bonusreorder5='$bonusreorder5',
bonusreorder6='$bonusreorder6',
bonusreorder7='$bonusreorder7',
bonusreorder8='$bonusreorder8',
bonusreorder9='$bonusreorder9',
bonusreorder10='$bonusreorder10'
WHERE code='$code'")or die(mysql_error());

header("location:admin-product-edit.php?code=$code&error=6");	
}
?>
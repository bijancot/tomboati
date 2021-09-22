<?php
include('config.php');
include('fungsi.php');

if(isset($_POST['update-setting'])){

$url_website = $_POST['url_website'];
$paketname1 = $_POST['paketname1'];
$paketname3 = $_POST['paketname3'];
$paketname7 = $_POST['paketname7'];
$paketname15 = $_POST['paketname15'];
$paketnilai1 = $_POST['paketnilai1'];
$paketnilai3 = $_POST['paketnilai3'];
$paketnilai7 = $_POST['paketnilai7'];
$paketnilai15 = $_POST['paketnilai15'];
$flashout1 = $_POST['flashout1'];
$flashout3 = $_POST['flashout3'];
$flashout7 = $_POST['flashout7'];
$flashout15 = $_POST['flashout15'];

$query = mysqli_query($koneksi, "UPDATE set_bonus SET 
url_website='$url_website', 
paketname1='$paketname1', 
paketname3='$paketname3', 
paketname7='$paketname7', 
paketname15='$paketname15', 
paketnilai1='$paketnilai1', 
paketnilai3='$paketnilai3', 
paketnilai7='$paketnilai7', 
paketnilai15='$paketnilai15', 
flashout1='$flashout1', 
flashout3='$flashout3', 
flashout7='$flashout7', 
flashout15='$flashout15'
 ")or die(mysql_error());
}
if ($query){
header('location:admin-setting-edit.php');	
}

?>
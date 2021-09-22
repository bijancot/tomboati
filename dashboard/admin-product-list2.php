<?php
include('config.php');
include('fungsi.php');

if(isset($_POST['product-order'])){

function acak($panjang)
{
	$karakter= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ123456789';
	$string = '';
	for ($i = 0; $i < $panjang; $i++) {
		$pos = rand(0, strlen($karakter)-1);
		$string .= $karakter{$pos};
	}
	return $string;
}
$code=acak(6);

$id = $_POST['id'];
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

$insert = mysqli_query($koneksi, "INSERT INTO products (title, description, bruto, stock, code, category, date) VALUES('$title', '$description', '$bruto', '$stock', '$code', '$category', now())") or die(mysqli_error());

header('location:admin-product-list.php?pesan=PENAMBAHAN PRODUK BERHASIL');	
    }
?>
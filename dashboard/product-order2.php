<?php
include('config.php');
include('fungsi.php');

if(isset($_POST['product-order'])){

function acak($panjang)
{
	$karakter= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$string = '';
	for ($i = 0; $i < $panjang; $i++) {
		$pos = rand(0, strlen($karakter)-1);
		$string .= $karakter{$pos};
	}
	return $string;
}
$code=acak(6);

$userid = $_POST['userid'];
$code_product = $_POST['code_product'];
$title = $_POST['title'];
$price = $_POST['price'];
$jumlah = $_POST['jumlah'];

$sql_produk = mysqli_query($koneksi, "SELECT * FROM products WHERE code='$code_product' ");
$row_produk = mysqli_fetch_assoc($sql_produk);
$title = $row_produk["title"];
$bruto = $row_produk["bruto"];
$totalamount = $bruto * $jumlah;

$insert = mysqli_query($koneksi, "INSERT INTO product_order (userid, jumlah, amount, code_product, code, tanggal) VALUES('$userid', '$jumlah', '$totalamount', '$code_product', '$code', now())") or die(mysqli_error());

header('location:product-order-history.php');	
    }
?>
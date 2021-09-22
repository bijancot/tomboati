<?php
include('config.php');
include('fungsi.php');

if(isset($_POST['order-process'])){

$userid = $_POST['userid'];
$code = $_POST['code'];
$codeproduct = $_POST['code_product'];
$jumlah = $_POST['jumlah'];
$amount = $_POST['amount'];

        $row_cust_products=mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT * FROM product_order WHERE code='$code' "));
        $userid_cust_products=$row_cust_products['userid'];
        $code_cust_products=$row_cust_products['code_product'];
        $code_cust_transaksi=$row_cust_products['code'];
        $code_cust_jumlah=$row_cust_products['jumlah'];

        $row_bonus_products=mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT * FROM products WHERE code='$code_cust_products' "));
        $bonus_generasi1=$row_bonus_products['bonusreorder1'] * $code_cust_jumlah;
        $bonus_generasi2=$row_bonus_products['bonusreorder2'] * $code_cust_jumlah;
        $bonus_generasi3=$row_bonus_products['bonusreorder3'] * $code_cust_jumlah;
        $bonus_generasi4=$row_bonus_products['bonusreorder4'] * $code_cust_jumlah;
        $bonus_generasi5=$row_bonus_products['bonusreorder5'] * $code_cust_jumlah;
        $bonus_generasi6=$row_bonus_products['bonusreorder6'] * $code_cust_jumlah;
        $bonus_generasi7=$row_bonus_products['bonusreorder7'] * $code_cust_jumlah;
        $bonus_generasi8=$row_bonus_products['bonusreorder8'] * $code_cust_jumlah;
        $bonus_generasi9=$row_bonus_products['bonusreorder9'] * $code_cust_jumlah;
        $bonus_generasi10=$row_bonus_products['bonusreorder10'] * $code_cust_jumlah;

        $row_generasi=mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT * FROM mebers WHERE userid='$userid_cust_products'"));
        $userid_generasi1=$row_generasi['g1'];
        $userid_generasi2=$row_generasi['g2'];
        $userid_generasi3=$row_generasi['g3'];
        $userid_generasi4=$row_generasi['g4'];
        $userid_generasi5=$row_generasi['g5'];
        $userid_generasi6=$row_generasi['g6'];
        $userid_generasi7=$row_generasi['g7'];
        $userid_generasi8=$row_generasi['g8'];
        $userid_generasi9=$row_generasi['g9'];
        $userid_generasi10=$row_generasi['g10'];  

IF ($userid_generasi1!==" "){
$insert1 = mysqli_query($koneksi, "INSERT INTO bonus_repeat_order (userid, bonus, bonusfrom, code, code_product, timer) VALUES('$userid_generasi1', '$bonus_generasi1', '$userid_cust_products', '$code_cust_transaksi', '$code_cust_products', now())") or die(mysqli_error());
;}

IF ($userid_generasi2!==" "){
$insert2 = mysqli_query($koneksi, "INSERT INTO bonus_repeat_order (userid, bonus, bonusfrom, code, code_product, timer) VALUES('$userid_generasi2', '$bonus_generasi2', '$userid_cust_products', '$code_cust_transaksi', '$code_cust_products', now())") or die(mysqli_error());
}

IF ($userid_generasi3!==" "){
$insert3 = mysqli_query($koneksi, "INSERT INTO bonus_repeat_order (userid, bonus, bonusfrom, code, code_product, timer) VALUES('$userid_generasi3', '$bonus_generasi3', '$userid_cust_products', '$code_cust_transaksi', '$code_cust_products', now())") or die(mysqli_error());
;}

IF ($userid_generasi4!==" "){
$insert4 = mysqli_query($koneksi, "INSERT INTO bonus_repeat_order (userid, bonus, bonusfrom, code, code_product, timer) VALUES('$userid_generasi4', '$bonus_generasi4', '$userid_cust_products', '$code_cust_transaksi', '$code_cust_products', now())") or die(mysqli_error());
}

IF ($userid_generasi5!==" "){
$insert5 = mysqli_query($koneksi, "INSERT INTO bonus_repeat_order (userid, bonus, bonusfrom, code, code_product, timer) VALUES('$userid_generasi5', '$bonus_generasi5', '$userid_cust_products', '$code_cust_transaksi', '$code_cust_products', now())") or die(mysqli_error());
}

IF ($userid_generasi6!==" "){
$insert6 = mysqli_query($koneksi, "INSERT INTO bonus_repeat_order (userid, bonus, bonusfrom, code, code_product, timer) VALUES('$userid_generasi6', '$bonus_generasi6', '$userid_cust_products', '$code_cust_transaksi', '$code_cust_products', now())") or die(mysqli_error());
;}

IF ($userid_generasi7!==" "){
$insert7 = mysqli_query($koneksi, "INSERT INTO bonus_repeat_order (userid, bonus, bonusfrom, code, code_product, timer) VALUES('$userid_generasi7', '$bonus_generasi7', '$userid_cust_products', '$code_cust_transaksi', '$code_cust_products', now())") or die(mysqli_error());
;}

IF ($userid_generasi8!==" "){
$insert8 = mysqli_query($koneksi, "INSERT INTO bonus_repeat_order (userid, bonus, bonusfrom, code, code_product, timer) VALUES('$userid_generasi8', '$bonus_generasi8', '$userid_cust_products', '$code_cust_transaksi', '$code_cust_products', now())") or die(mysqli_error());
;}

IF ($userid_generasi9!==""){
$insert9 = mysqli_query($koneksi, "INSERT INTO bonus_repeat_order (userid, bonus, bonusfrom, code, code_product, timer) VALUES('$userid_generasi9', '$bonus_generasi9', '$userid_cust_products', '$code_cust_transaksi', '$code_cust_products', now())") or die(mysqli_error());
;}

IF ($userid_generasi10!==" "){
$insert10 = mysqli_query($koneksi, "INSERT INTO bonus_repeat_order (userid, bonus, bonusfrom, code, code_product, timer) VALUES('$userid_generasi10', '$bonus_generasi10', '$userid_cust_products', '$code_cust_transaksi', '$code_cust_products', now())") or die(mysqli_error());
;}

$query = mysqli_query($koneksi, "UPDATE product_order SET status='1' WHERE code='$code' ")or die(mysql_error());

header('location:admin-product-order-history.php');	
    }
?>
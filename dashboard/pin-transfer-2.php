<?php
include('config.php');
include('fungsi.php');

if(isset($_POST['pin-transfer'])){

$pin = $_POST['pin'];
$pinfor = $_POST['pinfor'];
$username = $_POST['transfer'];
$transfer = $_POST['transfer'];
$tpassword = $_POST['tpassword'];

            $query_member = mysqli_query($koneksi, "SELECT * FROM mebers WHERE userid='$pinfor' ");
            $data_member  = mysqli_fetch_array($query_member);
$nama_member=$data_member['name'];
$tpass=$data_member['transaction_code'];

if ($tpass==$tpassword){
$query = mysqli_query($koneksi, "UPDATE pin SET transfer='$transfer' WHERE pin='$pin' ")or die(mysql_error());
header('location:pin.php?error=transfer pin berhasil');	
} else {
header('location:pin-transfer.php?pin='.$pin.'&error=gagal-pin transaksi '.$tpassword.' salah');	
    }
    }
?>
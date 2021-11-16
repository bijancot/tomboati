<?php
include('config.php');
include('config2.php');
include('fungsi.php');

if(isset($_POST['update-deposit'])){

$id = $_POST['id'];
$userid = $_POST['userid'];
$status = $_POST['status'];
$amount = $_POST['amount'];

$sqlTampilx = mysqli_query($koneksi, "SELECT * FROM mebers WHERE userid='$userid' ");
$dataTampilx = mysqli_fetch_assoc($sqlTampilx);
$sponsor=$dataTampilx['sponsor'];
$upline=$dataTampilx['upline'];

$query = mysqli_query($koneksi, "UPDATE hm2_pending_deposits SET status='processed' WHERE id='$id' ") or die(mysql_error());
$query = mysqli_query($koneksi, "UPDATE mebers SET paket='RESELLER' WHERE userid='$userid' ") or die(mysql_error());
$query = mysqli_query($koneksi2, "UPDATE USER_REGISTER SET STATUS_USER='RESELLER' WHERE USERNAME='$userid' ") or die(mysql_error());
$query = mysqli_query($koneksi, "INSERT bonus_sponsor SET userid='$sponsor', bonusfrom='$userid', timer=now(), paid='0', bonus='200000', type='fee awal'")or die(mysql_error());

     $uplineid=$upline; 
     $i=0;
     do{
     $i++;
$row_level=$i;

if ($row_level == 1){$bonus=50000; $point=1;}
if ($row_level == 2){$bonus=45000; $point=0.9;}
if ($row_level == 3){$bonus=40500; $point=0.81;}
if ($row_level == 4){$bonus=36450; $point=0.73;}
if ($row_level == 5){$bonus=32805; $point=0.66;}
if ($row_level == 6){$bonus=29525; $point=0.59;}
if ($row_level == 7){$bonus=26572; $point=0.53;}
if ($row_level == 8){$bonus=23915; $point=0.48;}
if ($row_level == 9){$bonus=21523; $point=0.43;}

if ($row_level == 10){$bonus=19371; $point=0.39;}
if ($row_level == 11){$bonus=17434; $point=0.35;}
if ($row_level == 12){$bonus=15691; $point=0.31;}
if ($row_level == 13){$bonus=14121; $point=0.28;}
if ($row_level == 14){$bonus=12709; $point=0.25;}
if ($row_level == 15){$bonus=11438; $point=0.23;}
if ($row_level == 16){$bonus=10295; $point=0.21;}
if ($row_level == 17){$bonus=9265; $point=0.19;}
if ($row_level == 18){$bonus=8339; $point=0.17;}
if ($row_level == 19){$bonus=7505; $point=0.15;}
if ($row_level == 20){$bonus=6754; $point=0.14;}

if ($row_level == 21){$bonus=6079; $point=0.12;}
if ($row_level == 22){$bonus=5471; $point=0.11;}
if ($row_level == 23){$bonus=4924; $point=0.10;}
if ($row_level == 24){$bonus=4431; $point=0.09;}
if ($row_level == 25){$bonus=3988; $point=0.08;}
if ($row_level == 26){$bonus=3589; $point=0.07;}
if ($row_level == 27){$bonus=3231; $point=0.06;}
if ($row_level == 28){$bonus=2907; $point=0.06;}
if ($row_level == 29){$bonus=2617; $point=0.05;}
if ($row_level == 30){$bonus=2355; $point=0.05;}

if ($row_level == 31){$bonus=2120; $point=0.04;}
if ($row_level == 32){$bonus=1908; $point=0.04;}
if ($row_level == 33){$bonus=1717; $point=0.03;}
if ($row_level == 34){$bonus=1545; $point=0.03;}
if ($row_level == 35){$bonus=1391; $point=0.03;}
if ($row_level == 36){$bonus=1252; $point=0.03;}
if ($row_level == 37){$bonus=1126; $point=0.02;}
if ($row_level == 38){$bonus=1014; $point=0.02;}
if ($row_level == 39){$bonus=912; $point=0.02;}
if ($row_level == 40){$bonus=821; $point=0.02;}

if ($row_level == 41){$bonus=739; $point=0.01;}
if ($row_level == 42){$bonus=665; $point=0.01;}
if ($row_level == 43){$bonus=599; $point=0.01;}
if ($row_level == 44){$bonus=599; $point=0.01;}
if ($row_level == 45){$bonus=485; $point=0.01;}
if ($row_level == 46){$bonus=436; $point=0.01;}
if ($row_level == 47){$bonus=393; $point=0.01;}
if ($row_level == 48){$bonus=353; $point=0.01;}
if ($row_level == 49){$bonus=318; $point=0.01;}
if ($row_level == 50){$bonus=286; $point=0.01;}

     $dbq="INSERT INTO bonus_titik SET userid='$uplineid', bonusfrom='$userid', level='$i', timer=now(), bonus='$bonus', point='$point'";
     $resq=mysqli_query($koneksi,$dbq);
     $rowq=mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM mebers WHERE userid='$uplineid'"));
     $uplineid=$rowq['upline'];

     }
     while(($uplineid!='') AND ($i<51));       



echo "<script type='text/javascript'>document.location.href = 'admin-all-deposit-new.php';</script>";
}
?>
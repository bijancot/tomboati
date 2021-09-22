<?php
include 'header.php';

if(isset($_POST['withdrawal-request-2'])){

$id = $_POST['id'];
$sendfrom = $row['username'];
$sendto = $_POST['sendto'];
$amount = $_POST['amount'];
$amount2 = number_format($amount,0,",",".");
$memo = $_POST['memo'];
$tpassword = $_POST['tpassword'];
$tpassword2 = $row['transaction_code'];

if ($amount > $sum) {
header("Location: withdrawal-request-1.php?error=1");
} else if ($amount < 100000) {
header("Location: withdrawal-request-1.php?error=1");
} else if ($amount > 15000000){
header("Location: withdrawal-request-1.php?error=1");
} else if ($tpassword!=="$tpassword2") {
header("Location: withdrawal-request-1.php?error=3");
} else {

$insert = mysqli_query($koneksi, "INSERT INTO hm2_history (user_id, amount, type, description, date)
VALUES('$id', -'$amount', 'withdraw_pending', 'Withdrawal on process', now())") or die(mysqli_error());


header("Location: withdrawal-request-1.php?error=5");
}
}

?>
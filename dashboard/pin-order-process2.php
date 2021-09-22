<?php
include('config.php');
include('fungsi.php');

if(isset($_POST['order-process'])){

$id = $_POST['id'];
$userid = $_POST['userid'];
$subject = $_POST['subject'];
$content = $_POST['content'];
$tanggal = $timer;

$insert = mysqli_query($koneksi, "INSERT INTO ticket (userid, content, subject, tanggal) VALUES('$userid','$content','$subject', now())") or die(mysqli_error());

header('location:ticket.php');	
    }
?>
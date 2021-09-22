<?php
include('config.php');
include('fungsi.php');

if(isset($_POST['update-testimonial'])){

$id = $_POST['id'];
$sponsor = $_POST['sponsor'];
$username = $_POST['username'];
$content = $_POST['content'];
$status = $_POST['status'];

$query = mysqli_query($koneksi, "UPDATE testimonials SET status='$status', content='$content' WHERE userid='$username' AND id='$id'")or die(mysql_error());
if ($query){
header('location:admin-testimonial.php');	
}
}
?>
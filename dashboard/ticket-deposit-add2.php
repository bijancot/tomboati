<?php
include('config.php');
include('fungsi.php');

if(isset($_POST['ticket-add'])){

$id = $_POST['id'];
$userid = $_POST['userid'];
$subject = $_POST['subject'];
$content = $_POST['content'];
$tanggal = $timer;

$namafolder="gambar_konfirmasi/"; //tempat menyimpan file
if (!empty($_FILES["nama_file"]["tmp_name"]))
{
	$jenis_gambar=$_FILES['nama_file']['type'];
		$gambar = $namafolder . basename ($_FILES['nama_file']['name']);		
		if (move_uploaded_file($_FILES['nama_file']['tmp_name'], $gambar)) {

$insert = mysqli_query($koneksi, "INSERT INTO ticket (userid, content, subject, gambar, tanggal) VALUES('$userid','$content','$subject','$gambar', now())");

		} 
		} 
		} 

header('location:ticket.php');	


?>
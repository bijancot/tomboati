<?php
session_start();
include('header.php');
require_once "topup-upload-photo-mandiri2.php"; 

if(isset($_FILES['file'])) {
$origname = $_FILES['file']['name'];
$ext = explode(".", $origname);
$extension = end($ext);
$md5 = md5(time()).md5($origname);
$uplaodfile = md5($md5).'.'.$extension;
$id = $_POST['id'];
$unik = $_POST['unik'];
$userid = $_POST['userid'];
$message = $_POST['message'];
$code = $_POST['code'];

$dir = "gambar_pin";
if (!is_dir($dir))
{
 mkdir($dir, 0755);
}
$uploader = new uploader($_FILES['file'],$dir.'/',$uplaodfile);
$uploader->upload();
$ok = $uploader->getInfo();
$query = mysqli_query($koneksi, "UPDATE hm2_pending_deposits SET unik='$unik', status='pending', message='$message', gateway='MANDIRI', photo='gambar_pin/$uplaodfile', date=now() WHERE code='$code' AND user_id='$id' ")or die(mysql_error());

if(!empty($ok))
{
$avatar = $dir . '/' . $uplaodfile;
$uploaded= $uploader->getInfo();
uploader::e($uploaded);

}
else
{
$uploaded = $uploader->getError();
uploader::e($uploaded);
}
}
?>
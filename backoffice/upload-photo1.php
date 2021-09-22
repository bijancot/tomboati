<?php
ini_set('display_errors',0);
session_start();
include('header.php');
require_once "upload-photo2.php"; 

if(isset($_FILES['file'])) {
$origname = $_FILES['file']['name'];
$ext = explode(".", $origname);
$extension = end($ext);
$md5 = md5(time()).md5($origname);
$uplaodfile = md5($md5).'.'.$extension;
$id = $_POST['id'];
$code = $_POST['code'];

$dir = "gambar_transfer";
if (!is_dir($dir))
{
 mkdir($dir, 0755);
}
$uploader = new uploader($_FILES['file'],$dir.'/',$uplaodfile);
$uploader->upload();
$ok = $uploader->getInfo();
$query = mysqli_query($koneksi, "UPDATE hm2_pending_deposits SET photo='gambar_transfer/$uplaodfile' WHERE code='$code'")or die(mysql_error());

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
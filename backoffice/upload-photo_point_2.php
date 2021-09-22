<?php 
session_start();
class uploader{
private $type = array("jpg","jpeg","gif","png"),$width = 250,$height = 250,$info = '',$error='';
 function __construct($file,$dir,$newfile){
 $this->file = $file;
 $this->dir = $dir;
 $this->newfile = $newfile;
 @error_reporting(0);
 }
 public function upload(){
 $ext = explode(".",$this->file['name']);
 $ext = strtolower(end($ext));
 
 if(file_exists($this->dir.$this->file['name'])){
 $this->error .= "<div class='text-center'><b>Filename alredy exist!</b></div>";
 return false;
 }
 if (!in_array($ext,$this->type)){
 $this->error .= "<div class='text-center'><b>File Format not supported</b></div>";
 return false;
 }
 list($imwidth,$imheight) = @getimagesize($this->file['tmp_name']);
 
 $hx = (100 / ($imwidth / $this->width)) * .01;
 $hx = round ($imheight * $hx);
 
 if ($hx < $this->height) {
 $this->height = (100 / ($imwidth / $this->width)) * .01;
 $this->height = round ($imheight * $this->height);
 } else {
 $this->width = (100 / ($imheight / $this->height)) * .01;
 $this->width = round ($imwidth * $this->width);
 }
 $image = @imagecreatetruecolor($this->width, $this->height);
 if($ext == "jpg" || $ext == "jpeg") {
 $im = @imagecreatefromjpeg ($this->file['tmp_name']);
 } else if($ext == "gif") {
 $im = @imagecreatefromgif ($this->file['tmp_name']);
 } else if($ext == "png") {
 $im = @imagecreatefrompng ($this->file['tmp_name']);
 }
 
 if(@imagecopyresampled($image, $im, 0, 0, 0, 0, $this->width, $this->height, $imwidth, $imheight)) {
 echo "<script type='text/javascript'>document.location.href = 'point-history';</script>";
}

 if($ext == "jpg" || $ext == "jpeg") {
 @imagejpeg($image, $this->dir.$this->newfile, 100);
 } else if($ext == "gif") {
 @imagegif ($image, $this->dir.$this->newfile);
 } else if($ext == "png") {
 @imagepng ($image, $this->dir.$this->newfile, 0);
 }
 
 @imagedestroy($im);
 return $im;
 
 }
 
 public function getInfo(){
 return $this->info;
 }
 
 public function getError(){
 if(empty($this->error))
 {$this->error = "<div class='text-center'><b>Unknown error! Your request cannot complete now!</b></div>";}
 return $this->error;
 }
 
 public static function e($e)
 {
 echo $e;
 }
 
}
?>
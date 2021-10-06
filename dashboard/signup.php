<?
session_start();
if (isset($_GET['ref']) != '') 
{
$refid = $_GET['ref'];
$_SESSION['referral'] = $refid; 
$sponsor=$_SESSION['referral'];
} 
else 
{ 
header('Location: signup.php?ref=000001');
}


$error=$_GET['error'];
if($error=='1')
{$status='EMAIL SUDAH DIGUNAKAN - GUNAKAN EMAIL YANG LAIN';}


?>

<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>Sign Up | Tombo Ati</title>
<link rel="icon" href="https://tomboatitour.biz/assets/img/logo_tomboati.png" type="image/x-icon" />
    
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src='https://www.google.com/recaptcha/api.js'></script>
<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
    <!-- Favicon -->
<link rel="apple-touch-icon" sizes="57x57" href="../ico/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="../ico/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="../ico/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="../ico/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="../ico/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="../ico/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="../ico/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="../ico/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="../ico/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="../ico/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="../ico/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="../ico/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="../ico/favicon-16x16.png">
<link rel="manifest" href="../ico/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="../ico/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
</head>




<img src='bg_login5.jpg' style='position:fixed;top:0px;left:0px;width:100%;height:100%;z-index:-1;'>
<body>


    <form action="signup2.php" method="post" class="form-login">
<br>
<center><img src='logo_login.png' width="200">
    <h2><font color="white"> Preregister</font></h2>
<H3><font color="YELLOW"><? echo $status; ?></FONT></H3><BR>
</center>
	<p>
    	<input type="text" name="nama" placeholder="Nama Lengkap" required="" class="normal-input" />
	</p>
	<p>
    	<input type="text" name="handphone" placeholder="No HP" required="" class="normal-input" />
	</p>
    <p>
    	<input type="email" name="email" placeholder="Email" required="" class="normal-input" />
	</p>
    <p>
    	<input type="text" name="kota" placeholder="Kota" required="" class="normal-input" />
	</p>

<input type="hidden" name="sponsor" placeholder="<?php echo $sponsor; ?>" value="<?php echo $sponsor; ?>" required>
	<tr>
		<td><font color="white">Sponsor : <?php echo $sponsor; ?></font></td>
	</tr>



</p>
    <input type="submit" value="Signup" class="tombol" name="add-member"  />
    

    </form>

</body>
</html>
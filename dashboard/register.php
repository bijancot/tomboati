<?php
session_start();
if (isset($_GET['ref']) != '') 
{
$refid = $_GET['ref'];
$_SESSION['referral'] = $refid; 
$sponsor=$_SESSION['referral'];
} 
else 
{ 
header('Location: register.php?ref=000001');
}


$error=$_GET['error'];
if($error=='1')
{$status='EMAIL SUDAH DIGUNAKAN - GUNAKAN EMAIL YANG LAIN';}

include('config.php');
include('fungsi.php');

if(isset($_POST['add-member'])){
$nama = $_POST['nama'];
$email = $_POST['email'];
$sponsor = $_POST['sponsor'];

$insert = mysqli_query($koneksi, "INSERT INTO order_pin 
(nama, email, sponsor, timer )
VALUES
('$nama', '$email', '$sponsor', now() )") or die(mysqli_error());

header("Location:../info");
}
?>

<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Register | Tombo Ati</title>
	<meta name="robots" content="noindex" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.icoxx"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('https://wallpaperaccess.com/full/123112.jpg');">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action="" method="post">
					<span class="login100-form-logo">
						<img src="images/logosvarga.pngxx" width="70">
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Register Member
					</span>
					<div>
<font color="yellow"><?php echo $_GET['error']; ?></font>
<br><br>					</div>


					<div class="wrap-input100 validate-input" data-validate = "Nama">
						<input class="input100" type="text" name="name" placeholder="Nama" required>
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Email">
						<input class="input100" type="email" name="email" placeholder="Email">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>


					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
    <input type="submit" value="Next >>" class="tombol" name="add-member"  />
						</button>
					</div>

					<div class="text-center p-t-90">
						<a class="txt1" href="register-login.php">
							saya sudah memiliki keanggotaan
						</a><br>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
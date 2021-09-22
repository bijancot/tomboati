<?
include('config.php');
include('fungsi.php');

$sponsor = $_POST['sponsor'];
$nama = $_POST['nama'];
$handphone = $_POST['handphone'];
$email = $_POST['email'];
$kota = $_POST['kota'];

$tampil=mysqli_query($koneksi, "select * from order_pin WHERE email = '$email'");
$total=mysqli_num_rows($tampil);

if ($total == 0){

?>

<!DOCTYPE html>
<html>
<head>
<title>Sign Up | Tombo Ati</title>
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
    <form action="signup3.php" method="post" class="form-login">
<br>
<center><img src='logo_login.png' width="200"></center>
    <h2 align="center"><font color="white"> Preregister</font></h2>
	<p>
    	<font color="white"><b>Nama : <?php echo $nama; ?></font><input type="hidden" name="nama" value="<?php echo $nama; ?>" />
	</p>
	<p>
    	<font color="white"><b>No HP : <?php echo $handphone; ?></font><input type="hidden" name="handphone" value="<?php echo $handphone; ?>" />
	</p>
    <p>
    	<font color="white"><b>Email : <?php echo $email; ?></font><input type="hidden" name="email" value="<?php echo $email; ?>" />
	</p>
    <p>
    	<font color="white"><b>Kota : <?php echo $kota; ?></font><input type="hidden" name="kota" value="<?php echo $kota; ?>" />
	</p>
<font color="white"><b>Sponsor : <?php echo $sponsor; ?></font><input type="hidden" name="sponsor" value="<?php echo $sponsor; ?>" />
<p>
</p>
    <input type="submit" value="Next >>" class="tombol" name="add-member"  />

    </form>

</body>
</html>
<?
;} else {
header('Location:signup.php?ref=' . $sponsor . '&error=1');
} 
?>
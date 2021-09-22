<?php
include('config.php');
include('fungsi.php');

if(isset($_POST['update'])){
$namafolder="gambar_customer/"; //tempat menyimpan file

if (!empty($_FILES["nama_file"]["tmp_name"]))
{
	$jenis_gambar=$_FILES['nama_file']['type'];
        $id     = $_POST['id'];
        $nama     = $_POST['nama'];
		$alamat   = $_POST['alamat'];
		$no_telp  = $_POST['no_telp'];
        $username = $_POST['username'];
        $password = $_POST['password'];
		
	if($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif" || $jenis_gambar=="image/png")
	{			
		$gambar = $namafolder . basename($_FILES['nama_file']['name']);		
		if (move_uploaded_file($_FILES['nama_file']['tmp_name'], $gambar)) {
			$sql="UPDATE mebers SET photo='$gambar' WHERE id='$id'" or die(mysqli_error());
			$res=mysqli_query($koneksi, $sql) or die (mysqli_error());
			//echo "Gambar berhasil dikirim ke direktori".$gambar;
            echo "<script>alert('Data Customer berhasil diupdate!'); window.location = 'profile.php'</script>";	   
		} else {
		   echo "<p>Gambar gagal dikirim</p>";
		}
   } else {
		echo "Jenis gambar yang anda kirim salah. Harus .jpg .gif .png";
   }
} else {
	echo "Anda belum memilih gambar";
}
} ?>
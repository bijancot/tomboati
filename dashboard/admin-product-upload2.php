<?php
include('config.php');
include('fungsi.php');

if(isset($_POST['upload-product'])){
$namafolder="gambar_product/"; //tempat menyimpan file
$code = $_POST['code'];

if (!empty($_FILES["nama_file"]["tmp_name"]))
{
	$jenis_gambar=$_FILES['nama_file']['type'];
		
	if($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif" || $jenis_gambar=="image/png")
	{			
		$gambar = $namafolder . basename($_FILES['nama_file']['name']);		
		if (move_uploaded_file($_FILES['nama_file']['tmp_name'], $gambar)) {
			$sql="UPDATE products SET file_name='$gambar' WHERE code='$code'";
			$res=mysqli_query($koneksi, $sql);

            echo "<script>alert('Data Customer berhasil diupdate!'); window.location = 'admin-product-list.php'</script>";	   
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
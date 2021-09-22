<?php 
include "../config.php";

$date = date('Y-m-d H:i:s', time());

header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=MaxGoo_Members_$date.xls");
	?>
 
	<center>
		<h1>MaxGoo - Members</h1>
	</center>
 
	<table border="1">
		<tr>
			<th>No</th>
			<th>Username</th>
			<th>Name</th>
			<th>Mobile</th>
			<th>Email</th>
			<th>City</th>
			<th>Sponsor</th>
			<th>Register Date</th>
		</tr>
		<?php 
 
		// menampilkan data pegawai
		$data = mysqli_query($koneksi,"select * from mebers");
		$no = 1;
		while($d = mysqli_fetch_array($data)){

$sqlsponsor = mysqli_query($koneksi, "SELECT * FROM mebers WHERE userid='$d[sponsor]' ");
$rowsponsor = mysqli_fetch_assoc($sqlsponsor);

$hp=$d['hphone'];

		?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $d['userid']; ?></td>
			<td><?php echo $d['name']; ?></td>
			<td><?php echo "$hp&nbsp;" ?></td>
			<td><?php echo $d['email']; ?></td>
			<td><?php echo $d['kota']; ?></td>
			<td><?php echo $rowsponsor['userid']; ?></td>
			<td><?php echo $d['timer']; ?></td>
		</tr>
		<?php 
		}
		?>
	</table>
</body>
</html>
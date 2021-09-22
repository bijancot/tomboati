<?php 
include "../config.php";

$date = date('Y-m-d H:i:s', time());

header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=DogeStakeBot_Investment_$date.xls");
	?>
 
	<center>
		<h1>DogeStakeBot.com - Investment</h1>
	</center>
 
	<table border="1">
		<tr>
			<th>No</th>
			<th>Username</th>
			<th>Name</th>
			<th>Package</th>
			<th>Amount</th>
			<th>Paid</th>
			<th>Invest Date</th>
			<th>Next Paid</th>
		</tr>
		<?php 
 
		// menampilkan data pegawai
		$data = mysqli_query($koneksi,"select * from hm2_deposits");
		$no = 1;
		while($d = mysqli_fetch_array($data)){

$sqluser = mysqli_query($koneksi, "SELECT * FROM hm2_users WHERE id='$d[user_id]' ");
$rowuser = mysqli_fetch_assoc($sqluser);

$hp=$rowuser['eeecurrency_account'];
$idplan = $d['type_id'];

if ($idplan=='1'){
$planname='SILVER';
$min='10000';
$max='10000';
} 
else if ($idplan=='2'){
$planname='GOLD';
$min='25000';
$max='25000';
} 
else if ($idplan=='3'){
$planname='PLATINUM';
$min='50000';
$max='50000';
} 
else if ($idplan=='4'){
$planname='TITANIUM';
$min='100000';
$max='100000';
}

		?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $rowuser['username']; ?></td>
			<td><?php echo $rowuser['name']; ?></td>
			<td><?php echo $planname; ?></td>
			<td><?php echo number_format($d['amount'], 0, ', ', '.');?></td>
			<td><?php echo $d['q_pays']; ?></td>
			<td><?php echo $d['deposit_date']; ?></td>
			<td><?php echo $d['last_pay_date']; ?></td>
		</tr>
		<?php 
		}
		?>
	</table>
</body>
</html>
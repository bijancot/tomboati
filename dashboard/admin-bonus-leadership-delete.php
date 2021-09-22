<?php
include('config.php');
include('fungsi.php');

    $query1 = "SELECT * FROM bonus_titik ORDER BY id DESC";
    $hasil = mysqli_query($koneksi, $query1) or die(mysqli_error());
    $total_baris = mysqli_num_rows($hasil);
?>
<head>
  <title>Bonus Leadership Delete | Tombo Ati </title>
</head>

                  <table id="example" class="table table-hover table-bordered">

<?php 
                     $no=0;
                     while($data=mysqli_fetch_array($hasil))
                    { $no++; 

$tampil_nama=mysqli_query($koneksi, "select * from mebers WHERE userid='$data[userid]' ");
$data_nama=mysqli_fetch_array($tampil_nama);

$userid=$data['userid'];
$paket=$data_nama['paket'];

$query = mysqli_query($koneksi, "UPDATE bonus_titik SET paket='$paket' WHERE userid='$userid' ")or die(mysql_error());
// $query2 = "DELETE FROM bonus_titik WHERE paket='MEMBER'";
$query2 = "DELETE FROM bonus_titik WHERE paket='MITRA'";
$result = mysqli_query($koneksi, $query2);

?>
                    <tbody>
                    <tr>
                    <td><left><?php echo $no; ?>.</left></td>
                    <td align="left"><?php echo $data['userid'];?></td>
                    <td align="left"><?php echo $data['paket'];?></td>
                    <td><center><?php echo $data['timer'];?></center></td>
                    <td><left><?php echo $data['bonusfrom'];?></left></td>
                    <td><left><?php echo $data['level'];?></left></td>
                    <td><left><?php echo $data_nama['name'];?></left></td>
                    <td align='right'>Rp. <?php echo number_format($data['bonus'],0,",",".");?></td>




                    </tr>
</div>
                 <?php   
    $html_paging = "<li><a href='?halaman=".$nomor_paging."&batas=".$default_batas."'>".$nomor_paging."</a></li>";

              } 

  
              ?>
                   </tbody>
                   </table>

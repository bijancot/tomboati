<?php
session_start();
include 'header.php';
?>

<head>
  <title>Edit Mitra | Tombo Ati</title>
</head>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">

                </section>

                <!-- Main content -->
                <section class="content">

                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                    
              </div>
           <!-- /.row -->
                    <!-- Main row -->
                    <div class="row">
                        <div class="col-lg-12">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-user"></i>Mitra</h3> 
                        </div>
                        <div class="panel-body">
<div class="table-responsive">

<?php
if(isset($_GET['username-src']))
{    $username_src = $_GET['src1'];
}

//index awal data yang ingin ditampilkan
$default_index = 0;

//batasan menampilkan data
$default_batas = 100;

//jika terdapat nilai batas di URL, gunakan untuk mengganti nilai default $default_batas
if(isset($_GET['batas']))
{
    $default_batas = $_GET['batas'];
}

//jika terdapat nilai halaman di URL, gunakan untuk mengganti nilai dafault dari $default_index
if(isset($_GET['halaman']))
{
    $default_index = ($_GET['halaman']-1) * $default_batas;
}

    $query1 = "SELECT * FROM generasi WHERE updatex='0' ORDER BY timer DESCc limit $default_index, $default_batas";
    $tampil = mysqli_query($koneksi, $query1) or die(mysqli_error());
    $total_baris = mysqli_num_rows($tampil);


?>

                  <table id="example" class="table table-hover table-bordered">
                  <thead>
                      <tr>
                        <th><center>No. </center></th>
                        <th><center>Userid </i></center></th>
                        <th><center>Sponsor </i></center></th>
                        <th><center>Username </i></center></th>
                        <th><center>Password </i></center></th>
                        <th><center>Sponsor </i></center></th>
                        <th><center>Contact </center></th>
                        <th><center>Register Date </center></th>
                      </tr>
                  </thead>
                     <?php 
                     $no=0;
                     while($data=mysqli_fetch_array($tampil))
                    { $no++; 

$username = $data['username'];
$nama = $data['nama'];
$sponsor = $data['userid_sponsor'];

$sqlsponsor = mysqli_query($koneksi, "SELECT * FROM generasi WHERE username='$sponsor' ");
$rowsponsor = mysqli_fetch_assoc($sqlsponsor);
$g2=$rowsponsor['userid_sponsor'];

$sqlsponsor = mysqli_query($koneksi, "SELECT * FROM generasi WHERE username='$g2' ");
$rowsponsor = mysqli_fetch_assoc($sqlsponsor);
$g3=$rowsponsor['userid_sponsor'];

$sqlsponsor = mysqli_query($koneksi, "SELECT * FROM generasi WHERE username='$g3' ");
$rowsponsor = mysqli_fetch_assoc($sqlsponsor);
$g4=$rowsponsor['userid_sponsor'];

$sqlsponsor = mysqli_query($koneksi, "SELECT * FROM generasi WHERE username='$g4' ");
$rowsponsor = mysqli_fetch_assoc($sqlsponsor);
$g5=$rowsponsor['userid_sponsor'];

$sqlsponsor = mysqli_query($koneksi, "SELECT * FROM generasi WHERE username='$g5' ");
$rowsponsor = mysqli_fetch_assoc($sqlsponsor);
$g6=$rowsponsor['userid_sponsor'];

$sqlsponsor = mysqli_query($koneksi, "SELECT * FROM generasi WHERE username='$g6' ");
$rowsponsor = mysqli_fetch_assoc($sqlsponsor);
$g7=$rowsponsor['userid_sponsor'];

$sqlsponsor = mysqli_query($koneksi, "SELECT * FROM generasi WHERE username='$g7' ");
$rowsponsor = mysqli_fetch_assoc($sqlsponsor);
$g8=$rowsponsor['userid_sponsor'];

$sqlsponsor = mysqli_query($koneksi, "SELECT * FROM generasi WHERE username='$g8' ");
$rowsponsor = mysqli_fetch_assoc($sqlsponsor);
$g9=$rowsponsor['userid_sponsor'];

$sqlsponsor = mysqli_query($koneksi, "SELECT * FROM generasi WHERE username='$g9' ");
$rowsponsor = mysqli_fetch_assoc($sqlsponsor);
$g10=$rowsponsor['userid_sponsor'];

?>
                    <tbody>
                    <tr>
                    <td><left><?php echo $no; ?>.</center></td>
                    <td><left><font color="blue"><b><?php echo $username;?></font><br><?php echo $nama;?><br>sponsor <?php echo $sponsor;?></center></td>
                    <td><left><font color="blue"><b>g1 <?php echo $sponsor;?><br>g2 <?php echo $g2;?><br>g3 <?php echo $g3;?><br>g4 <?php echo $g4;?><br>g5 <?php echo $g5;?><br>g6 <?php echo $g6;?><br>g7 <?php echo $g7;?><br>g8 <?php echo $g8;?><br>g9 <?php echo $g9;?><br>g10 <?php echo $g10;?></font></center></td>
                    <td><left><font color="blue"><b><?php echo $data['passw'];?></font></center></td>
                    <td><left><font color="blue"><b><?php echo $data['sponsor'];?></font><br><?php echo $rowsponsor['name'];?></center></td>
                    <td><left><?php echo $data['hphone']; ?><br><?php echo $data['email']; ?><br><?php echo $data['country']; ?></center></td>
                   <td><left><br><font color="blue"><b><?php echo $data['timer']; ?></b></font></center></td>
                     <td><center>

<?php
// $query = mysqli_query($koneksi, "UPDATE generasi SET g1='$sponsor', g2='$g2', g3='$g3', g4='$g4', g5='$g5', g6='$g6', g7='$g7', g8='$g8', g9='$g9', g10='$g10', updatex='0' WHERE username='$username'  ")or die(mysql_error());
?>

</center></td>
                   </tr>
</div>
                 <?php   
    $html_paging = "<li><a href='?halaman=".$nomor_paging."&batas=".$default_batas."'>".$nomor_paging."</a></li>";

              } 

  
              ?>
                   </tbody>
                   </table>

            <form method="get">
              <div class="form-group row">
                <div  class="col-sm-3">
                  <input  class="form-control" name="batas" value='<?php echo $default_batas?>'/>
                </div>
                <div class="col-md-3">
                  <button class="btn btn-default btn-block" type="submit">BARIS</button>
                </div>
              </div>
            </form>
<center>


<?php

$halaman = @$_GET['halaman'];
if(empty($halaman)){
 $posisi  = 0;
 $halaman = 1;
}
else{ 
  $posisi  = ($halaman-1) * $default_batas; 
}



$query2 = mysqli_query($koneksi, "select * from generasi");
$jmldata = mysqli_num_rows($query2);
$jmlhalaman = ceil($jmldata/$default_batas);
$hal1 = $_GET['halaman']-1;
$hal2 = $_GET['halaman']+1;
if ($batas!='') {$batas2 = $_GET['batas'];} else {$batas2 = $default_batas;}
 echo " 
<ul class=\"pagination\">
<li class=\"page-item\"><a href=\"admin-all-member-on-update.php?halaman=$hal1&batas=$batas2\">Previous</a></li>
</ul>";

for($i=1;$i<=$jmlhalaman;$i++)


if ($i != $halaman){

 echo " 
<ul class=\"pagination\">
<li class=\"page-item\"><a href=\"admin-all-member-on-update.php?halaman=$i&batas=$batas2\">$i</a></li>
</ul>";
}
else{ 
 echo " <ul class=\"pagination\"><li class=\"page-item active\"><a href=\"admin-all-member-on-update.php?halaman=$i&batas=$batas2\">$i</a></li></ul>"; 
}
 echo " 
<ul class=\"pagination\">
<li class=\"page-item\"><a href=\"admin-all-member-on-update.php?halaman=$hal2&batas=$batas2\">Next</a></li>
</ul>";

echo "<p>Total Record : <b>$jmldata</b> Mitra</p>";
?>
                  <!-- </div>-->
              </div> 
              </div>
            </div><!-- col-lg-12--> 
<?php include 'footer.php'; ?>
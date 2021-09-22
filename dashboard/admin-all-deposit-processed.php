<?php
session_start();
include 'header.php';
?>
<head>
  <title>Deposit Processed | Tombo Ati</title>
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
                        <h3 class="panel-title"><span class="glyphicon glyphicon-signal"></span> Deposit History</h3> 
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
$default_batas = 20;

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

    $query1 = "SELECT * FROM hm2_pending_deposits WHERE status='processed' AND type='upgrade' ORDER BY id DESC limit $default_index, $default_batas";
    $tampil = mysqli_query($koneksi, $query1) or die(mysqli_error());
    $total_baris = mysqli_num_rows($tampil);


?>


                  <table id="example" class="table table-hover table-bordered">
                  <thead>
                      <tr>
                        <th><center>No. </center></th>
                        <th><center>Username</i></center></th>
                        <th><center>Name</i></center></th>
                        <th><center>Amount</i></center></th>
                        <th><center>Gateway</i></center></th>
                        <th><center>Code</i></center></th>
                        <th><center>Date</i></center></th>
                        <th><center>Status </center></th>
                      </tr>
                  </thead>
                     <?php 
                     $no=0;
                     while($data_deposit=mysqli_fetch_array($tampil))
                    { $no++; 

$statusproses = $data_deposit['status'];
if ($statusproses == 'new'){$statusprosesxx='
<a href="update-deposit-1.php?id=<?php echo $data_deposit[id]; ?>" class="btn btn-sm btn-warning"><?php echo $statusprosesxx; ?><i class="fa fa-arrow-circle-right"> PROCESS</i></a>
';} else {$statusprosesxx='';}

$dataphoto=$data_deposit['photo'];
if ($dataphoto!=''){
    $photo="<a href=\"https://tomboatitour.com/backoffice/$dataphoto\" target=\"_blank\"><img src=\"https://tomboatitour.com/backoffice/$dataphoto\" width=\"15%\">";
}
else {
    $photo="";
}

?>
                    <tbody>
                    <tr>

                    <td><left><?php echo $no; ?>.</center></td>
<?
$tampil_user_id=$data_deposit['user_id'];
$sqlTampilx = mysqli_query($koneksi, "SELECT * FROM mebers WHERE id='$tampil_user_id' ");
$dataTampilx = mysqli_fetch_assoc($sqlTampilx);
?>

                    <td align="left"><? echo $dataTampilx['userid'];?></td>
                    <td align="left"><? echo $dataTampilx['name'];?></td>
                    <td align="right"><left><?php echo number_format($data_deposit['amount'], 0, ', ', '.');?></center></td>
                    <td><left><?php echo $data_deposit['gateway']; ?></center></td>
                    <td><left><?php echo $data_deposit['code']; ?></center></td>
                    <td><left><?php echo $data_deposit['date']; ?></center></td>
                    <td><left><?php echo $photo; ?></center></td>
                    <td><left><a href="#" class="btn btn-sm btn-success"><i class="fa fa-arrow-circle-right"> PROCESSED</i></center></td>

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



$query2 = mysqli_query($koneksi, "select * from hm2_pending_deposits WHERE status='processed' AND type='upgrade' ");
$jmldata = mysqli_num_rows($query2);
$jmlhalaman = ceil($jmldata/$default_batas);
$hal1 = $_GET['halaman']-1;
$hal2 = $_GET['halaman']+1;
if ($batas!='') {$batas2 = $_GET['batas'];} else {$batas2 = $default_batas;}
 echo " 
<ul class=\"pagination\">
<li class=\"page-item\"><a href=\"admin-all-deposit-processed.php?halaman=$hal1&batas=$batas2\">Previous</a></li>
</ul>";

for($i=1;$i<=$jmlhalaman;$i++)


if ($i != $halaman){

 echo " 
<ul class=\"pagination\">
<li class=\"page-item\"><a href=\"admin-all-deposit-processed.php?halaman=$i&batas=$batas2\">$i</a></li>
</ul>";
}
else{ 
 echo " <ul class=\"pagination\"><li class=\"page-item active\"><a href=\"admin-all-deposit-processed.php?halaman=$i&batas=$batas2\">$i</a></li></ul>"; 
}
 echo " 
<ul class=\"pagination\">
<li class=\"page-item\"><a href=\"admin-all-deposit-processed.php?halaman=$hal2&batas=$batas2\">Next</a></li>
</ul>";

echo "<p>Total Record : <b>$jmldata</b> transaksi</p>";
?>
                  <!-- </div>-->
              </div> 
              </div>
            </div><!-- col-lg-12--> 
<?php include 'footer.php'; ?>
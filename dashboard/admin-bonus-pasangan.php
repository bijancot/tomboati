<?php
session_start();
include 'header.php';
?>
<head>
  <title>Bonus Pasangan | Tombo Ati </title>
</head>
            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Bonus
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">

                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                    
              </div>
           <!-- /.row -->
                    <br />
                    <!-- Main row -->
                    <div class="row">
                        <div class="col-lg-12">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-usd"></i> Bonus Pasangan [<a href="excel/export_excel_bonuspasangan.php">Export to Excel</a>]</h3> 
                        </div>
                        <div class="panel-body">
                       <!-- <div class="table-responsive"> -->
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

    $query1 = "SELECT * FROM bonus_pasangan ORDER BY id DESC limit $default_index, $default_batas";
    $hasil = mysqli_query($koneksi, $query1) or die(mysqli_error());
    $total_baris = mysqli_num_rows($hasil);
?>


                  <table id="example" class="table table-hover table-bordered">
                  <thead>
                      <tr>
                        <th><center>No. </center></th>
                        <th><center>Username </i></center></th>
                        <th><center>Tanggal </i></center></th>
                        <th><center>Pasangan </i></center></th>
                        <th><center>Bonus </center></th>
                        <th><center>Promo Bonus </center></th>
                        <th><center>Nilai Bonus </center></th>
                        <th><center>Today L </center></th>
                        <th><center>Today R </center></th>
                        <th><center>Status </center></th>
                      </tr>
                  </thead>
                     <?php 
                     $no=0;
                     while($data=mysqli_fetch_array($hasil))
                    { $no++; 

$pasanganx = $data['pasangan'];
$promo_pasangan = $data['promo_pasangan'];
$bonus = $data['bonus'];
?>
                    <tbody>
                    <tr>
                    <td><left><?php echo $no; ?>.</left></td>
                    <td align="left"><?php echo $data['userid'];?></td>
                    <td><center><?php echo $data['timer'];?></center></td>
                    <td><center><?php echo $data['pasangan'];?></center></td>
                    <td align='right'>Rp. <?php echo number_format($bonus,0,",",".");?></td>
                    <td align='right'>Rp. <?php echo number_format($promo_pasangan,0,",",".");?></td>
                    <td align='right'>Rp. <?php echo number_format($promo_pasangan + $bonus,0,",",".");?></td>
                    <td><center><?php echo $data['todayfl'];?></center></td>
                    <td><center><?php echo $data['todayfr'];?></center></td>


<?
                            if ($data['paid'] == '0'){
								$statusnya='<span class="label label-warning">On Proces</span>';
							}
                            else if ($data['paid'] == '1' ){
								$statusnya='<span class="label label-success">Processed</span>';
							}
?>


                    <td><center><?php echo $statusnya; ?></center></td>
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



$query2 = mysqli_query($koneksi, "select * from bonus_pasangan");
$jmldata = mysqli_num_rows($query2);
$jmlhalaman = ceil($jmldata/$default_batas);
$hal1 = $_GET['halaman']-1;
$hal2 = $_GET['halaman']+1;
if ($batas!='') {$batas2 = $_GET['batas'];} else {$batas2 = $default_batas;}
 echo " 
<ul class=\"pagination\">
<li class=\"page-item\"><a href=\"admin-bonus-pasangan.php?halaman=$hal1&batas=$batas2\">Previous</a></li>
</ul>";

for($i=1;$i<=$jmlhalaman;$i++)


if ($i != $halaman){

 echo " 
<ul class=\"pagination\">
<li class=\"page-item\"><a href=\"admin-bonus-pasangan.php?halaman=$i&batas=$batas2\">$i</a></li>
</ul>";
}
else{ 
 echo " <ul class=\"pagination\"><li class=\"page-item active\"><a href=\"admin-bonus-pasangan.php?halaman=$i&batas=$batas2\">$i</a></li></ul>"; 
}
 echo " 
<ul class=\"pagination\">
<li class=\"page-item\"><a href=\"admin-bonus-pasangan.php?halaman=$hal2&batas=$batas2\">Next</a></li>
</ul>";

echo "<p>Total Record : <b>$jmldata</b> Mitra</p>";
echo "<p><a href=\"excel/export_excel_bonuspasangan.php\"><b><h3>Export to Excel</a></b></h3></p>";
?>
                  <!-- </div>-->
              </div> 
              </div>
            </div><!-- col-lg-12--> 
<?php include 'footer.php'; ?>
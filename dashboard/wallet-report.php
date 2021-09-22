<?php
session_start();
include 'header.php';
?>
<head>
  <title> Wallet Report | Tombo Ati</title>
</head>
            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Record History
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
                        <h3 class="panel-title"><i class="fa fa-user"></i> All Report</h3> 
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

    $query1 = "SELECT * FROM hm2_history WHERE user_id='$row[id]' ORDER BY id DESC limit $default_index, $default_batas";
    $tampil = mysqli_query($koneksi, $query1) or die(mysqli_error());
    $total_baris = mysqli_num_rows($tampil);


?>

                  <table id="example" class="table table-hover table-bordered">
                  <thead>
                      <tr>
                        <th><center>No. </center></th>
                        <th><center>Name </i></center></th>
                        <th><center>Out </i></center></th>
                        <th><center>In </i></center></th>
                        <th><center>Description </center></th>
                        <th><center>Date </center></th>
                     </tr>
                  </thead>
                     <?php 
                     $no=0;
                     while($data=mysqli_fetch_array($tampil))
                    { $no++; 

            $query_user = mysqli_query($koneksi, "SELECT * FROM mebers WHERE id='$data[user_id]'");
            $data_user  = mysqli_fetch_array($query_user);

IF ($data['amount']>0){$amount_view=$data['amount'];} else {$amount_view='';}
IF ($data['amount']<0){$amount_view2=ltrim($data['amount'],'-');} else {$amount_view2='';}
IF ($data['type']=='deposit'){$type='investing';} else {$type=$data['type'];}
?>
                    <tbody>
                    <tr>
                    <td><left><?php echo $no; ?>.</center></td>
                    <td><left><?php echo $data_user['name']; ?></center></td>
                    <td align="right"><?php echo number_format($amount_view2, 0, ', ', '.');?></td>
                    <td align="right"><?php echo number_format($amount_view, 0, ', ', '.');?></td>
                    <td><left><?php echo $data['description'];?></center></td>
                    <td><left><?php echo $data['date']; ?></center></td>
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



$query2 = mysqli_query($koneksi, "select * from hm2_history WHERE user_id='$row[id]'");
$jmldata = mysqli_num_rows($query2);
$jmlhalaman = ceil($jmldata/$default_batas);
$hal1 = $_GET['halaman']-1;
$hal2 = $_GET['halaman']+1;
if ($batas!='') {$batas2 = $_GET['batas'];} else {$batas2 = $default_batas;}
 echo " 
<ul class=\"pagination\">
<li class=\"page-item\"><a href=\"wallet-report.php?halaman=$hal1&batas=$batas2\">Previous</a></li>
</ul>";

for($i=1;$i<=$jmlhalaman;$i++)


if ($i != $halaman){

 echo " 
<ul class=\"pagination\">
<li class=\"page-item\"><a href=\"wallet-report.php?halaman=$i&batas=$batas2\">$i</a></li>
</ul>";
}
else{ 
 echo " <ul class=\"pagination\"><li class=\"page-item active\"><a href=\"wallet-report.php?halaman=$i&batas=$batas2\">$i</a></li></ul>"; 
}
 echo " 
<ul class=\"pagination\">
<li class=\"page-item\"><a href=\"wallet-report.php?halaman=$hal2&batas=$batas2\">Next</a></li>
</ul>";

echo "<p>Total Record : <b>$jmldata</b> transaction</p>";
?>
                  <!-- </div>-->
              </div> 
              </div>
            </div><!-- col-lg-12--> 
<?php include 'footer.php'; ?>
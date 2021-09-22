<?php
session_start();
include 'header.php';
?>
<head>
  <title>History Plan | Tombo Ati</title>
</head>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                         Investing Report
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
                        <h3 class="panel-title"><i class="fa fa-user"></i> All Record [<a href="excel/export_excel_invest.php">Export to Excel</a>]</h3> 
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

    $query1 = "SELECT * FROM hm2_deposits ORDER BY id DESC limit $default_index, $default_batas";
    $tampil = mysqli_query($koneksi, $query1) or die(mysqli_error());
    $total_baris = mysqli_num_rows($tampil);


?>



                  <table id="example" class="table table-hover table-bordered">
                  <thead>
                      <tr>
                        <th><center>No. </center></th>
                        <th><center>Username </i></center></th>
                        <th><center>Amount </i></center></th>
                        <th><center>Package </i></center></th>
                        <th><center>Investment Date </center></th>
                        <th><center>Next Pay Date </center></th>
                        <th><center>Paid </center></th>
                      </tr>
                  </thead>
                     <?php 
                     $no=0;
                     while($data=mysqli_fetch_array($tampil))
                    { $no++; 

$sql_user = mysqli_query($koneksi, "SELECT * FROM hm2_users WHERE id = '$data[user_id]' ");
$row_user = mysqli_fetch_assoc($sql_user);

$idplan = $data['type_id'];
$last_pay_date = $data['last_pay_date'];
$last_pay_date_now = date("Y-m-d H:i:s");
$last_pay_date2 = date ('Y-m-d H:i:s',strtotime('+2 day', strtotime($last_pay_date_now)));

$q_pays = $data['q_pays'] +1;
$amount_profit = $data['amount'] * $profitnya;
$user_id = $data['user_id'];
$depositid = $data['id'];

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
                    <tbody>
                    <tr>
                    <td><left><?php echo $no; ?>.</center></td>
                    <td><left><font color="blue"><b><?php echo $row_user['username'];?></font><br><?php echo $row_user['name'];?></center></td>
                    <td align="right"><?php echo number_format($data['amount'], 0, ', ', '.');?></td>
                    <td><left><?php echo $planname;?></center></td>
                    <td><left><?php echo $data['deposit_date'];?></center></td>
                    <td><left><?php echo $last_pay_date; ?></center></td>
                    <td><left><?php echo $data['q_pays']; ?></center></td>
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

</div>
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



$query2 = mysqli_query($koneksi, "select * from hm2_deposits");
$jmldata = mysqli_num_rows($query2);
$jmlhalaman = ceil($jmldata/$default_batas);
$hal1 = $_GET['halaman']-1;
$hal2 = $_GET['halaman']+1;
if ($batas!='') {$batas2 = $_GET['batas'];} else {$batas2 = $default_batas;}
 echo " 
<ul class=\"pagination\">
<li class=\"page-item\"><a href=\"admin-history-plan.php?halaman=$hal1&batas=$batas2\">Previous</a></li>
</ul>";

for($i=1;$i<=$jmlhalaman;$i++)


if ($i != $halaman){

 echo " 
<ul class=\"pagination\">
<li class=\"page-item\"><a href=\"admin-history-plan.php?halaman=$i&batas=$batas2\">$i</a></li>
</ul>";
}
else{ 
 echo " <ul class=\"pagination\"><li class=\"page-item active\"><a href=\"admin-history-plan.php?halaman=$i&batas=$batas2\">$i</a></li></ul>"; 
}
 echo " 
<ul class=\"pagination\">
<li class=\"page-item\"><a href=\"admin-history-plan.php?halaman=$hal2&batas=$batas2\">Next</a></li>
</ul>";

echo "<p>Total Record : <b>$jmldata</b> transaksi</p>";
echo "<p><a href=\"excel/export_excel_invest.php\"><b><h3>Export to Excel</a></b></h3></p>";
?>
                  <!-- </div>-->
              </div> 
              </div>
            </div><!-- col-lg-12--> 
<?php include 'footer.php'; ?>
<?php
session_start();
include 'header.php';
?>
<head>
  <title>Ticket | Tombo Ati</title>
</head>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Ticket Support
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">

           <!-- /.row -->
                    <br />
                    <!-- Main row -->


<!-- col-lg-12--> 



<section class="col-lg-12 connectedSortable">                            




                            <div class="panel panel-success">
                        <div class="panel-heading">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-book"></span> Tickets Support</h3> 
                        </div>
                        <div class="panel-body">
                       <div class="table-responsive">
											 <br>
                       
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

    $query1 = "SELECT * FROM ticket ORDER BY id DESC limit $default_index, $default_batas";
    $hasil = mysqli_query($koneksi, $query1) or die(mysqli_error());
    $total_baris = mysqli_num_rows($hasil);
?>
                  <table id="example" class="table table-hover table-bordered">
                  <thead>
                      <tr>
                        <th><center>No. </center></th>
                        <th><center>Username</center></th>
                        <th><center>Subject</center></th>
                        <th><center>Message</center></th>
                        <th><center>Date </center></th>
                      </tr>
                  </thead>
                     <?php 
$no=0;
                     while($data=mysqli_fetch_array($hasil))
                    {  $no++;
?>
                    <tbody>
                    <td><?php echo $no; ?>.</center></td>
                    <td><?php echo $data['userid'];?></center></td>
                    <td><?php echo $data['subject'];?></center></td>
                    <td><?php echo $data['content'];?></center></td>
                    <td><center><?php echo $data['tanggal'];?></center></td>
                     <td><center><a href="admin-ticket-edit.php?userid=<?php echo $data['userid']; ?>" class="btn btn-sm btn-warning">Edit <i class="fa fa-arrow-circle-right"></i></a></center></td>
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



$query2 = mysqli_query($koneksi, "select * from ticket");
$jmldata = mysqli_num_rows($query2);
$jmlhalaman = ceil($jmldata/$default_batas);
$hal1 = $_GET['halaman']-1;
$hal2 = $_GET['halaman']+1;
if ($batas!='') {$batas2 = $_GET['batas'];} else {$batas2 = $default_batas;}
 echo " 
<ul class=\"pagination\">
<li class=\"page-item\"><a href=\"admin-ticket.php?halaman=$hal1&batas=$batas2\">Previous</a></li>
</ul>";

for($i=1;$i<=$jmlhalaman;$i++)


if ($i != $halaman){

 echo " 
<ul class=\"pagination\">
<li class=\"page-item\"><a href=\"admin-ticket.php?halaman=$i&batas=$batas2\">$i</a></li>
</ul>";
}
else{ 
 echo " <ul class=\"pagination\"><li class=\"page-item active\"><a href=\"admin-ticket.php?halaman=$i&batas=$batas2\">$i</a></li></ul>"; 
}
 echo " 
<ul class=\"pagination\">
<li class=\"page-item\"><a href=\"admin-ticket.php?halaman=$hal2&batas=$batas2\">Next</a></li>
</ul>";

echo "<p>Total Record : <b>$jmldata</b> Mitra</p>";
?>
                  <!-- </div>-->
              </div> 
              </div>
            </div><!-- col-lg-12--> 
<?php include 'footer.php'; ?>
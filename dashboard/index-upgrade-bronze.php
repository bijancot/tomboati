<?php

include 'header.php';
date_default_timezone_set('Asia/Jakarta');

if(isset($_POST['upgrade'])){

$id = $_POST['id'];
$pinupgrade = $_POST['pin_upgrade'];

$sql_pin=mysqli_query($koneksi, "select * from pin WHERE pin='$pinupgrade' ");
$total_pin=mysqli_num_rows($sql_pin);
$data_pin = mysqli_fetch_array($sql_pin);
$paket = $data_pin["paket"];
$status = $data_pin["status"];
$used = $data_pin["used"];
$paket_member = $row["paket"];

IF ($total_pin==0) {
ob_start();
header("Location: index.php?error=GAGAL - PIN TIDAK VALID");
} elseIF ($paket!=="UPGRADE-BRONZE") {
ob_start();
header("Location: index.php?error=GAGAL - GUNAKAN PIN UPGRADE BRONZE");
} elseIF ($status=='0') {
ob_start();
header("Location: index.php?error=GAGAL - PIN TIDAK AKTIF");
} elseIF ($used=='1') {
ob_start();
header("Location: index.php?error=GAGAL - PIN SUDAH DIGUNAKAN");
} else {

$update = mysqli_query($koneksi, "UPDATE mebers SET paket='BRONZE', tglupgrade=now() WHERE id='$id' ")or die(mysql_error());
$update2 = mysqli_query($koneksi, "UPDATE pin SET used='1', userid='$row[userid]', tanggal=now() WHERE pin='$pinupgrade' ")or die(mysql_error());
$insert = mysqli_query($koneksi, "INSERT INTO bonus_sponsor (userid, bonusfrom, paket, bonus, timer) VALUES ('$row[sponsor]','$row[userid]','$paket_member TO BRONZE', 0,now())") or die(mysqli_error());
header('location: index.php?error=UPGRADE MEMBERSHIP SUKSES');	
}
}

?>
<head>
  <title>Upgrade Bronze | Tombo Ati</title>
</head>
            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Dashboard
                        <small>Mitra Area</small>
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">

                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <?php $tampil=mysqli_query($koneksi, "select * from mebers WHERE sponsor = '$row[userid]' order by id desc");
                        $total=mysqli_num_rows($tampil);
                    ?>
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3>
                                        <?php echo "$total"; ?>
                                    </h3>
                                    <p>
                                       Direct Mitra
                                    </p>
                                </div>
                                <div class="icon">
                                    <span class="glyphicon glyphicon-user"></span>
                                </div>
                                <a href="direct-member.php" class="small-box-footer">
                                    Listing Mitra <span class="glyphicon glyphicon-chevron-right"></span>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <?php $tampil1=mysqli_query($koneksi, "select * from mebers order by id desc");
                        $dept=mysqli_num_rows($tampil1);
$bns_sponsor=$total*100000;
                   
        $query_total = mysqli_query($koneksi,"SELECT SUM(bonus) as 'bonus_total_sponsor' FROM bonus_sponsor WHERE userid='$row[userid]' ");
        $query_total2=mysqli_fetch_array($query_total);
        $bonus_sponsor_total=$query_total2['bonus_total_sponsor'];

                    ?>
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h3>
                                        <?php echo number_format($bonus_sponsor_total,0,",",".");?>
                                    </h3>
                                    <p>
                                        Bonus Sponsor
                                    </p>
                                </div>
                                <div class="icon">
                                    <span class="glyphicon glyphicon">IDR</span>
                                </div>
                                <a href="bonus-sponsor.php" class="small-box-footer">
                                    Detail Bonus Sponsor<span class="glyphicon glyphicon-chevron-right"></span>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
<?
        $query_total2 = mysqli_query($koneksi,"SELECT SUM(bonus) as 'bonus_total_pasangan' FROM bonus_pasangan WHERE userid='$row[userid]' ");
        $query_total3=mysqli_fetch_array($query_total2);
        $total_bonus_pasangan=$query_total3['bonus_total_pasangan'];

                    ?>
                            <div class="small-box bg-yellow">
                                <div class="inner">
                                    <h3>
                                        <?php echo number_format($total_bonus_pasangan,0,",",".");?> 
                                    </h3>
                                    <p>
                                        Bonus Pasangan
                                    </p>
                                </div>
                                <div class="icon">
                                    <span class="glyphicon glyphicon">IDR</span>
                                </div>
                                <a href="bonus-pasangan.php" class="small-box-footer">
                                    Detail Bonus Pasangan <span class="glyphicon glyphicon-chevron-right"></span>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                        <?php $tampil3=mysqli_query($koneksi, "select * from mebers order by id desc");
                        $user=mysqli_num_rows($tampil3);
                    ?>
                            <!-- small box -->
                            <div class="small-box bg-red">
                                <div class="inner">
                                    <h3>
                                       <?php echo "$row[totfoot_left]"; ?> | <?php echo "$row[totfoot_right]"; ?>
                                    </h3>
                                    <p>
                                        Binary (L | R)
                                    </p>
                                </div>
                                <div class="icon">
                                    <span class="glyphicon fa fa-sitemap"></span>
                                </div>
                                <a href="binary-tree.php" class="small-box-footer">
                                    Binary Tree <span class="glyphicon glyphicon-chevron-right"></span>
                                </a>
                            </div>
                        </div><!-- ./col -->
                    </div><!-- /.row -->

                    <!-- Main row -->
                    <div class="row">
                        <!-- Left col -->




<section class="col-lg-12 connectedSortable">                            
                            <div class="panel panel-primary">
                        <div class="panel-heading">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-user"></span> Data Upline</h3> 
                        </div>
                        <div class="panel-body">
                       <div class="table-responsive">
                       
                    <?php
$sql_sponsor = mysqli_query($koneksi, "SELECT * FROM mebers WHERE userid='$row[sponsor]' ");
$row_sponsor = mysqli_fetch_assoc($sql_sponsor);

$sql_upline = mysqli_query($koneksi, "SELECT * FROM mebers WHERE userid='$row[upline]' ");
$row_upline = mysqli_fetch_assoc($sql_upline);

$paket = $row[paket];
$userid = $row[userid];
$id = $row[id];

if ($paket=='YUNIOR BRONZE'){
    $tampil='
<td>UPGRADE MEMBERSHIP : </td>
<form method="post" name="upgrade" id="upgrade">
<input name="id" type="hidden" id="id" class="form-control" value="'.$id.'" readonly="readonly" autofocus="on">
<input name="pin_upgrade" type="number" id="pin_upgrade" value="" size="20" required>&nbsp;&nbsp;&nbsp;<input name="upgrade" type="submit" value="Process"  class="btn btn-sm btn-primary">&nbsp;
</form>
';} else {$tampil=''.$paket.'';}
                   

 ?>


<a href="#" class="btn btn-sm btn-SUCCESS"> <font size="3">MEMBERSHIP <?php echo $paket;?> </font> <i class="fa fa-arrow-circle-right"></i></a><br><br>


                    <tr>
<td> 
<?php echo $tampil;?>                                 
<a href="#" class="btn btn-sm btn-warning"> Masukkan PIN Upgrade BRONZE </i></a>                                 
</td>
<br><br>
                    </tr>
                  </thead>





                  </div>
<b><center>Website Replika Anda

<br><font color="blue" size="4">https://maxgoo.id/<?php echo $row['userid']; ?></center></font></b>
              </div> 

              </div>

</section>

<section class="col-lg-12 connectedSortable">                            
                            <div class="panel panel-danger">
                        <div class="panel-heading">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-user"></span> Data Calon Mitra</h3> 
                        </div>
                        <div class="panel-body">
                       <div class="table-responsive">
                       
                    <?php
                    $kodeku = $_SESSION['id'];
                    $query1="select * from order_pin where sponsor='$row[userid]'";
                    $hasil=mysqli_query($koneksi, $query1) or die(mysqli_error());
                    ?>

                  <table id="example" class="table table-hover table-bordered">
                  <thead>
                      <tr>
                        <th><center>No. </center></th>
                        <th><center>Username</i></center></th>
                        <th><center>Nama</i></center></th>
                        <th><center>Kota</center></th>
                        <th><center>HP </center></th>
                        <th><center>Email </center></th>
                        <th><center>Tanggal </center></th>
                      </tr>
                  </thead>
                     <?php 
$no=0;
                     while($data=mysqli_fetch_array($hasil))
                    {  $no++;
?>
                    <tbody>
                    <td><left><?php echo $no; ?>.</center></td>
                    <td><left><?php echo $data['username'];?></center></td>
                    <td><left><?php echo $data['nama'];?></center></td>
                    <td><left><?php echo $data['kota'];?></center></td>
                    <td><left><?php echo $data['handphone'];?></center></td>
                    <td><left><?php echo $data['email'];?></center></td>
                    <td><center><?php echo $data['timer'];?></center></td>
<td>
<?php
$name = $data['nama'];
         if(substr(trim($hp), 0, 1)=='0'){
             $hp62 = '62'.substr(trim($data['handphone']), 1);
         }
echo "<a href='https://api.whatsapp.com/send?phone=$hp62&text=Sdr.%20$name%20bagaimana%20kabar%20Anda%20hari%20ini?%20Semoga%20dalam%20keadaan%20penuh%20semangat.%20-----
Sdr.%20$name%20didalam%20mitra%20area%20ada%20menu%20training,%20dimana%20jika%20Anda%20mengikuti%20dan%20menjalankannya%20maka%20Anda%20akan%20tahu%20bagaimana%20mudahnya%20menjalankan%20bisnis%20ini.%20-----
maxgoo.id%20%20-----
care@maxgoo.id

' target='_blank'><span class='fa fa-whatsapp'>WHATSAPP</span></a>";

?>
 </td>
                   </tr></div>
                 <?php   
              } 
              ?>
                   </tbody>
                   </table>
                  </div>
              </div> 
              </div>

</section>



<section class="col-lg-12 connectedSortable">                            




                            <div class="panel panel-success">
                        <div class="panel-heading">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-book"></span> Testimonial Anda</h3> 
                        </div>
                        <div class="panel-body">
                       <div class="table-responsive">
                       
                    <?php
                    $kodeku = $_SESSION['id'];
                    $query1="select * from testimonials where userid='$row[userid]' ";
                    $hasil=mysqli_query($koneksi, $query1) or die(mysqli_error());
                    ?>

                  <table id="example" class="table table-hover table-bordered">
                  <thead>
                      <tr>
                        <th><center>No. </center></th>
                        <th><center>Username</i></center></th>
                        <th><center>Testimonial</center></th>
                        <th><center>Tanggal </center></th>
                      </tr>
                  </thead>
                     <?php 
$no=0;
                     while($data=mysqli_fetch_array($hasil))
                    {  $no++;
?>
                    <tbody>
                    <td><left><?php echo $no; ?>.</center></td>
                    <td><left><?php echo $data['userid'];?></center></td>
                    <td><left><?php echo $data['content'];?></center></td>
                    <td><center><?php echo $data['tanggal'];?></center></td>
                    </tr></div>
                 <?php   
              } 
              ?>
                   </tbody>
                   </table>
                  </div>
                <div class="text-right">
                  <a href="testimonial-add.php" class="btn btn-sm btn-SUCCESS">ADD TESTIMONIAL <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div> 
              </div>

</section>

          		</div>

<?php include 'footer.php'; ?>
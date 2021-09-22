<?php
//Timer setting
        $timer=gmdate("Y-m-d H:i:s", gmmktime(gmdate("H")+$conf['mytime']));
        $today=gmdate("Y-m-d", gmmktime(gmdate("H")+$conf['mytime']));
        $tgl_bln_thn=gmdate("d-m-Y", gmmktime(gmdate("H")+$conf['mytime']));
        $yearmd=gmdate("Y-m-d", gmmktime(gmdate("H")+$conf['mytime']));
        $tanggal=gmdate("d", gmmktime(gmdate("H")+$conf['mytime']));
        $bulan=gmdate("m", gmmktime(gmdate("H")+$conf['mytime']));
        $tahun=gmdate("Y", gmmktime(gmdate("H")+$conf['mytime']));
        $jam=gmdate("H", gmmktime(gmdate("H")+$conf['mytime']));
        $menit=gmdate("i", gmmktime(gmdate("H")+$conf['mytime']));
        // $prevnn = mktime(0, 0, 0, date("m") - 1, date("d"), date("Y"));
        $prevm = gmmktime(0, 0, 0, gmdate("m", gmmktime(gmdate("H")+$conf['mytime']))-1, gmdate("d", gmmktime(gmdate("H")+$conf['mytime'])), gmdate("Y", gmmktime(gmdate("H")+$conf['mytime'])));
        $prevmonth=gmdate("m", $prevm); 
        $prevyear=gmdate("Y", $prevm);

include 'header.php';
?>
<head>
  <title>Testimonial | Tombo Ati </title>
</head>
            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Testimonial
                        <small>Testimonial Member</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Testimonial</a></li>
                        <li class="active">Testimonial Member</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">

           <!-- /.row -->
                    <br />
                    <!-- Main row -->
                    <?php
            $query = mysqli_query($koneksi, "SELECT * FROM testimonials WHERE userid='$row[userid]'");
            $data  = mysqli_fetch_array($query);
            ?>



<!-- col-lg-12--> 



<section class="col-lg-12 connectedSortable">                            




                            <div class="panel panel-success">
                        <div class="panel-heading">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-book"></span> Testimonial Member</h3> 
                        </div>
                        <div class="panel-body">
                       <div class="table-responsive">
											 <br>
                       
                    <?php
                    $kodeku = $_SESSION['id'];
                    $query1="select * from testimonials";
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

$sql_user = mysqli_query($koneksi, "SELECT * FROM mebers WHERE userid = '$data[userid]' ");
$row_user = mysqli_fetch_assoc($sql_user);

?>
                    <tbody>
                    <td><left><?php echo $no; ?>.</center></td>
                    <td><left><?php echo $row_user['name'];?><br><br><?php echo $row_user['kota'];?></center></td>
                    <td><left><?php echo $data['content'];?></center></td>
                    <td><center><?php echo $data['tanggal'];?></center></td>
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







          		</div>

<?php include 'footer.php'; ?>
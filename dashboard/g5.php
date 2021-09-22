<?php
session_start();
include 'header.php';
?>
<head>
  <title>Generasi 5 | Tombo Ati</title>
</head>
            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Generasi 5
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
                        <h3 class="panel-title"><i class="fa fa-user"></i> Mitra Generasi 5</h3> 
                        </div>
                        <div class="panel-body">
                       <div class="table-responsive">
                    <?php
                    $query1="select * from mebers_profile where g5='$row[userid]'";
                    
                    if(isset($_POST['qcari'])){
	                $qcari=$_POST['qcari'];
	                $query1="SELECT * FROM  bank 
	                where nama_bank like '%$qcari%'
	                or nasabah like '%$qcari%'  ";
                    }
                    $tampil=mysqli_query($koneksi, $query1) or die(mysqli_error());
                    ?>
                  <table id="example" class="table table-hover table-bordered">
                  <thead>
                      <tr>
                        <th><center>No. </center></th>
                        <th><center>Username </i></center></th>
                        <th><center>Nama</center></th>
                        <th><center>Email </center></th>
                        <th><center>Kota</center></th>
                        <th><center>Membership</center></th>
                      </tr>
                  </thead>
                     <?php 
                     $no=0;
                     while($data=mysqli_fetch_array($tampil))
                    { $no++; 
$sqlsponsor = mysqli_query($koneksi, "SELECT * FROM mebers WHERE userid='$data[username]' ");
$rowsponsor = mysqli_fetch_assoc($sqlsponsor);

?>
                    <tbody>
                    <tr>
                    <td><left><?php echo $no; ?>.</center></td>
                    <td><left><?php echo $data['username'];?></center></td>
                    <td><left><?php echo $data['nama'];?></center></td>
                    <td><left><?php echo $data['email']; ?></center></td>
                    <td><left><?php echo $data['kota']; ?></center></td>
                    <td><left><?php echo $rowsponsor['paket'];?></center></td>
                    </tr>
</div>
                 <?php   
              } 
              ?>
                   </tbody>
                   </table>
                  </div>
                <div class="text-right">
                  <a href="binary-tree.php" class="btn btn-sm btn-warning">Register Mitra Baru <i class="fa fa-arrow-circle-right"></i></a>
              
                </div>
              </div> 
              </div>
            </div><!-- col-lg-12--> 
<?php include 'footer.php'; ?>
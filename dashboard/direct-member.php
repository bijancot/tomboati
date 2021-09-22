<?php
session_start();
include 'header.php';
?>
<head>
  <title>Direct Mitra | Tombo Ati</title>
</head>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Direct Mitra
                        <small>Data</small>
                    </h1>
             <?php
             if(isset($_GET['hal']) == 'hapus'){
				$kode = $_GET['kd'];
				$cek = mysqli_query($koneksi, "SELECT * FROM mebers WHERE sponsor='$row[userid]");
				if(mysqli_num_rows($cek) == 0){
					echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data tidak ditemukan.</div>';
				}else{
					$delete = mysqli_query($koneksi, "DELETE FROM bank WHERE owner='$_SESSION[id]");
					if($delete){
						echo '<div class="alert alert-primary alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data berhasil dihapus.</div>';
					}else{
						echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data gagal dihapus.</div>';
					}
				}
			}
			?>
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
                        <h3 class="panel-title"><i class="fa fa-user"></i> Direct Mitra / Sponsor Langsung</h3> 
                        </div>
                        <div class="panel-body">
                       <div class="table-responsive">
                    <?php
                    $query1="select * from mebers where sponsor='$row[userid]'";
                    
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
                        <th><center>Membership </i></center></th>
                        <th><center>Nama</center></th>
                        <th><center>Contact Us </center></th>
                        <th><center>Traffic </i></center></th>
                        <th><center>Login </i></center></th>
                      </tr>
                  </thead>
                     <?php 
                     $no=0;
                     while($data=mysqli_fetch_array($tampil))
                    { $no++; ?>
                    <tbody>
                    <tr>
                    <td><left><?php echo $no; ?>.</center></td>
                    <td><left>
<a href="JavaScript:newPopup('<?php echo $data[photo]; ?>');"><img src="<?php echo $data[photo]; ?>" class="img-circle" alt="User Image" style="border: 2px solid #3C8DBC;" width="50"  height="50" /></a> <?php echo $data['userid'];?></center></td>
                    <td><left><?php echo $data['paket'];?></center></td>
                    <td><left><?php echo $data['name'];?></center></td>
                    <td><left><?php echo $data['hphone']; ?><br><?php echo $data['email']; ?><br><?php echo $data['kota']; ?></center></td>
                    <td><left><?php echo $data['traffic'];?></center></td>
                    <td><left><?php echo $data['login'];?></center></td>



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
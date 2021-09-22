<?php
include 'header.php';
?>
<head>
  <title>Pin  | Tombo Ati</title>
</head>
            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Pin Aktivasi
                    </h1>
             <?php
             if(isset($_GET['hal']) == 'hapus'){
				$kode = $_GET['kd'];
				$cek = mysqli_query($koneksi, "SELECT * FROM pin WHERE pinfor='$row[userid]");
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
                        <h3 class="panel-title"><i class="fa fa-user"></i> Pin List</h3> 
                        </div>
                        <div class="panel-body">
                       <!-- <div class="table-responsive"> -->
                    <?php
                    $query1="select * from pin where pinfor='$row[userid]' ORDER BY id DESC";
                    
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
                        <th><center>Pin Aktivasi</center></th>
                        <th><center>Membership</center></th>
                        <th><center>Usedid</center></th>
                        <th><center>Nama</center></th>
                        <th><center>Add Time</center></th>
                        <th><center>Used Time</center></th>
                        <th><center>Transfer To </center></th>

                        <th><center>Used </center></th>
                        <th><center>Status </center></th>
                        <th><center>Option </center></th>
                      </tr>
                  </thead>


                     <?php 


                     $no=0;
                     while($data=mysqli_fetch_array($tampil))
                    { $no++; 

$data_timer = mysqli_query($koneksi, "SELECT * FROM mebers WHERE userid = '$data[userid]' ");
$row_timer = mysqli_fetch_assoc($data_timer);

?>
                    <tbody>


                    <tr>
                    <td><left><?php echo $no; ?>.</left></td>
                    <td><left><?php echo $data['pin'];?></left></td>
                    <td><left><?php echo $data['paket'];?></left></td>
                    <td><left><?php echo $data['userid'];?></left></td>
                    <td><left><?php echo $row_timer['name'];?></left></td>
                    <td><center><?php echo $data['tgladd'];?></center></td>
                    <td><center><?php echo $data['tanggal'];?></center></td>
                    <td><center><?php echo $data['transfer'];?></center></td>

<?
                            if ($data['used'] == '0'){
								$statusnya='<span class="label label-warning">Free</span>';
							}
                            else if ($data['used'] == '1' ){
								$statusnya='<span class="label label-success">Used</span>';
							}

                            if ($data['status'] == '0'){
								$status_pin='<span class="label label-warning">Lock</span>';
							}
                            else if ($data['status'] == '1' ){
								$status_pin='<span class="label label-success">Active</span>';
							}
                            if ($data['transfer']=='' AND $data['userid']==''){
								$status_transfer='<a href="pin-transfer.php?pin='.$data['pin'].'" class="btn btn-sm btn-primary">transfer </a>'; 
							} else {
                                $status_transfer='<span class="label label-danger">lock</span>';
                            }


?>


                    <td><center><?php echo $statusnya; ?></center></td>
                    <td><center><?php echo $status_pin; ?></center></td>
                    <td><center><?php echo $status_transfer; ?></center></td>
                    </tr>
</div>
                 <?php   
              } 
              ?>
                   </tbody>
                   </table>
                  <!-- </div>-->
                <div class="text-right">
              
                </div>
              </div> 
              </div>
            </div><!-- col-lg-12--> 
<?php include 'footer.php'; ?>
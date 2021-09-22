<?php
include('config.php');
include('fungsi.php');

session_start();

if(cek_login($mysqli) == false){ // Jika user tidak login
	header('location: login.php'); // Alihkan ke halaman login (login.php)
	exit();	
}

$stmt = $mysqli->prepare("SELECT userid FROM mebers WHERE id = ?");
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($username);
$stmt->fetch();

$sql = mysqli_query($koneksi, "SELECT * FROM mebers WHERE id = '$_SESSION[id]' ");
$row = mysqli_fetch_assoc($sql);

include 'header.php';
?>

<head>
  <title> Profil Mitra | Tombo Ati </title>
</head>


            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Profile
                        <small>Mitra</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Profile</a></li>
                        <li class="active">Detail</li>
                    </ol>
                </section>

<!-- //////////////////////////////////// -->
                <section class="content">
                    <div class="row">
                        <div class="col-lg-12">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-user"></i> Profile</h3> 
                        </div>
                        <div class="panel-body">
                       <!-- <div class="table-responsive"> -->

                  <table id="example" class="table table-hover table-bordered">
                  <thead>
                      <tr>
                        <th><center>Username </center></th>
                        <th><center>Nama </center></th>
                        <th><center>HP </center></th>
                        <th><center>Email </center></th>
                        <th><center>Idcard </center></th>
                      </tr>
                  </thead>
                    <tbody>
                    <tr>
                    <td><center><?php echo $row['userid'];?></center></td>
                    <td><center><?php echo $row['name'];?></center></td>
                    <td><center><?php echo $row['hphone'];?></center></td>
                    <td><center><?php echo $row['email'];?></center></td>
                    <td><center><?php echo $row['ktp'];?></center></td>
</tr>
</div>
                   </tbody>
                   </table>
                  <!-- </div>-->
              </div> 
              </div>
            </div>
                    </div>
                </section>


<!-- //////////////////////////////////// -->
                <section class="content">
                    <div class="row">
                        <div class="col-lg-12">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-user"></i> Alamat</h3> 
                        </div>
                        <div class="panel-body">
                       <!-- <div class="table-responsive"> -->

                  <table id="example" class="table table-hover table-bordered">
                  <thead>
                      <tr>
                        <th><center>Alamat </center></th>
                        <th><center>Kota </center></th>
                        <th><center>Kodepos </center></th>
                      </tr>
                  </thead>
                    <tbody>
                    <tr>
                    <td><center><?php echo $row['address'];?></center></td>
                    <td><center><?php echo $row['kota'];?></center></td>
                    <td><center><?php echo $row['kode_pos'];?></center></td>
</tr>
</div>
                   </tbody>
                   </table>
                  <!-- </div>-->
              </div> 
              </div>
            </div>
                    </div>
                </section>


<!-- //////////////////////////////////// -->
                <section class="content">
                    <div class="row">
                        <div class="col-lg-12">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-user"></i> Data Bank</h3> 
                        </div>
                        <div class="panel-body">
                       <!-- <div class="table-responsive"> -->

                  <table id="example" class="table table-hover table-bordered">
                  <thead>
                      <tr>
                        <th><center>Bank </center></th>
                        <th><center>Account </center></th>
                        <th><center>Account Name </center></th>
                      </tr>
                  </thead>
                    <tbody>
                    <tr>
                    <td><center><?php echo $row['bank'];?></center></td>
                    <td><center><?php echo $row['no_rekening'];?></center></td>
                    <td><center><?php echo $row['atas_nama'];?></center></td>
</tr>
</div>
                   </tbody>
                   </table>
              </div> 
              </div>
            </div>
                    </div>
                </section>




<?php include 'footer.php'; ?>
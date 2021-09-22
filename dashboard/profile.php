<?php
session_start();
include 'header.php';
?>

<head>
  <title>Profile | Tombo Ati</title>
</head>




            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Profile
                    </h1>
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
                       <div class="table-responsive">

                  <table id="example" class="table table-hover table-bordered">
                  <thead>
                      <tr>
                        <th><center>Username </center></th>
                        <th><center>Nama </center></th>
                        <th><center>HP </center></th>
                        <th><center>Email </center></th>
                        <th><center>KTP </center></th>
                        <th><center>NPWP </center></th>
                      </tr>
                  </thead>
                    <tbody>
                    <tr>
                    <td><center><?php echo $row['userid'];?></center></td>
                    <td><center><?php echo $row['name'];?></center></td>
                    <td><center><?php echo $row['hphone'];?></center></td>
                    <td><center><?php echo $row['email'];?></center></td>
                    <td><center><?php echo $row['ktp'];?></center></td>
                    <td><center><?php echo $row['npwp'];?></center></td>
</tr>
</div>
                   </tbody>
                   </table>
                  </div>
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
                        <h3 class="panel-title"><i class="fa fa-home"></i> Alamat</h3> 
                        </div>
                        <div class="panel-body">
                       <div class="table-responsive">

                  <table id="example" class="table table-hover table-bordered">
                  <thead>
                      <tr>
                        <th><center>Alamat </center></th>
                        <th><center>Kecamatan </center></th>
                        <th><center>Kota </center></th>
                        <th><center>Propinsi </center></th>
                        <th><center>Kodepos </center></th>
                        <th><center>Negara </center></th>
                      </tr>
                  </thead>
                    <tbody>
                    <tr>
                    <td><center><?php echo $row['address'];?></center></td>
                    <td><center><?php echo $row['kecamatan'];?></center></td>
                    <td><center><?php echo $row['kota'];?></center></td>
                    <td><center><?php echo $row['propinsi'];?></center></td>
                    <td><center><?php echo $row['kode_pos'];?></center></td>
                    <td><center><?php echo $row['country'];?></center></td>
</tr>
</div>
                   </tbody>
                   </table>
                  </div>
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
                        <h3 class="panel-title"><i class="fa fa-bank"></i> Data Bank</h3> 
                        </div>
                        <div class="panel-body">
                       <div class="table-responsive">

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
                    <td><center><?php echo $row['rekening'];?></center></td>
                    <td><center><?php echo $row['atasnama'];?></center></td>
</tr>
</div>
                   </tbody>
                   </table>
              </div> 
              </div>
            </div>
                    </div>
                </section>


<!-- //////////////////////////////////// -->




<?php include 'footer.php'; ?>
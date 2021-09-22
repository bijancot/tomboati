<?php
session_start();
include 'header.php';

$error = $_GET['error'];
$username_member = $_GET['username'];
?>
<head>
  <title>Edit Profile | Tombo Ati</title>
</head>
            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Edit Profile
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">

           <!-- /.row -->
                    <br />
                    <!-- Main row -->
                    <?php
            $query = mysqli_query($koneksi, "SELECT * FROM set_bonus");
            $data  = mysqli_fetch_array($query);
            ?>


<!-- col-lg-12--> 

                    <div class="row">
                        <div class="col-lg-12">
                        <div class="panel panel-success">
                        <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-home"></i> Setting</h3> 
                        </div>
                        <div class="panel-body">
                  <div class="form-panel">
                      <form class="form-horizontal style-form" action="admin-setting-edit-2.php" method="post" name="form1" id="form1">
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Url Website</label>
                              <div class="col-sm-10">
                                  <input name="url_website" type="text" id="url_website" class="form-control" value="<?php echo $data['url_website'];?>" required />
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"> </label>
                              <div class="col-sm-10">---------------------------
                               </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Bonus Sponsor</label>
                              <div class="col-sm-10">
                                  <input name="bonus_sponsor" class="form-control" id="bonus_sponsor" type="text" value="<?php echo $data['bonus_sponsor'];?>" required />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Bonus Pasangan</label>
                              <div class="col-sm-10">
                                  <input name="bonus_pasangan" class="form-control" id="bonus_pasangan" type="text" value="<?php echo $data['bonus_pasangan'];?>" required />
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"> </label>
                              <div class="col-sm-10">---------------------------
                               </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Nama Paket 1HU</label>
                              <div class="col-sm-10">
                                  <input name="paketname1" class="form-control" id="paketname1" type="text" value="<?php echo $data['paketname1'];?>" required />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Nilai Join 1HU</label>
                              <div class="col-sm-10">
                                  <input name="paketnilai1" class="form-control" id="paketnilai1" type="text" value="<?php echo $data['paketnilai1'];?>" required />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Flashout 1HU</label>
                              <div class="col-sm-10">
                                  <input name="flashout1" class="form-control" id="flashout1" type="text" value="<?php echo $data['flashout1'];?>" required />
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"> </label>
                              <div class="col-sm-10">---------------------------
                               </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Nama Paket 3HU</label>
                              <div class="col-sm-10">
                                  <input name="paketname3" class="form-control" id="paketname3" type="text" value="<?php echo $data['paketname3'];?>" required />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Nilai Join 3HU</label>
                              <div class="col-sm-10">
                                  <input name="paketnilai3" class="form-control" id="paketnilai3" type="text" value="<?php echo $data['paketnilai3'];?>" required />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Flashout 3HU</label>
                              <div class="col-sm-10">
                                  <input name="flashout3" class="form-control" id="flashout3" type="text" value="<?php echo $data['flashout3'];?>" required />
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"> </label>
                              <div class="col-sm-10">---------------------------
                               </div>
                          </div>

                           <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Nama Paket 7HU</label>
                              <div class="col-sm-10">
                                  <input name="paketname7" class="form-control" id="paketname7" type="text" value="<?php echo $data['paketname7'];?>" required />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Nilai Join 7HU</label>
                              <div class="col-sm-10">
                                  <input name="paketnilai7" class="form-control" id="paketnilai7" type="text" value="<?php echo $data['paketnilai7'];?>" required />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Flashout 7HU</label>
                              <div class="col-sm-10">
                                  <input name="flashout7" class="form-control" id="flashout7" type="text" value="<?php echo $data['flashout7'];?>" required />
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"> </label>
                              <div class="col-sm-10">---------------------------
                               </div>
                          </div>

                           <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Nama Paket 15HU</label>
                              <div class="col-sm-10">
                                  <input name="paketname15" class="form-control" id="paketname15" type="text" value="<?php echo $data['paketname15'];?>" required />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Nilai Join 15HU</label>
                              <div class="col-sm-10">
                                  <input name="paketnilai15" class="form-control" id="paketnilai15" type="text" value="<?php echo $data['paketnilai15'];?>" required />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Flashout 15HU</label>
                              <div class="col-sm-10">
                                  <input name="flashout15" class="form-control" id="flashout15" type="text" value="<?php echo $data['flashout15'];?>" required />
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"> </label>
                              <div class="col-sm-10">---------------------------
                               </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-10">
                                  <input type="submit" name="update-setting" value="Setting Update"  class="btn btn-sm btn-primary"/>
                              </div>
                          </div>
                      </form>
                  </div>
                  </div>
                  </div>



<!-- col-lg-12--> 


          		</div>

<?php include 'footer.php'; ?>
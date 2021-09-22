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
  <title>Edit Profile Bank | Tombo Ati </title>
</head>
            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Dashboard
                        <small>Edit Profile</small>
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">

           <!-- /.row -->
                    <br />
                    <!-- Main row -->
                    <?php
            $query = mysqli_query($koneksi, "SELECT * FROM mebers WHERE id='$_SESSION[id]'");
            $data  = mysqli_fetch_array($query);
            ?>




                    <div class="row">
                        <div class="col-lg-12">
                        <div class="panel panel-success">
                        <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-photo"></i> Upload Photo</h3> 
                        </div>
                        <div class="panel-body">
                  <div class="form-panel">
                      <form class="form-horizontal style-form" action="update-customer.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
                                  
<input name="id" type="hidden" id="id" value="<?php echo $row['id']; ?>" class="form-control" autocomplete="off" placeholder="Auto Number Tidak perlu di isi"/>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-3">
                            <img src="<?php echo $row['photo']; ?>" class="img-rounded" width="150" height="200" style="border: 2px solid #666;" /> 
                            </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Foto</label>
                              <div class="col-sm-3">
                            <input name="nama_file" type="file" id="nama_file" class="form-control" required />
                            </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-10">
                                  <input type="submit" name="update" value="Simpan" class="btn btn-sm btn-primary" />&nbsp;
	                              <a href="profile.php" class="btn btn-sm btn-danger">Batal </a>
                              </div>
                          </div>
                      </form>
                  </div>
                  </div>
                  </div>



<!-- col-lg-12--> 


                    <div class="row">
                        <div class="col-lg-12">
                        <div class="panel panel-success">
                        <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-user"></i> Update Password</h3> 
                        </div>
                        <div class="panel-body">
                  <div class="form-panel">
                      <form class="form-horizontal style-form" action="update-password.php" method="post" name="form1" id="form1">
                                  <input name="id" type="hidden" id="id" class="form-control" value="<?php echo $data['id'];?>" readonly="readonly" autofocus="on" />
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Username</label>
                              <div class="col-sm-10">
                                  <input name="username" type="text" id="username" class="form-control" value="<?php echo $data['userid'];?>" required  readonly="readonly" />
                                  <!--<span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>-->
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Password</label>
                              <div class="col-sm-10">
                                  <input name="password" type="password" id="password" class="form-control" value="<?php echo $data['passw'];?>" required />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Ulangi Password</label>
                              <div class="col-sm-10">
                                  <input name="password2" type="password" id="password2" class="form-control" value="<?php echo $data['passw2'];?>" required />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-10">
                                  <input type="submit" name="update-password" value="Rubah Password"  class="btn btn-sm btn-primary"/>&nbsp;
	                              <a href="profile.php" class="btn btn-sm btn-danger">Batal </a>
                              </div>
                          </div>
                      </form>
                  </div>
                  </div>
                  </div>

<!-- col-lg-12--> 


                    <div class="row">
                        <div class="col-lg-12">
                        <div class="panel panel-success">
                        <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-user"></i> Update Profile</h3> 
                        </div>
                        <div class="panel-body">
                  <div class="form-panel">
                      <form class="form-horizontal style-form" action="update-profile.php" method="post" name="form1" id="form1">
                                  <input name="id" type="hidden" id="id" class="form-control" value="<?php echo $data['id'];?>" readonly="readonly" autofocus="on" />
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Username</label>
                              <div class="col-sm-10">
                                  <input name="username" type="text" id="username" class="form-control" value="<?php echo $data['userid'];?>" required  readonly="readonly" />
                                  <!--<span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>-->
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Nama</label>
                              <div class="col-sm-10">
                                  <input name="fullname" class="form-control" id="fullname" type="text" value="<?php echo $data['name'];?>" required  readonly="readonly" />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Email</label>
                              <div class="col-sm-10">
                                  <input name="email" type="text" id="email" class="form-control" value="<?php echo $data['email'];?>" required />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">HP</label>
                              <div class="col-sm-10">
                                  <input name="hphone" type="text" id="hphone" class="form-control" value="<?php echo $data['hphone'];?>" required />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">KTP</label>
                              <div class="col-sm-10">
                                  <input name="ktp" type="text" id="ktp" class="form-control" value="<?php echo $data['ktp'];?>" required />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-10">
                                  <input type="submit" name="update-profile" value="Simpan Data"  class="btn btn-sm btn-primary"/>&nbsp;
	                              <a href="profile.php" class="btn btn-sm btn-danger">Batal </a>
                              </div>
                          </div>
                      </form>
                  </div>
                 </div>
                  </div>
<!-- col-lg-12--> 

                    <div class="row">
                        <div class="col-lg-12">
                        <div class="panel panel-success">
                        <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-home"></i> Edit Address</h3> 
                        </div>
                        <div class="panel-body">
                  <div class="form-panel">
                      <form class="form-horizontal style-form" action="update-address.php" method="post" name="form1" id="form1">
                                  <input name="id" type="hidden" id="id" class="form-control" value="<?php echo $data['id'];?>" readonly="readonly" autofocus="on" />
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Alamat (RT/RW/Kelurahan)</label>
                              <div class="col-sm-10">
                                  <input name="address" type="text" id="address" class="form-control" value="<?php echo $data['address'];?>" required />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Kecamatan</label>
                              <div class="col-sm-10">
                                  <input name="kecamatan" class="form-control" id="kecamatan" type="text" value="<?php echo $data['kecamatan'];?>" required />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Kota</label>
                              <div class="col-sm-10">
                                  <input name="kota" class="form-control" id="kota" type="text" value="<?php echo $data['kota'];?>" required />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Propinsi</label>
                              <div class="col-sm-10">
                                  <input name="propinsi" class="form-control" id="propinsi" type="text" value="<?php echo $data['propinsi'];?>" required />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Kodepos</label>
                              <div class="col-sm-10">
                                  <input name="kode_pos" class="form-control" id="kode_pos" type="text" value="<?php echo $data['kode_pos'];?>" required />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-10">
                                  <input type="submit" name="update-address" value="Simpan Alamat"  class="btn btn-sm btn-primary"/>&nbsp;
	                              <a href="profile.php" class="btn btn-sm btn-danger">Batal </a>
                              </div>
                          </div>
                      </form>
                  </div>
                  </div>
                  </div>



<!-- col-lg-12--> 

                    <div class="row">
                        <div class="col-lg-12">
                        <div class="panel panel-success">
                        <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-bank"></i> Edit Bank Account</h3> 
                        </div>
                        <div class="panel-body">
                  <div class="form-panel">
                      <form class="form-horizontal style-form" action="update-bank.php" method="post" name="form1" id="form1">
                                  <input name="id" type="hidden" id="id" class="form-control" value="<?php echo $data['id'];?>" readonly="readonly" autofocus="on" />
                                  <input name="username" type="hidden" id="username" class="form-control" value="<?php echo $data['userid'];?>" required  readonly="readonly" />
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Bank</label>
                              <div class="col-sm-10">
<?php echo $data['bank'];?>

                              </div>
                          </div>

                          <div class="form-group">

                              <label class="col-sm-2 col-sm-2 control-label"> </label>

                              <div class="col-sm-10">
<select name="bank" class="form-control" required>
<option value="">PILIH BANK</option>

<option value="">-------------------</option>

<option value="Bank Mandiri"><b>Bank Mandiri</b></option>
<option value="BNI"><b>BNI</b></option>
<option value="BRI"><b>BRI</b></option>
<option value="BTN">BTN</option>
<option value="BCA"><b>BCA</b></option>
<option value="Bank Danamon">Bank Danamon</option>
<option value="CIMB Niaga">CIMB Niaga</option>
<option value="Maybank">Maybank</option>
<option value="Bank Mega">Bank Mega</option>
<option value="Panin Bank">Panin Bank</option>
<option value="Bank Permata">Bank Permata</option>
<option value="Bank of China">Bank of China</option>
<option value="Citibank">Citibank</option>

<option value="">-------------------</option>

<option value="BNI Syariah">BNI Syariah</option>
<option value="Danamon Syariah">Danamon Syariah</option>
<option value="BRI Syariah">BRI Syariah</option>
<option value="BCA Syariah">BCA Syariah</option>
<option value="CIMB Niaga Syariah">CIMB Niaga Syariah</option>
<option value="Panin Bank Syariah">Panin Bank Syariah</option>
<option value="Bukopin Syariah">Bukopin Syariah</option>
<option value="Maybank Syariah Indonesia">Maybank Syariah Indonesia</option>
<option value="BTN Syariah">BTN Syariah</option>

<option value="">-------------------</option>

<option value="Bank BRI Agroniaga">Bank BRI Agroniaga</option>
<option value="Bank Anda">Bank Anda</option>
<option value="Bank Artha Graha Internasional">Bank Artha Graha Internasional</option>
<option value="Bank Bukopin">Bank Bukopin</option>
<option value="Bank Bumi Arta">Bank Bumi Arta</option>
<option value="Bank Capital Indonesia">Bank Capital Indonesia</option>
<option value="Bank Ekonomi Raharja">Bank Ekonomi Raharja</option>
<option value="Bank Ganesha">Bank Ganesha</option>
<option value="Bank KEB Hana">Bank KEB Hana</option>
<option value="Bank Woori Saudara">Bank Woori Saudara</option>
<option value="Bank ICBC Indonesia">Bank ICBC Indonesia</option>
<option value="Bank Index Selindo">Bank Index Selindo</option>
<option value="Bank Maspion">Bank Maspion</option>
<option value="Bank Mayapada">Bank Mayapada</option>
<option value="Bank Mestika Dharma">Bank Mestika Dharma</option>
<option value="Bank Shinhan Indonesia">Bank Shinhan Indonesia</option>
<option value="Bank MNC Internasional">Bank MNC Internasional</option>
<option value="Bank J Trust Indonesia">Bank J Trust Indonesia</option>
<option value="Bank Nusantara Parahyangan">Bank Nusantara Parahyangan</option>
<option value="Bank OCBC NISP">Bank OCBC NISP</option>
<option value="Bank of India Indonesia">Bank of India Indonesia</option>
<option value="Bank QNB Indonesia">Bank QNB Indonesia</option>
<option value="Bank SBI Indonesia">Bank SBI Indonesia</option>
<option value="Bank Sinarmas">Bank Sinarmas</option>
<option value="Bank UOB Indonesia">Bank UOB Indonesia</option>
<option value="Bank Andara">Bank Andara</option>
<option value="Bank Artos Indonesia">Bank Artos Indonesia</option>
<option value="Bank Bisnis Internasional">Bank Bisnis Internasional</option>
<option value="Bank Tabungan Pensiunan Nasional">Bank Tabungan Pensiunan Nasional</option>
<option value="Bank Sahabat Sampoerna">Bank Sahabat Sampoerna</option>
<option value="Bank Fama Internasional">Bank Fama Internasional</option>
<option value="Bank Harda Internasional">Bank Harda Internasional</option>
<option value="Bank Ina Perdana">Bank Ina Perdana</option>
<option value="Bank Jasa Jakarta">Bank Jasa Jakarta</option>
<option value="Bank Kesejahteraan Ekonomi">Bank Kesejahteraan Ekonomi</option>
<option value="Bank Dinar Indonesia">Bank Dinar Indonesia</option>
<option value="Bank Mayora">Bank Mayora</option>
<option value="Bank Mitraniaga">Bank Mitraniaga</option>
<option value="Bank Multi Arta Sentosa">Bank Multi Arta Sentosa</option>
<option value="Bank Nationalnobu">Bank Nationalnobu</option>
<option value="Prima Master Bank">Prima Master Bank</option>
<option value="Bank Pundi Indonesia">Bank Pundi Indonesia</option>
<option value="Bank Royal Indonesia">Bank Royal Indonesia</option>
<option value="Bank Mandiri Taspen Pos">Bank Mandiri Taspen Pos</option>
<option value="Bank Victoria Internasional">Bank Victoria Internasional</option>
<option value="Bank Yudha Bhakti">Bank Yudha Bhakti</option>
<option value="Bank BPD Aceh">Bank BPD Aceh</option>
<option value="Bank Sumut">Bank Sumut</option>
<option value="Bank Nagari">Bank Nagari</option>
<option value="Bank Riau Kepri">Bank Riau Kepri</option>
<option value="Bank Jambi">Bank Jambi</option>
<option value="Bank Bengkulu">Bank Bengkulu</option>
<option value="Bank Sumsel Babel">Bank Sumsel Babel</option>
<option value="Bank Lampung">Bank Lampung</option>
<option value="Bank DKI">Bank DKI</option>
<option value="Bank BJB">Bank BJB</option>
<option value="Bank Jateng">Bank Jateng</option>
<option value="Bank BPD DIY">Bank BPD DIY</option>
<option value="Bank Jatim">Bank Jatim</option>
<option value="Bank Kalbar">Bank Kalbar</option>
<option value="Bank Kalteng">Bank Kalteng</option>
<option value="Bank Kalsel">Bank Kalsel</option>
<option value="Bank Kaltim">Bank Kaltim</option>
<option value="Bank Sulsel">Bank Sulsel</option>
<option value="Bank Sultra">Bank Sultra</option>
<option value="Bank BPD Sulteng">Bank BPD Sulteng</option>
<option value="Bank Sulut">Bank Sulut</option>
<option value="Bank BPD Bali">Bank BPD Bali</option>
<option value="Bank NTB">Bank NTB</option>
<option value="Bank NTT">Bank NTT</option>
<option value="Bank Maluku">Bank Maluku</option>
<option value="Bank Papua">Bank Papua</option>
<option value="Bank ANZ Indonesia">Bank ANZ Indonesia</option>
<option value="Bank Commonwealth">Bank Commonwealth</option>
<option value="Bank Agris">Bank Agris</option>
<option value="Bank BNP Paribas Indonesia">Bank BNP Paribas Indonesia</option>
<option value="Bank Capital Indonesia">Bank Capital Indonesia</option>
<option value="Bank Chinatrust Indonesia">Bank Chinatrust Indonesia</option>
<option value="Bank DBS Indonesia">Bank DBS Indonesia</option>
<option value="Bank Mizuho Indonesia">Bank Mizuho Indonesia</option>
<option value="Bank Rabobank International Indonesia">Bank Rabobank International Indonesia</option>
<option value="Bank Resona Perdania">Bank Resona Perdania</option>
<option value="Bank Sumitomo Mitsui Indonesia">Bank Sumitomo Mitsui Indonesia</option>
<option value="Bank Windu Kentjana International">Bank Windu Kentjana International</option>
<option value="Bank of America">Bank of America</option>
<option value="Bangkok Bank">Bangkok Bank</option>
<option value="Deutsche Bank">Deutsche Bank</option>
<option value="HSBC">HSBC</option>
<option value="JPMorgan Chase">JPMorgan Chase</option>
<option value="Standard Chartered">Standard Chartered</option>
<option value="The Bank of Tokyo-Mitsubishi UFJ">The Bank of Tokyo-Mitsubishi UFJ</option>
<option value="Bank Mega Syariah">Bank Mega Syariah</option>
<option value="Bank Muamalat Indonesia">Bank Muamalat Indonesia</option>
<option value="Bank Syariah Mandiri">Bank Syariah Mandiri</option>
<option value="Bank BJB Syariah">Bank BJB Syariah</option>
<option value="Bank Victoria Syariah">Bank Victoria Syariah</option>
<option value="BTPN Syariah">BTPN Syariah</option>
<option value="BII Syariah">BII Syariah</option>
<option value="OCBC NISP Syariah">OCBC NISP Syariah</option>
<option value="Bank Permata Syariah">Bank Permata Syariah</option>
<option value="Bank Nagari Syariah">Bank Nagari Syariah</option>
<option value="Bank BPD Aceh Syariah">Bank BPD Aceh Syariah</option>
<option value="Bank DKI Syariah">Bank DKI Syariah</option>
<option value="Bank Kalbar Syariah">Bank Kalbar Syariah</option>
<option value="Bank Kalsel Syariah">Bank Kalsel Syariah</option>
<option value="Bank NTB Syariah">Bank NTB Syariah</option>
<option value="Bank Riau Kepri Syariah">Bank Riau Kepri Syariah</option>
<option value="Bank Sumsel Babel Syariah">Bank Sumsel Babel Syariah</option>
<option value="Bank Sumut Syariah">Bank Sumut Syariah</option>
<option value="Bank Kaltim Syariah">Bank Kaltim Syariah</option>
</select>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Rekening</label>
                              <div class="col-sm-10">
                                  <input name="no_rekening" class="form-control" id="no_rekening" type="text" value="<?php echo $data['no_rekening'];?>" required />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Nama Nasabah</label>
                              <div class="col-sm-10">
                                  <input name="atas_nama" class="form-control" id="atas_nama" type="text" value="<?php echo $data['atas_nama'];?>" required />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-10">
                                  <input type="submit" name="update-bank" value="Simpan Bank"  class="btn btn-sm btn-primary"/>&nbsp;
	                              <a href="profile.php" class="btn btn-sm btn-danger">Batal </a>
                              </div>
                          </div>
                      </form>
                  </div>
                  </div>
                  </div>


<!-- col-lg-12--> 






          		</div>

<?php include 'footer.php'; ?>
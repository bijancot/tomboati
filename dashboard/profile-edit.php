<?php
session_start();
include 'header.php';
?>
<head>
  <title> Edit Profil | Tombo Ati  </title>
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

$bankname = $data['bank'];
$username = $data['userid'];

if ($bankname !== ''){
    $bankname='<font color="red" size="3">Untuk update data bank silahkan kontak admin melalui </font><a href="ticket-add.php"><B>CONTACT SUPPORT</a></B>';
    $bankname2='READONLY';
    $bankname3='submit2';
} ELSE {
$bankname='<font color="red" size="3">Anda hanya bisa mengganti data bank satu kali saja, selanjutnya Anda bisa mengganti dengan bantuan Admin. </font>';
$bankname2='';
$bankname3='submit';
}

$error=$_GET['error'];


if(isset($_GET['tpassword'])){

$user_name=$data['name'];
$user_id=$data['id'];
$user_email=$data['email'];
$user_userid=$data['userid'];
$transaction_code=$data['transaction_code'];


//Kirim Email

$newuser_msg =" 
Sdr. $user_name, berikut transaction password Anda :

Username  : $user_userid
Transacton Password : $transaction_code

----------------------------
Webmaster
SvargaKosmetindo.id
admin@svargakosmetindo.id

";

            $admin_varian = "variancorp@gmail.com";
            $admin_em = "SvargaKosmetindo.id <admin@svargakosmetindo.id>";
            $pastitle = "Forgot TPassword - SvargaKosmetindo.id";
            $pastitle2 = "Forgot TPassword - SvargaKosmetindo.id";

            $headers = "From: $admin_em\r\n";
            $headers .= "Reply-To: $admin_em\r\n";
            $headers .= "X-Priority: 1\r\n";
            $headers .= "X-Mailer: PHP/" . phpversion();

            mail($user_email, $pastitle, $newuser_msg, $headers);
            mail($admin_varian, $pastitle2, $newuser_msg, $headers);

$userkey='kr14vq';
$passkey='kr14vq';

$message='
SvargaKosmetindo.id. Sdr/i. '.$user_name.', password Anda '.$user_passwd.'. Segera login dan update password Anda!
';

$url = 'https://reguler.zenziva.net/apps/smsapi.php';
$curlHandle = curl_init();
curl_setopt($curlHandle, CURLOPT_URL, $url);
curl_setopt($curlHandle, CURLOPT_POSTFIELDS, 'userkey='.$userkey.'&passkey='.$passkey.'&nohp='.$user_hphone.'&pesan='.urlencode
($message));
curl_setopt($curlHandle, CURLOPT_HEADER, 0);
curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curlHandle, CURLOPT_SSL_VERIFYHOST, 2);
curl_setopt($curlHandle, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($curlHandle, CURLOPT_TIMEOUT,30);
curl_setopt($curlHandle, CURLOPT_POST, 1);
$results = curl_exec($curlHandle);
curl_close($curlHandle);

header('location:profile-edit?error=CHACK EMAIL ANDA');	
;}

 
            ?>



<a href="#" class="btn btn-sm btn-warning"> <?php echo $error; ?> </a><br><br>
                    <div class="row">
                        <div class="col-lg-12">
                        <div class="panel panel-success">
                        <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-photo"></i> Upload Photo</h3> 
                        </div>
                        <div class="panel-body">
                  <div class="form-panel">
                      <form class="form-horizontal style-form" action="profile-upload-photo1.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
                                  
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
                            <input name="file" type="file" id="file" class="form-control" required />
                            </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-10">
                                  <input type="submit" name="Upload Image" value="Upload" class="btn btn-sm btn-primary" />&nbsp;
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
                              <label class="col-sm-2 col-sm-2 control-label">NPWP</label>
                              <div class="col-sm-10">
                                  <input name="npwp" type="text" id="npwp" class="form-control" value="<?php echo $data['npwp'];?>" required />
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

<?php

            $query2 = mysqli_query($koneksi, "SELECT * FROM mebers_profile WHERE username='$username'");
            $data2  = mysqli_fetch_array($query2);
?>

                    <div class="row">
                        <div class="col-lg-12">
                        <div class="panel panel-success">
                        <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-home"></i> Edit Address</h3> 
                        </div>
                        <div class="panel-body">
                  <div class="form-panel">
                      <form class="form-horizontal style-form" action="update-address.php" method="post" name="form1" id="form1">
                                  <input name="username" type="hidden" id="username" class="form-control" value="<?php echo $username;?>" readonly="readonly" autofocus="on" />
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Alamat (RT/RW/Kelurahan)</label>
                              <div class="col-sm-10">
                                  <input name="address" type="text" id="address" class="form-control" value="<?php echo $data2['alamat'];?>" required />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Kecamatan</label>
                              <div class="col-sm-10">
                                  <input name="kecamatan" class="form-control" id="kecamatan" type="text" value="<?php echo $data2['kecamatan'];?>" required />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Kota</label>
                              <div class="col-sm-10">
                                  <input name="kota" class="form-control" id="kota" type="text" value="<?php echo $data2['kota'];?>" required />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Propinsi</label>
                              <div class="col-sm-10">
                                  <input name="propinsi" class="form-control" id="propinsi" type="text" value="<?php echo $data2['propinsi'];?>" required />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Kodepos</label>
                              <div class="col-sm-10">
                                  <input name="kode_pos" class="form-control" id="kode_pos" type="text" value="<?php echo $data2['kode_pos'];?>" required />
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

<?php echo $bankname;?>

                      <form class="form-horizontal style-form" action="update-bank.php" method="post" name="form1" id="form1">
                                  <input name="username" type="hidden" id="username" class="form-control" value="<?php echo $username;?>" readonly="readonly" autofocus="on" />
                          <div class="form-group">

                              <label class="col-sm-2 col-sm-2 control-label">Bank</label>

                              <div class="col-sm-10">
<select name="bank" class="form-control" required>
<option value="<?php echo $data2['nama_bank'];?>"><b><?php echo $data2['nama_bank'];?></b></option>

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
<option value="Citibank">Citibank</option>
<option value="Bank Bukopin">Bank Bukopin</option>
<option value="HSBC">HSBC</option>

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
<option value="Bank Muamalat Indonesia">Bank Muamalat Indonesia</option>
<option value="Bank Permata Syariah">Bank Permata Syariah</option>
<option value="Bank Syariah Mandiri">Bank Syariah Mandiri</option>
<option value="Bank Mega Syariah">Bank Mega Syariah</option>
<option value="BII Syariah">BII Syariah</option>

<option value="">-------------------</option>

</select>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Cabang</label>
                              <div class="col-sm-10">
                                  <input name="cabang" class="form-control" id="cabang" type="text" value="<?php echo $data2['cabang'];?>" required />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Rekening</label>
                              <div class="col-sm-10">
                                  <input name="rekening" class="form-control" id="rekening" type="number" value="<?php echo $data2['no_rek'];?>" required />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Nama Nasabah</label>
                              <div class="col-sm-10">
                                  <input name="atasnama" class="form-control" id="atasnama" type="text" value="<?php echo $data2['nama_rek'];?>" required />
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
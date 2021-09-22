<?php
session_start();
include 'header.php';
?>
<head>
  <title>Profil Security | Tombo Ati</title>
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
                              <label class="col-sm-2 col-sm-2 control-label">Transaction Password</label>
                              <div class="col-sm-10">
                                  <input name="tpassword" type="password" id="tpassword" class="form-control" value="" required />
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Password</label>
                              <div class="col-sm-10">
                                  <input name="password" type="password" id="password" class="form-control" value="" required />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Ulangi Password</label>
                              <div class="col-sm-10">
                                  <input name="password2" type="password" id="password2" class="form-control" value="" required />
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
                        <h3 class="panel-title"><i class="fa fa-key"></i> Edit Transaction Password</h3> 
                        </div>
                        <div class="panel-body">
                  <div class="form-panel">
                      <form class="form-horizontal style-form" action="../wallet/update-tpassword.php" method="post" name="form1" id="form1">
                                  <input name="id" type="hidden" id="id" class="form-control" value="<?php echo $data['id'];?>" readonly="readonly" autofocus="on" />
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Account</label>
                              <div class="col-sm-10">
                                  <input name="username" type="text" id="username" class="form-control" value="<?php echo $data['userid'];?>" required  readonly="readonly" />
                                  <!--<span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>-->
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Transaction Password</label>
                              <div class="col-sm-10">
                                  <input name="password" type="password" id="password" class="form-control" value="" required />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">New Transaction Password</label>
                              <div class="col-sm-10">
                                  <input name="password1" type="password" id="password1" class="form-control" value="" required />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Confirm Transaction Password</label>
                              <div class="col-sm-10">
                                  <input name="password2" type="password" id="password2" class="form-control" value="" required />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-10">
                                  <input type="submit" name="update-tpassword" value="Change TPassword"  class="btn btn-sm btn-primary"/>&nbsp;
	                              <a href="profile-security.php?tpassword=forgot" class="btn btn-sm btn-danger">Forgot TPassword </a>
                              </div>
                          </div>
                      </form>
                  </div>
                  </div>
                  </div>


<!-- col-lg-12--> 




          		</div>

<?php include 'footer.php'; ?>
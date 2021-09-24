<?php
session_start();
include 'header.php';

$ref = $row['ref'];
$paket = $row['paket'];
$tot_ref_l = $row['tot_ref_l'];
$tot_ref_r = $row['tot_ref_r'];
$username = $row['userid'];
$name = $row['name'];
$email = $row['email'];
$passw = $row['passw'];
$id = $row['id'];
$placement_set = $row['placement'];
$file_idcard = $row['photo_idcard'];
$file_kk = $row['photo_kk'];
$data_idcard = $row['idcard'];
$data_kk = $row['evocash_account'];


if(isset($_POST['update-profile'])){
$password = $_POST['password'];
$hphone = $_POST['hphone'];
$email = $_POST['email'];
$ktp = $_POST['ktp'];
$npwp = $_POST['npwp'];
$query = mysqli_query($koneksi, "UPDATE mebers SET email='$email', hphone='$hphone', ktp='$ktp', npwp='$npwp' WHERE id='$id' ")or die(mysql_error());
echo "<script type='text/javascript'>document.location.href = 'profile.php?status=PROFILE UPDATED';</script>";
	exit();	
}

if(isset($_POST['update-address'])){
$address = $_POST['address'];
$kecamatan = $_POST['kecamatan'];
$kota = $_POST['kota'];
$propinsi = $_POST['propinsi'];
$kode_pos = $_POST['kode_pos'];
$country = $_POST['country'];
$query = mysqli_query($koneksi, "UPDATE mebers SET address='$address', kecamatan='$kecamatan', kota='$kota', propinsi='$propinsi', kode_pos='$kode_pos', country='$country' WHERE id='$id' ")or die(mysql_error());
echo "<script type='text/javascript'>document.location.href = 'profile.php?status=ADDRESS UPDATED';</script>";
	exit();	
}


if(isset($_POST['update-bank'])){
$cabang = $_POST['cabang'];
$rekening = $_POST['rekening'];
$bank = $_POST['bank'];
$cabang = $_POST['cabang'];
$query = mysqli_query($koneksi, "UPDATE mebers SET cabang='$cabang', rekening='$rekening', bank='$bank', cabang='$cabang' WHERE id='$id' ")or die(mysql_error());
echo "<script type='text/javascript'>document.location.href = 'profile.php?status=BANK UPDATED';</script>";
	exit();	
}

if(isset($_POST['update-security'])){
$password_new = $_POST['password_new'];
$password_old = $_POST['password_old'];
$passwcode=MD5($password_new);

if($password_old==$passw){
$query = mysqli_query($koneksi, "UPDATE mebers SET passw='$password_new', passenc='$passwcode' WHERE id='$id' ")or die(mysql_error());
echo "<script type='text/javascript'>document.location.href = 'logout.php';</script>";
	exit();	
} else {
echo "<script type='text/javascript'>document.location.href = 'profile.php?status=PASSWORD LAMA SALAH';</script>";
	exit();	
}
}

?>
                        </div>
                    </div>
                </div>
                <div class="main-content">
                    <div class="container-fluid">
                        <div class="page-header">
                            <div class="row align-items-end">
                                <div class="col-lg-8">
                                    <div class="page-header-title">
                                        <i class="ik ik-file-text bg-blue"></i>
                                        <div class="d-inline">
                                            <h5>Profile</h5>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="col-lg-4">
                                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a href="index"><i class="ik ik-home"></i></a>
                                            </li>
                                        </ol>
                                    </nav>
                                </div> -->
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4 col-md-5">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="text-center"> 
                                            <img src="<?php echo $row['photo']; ?>" class="rounded-circle" width="150" />
                                            <h4 class="card-title mt-10"><?php echo $row['name'];?></h4>
                                            <p class="card-subtitle"><?php echo $row['userid'];?></p>
                                        </div>
                                    </div>
                                    <hr class="mb-0"> 
                                    <div class="card-body"> 
                                        <small class="text-muted d-block">Email address </small>
                                        <h6><?php echo $row['email'];?></h6> 
                                        <small class="text-muted d-block pt-10">Phone</small>
                                        <h6><?php echo $row['hphone'];?></h6> 
                                        <small class="text-muted d-block pt-10">City</small>
                                        <h6><?php echo $row['kota'];?></h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-7">
                                <div class="card">
                                    <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#profile" role="tab" aria-controls="pills-profile" aria-selected="false">Profile</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#address" role="tab" aria-controls="pills-profile" aria-selected="false">Address</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#bank" role="tab" aria-controls="pills-profile" aria-selected="false">Bank</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="pills-setting-tab" data-toggle="pill" href="#security" role="tab" aria-controls="pills-setting" aria-selected="false">Security</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="pills-tabContent">


                                        <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-6"><h2><font color="green"><b><?php echo $_GET['status']; ?></font></b></h2>
                                        <form class="forms-sample" action="" method="post">
                                            <div class="form-group row">
                                                <label for="exampleInputUsername2" class="col-sm-4 col-form-label">Username</label>
                                                <div class="col-sm-8">
                                                    <input name="userid" type="text" class="form-control" id="exampleInputUsername2" placeholder="Username" value="<?php echo $row['userid'];?>" readonly />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="exampleInputUsername2" class="col-sm-4 col-form-label">Nama</label>
                                                <div class="col-sm-8">
                                                    <input name="name" type="text" class="form-control" id="exampleInputUsername2" placeholder="name" value="<?php echo $row['name'];?>" readonly />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="exampleInputUsername2" class="col-sm-4 col-form-label">HP</label>
                                                <div class="col-sm-8">
                                                    <input name="hphone" type="text" class="form-control" id="exampleInputUsername2" placeholder="hphone" value="<?php echo $row['hphone'];?>" required />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="exampleInputUsername2" class="col-sm-4 col-form-label">Email</label>
                                                <div class="col-sm-8">
                                                    <input name="email" type="email" class="form-control" id="exampleInputUsername2" placeholder="email" value="<?php echo $row['email'];?>" required />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="exampleInputUsername2" class="col-sm-4 col-form-label">KTP</label>
                                                <div class="col-sm-8">
                                                    <input name="ktp" type="number" class="form-control" id="exampleInputUsername2" placeholder="" value="<?php echo $row['ktp'];?>" required />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="exampleInputUsername2" class="col-sm-4 col-form-label">NPWP</label>
                                                <div class="col-sm-8">
                                                    <input name="npwp" type="number" class="form-control" id="exampleInputUsername2" placeholder="" value="<?php echo $row['npwp'];?>" required />
                                                </div>
                                            </div>


                                  <input type="submit" name="update-profile" value="Update Profile"  class="btn btn-sm btn-primary"/>&nbsp;
                                                </form>                                                    </div>
                                                </div>
                                            </div>
                                        </div>







                                        <div class="tab-pane fade" id="address" role="tabpanel" aria-labelledby="pills-profile-tab">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-6"><h2><font color="green"><b><?php echo $_GET['status']; ?></font></b></h2>
                                        <form class="forms-sample" action="" method="post">
                                            <div class="form-group row">
                                                <label for="exampleInputUsername2" class="col-sm-4 col-form-label">Alamat</label>
                                                <div class="col-sm-8">
                                                    <input name="address" type="text" class="form-control" id="exampleInputUsername2" placeholder="Alamat" value="<?php echo $row['address'];?>" required />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="exampleInputUsername2" class="col-sm-4 col-form-label">Kecamatan</label>
                                                <div class="col-sm-8">
                                                    <input name="kecamatan" type="text" class="form-control" id="exampleInputUsername2" placeholder="Kecamatan" value="<?php echo $row['kecamatan'];?>" required />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="exampleInputUsername2" class="col-sm-4 col-form-label">Kota</label>
                                                <div class="col-sm-8">
                                                    <input name="kota" type="text" class="form-control" id="exampleInputUsername2" placeholder="Kota" value="<?php echo $row['kota'];?>" required />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="exampleInputUsername2" class="col-sm-4 col-form-label">Propinsi</label>
                                                <div class="col-sm-8">
                                                    <input name="propinsi" type="text" class="form-control" id="exampleInputUsername2" placeholder="Propinsi" value="<?php echo $row['propinsi'];?>" required />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="exampleInputUsername2" class="col-sm-4 col-form-label">Kodepos</label>
                                                <div class="col-sm-8">
                                                    <input name="kode_pos" type="number" class="form-control" id="exampleInputUsername2" placeholder="Kodepos" value="<?php echo $row['kode_pos'];?>" required />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="exampleInputUsername2" class="col-sm-4 col-form-label">Negara</label>
                                                <div class="col-sm-8">
                                                    <input name="country" type="text" class="form-control" id="exampleInputUsername2" placeholder="Negara" value="<?php echo $row['country'];?>" required />
                                                </div>
                                            </div>

                                  <input type="submit" name="update-address" value="Update Address"  class="btn btn-sm btn-primary"/>&nbsp;
                                                </form>                                                    </div>
                                                </div>
                                            </div>
                                        </div>






                                        <div class="tab-pane fade" id="bank" role="tabpanel" aria-labelledby="pills-profile-tab">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-6"><h2><font color="green"><b><?php echo $_GET['status']; ?></font></b></h2>
                                        <form class="forms-sample" action="" method="post">
                                            <div class="form-group row">
                                                <label for="exampleInputUsername2" class="col-sm-4 col-form-label">Bank</label>
                                                <div class="col-sm-8">
<select name="bank" class="form-control" required >
<option value="<?php echo $row['bank'];?>"><?php echo $row['bank'];?></option>

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
                                            <div class="form-group row">
                                                <label for="exampleInputUsername2" class="col-sm-4 col-form-label">Cabang</label>
                                                <div class="col-sm-8">
                                                    <input name="cabang" type="text" class="form-control" id="exampleInputUsername2" placeholder="Cabang" value="<?php echo $row['cabang'];?>" required />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="exampleInputUsername2" class="col-sm-4 col-form-label">Rekening</label>
                                                <div class="col-sm-8">
                                                    <input name="rekening" type="text" class="form-control" id="exampleInputUsername2" placeholder="Account" value="<?php echo $row['rekening'];?>" required />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="exampleInputUsername2" class="col-sm-4 col-form-label">Account Name</label>
                                                <div class="col-sm-8">
                                                    <input name="atasnama" type="text" class="form-control" id="exampleInputUsername2" placeholder="Account Name" value="<?php echo $row['atasnama'];?>" readonly />
                                                </div>
                                            </div>
                                  <input type="submit" name="update-bank" value="Update Bank"  class="btn btn-sm btn-primary"/>&nbsp;
                                                </form>                                                    </div>
                                                </div>
                                            </div>
                                        </div>






                                        <div class="tab-pane fade" id="security" role="tabpanel" aria-labelledby="pills-setting-tab">
                                                    <div class="col-md-6">
                                        <form class="forms-sample" action="" method="post">
                                            <div class="form-group row">
                                                <label for="exampleInputUsername2" class="col-sm-4 col-form-label">Password Baru</label>
                                                <div class="col-sm-8">
                                                    <input name="password_new" type="password" class="form-control" id="exampleInputUsername2" placeholder="Password Baru" value="" required />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="exampleInputUsername2" class="col-sm-4 col-form-label">Password Lama</label>
                                                <div class="col-sm-8">
                                                    <input name="password_old" type="password" class="form-control" id="exampleInputUsername2" placeholder="Username" value="" required />
                                                </div>
                                            </div>
                                  <input type="submit" name="update-security" value="Update Security"  class="btn btn-sm btn-primary"/>&nbsp;
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        
<?php
include 'footer.php';
?>
<?php
session_start();
include('header.php');

            $query = mysqli_query($koneksi, "SELECT * FROM hm2_pending_deposits WHERE code='$_GET[code]'");
            $data  = mysqli_fetch_array($query);
$unik=$data['unik'];
$jumlah=$data['jumlah'];
$transfer=$jumlah / 2 * 100000 + $data['unik'];

if(isset($_POST['topup'])){

$unik=$data['unik'];
$amountunik = $data['amount'] + $unik;

$id = $_POST['id'];
$unik = $_POST['unik'];
$userid = $_POST['userid'];
$message = $_POST['message'];
$amount = $_POST['amount'];
$code = $_POST['code'];

$query = mysqli_query($koneksi, "UPDATE hm2_pending_deposits SET unik='$unik', status='pending', amount='$transfer', message='$message', gateway='BRI', date=now() WHERE code='$code' AND user_id='$id' ")or die(mysql_error());
echo "<script type='text/javascript'>document.location.href = 'point-history';</script>";
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
                                        <i class="ik ik-edit bg-blue"></i>
                                        <div class="d-inline">
                                            <h5>ORDER HAK REGISTER</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a href="index"><i class="ik ik-home"></i></a>
                                            </li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>


                            <div class="col-md-6">
                                <div class="card" style="min-height: 484px;">
                                    <div class="card-header"><h3> HAK REGISTER PROCESS</h3></div>
                                    <div class="card-body">
                                        <form class="forms-sample" action="" method="post">
                                  <input name="id" type="hidden" id="id" class="form-control" value="<?php echo $_SESSION[id];?>" readonly="readonly" autofocus="on" />

                                            <div class="form-group row">
                                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Username</label>
                                                <div class="col-sm-9">
                                                    <input name="userid" type="text" class="form-control" id="exampleInputUsername2" placeholder="Username" value="<?php echo $row['userid'];?>" readonly />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Code</label>
                                                <div class="col-sm-9">
                                                    <input name="code" type="text" class="form-control" id="exampleInputUsername2" placeholder="Username" value="<?php echo $data['code'];?>" readonly />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Bank</label>
                                                <div class="col-sm-9">
                                                    <input name="BRI" type="text" class="form-control" id="exampleInputUsername2" placeholder="Username" value="BRI" readonly />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">No Rekening</label>
                                                <div class="col-sm-9">
                                                    <input name="rekening" type="text" class="form-control" id="exampleInputUsername2" value="0429-01-000-592-560" readonly />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">a.n. </label>
                                                <div class="col-sm-9">
                                                    <input name="atasnama" type="text" class="form-control" id="exampleInputUsername2" value="NN" readonly />
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Kode Unik</label>
                                                <div class="col-sm-9">
                                                    <input name="unik" type="number" id="unik" class="form-control" value="<?php echo $unik;?>" readonly />
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Nilai Transfer</label>
                                                <div class="col-sm-9">
                                                    <input name="amount" type="text"  class="form-control" id="exampleInputEmail2" value="<?php echo $transfer;?>" readonly />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Message</label>
                                                <div class="col-sm-9">
<textarea class="form-control" cols="100%" rows="3" name="message" value="" required />Detail Konfirmasi Transfer :</textarea>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label"></label>
                                                <div class="col-sm-9">
                                  <input type="submit" name="topup" value="Next"  class="btn btn-sm btn-primary"/>&nbsp;
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                                            

<?php
include 'footer.php';
?>
<?php
session_start();
include('header.php');



            $query = mysqli_query($koneksi, "SELECT * FROM hm2_pending_deposits WHERE code='$_GET[code]'");
            $data  = mysqli_fetch_array($query);
$unik=$data['unik'];
$amount=$data['amount'];
$amountunik = $amount + $unik;
$userid = $row['userid'];
$id = $row['id'];

if(isset($_POST['upgrade'])){

function acak($panjang)
{
	$karakter= '123456789';
	$string = '';
	for ($i = 0; $i < $panjang; $i++) {
		$pos = rand(0, strlen($karakter)-1);
		$string .= $karakter{$pos};
	}
	return $string;
}
$unik=acak(3);

function acak2($panjang2)
{
	$karakter2= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$string2 = '';
	for ($i = 0; $i < $panjang2; $i++) {
		$pos2 = rand(0, strlen($karakter2)-1);
		$string2 .= $karakter2{$pos2};
	}
	return $string2;
}
$code=acak2(6);

$id = $_POST['id'];
$userid = $row['userid'];
$message = $_POST['message'];

$query = mysqli_query($koneksi, "INSERT hm2_pending_deposits SET user_id='$id', amount='900000', status='pending', message='$message', gateway='BRI', unik='$unik', code='$code', type='upgrade', date=now()")or die(mysql_error());
echo "<script type='text/javascript'>document.location.href = 'topup-history.php';</script>";
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
                                            <h5>TOPUP</h5>
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


                            <div class="col-md-6">
                                <div class="card" style="min-height: 484px;">
                                    <div class="card-header"><h3> TOPUP PROCESS</h3></div>
                                    <div class="card-body">
                                        <form class="forms-sample" action="" method="post">
                                  <input name="id" type="hidden" id="id" class="form-control" value="<?php echo $_SESSION['id'];?>" readonly="readonly" autofocus="on" />

                                            <div class="form-group row">
                                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Username</label>
                                                <div class="col-sm-9">
                                                    <input name="userid" type="text" class="form-control" id="exampleInputUsername2" placeholder="Username" value="<?php echo $row['userid'];?>" readonly />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Name</label>
                                                <div class="col-sm-9">
                                                    <input name="name" type="text" class="form-control" id="exampleInputUsername2" placeholder="Name" value="<?php echo $row['name'];?>" readonly />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Bank</label>
                                                <div class="col-sm-9">
                                                    <input name="bank" type="text" class="form-control" id="exampleInputUsername2" placeholder="Username" value="BRI" readonly />
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
                                                <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Nilai Transfer</label>
                                                <div class="col-sm-9">
                                                    <input name="amount" type="text"  class="form-control" id="exampleInputEmail2" value="<?php echo number_format(900000,0,",",".");?>" readonly />
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
                                  <input type="submit" name="upgrade" value="Next"  class="btn btn-sm btn-primary"/>&nbsp;
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
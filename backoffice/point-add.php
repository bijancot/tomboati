<?php
session_start();
include('header.php');

if(isset($_POST['topup'])){

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

$id = $_SESSION['id'];
$userid = $row['userid'];
$jumlah = $_POST['jumlah'];
$amount = 100000;
$jumlah_amount = $jumlah*$amount;

$insert = mysqli_query($koneksi, 
"INSERT INTO hm2_pending_deposits (user_id, jumlah, amount, unik, code, type, date) 
VALUES('$id', '$jumlah', '$jumlah_amount', '$unik', '$code', 'point', now())");
echo "<script type='text/javascript'>document.location.href = 'point-history.php';</script>";
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
                                            <h5>Hak Register</h5>
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
                                    <div class="card-header"><h3>Order</h3></div>
                                    <div class="card-body">
                                        <form class="forms-sample" action="" method="post">
                                            <div class="form-group row">
                                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Username</label>
                                                <div class="col-sm-9">
                                                    <input name="userid" type="text" class="form-control" id="exampleInputUsername2" placeholder="Username" value="<?php echo $row['userid'];?>" readonly />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Point Register</label>
                                                <div class="col-sm-9">
<select name="jumlah" class="form-control" required>
<option value=""> --------------- </option>
<option value="1">1 Point</option>
<option value="10">10 Point</option>
<option value="20">20 Point</option>
<option value="30">30 Point</option>
<option value="40">40 Point</option>
<option value="50">50 Point</option>
</select>
                                                </div>
                                            </div>
<input type="submit" name="topup" value="next"  class="btn btn-sm btn-primary"/>

&nbsp;
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                                            

<?php
include 'footer.php';
?>
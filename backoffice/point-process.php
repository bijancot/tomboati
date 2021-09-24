<?php
session_start();
include('header.php');

            $query = mysqli_query($koneksi, "SELECT * FROM hm2_pending_deposits WHERE code='$_GET[code]'");
            $data  = mysqli_fetch_array($query);
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
                                            <h5>HAK REGISTER</h5>
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
                                    <div class="card-header"><h3>Process</h3></div>
                                    <div class="card-body">
                                        <form class="forms-sample" action="" method="post">
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
                                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Point Register</label>
                                                <div class="col-sm-9">
                                                    <input name="jumlah" type="text" class="form-control" id="exampleInputUsername2" value="<?php echo $data['jumlah'];?>" readonly />
                                                </div>
                                            </div>
<?php
$amount=$data['jumlah'];
$transfer=$amount /2 * 100000 + $data['unik'];
?>
                                            <div class="form-group row">
                                                <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Nilai Transfer</label>
                                                <div class="col-sm-9">
                                                    <input name="transfer" type="number"  class="form-control" id="exampleInputEmail2" value="<?php echo $transfer;?>" readonly />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Date</label>
                                                <div class="col-sm-9">
                                                    <input name="tangggal" type="text" class="form-control" id="exampleInputUsername2" value="<?php echo $data['date'];?>" readonly />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Payment Gateway</label>
                                                <div class="col-sm-9">
<script type="text/javascript">
function go()
{
window.location=document.getElementById("link").value
}
</script>

<select id="link" onchange="go()" class="form-control">
<option value="">------------------------</option>
<option value="point-process-mandiri.php?code=<?php echo $data['code'];?>"> Bank Mandiri 144-00-159-77-298</option>
<option value="point-process-bca.php?code=<?php echo $data['code'];?>"> Bank BCA 440-031-5758</option>
<option value="point-process-bri.php?code=<?php echo $data['code'];?>"> BRI 0429-01-000-592-560</option>
</select>
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
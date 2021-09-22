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
                                            <h5>ORDER PROCESS</h5>
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
                                    <div class="card-header"><h3>Topup</h3></div>
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
                                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Unik</label>
                                                <div class="col-sm-9">
                                                    <input name="unik" type="text" class="form-control" id="exampleInputUsername2" placeholder="Username" value="<?php echo $data['unik'];?>" readonly />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Nilai Transfer</label>
                                                <div class="col-sm-9">
                                  <input name="amount" type="hidden" id="amount" class="form-control" value="<?php echo $data['amount'];?>" readonly />
                                                    <input name="amountx" type="number"  class="form-control" id="exampleInputEmail2" value="<?php echo number_format($data['amount']+$data['unik'],0,",",".");?>" readonly />
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
<option value="topup-process-mandiri?code=<?php echo $data['code'];?>"> Bank Mandiri 14005 8880 7777</option>
<!-- 
<option value="topup-process-bni?code=<?php echo $data['code'];?>"> Bank BNI 881 165 9000</option>
<option value="topup-process-bca?code=<?php echo $data['code'];?>"> Bank BCA 440 165 9000</option>
<option value="pin-order-process-bri?code=<?php echo $data['code'];?>"> BRI 0000000</option>
 -->
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
<?php
session_start();
include 'header.php';

if ($sum==''){$sumx=0;} else {$sumx=$sum;}
$error = $_GET['error'];

if ($sumx >= 100000){
$button='<input type="submit" name="withdrawal-request" value="Next >>" class="btn btn-sm btn-primary" onclick="this.disabled=true;this.value=\"Sending, please wait...\";this.form.submit();" />';
} else {
$button='<input value="saldo tidak cukup" class="btn btn-sm btn-warning" />';
}            

if(isset($_POST['withdrawal-request'])){

$amount = $_POST['amount'];
$amount2 = number_format($amount,0,",",".");

if ($amount > $sum) {
echo "<script type='text/javascript'>document.location.href = 'ro-history?status=SALDO TIDAK CUKUP';</script>";
} else {
$insert = mysqli_query($koneksi, "INSERT INTO hm2_history (user_id, amount, type, description, date)
VALUES('$id', '$amount', 'withdraw_pending', 'Withdrawal on process', now())") or die(mysqli_error());
echo "<script type='text/javascript'>document.location.href = 'wd-history';</script>";
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
                                        <i class="ik ik-credit-card bg-blue"></i>
                                        <div class="d-inline">
                                            <h5>Financial</h5>
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


                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header d-block">
                                        <h3>Withdrawal Request</h3>
                                    </div>
                                    <div class="card-body p-0 table-border-style">
                                        <div class="table-responsive">

                                            <table class="table">
<!-- col-lg-12--> 



                    <div class="row">
                        <div class="col-lg-12">
                        <div class="panel panel-success">
                        <div class="panel-heading">
                        </div>
                        <div class="panel-body">
                  <div class="form-panel">
                      <form class="form-horizontal style-form" action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-3">
                            <?php echo $statusnya; ?>
                            </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Account Balance Rp.<?php echo number_format($sum,0,",","."); ?></label>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Amount</label>
                              <div class="col-sm-3">
                            <input name="amount" type="number" id="amount" class="form-control" step="0.0000001" min="100000" max="<?php echo $sumx; ?>" value="<?php echo $amount; ?>" autocomplete="off" placeholder="Amount" required />
                            </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-10">
	                              <a href="index" class="btn btn-sm btn-danger"><< Back </a>&nbsp;&nbsp;
                                  <?php echo $button; ?>
                              </div>
                          </div>
                      </form>
                  </div>
                  </div>
                  </div>
          		</div>


<section class="col-lg-12 connectedSortable">                            
                                            </table>
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
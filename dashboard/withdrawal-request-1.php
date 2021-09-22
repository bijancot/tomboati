<?php
session_start();
include 'header.php';

if ($sum==''){$sumx=0;} else {$sumx=$sum;}
$error = $_GET['error'];

if ($sumx >= 100000){
$button='<input type="submit" name="withdrawal-request" value="Next >>" class="btn btn-sm btn-primary" />';
} else {
$button='<input value="saldo tidak cukup" class="btn btn-sm btn-warning" />';
}            

?>
<head>
  <title> Withdrawal | Tombo Ati</title>
</head>
            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Withdrawal
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


<!-- col-lg-12--> 


                    <div class="row">
                        <div class="col-lg-12">
                        <div class="panel panel-success">
                        <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-user"></i> Add Request</h3> 
                        </div>
                        <div class="panel-body">
                  <div class="form-panel">

<?
                            if ($error == '6'){
								$statusnya='<span class="label label-danger">invalid amount</span>';
							}
                            if ($error == '8'){
								$statusnya='<span class="label label-danger">maksimal withdrawal Rp.10.000.000/hari</span>';
							}
                            if ($error == '7'){
								$statusnya='<span class="label label-danger">invalid username</span>';
							}
                            if ($error == '1'){
								$statusnya='<span class="label label-danger">balance tidak cukup untuk melakukan withdrawal</span>';
							}
                            else if ($error == '2' ){
								$statusnya='<span class="label label-danger">minimal withdrawal IDR 100.000</span>';
							}
                            else if ($error == '3' ){
								$statusnya='<span class="label label-danger">invalid transaction password</span>';
							}
                            else if ($error == '4' ){
								$statusnya='<span class="label label-danger">invalid username</span>';
							}
                            else if ($error == '5' ){
								$statusnya='<span class="label label-success">success</span>';
							}
?>


                      <form class="form-horizontal style-form" action="withdrawal-request-2.php" method="post" enctype="multipart/form-data" name="form1" id="form1">

<input name="id" type="hidden" id="id" value="<?php echo $row['id']; ?>" class="form-control" autocomplete="off" placeholder="Auto Number Tidak perlu di isi"/>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-3">
                            <?php echo $statusnya; ?>
                            </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Account Balance</label>
                              <div class="col-sm-3">
                            <input name="" type="text" id="" class="form-control"  value="<?php echo $sumx; ?>" required readonly />
                            <input name="saldo" type="hidden" id="saldo" class="form-control"  value="<?php echo $sum; ?>" required readonly />
                            </div>
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
	                              <a href="index.php" class="btn btn-sm btn-danger"><< Back </a>&nbsp;&nbsp;
                                  <?php echo $button; ?>
                              </div>
                          </div>
                      </form>
                  </div>
                  </div>
                  </div>


<!-- col-lg-12--> 
          		</div>

<?php include 'footer.php'; ?>
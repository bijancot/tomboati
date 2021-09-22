<?php
include 'header.php';

$res = mysqli_query($koneksi,"SELECT sum(amount) FROM hm2_history where user_id='$row[id]' ");
$rowsum = mysqli_fetch_row($res);
$sum = $rowsum[0];
$sum2 = number_format($sum,0,",",".");

if(isset($_POST['withdrawal-request'])){

$id = $_POST['id'];
$sendfrom = $row['username'];
$sendto = $_POST['sendto'];
$amount = $_POST['amount'];
$amount2 = number_format($amount,0,",",".");
$memo = $_POST['memo'];
$tpassword = $_POST['tpassword'];

if ($amount > $sum){
header("Location: withdrawal-request-1.php?error=1&amount=$amount");
} else if ($amount < 100000){
header("Location: withdrawal-request-1.php?error=1&amount=$amount");
} else if ($amount > 15000000){
header("Location: withdrawal-request-1.php?error=8&amount=$amount");
}

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

<?php echo $error; ?>


                      <form class="form-horizontal style-form" action="withdrawal-request-3.php" method="post" enctype="multipart/form-data" name="form1" id="form1">

<input name="id" type="hidden" id="id" value="<?php echo $row['id']; ?>" class="form-control" autocomplete="off" placeholder="Auto Number Tidak perlu di isi"/>


                            <input name="saldo" type="hidden" id="saldo" class="form-control"  value="<?php echo $sum2; ?>" required readonly />

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Amount</label>
                              <div class="col-sm-3">
                            <input name="amount" type="text" id="amount" class="form-control"  value="<?php echo $amount; ?>" autocomplete="off" placeholder="Amount" autocomplete="off" readonly />
                            </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Password Transaksi</label>
                              <div class="col-sm-3">
                            <input name="tpassword" type="password" id="tpassword" value="" class="form-control" autocomplete="off" placeholder="Password Transaksi" autocomplete="off" required />
                            </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-10">
	                              <a href="withdrawal-request-1.php" class="btn btn-sm btn-danger"><< Cancel </a>&nbsp;&nbsp;
                                  <input type="submit" name="withdrawal-request-2" value="Next >>" class="btn btn-sm btn-primary" />
                              </div>
                          </div>

                      </form>
                  </div>
                  </div>
                  </div>


<!-- col-lg-12--> 
          		</div>

<?php include 'footer.php'; ?>
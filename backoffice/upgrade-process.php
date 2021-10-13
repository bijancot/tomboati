<?php
session_start();
include('header.php');

            // $query = mysqli_query($koneksi, "SELECT * FROM hm2_pending_deposits WHERE code='$_GET[code]'");
            // $data  = mysqli_fetch_array($query);
            $query = mysqli_query($koneksi, "SELECT * FROM hm2_pending_deposits WHERE type='upgrade' AND user_id='$id' ");
            $data  = mysqli_fetch_array($query);
            $total_data=mysqli_num_rows($query);
if ($total_data!==0){
echo "<script type='text/javascript'>document.location.href = 'topup-history.php';</script>";
;}

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
                                            <h5>TOPUP PROCESS <?php echo $total_data; ?> <?php echo $id; ?></h5>
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
                                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Name</label>
                                                <div class="col-sm-9">
                                                    <input name="name" type="text" class="form-control" id="exampleInputUsername2" placeholder="Name" value="<?php echo $row['name'];?>" readonly />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Nilai Transfer</label>
                                                <div class="col-sm-9">
                                  <input name="amount" type="hidden" id="amount" class="form-control" value="<?php echo $data['amount'];?>" readonly />
                                                    <input name="amountx" type="number"  class="form-control" id="exampleInputEmail2" value="900000" readonly />
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
<option value="upgrade-process-tunai.php"> Tunai </option>
<option value="upgrade-process-mandiri.php"> Bank Mandiri 144-00-159-77-298</option>
<option value="upgrade-process-bca.php"> Bank BCA 440-031-5758</option>
<option value="upgrade-process-bri.php"> BRI 0429-01-000-592-560</option>
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
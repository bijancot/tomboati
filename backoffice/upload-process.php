<?php
ini_set('display_errors',0);
session_start();
include('header.php');

            $query = mysqli_query($koneksi, "SELECT * FROM hm2_pending_deposits WHERE code='$_GET[code]'");
            $data  = mysqli_fetch_array($query);
$nilai_transfer=$data['amount']+$data['unik'];
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
                                            <h5>DEPOSIT PROCESS</h5>
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
                                    <div class="card-header"><h3>Upload Bukti Transfer</h3></div>
                                    <div class="card-body">
                                        <form class="forms-sample" action="upload-photo1" enctype="multipart/form-data" method="post">
                                            <div class="form-group row">
                                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Username</label>
                                                <div class="col-sm-9">
                                                    <input name="id" type="hidden" id="id" value="<?php echo $row['id']; ?>
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
                                                    <input name="amountx" type="text"  class="form-control" id="exampleInputEmail2" value="<?php echo number_format($nilai_transfer,0,",",".");?>" readonly />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Date</label>
                                                <div class="col-sm-9">
                                                    <input name="tangggal" type="text" class="form-control" id="exampleInputUsername2" value="<?php echo $data['date'];?>" readonly />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Bukti Transfer</label>
                                                <div class="col-sm-9">
                                                    <img src="https://tomboatitour.com/backoffice/<?php echo $data['photo']; ?>" class="img-rounded" width="150" height="200" style="border: 2px solid #666;" /><br>
                                                </div>
                                                <div class="col-sm-9"><br><br>
                                                    <input name="file" type="file" id="file" class="form-control" required />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <input type="submit" name="Upload Image" value="Upload" class="btn btn-sm btn-primary" />
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                                            

<?php
include 'footer.php';
?>
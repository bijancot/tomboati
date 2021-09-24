<?php
session_start();
include 'header.php';
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


        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-block">
                        <h3>History</h3>
                    </div>
                    <div class="card-body p-0 table-border-style">
                        <div class="table-responsive">
                            <?php
                            $kodeku = $_SESSION['id'];
                            $query1 = "select * from hm2_pending_deposits WHERE user_id='$row[id]' AND type='point' ORDER BY id DESC";
                            $hasil = mysqli_query($koneksi, $query1) or die(mysqli_error());
                            ?>

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>
                                            <center>No.</center>
                                        </th>
                                        <th>
                                            <center>Point Register</center>
                                        </th>
                                        <th>
                                            <center>Date</center>
                                        </th>
                                        <th>
                                            <center>Code </center>
                                        </th>
                                        <th>
                                            <center>Unik </center>
                                        </th>
                                        <th>
                                            <center>Gateway </center>
                                        </th>
                                        <th style="width: 20%;">
                                            <center>Bukti Transfer </center>
                                        </th>
                                        <th>
                                            <center>Status </center>
                                        </th>
                                    </tr>
                                </thead>
                                <?php
                                $no = 0;
                                while ($data = mysqli_fetch_array($hasil)) {
                                    $no++;

                                    $dataid = $data['id'];

                                    if ($data['status'] == 'new') {
                                        $status = '<a href="#" class="btn btn-sm btn-warning">pending</a>';
                                        $tindakan = 'process';
                                        $delete = 'delete';
                                        $class = 'btn btn-sm btn-danger';
                                        $class2 = 'btn btn-sm btn-primary';
                                    } else if ($data['status'] == 'pending') {
                                        $status = '<a href="#" class="btn btn-sm btn-warning">pending</a>';
                                        $tindakan = '<a href="#" class="btn btn-sm btn-warning">on process</a> <a href="upload-process-point.php?code=' . $data['code'] . '" class="btn btn-sm btn-primary">upload</a>';
                                        $delete = '';
                                        $class = '';
                                        $class2 = '';
                                    } else {
                                        $status = '<a href="#" class="btn btn-sm btn-success">paid</a>';
                                        $tindakan = '<a href="#" class="btn btn-sm btn-success">processed</a>';
                                        $delete = '';
                                        $class = '';
                                        $class2 = '';
                                    }


                                    $dataphoto = $data['photo'];

                                    if ($dataphoto != '') {
                                        $photo = "<button type='button' class='btn btn-light' data-toggle='modal' data-target='#buktiTransfer$dataid'><img src=\"img/widget/receipt.svg\" style='width:20px;'></button>";
                                ?>
                                        <!-- Modal Bukti Transfer -->
                                        <div class="modal fade" id="buktiTransfer<?php echo $dataid; ?>" role="dialog">
                                            <div class="modal-dialog">

                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Bukti Transfer Data</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <center>
                                                            <img src="<?php echo $base_url . $dataphoto ?>" width="400px" height="400px">
                                                        </center>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    <?php
                                    } else {
                                        $photo = "";
                                    }

                                    ?>

                                    <tbody>
                                        <tr>
                                            <td>
                                                <left><?php echo $no; ?>.</center>
                                            </td>
                                            <td align="right"><?php echo number_format($data['amount'], 0, ",", "."); ?></center>
                                            </td>
                                            <td>
                                                <center><?php echo $data['date']; ?></center>
                                            </td>
                                            <td>
                                                <center><?php echo $data['code']; ?></center>
                                            </td>
                                            <td>
                                                <center><?php echo $data['unik']; ?></center>
                                            </td>
                                            <td>
                                                <center><?php echo $data['gateway']; ?></center>
                                            </td>
                                            <td>
                                                <center><?php echo $photo; ?></center>
                                            </td>
                                            <td>
                                                <center>
                                                    <a href="point-process.php?code=<?php echo $data['code']; ?>" class="<?php echo $class2; ?>"><?php echo $tindakan; ?></a>
                                                    <a href="point-delete.php?code=<?php echo $data['code']; ?>" class="<?php echo $class; ?>"><?php echo $delete; ?></a>
                                                </center>
                                            </td>
                                        </tr>
                                    <?php
                                }
                                    ?>

                                    </tbody>
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
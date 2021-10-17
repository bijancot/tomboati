<?php

include 'header.php';

session_start();

if ($sum_register > 0) {
    $status = '<button class="btn btn-success" name="button" type="submit">Next</button> <input type="reset" class="btn btn-danger" name="reset" value="Reset">';
} else {
    // pengecekan username
    if ($username == "company") {
        $status = '<button class="btn btn-success" name="button" type="submit">Next</button> <input type="reset" class="btn btn-danger" name="reset" value="Reset">';
    } else {
        $status = '<a class="btn btn-success" href="point-add.php">Saldo Point Register Tidak Cukup</a>';
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
                        <i class="ik ik-file-text bg-blue"></i>
                        <div class="d-inline">
                            <h5>Register Mitra</h5>
                            <?php
                            mysqli_query($koneksi, "UPDATE mebers SET is_seen_notifikasi_mitra='1' WHERE sponsor='$row[userid]' AND paket='MITRA' AND upline is null");
                            ?>
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
            <div class="col">
                <div class="card">
                    <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-timeline-tab" data-toggle="pill" href="#permintaan-mitra" role="tab" aria-controls="pills-timeline" aria-selected="true">Permintaan Mitra</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#form-register" role="tab" aria-controls="pills-profile" aria-selected="false">Form Register</a>
                        </li>
                    </ul>
                    <!-- Permintaan -->
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="permintaan-mitra" role="tabpanel" aria-labelledby="pills-timeline-tab">
                            <div class="card-body p-0 table-border-style">
                                <div class="card-body ">
                                    <?php
                                    $query1 = "select * from mebers where sponsor ='$username' AND (paket = 'MITRA' || paket = 'RESELLER') AND (upline IS NULL || upline = '') ORDER BY timer DESC";
                                    $tampil = mysqli_query($koneksi, $query1) or die(mysqli_error($koneksi));
                                    ?>

                                    <table class="table table-hover" border="0">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <center>No. </center>
                                                </th>
                                                <th>
                                                    <center>Tanggal </i></center>
                                                </th>
                                                <th>
                                                    <center>Username </i></center>
                                                </th>
                                                <th>
                                                    <center>Nama Jamaah </i></center>
                                                </th>
                                                <th>
                                                    <center>Peserta</center>
                                                </th>
                                                <th>
                                                    <center>Kota </i></center>
                                                </th>
                                                <th>
                                                    <center>ID Link </i></center>
                                                </th>
                                                <th>
                                                    <center>Contact </center>
                                                </th>
                                                <th>
                                                    <center>Aksi</center>
                                                </th>
                                            </tr>
                                        </thead>
                                        <?php
                                        $no = 0;
                                        while ($data = mysqli_fetch_array($tampil)) {
                                            $no++;
                                        ?>

                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <right><?php echo $no; ?>.</center>
                                                    </td>
                                                    <td>
                                                        <center><?php echo $data['timer']; ?></center>
                                                    </td>
                                                    <td>
                                                        <left>
                                                            <?php echo $data['userid']; ?>
                                                        </left>
                                                    </td>
                                                    <td>
                                                        <center><?php echo $data['name']; ?></center>
                                                    </td>
                                                    <td>
                                                        <center><?php echo $data['paket']; ?></center>
                                                    </td>
                                                    <td>
                                                        <center><?php echo $data['kota']; ?></center>
                                                    </td>
                                                    <td>
                                                        <center><?php echo $data['upline']; ?></center>
                                                    </td>
                                                    <td>
                                                        <right><?php echo $data['hphone']; ?><br><?php echo $data['right']; ?></right>
                                                    </td>
                                                    <td>
                                                        <center>
                                                            <button class="btn btn-info" name="register-detail" type="button" data-toggle="modal" data-target="#detail-registerModal<?php echo $data['id']; ?>">Detail</button>
                                                            <button class="btn btn-warning" name="register-edit" type="button" data-toggle="modal" data-target="#edit-registerModal<?php echo $data['id']; ?>">Edit</a>
                                                        </center>
                                                    </td>
                                                </tr>

                                                <!-- Modal Detail -->
                                                <div class="modal fade" id="detail-registerModal<?php echo $data['id']; ?>" role="dialog">
                                                    <div class="modal-dialog">

                                                        <!-- Modal content-->
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Detail Data</h4>
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row py-2">
                                                                    <div class="col-4">Username</div>
                                                                    <div class="col-1 text-left">:</div>
                                                                    <div class="col-7 text-left text-bold"><?php echo $data['userid']; ?></div>
                                                                </div>
                                                                <div class="row py-2">
                                                                    <div class="col-4">Nama</div>
                                                                    <div class="col-1 text-left">:</div>
                                                                    <div class="col-7 text-left text-bold"><?php echo $data['name']; ?></div>
                                                                </div>
                                                                <div class="row py-2">
                                                                    <div class="col-4">Nomor HP</div>
                                                                    <div class="col-1 text-left">:</div>
                                                                    <div class="col-7 text-left text-bold"><?php echo $data['hphone']; ?></div>
                                                                </div>
                                                                <div class="row py-2">
                                                                    <div class="col-4">Email</div>
                                                                    <div class="col-1 text-left">:</div>
                                                                    <div class="col-7 text-left text-bold"><?php echo $data['email']; ?></div>
                                                                </div>
                                                                <div class="row py-2">
                                                                    <div class="col-4">KTP</div>
                                                                    <div class="col-1 text-left">:</div>
                                                                    <div class="col-7 text-left text-bold"><?php echo $data['ktp']; ?></div>
                                                                </div>
                                                                <div class="row py-2">
                                                                    <div class="col-4">Provinsi</div>
                                                                    <div class="col-1 text-left">:</div>
                                                                    <div class="col-7 text-left text-bold"><?php echo $data['propinsi']; ?></div>
                                                                </div>
                                                                <div class="row py-2">
                                                                    <div class="col-4">Kota / Kabupaten</div>
                                                                    <div class="col-1 text-left">:</div>
                                                                    <div class="col-7 text-left text-bold"><?php echo $data['kota']; ?></div>
                                                                </div>
                                                                <div class="row py-2">
                                                                    <div class="col-4">Kecamatan</div>
                                                                    <div class="col-1 text-left">:</div>
                                                                    <div class="col-7 text-left text-bold"><?php echo $data['kecamatan']; ?></div>
                                                                </div>
                                                                <div class="row py-2">
                                                                    <div class="col-4">Alamat</div>
                                                                    <div class="col-1 text-left">:</div>
                                                                    <div class="col-7 text-left text-bold"><?php echo $data['address']; ?></div>
                                                                </div>
                                                                <div class="row py-2">
                                                                    <div class="col-4">Kode Pos</div>
                                                                    <div class="col-1 text-left">:</div>
                                                                    <div class="col-7 text-left text-bold"><?php echo $data['kode_pos']; ?></div>
                                                                </div>
                                                                <div class="row py-2">
                                                                    <div class="col-4">Negara</div>
                                                                    <div class="col-1 text-left">:</div>
                                                                    <div class="col-7 text-left text-bold"><?php echo $data['country']; ?></div>
                                                                </div>
                                                                <div class="row py-2">
                                                                    <div class="col-4">Bank</div>
                                                                    <div class="col-1 text-left">:</div>
                                                                    <div class="col-7 text-left text-bold"><?php echo $data['bank']; ?></div>
                                                                </div>
                                                                <div class="row py-2">
                                                                    <div class="col-4">Cabang</div>
                                                                    <div class="col-1 text-left">:</div>
                                                                    <div class="col-7 text-left text-bold"><?php echo $data['cabang']; ?></div>
                                                                </div>
                                                                <div class="row py-2">
                                                                    <div class="col-4">Rekening</div>
                                                                    <div class="col-1 text-left">:</div>
                                                                    <div class="col-7 text-left text-bold"><?php echo $data['rekening']; ?></div>
                                                                </div>
                                                                <div class="row py-2">
                                                                    <div class="col-4">Account Name</div>
                                                                    <div class="col-1 text-left">:</div>
                                                                    <div class="col-7 text-left text-bold"><?php echo $data['atasnama']; ?></div>
                                                                </div>
                                                                <div class="row py-2">
                                                                    <div class="col">Foto KTP</div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col"><img src="<?php echo $data['fotoktp']; ?>" style="max-width: 200px;"></div>
                                                                </div>
                                                                <div class="row py-2">
                                                                    <div class="col">Bukti Bayar</div>
                                                                </div>
                                                                <div class="row">
                                                                    <?php if ($data['bukti_bayar']) { ?>
                                                                        <div class="col"><img src="<?php echo $data['bukti_bayar']; ?>" style="max-width: 200px;"></div>
                                                                    <?php } else { ?>
                                                                        <div class="col">
                                                                            <h5>Tidak Ditemukan</h5>
                                                                        </div>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>


                                                <!-- Modal Edit -->
                                                <div class="modal fade" id="edit-registerModal<?php echo $data['id']; ?>" role="dialog">
                                                    <div class="modal-dialog">

                                                        <!-- Modal content-->
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Edit Data</h4>
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            </div>
                                                            <form method="post" action="register-edit.php">
                                                                <div class="modal-body">
                                                                    <p>Memberikan ID Link untuk :</p>
                                                                    <div class="row py-2">
                                                                        <div class="col-4">Username</div>
                                                                        <div class="col-1 text-left">:</div>
                                                                        <div class="col-7 text-left text-bold"><?php echo $data['userid']; ?></div>
                                                                    </div>
                                                                    <div class="row py-2">
                                                                        <div class="col-4">Nama</div>
                                                                        <div class="col-1 text-left">:</div>
                                                                        <div class="col-7 text-left text-bold"><?php echo $data['name']; ?></div>
                                                                    </div>
                                                                    <div class="row py-2">
                                                                        <div class="col-4">Nomor HP</div>
                                                                        <div class="col-1 text-left">:</div>
                                                                        <div class="col-7 text-left text-bold"><?php echo $data['hphone']; ?></div>
                                                                    </div>
                                                                    <div class="row py-2">
                                                                        <div class="col-4">KTP</div>
                                                                        <div class="col-1 text-left">:</div>
                                                                        <div class="col-7 text-left text-bold"><?php echo $data['ktp']; ?></div>
                                                                    </div>
                                                                    <div class="row py-2">
                                                                        <div class="col-4">Email</div>
                                                                        <div class="col-1 text-left">:</div>
                                                                        <div class="col-7 text-left text-bold"><?php echo $data['email']; ?></div>
                                                                    </div>
                                                                    <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                                                                    <input type="hidden" name="userid" value="<?php echo $data['userid']; ?>">
                                                                    <input type="hidden" name="name" value="<?php echo $data['name']; ?>">
                                                                    <input type="hidden" name="email" value="<?php echo $data['email']; ?>">
                                                                    <input type="hidden" name="passw" value="<?php echo $data['passw']; ?>">
                                                                    <!-- username mitra -->
                                                                    <input type="hidden" name="username" value="<?php echo $username; ?>">
                                                                    <div class="row py-2">
                                                                        <div class="col-4">ID Link</div>
                                                                        <div class="col-1 text-left">:</div>
                                                                        <div class="col-7 text-left text-bold"><input name="upline" type="text" class="form-control" placeholder="ID Link" id="idUserEdit" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button class="btn btn-warning" name="btn-register-edit" type="submit">Perbarui</a>
                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                                                </div>
                                                            </form>
                                                        </div>

                                                    </div>
                                                </div>
                                            <?php
                                        }
                                            ?>

                                            </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="form-register" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <div class="card-body">
                                <div class="state">
                                    <h6>Poin Register</h6>
                                    <?php
                                    if ($username == "company") {
                                    ?>
                                        <h2>Tidak terbatas</h2>
                                    <?php
                                    } else {
                                    ?>
                                        <h2><?php echo number_format($sum_register, 0, ',', '.'); ?></h2>
                                    <?php
                                    }
                                    ?>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <form class="forms-sample" action="register-add.php" method="post" enctype="multipart/form-data">
                                            <div class="form-group row">
                                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Freelance<span class="text-danger">*</span></label>
                                                <div class="col-sm-9">
                                                    <?php if ($username == "company") { ?>
                                                        <input name="sponsor" type="text" class="form-control" id="sponsor" placeholder="Sponsor" value="<?php echo $_GET['sponsor']; ?>" required />
                                                    <?php } else { ?>
                                                        <input name="sponsor" type="text" class="form-control" id="sponsor" placeholder="Sponsor" value="<?php echo $row['userid']; ?>" readonly />
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <?php if ($username == "company") { ?>
                                                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">ID Link</label>
                                                    <div class="col-sm-9">
                                                        <input name="upline" type="text" class="form-control" id="idLink" placeholder="ID Link" value="<?php echo $_GET['upline']; ?>" />
                                                    </div>
                                                <?php } else { ?>
                                                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">ID Link<span class="text-danger">*</span></label>
                                                    <div class="col-sm-9">
                                                        <input name="upline" type="text" class="form-control" id="idLink" placeholder="ID Link" value="<?php echo $_GET['upline']; ?>" required />
                                                    </div>
                                                <?php } ?>
                                            </div>
                                            <div class="form-group row">
                                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Username<span class="text-danger">*</span></label>
                                                <div class="col-sm-9">
                                                    <input name="userid" type="text" class="form-control" id="userid" placeholder="Username" value="<?php echo $_GET['userid']; ?>" required />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Nama<span class="text-danger">*</span></label>
                                                <div class="col-sm-9">
                                                    <input name="name" type="text" class="form-control" id="exampleInputUsername2" placeholder="name" value="<?php echo $_GET['name']; ?>" required />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">HP<span class="text-danger">*</span></label>
                                                <div class="col-sm-9">
                                                    <div class="form-row">
                                                        <div class="col">
                                                            <div class="input-group mb-0">
                                                                <div class="input-group-prepend">
                                                                    <div class="input-group-text">+62</div>
                                                                </div>
                                                                <input name="hphone" type="text" class="form-control" id="exampleInputUsername2" placeholder="821432423623" value="<?php echo $_GET['hphone']; ?>" required />
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="input-group mb-0">
                                                                <span class="mt-2 ml-2 m-2">Contoh</span>
                                                                <div class="input-group-prepend">
                                                                    <div class="input-group-text">+62</div>
                                                                </div>
                                                                <input type="text" class="form-control" placeholder="856527300012" readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Email<span class="text-danger">*</span></label>
                                                <div class="col-sm-9">
                                                    <input name="email" type="email" class="form-control" id="exampleInputUsername2" placeholder="email" value="<?php echo $_GET['email']; ?>" required />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">KTP<span class="text-danger">*</span></label>
                                                <div class="col-sm-9">
                                                    <input name="ktp" type="number" class="form-control" id="exampleInputUsername2" placeholder="nik" value="<?php echo $_GET['ktp']; ?>" required />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="foto-KTP" class="col-sm-3 col-form-label">Foto KTP<span class="text-danger">*</span><br><small class="text-danger">Maksimal 5 MB</small></label>
                                                <div class="col-sm-9">
                                                    <input name="fotoktp" type="file" class="form-control-file" id="foto-KTP" value="<?php echo $_GET['fotoktp']; ?>" required />
                                                    <small> Format : .jpg .jpeg .png </small>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Negara<span class="text-danger">*</span></label>
                                                <div class="col-sm-9">
                                                    <input name="country" type="text" class="form-control" id="exampleInputUsername2" placeholder="Negara" value="<?php echo $_GET['country']; ?>" required />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Propinsi<span class="text-danger">*</span></label>
                                                <div class="col-sm-9">
                                                    <input name="propinsi" type="hidden" class="form-control" id="propinsi" />
                                                    <select class="select2-data-array browser-default form-control" id="select2-propinsi" required></select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Kota<span class="text-danger">*</span></label>
                                                <div class="col-sm-9">
                                                    <input name="kota" type="hidden" class="form-control" id="kota" />
                                                    <select class="select2-data-array browser-default form-control" id="select2-kota" required></select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Kecamatan<span class="text-danger">*</span></label>
                                                <div class="col-sm-9">
                                                    <input name="kecamatan" type="hidden" class="form-control" id="kecamatan" />
                                                    <select class="select2-data-array browser-default form-control" id="select2-kecamatan" required></select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Alamat<span class="text-danger">*</span></label>
                                                <div class="col-sm-9">
                                                    <input name="address" type="text" class="form-control" id="exampleInputUsername2" placeholder="Alamat" value="<?php echo $_GET['address']; ?>" required />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Kodepos<span class="text-danger">*</span></label>
                                                <div class="col-sm-9">
                                                    <input name="kode_pos" type="number" class="form-control" id="exampleInputUsername2" placeholder="Kodepos" value="<?php echo $_GET['kode_pos']; ?>" required />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="bukti-bayar" class="col-sm-3 col-form-label">Bukti Bayar<br><small class="text-danger">Maksimal 5 MB</small></label>
                                                <div class="col-sm-9">
                                                    <input name="buktibayar" type="file" class="form-control-file" id="bukti-bayar" value="<?php echo $_GET['bukti_bayar']; ?>" />
                                                    <small> Format : .jpg .jpeg .png </small>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Bank</label>
                                                <div class="col-sm-9">
                                                    <input name="bank" type="text" class="form-control" id="exampleInputUsername2" placeholder="Bank" value="<?php echo $_GET['bank']; ?>" />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Cabang</label>
                                                <div class="col-sm-9">
                                                    <input name="cabang" type="text" class="form-control" id="exampleInputUsername2" placeholder="Cabang" value="<?php echo $_GET['cabang']; ?>" />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Rekening</label>
                                                <div class="col-sm-9">
                                                    <input name="rekening" type="text" class="form-control" id="exampleInputUsername2" placeholder="Account" value="<?php echo $_GET['rekening']; ?>" />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Account Name</label>
                                                <div class="col-sm-9">
                                                    <input name="atasnama" type="text" class="form-control" id="exampleInputUsername2" placeholder="Account Name" value="<?php echo $_GET['atasnama']; ?>" />
                                                </div>
                                            </div>
                                            <?php echo $status; ?>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="previous-month" role="tabpanel" aria-labelledby="pills-setting-tab">
                            <div class="col-md-6">
                                <form class="forms-sample" action="" method="post">
                                    <div class="form-group row">
                                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Username</label>
                                        <div class="col-sm-9">
                                            <input name="userid" type="text" class="form-control" id="exampleInputUsername2" placeholder="Username" value="<?php echo $row['userid']; ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Password Baru</label>
                                        <div class="col-sm-9">
                                            <input name="userid" type="text" class="form-control" id="exampleInputUsername2" placeholder="Username" value="<?php echo $row['userid']; ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Password Lama</label>
                                        <div class="col-sm-9">
                                            <input name="userid" type="text" class="form-control" id="exampleInputUsername2" placeholder="Username" value="<?php echo $row['userid']; ?>" />
                                        </div>
                                    </div>
                                    <button class="btn btn-success" type="submit">Update Profile</button>
                                </form>
                            </div>
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

<!-- ALERT -->
<!-- jika upline tidak ada -->
<?php if (isset($_SESSION['uplinenotfound'])) { ?>
    <script>
        swal("Gagal!", "<?php echo $_SESSION['uplinenotfound']; ?>", "error");
    </script>
<?php unset($_SESSION['uplinenotfound']);
} ?>
<!-- jika username sudah digunakan -->
<?php if (isset($_SESSION['usernameexist'])) { ?>
    <script>
        swal("Gagal!", "<?php echo $_SESSION['usernameexist']; ?>", "error");
    </script>
<?php unset($_SESSION['usernameexist']);
} ?>
<!-- file gambar terlalu besar -->
<?php if (isset($_SESSION['imagebigktp'])) { ?>

    <script>
        swal("Gagal!", "<?php echo $_SESSION['imagebigktp']; ?>", "error");
    </script>

<?php unset($_SESSION['imagebigktp']);
} ?>
<!-- jika file gambar tidak sesuai -->
<?php if (isset($_SESSION['imagenotcorrectktp'])) { ?>

    <script>
        swal("Gagal!", "<?php echo $_SESSION['imagenotcorrectktp']; ?>", "error");
    </script>

<?php unset($_SESSION['imagenotcorrectktp']);
} ?>
<!-- file gambar terlalu besar -->
<?php if (isset($_SESSION['imagebigbayar'])) { ?>

    <script>
        swal("Gagal!", "<?php echo $_SESSION['imagebigbayar']; ?>", "error");
    </script>

<?php unset($_SESSION['imagebigbayar']);
} ?>
<!-- jika file gambar tidak sesuai -->
<?php if (isset($_SESSION['imagenotcorrectbayar'])) { ?>

    <script>
        swal("Gagal!", "<?php echo $_SESSION['imagenotcorrectbayar']; ?>", "error");
    </script>

<?php unset($_SESSION['imagenotcorrectbayar']);
} ?>
<!--  jika berhasil -->
<?php if (isset($_SESSION['berhasil'])) { ?>

    <script>
        swal("Berhasil!", "<?php echo $_SESSION['berhasil']; ?>", "success");
    </script>
<?php unset($_SESSION['berhasil']);
} ?>


<script>
    var urlPropinsi = "https://ibnux.github.io/data-indonesia/propinsi.json";
    var urlKota = "https://ibnux.github.io/data-indonesia/kabupaten/";
    var urlKecamatan = "https://ibnux.github.io/data-indonesia/kecamatan/";

    console.log('url: ' + urlPropinsi);
    $.getJSON(urlPropinsi, function(res) {
        console.log("INSIDE FUNC");
        //console.log(res);

        var data = $.map(res, function(obj) {
            obj.text = obj.nama

            return obj;
        });
        //console.log(data);
        loadPropinsi(data);
    });

    function fetchDataKota(idPropinsi) {
        let url = urlKota + idPropinsi + ".json";
        console.log('url kota : ' + url);
        $.getJSON(url, function(res) {
            console.log("INSIDE fetchDataKota");
            //console.log(res);

            var data = $.map(res, function(obj) {
                obj.text = obj.nama

                return obj;
            });
            //console.log(data);
            loadKota(data);
        });
    }

    function fetchDataKecamatan(idKota) {
        let url = urlKecamatan + idKota + ".json";
        console.log('url kec : ' + url);
        $.getJSON(url, function(res) {
            console.log("INSIDE fetchDataKecamatan");
            //console.log(res);

            var data = $.map(res, function(obj) {
                obj.text = obj.nama

                return obj;
            });
            //console.log(data);
            loadKecamatan(data);
        });
    }

    function loadPropinsi(data) {
        console.log('loadPropinsi');
        $("#select2-propinsi").select2({
            dropdownAutoWidth: true,
            width: '100%',
            data: data
        })
    };

    function loadKota(data) {
        console.log('loadKota');
        $("#select2-kota").select2({
            dropdownAutoWidth: true,
            width: '100%',
            data: data
        })
    };

    function loadKecamatan(data) {
        console.log('loadKecamatan');
        $("#select2-kecamatan").select2({
            dropdownAutoWidth: true,
            width: '100%',
            data: data
        })
    };

    function clearOptions(id) {
        console.log("on clearOptions");

        //$('#' + id).val(null);
        $('#' + id).empty().trigger('change');
    }

    var selectProv = $('#select2-propinsi');
    $(selectProv).change(function() {
        console.log("on change selectProv");

        var value = $(selectProv).val();
        var text = $('#select2-propinsi :selected').text();
        console.log("value = " + value + " / " + "text = " + text);
        $('#propinsi').val(text);

        clearOptions('select2-kota');
        dataKota = fetchDataKota(value);
        loadKota(dataKota);

    });

    var selectKab = $('#select2-kota');
    $(selectKab).change(function() {
        console.log("on change selectKota");

        var value = $(this).val();
        var text = $('#select2-kota :selected').text();
        console.log("value = " + value + " / " + "text = " + text);
        $('#kota').val(text);

        clearOptions('select2-kecamatan');
        dataKecamatan = fetchDataKecamatan(value);
        loadKecamatan(dataKecamatan);
    });

    var selectKec = $('#select2-kecamatan');
    $(selectKec).change(function() {
        console.log("on change selectKec");

        var value = $(this).val();
        var text = $('#select2-kecamatan :selected').text();
        console.log("value = " + value + " / " + "text = " + text);
        $('#kecamatan').val(text);
    });

    // SPASI DI USERNAME
    $(function() {
        $('#userid').on('keypress', function(e) {
            if (e.which == 32) {
                console.log('Space Detected');
                return false;
            }
        });
    });

    $(function() {
        $('#idUserEdit').on('keypress', function(e) {
            if (e.which == 32) {
                console.log('Space Detected');
                return false;
            }
        });
    });

    $(function() {
        $('#idLink').on('keypress', function(e) {
            if (e.which == 32) {
                console.log('Space Detected');
                return false;
            }
        });
    });

    $(function() {
        $('#sponsor').on('keypress', function(e) {
            if (e.which == 32) {
                console.log('Space Detected');
                return false;
            }
        });
    });
</script>
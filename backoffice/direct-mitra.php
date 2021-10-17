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
                            <h5>Referensi Jamaah</h5>
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
                        <h3>Referensi Langsung</h3>
                    </div>
                    <div class="card-body p-0 table-border-style">
                        <div class="table-responsive">
                            <?php
                            $query1 = "select * from mebers where sponsor='$row[userid]' && upline != ''  ORDER BY timer DESC";

                            if (isset($_POST['qcari'])) {
                                $qcari = $_POST['qcari'];
                                $query1 = "SELECT * FROM  bank 
	                where nama_bank like '%$qcari%'
	                or nasabah like '%$qcari%'  ";
                            }
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
                                    $no++; ?>

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
                                                    <button class="btn btn-info" name="mitra-detail" type="button" data-toggle="modal" data-target="#detail-mitraModal<?php echo $data['id']; ?>">Detail</button>
                                                </center>
                                            </td>
                                        </tr>

                                        <!-- Modal Detail -->
                                        <div class="modal fade" id="detail-mitraModal<?php echo $data['id']; ?>" role="dialog">
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
                                                            <div class="col-4">Alamat</div>
                                                            <div class="col-1 text-left">:</div>
                                                            <div class="col-7 text-left text-bold"><?php echo $data['address']; ?></div>
                                                        </div>
                                                        <div class="row py-2">
                                                            <div class="col-4">Kecamatan</div>
                                                            <div class="col-1 text-left">:</div>
                                                            <div class="col-7 text-left text-bold"><?php echo $data['kecamatan']; ?></div>
                                                        </div>
                                                        <div class="row py-2">
                                                            <div class="col-4">Kota / Kabupaten</div>
                                                            <div class="col-1 text-left">:</div>
                                                            <div class="col-7 text-left text-bold"><?php echo $data['kota']; ?></div>
                                                        </div>
                                                        <div class="row py-2">
                                                            <div class="col-4">Provinsi</div>
                                                            <div class="col-1 text-left">:</div>
                                                            <div class="col-7 text-left text-bold"><?php echo $data['propinsi']; ?></div>
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
                                                                <div class="col"><h5>Tidak Ditemukan</h5></div>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    </div>
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


                <?php
                include 'footer.php';
                ?>
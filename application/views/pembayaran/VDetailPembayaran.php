<body>
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container">
            <div class="page-header-content pt-4">
                <div class="data align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <a href="<?= base_url(); ?>Pembayaran">
                                <button class="btn btn-yellow btn-icon mr-2 my-1" type="button"><i class="fas fa-ardata-left"></i></button>
                            </a>
                            <div class="page-header-icon"><i class="fas fa-dollar-sign ml-2 fa-xs"></i></div>
                            Detail Pembayaran
                        </h1>
                        <div class="page-header-subtitle">Daftar Pembayaran</div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container mt-n10">
        <div class="card mb-4">
            <div class="card-header">
                <?= $this->session->flashdata('message'); ?>
                <!-- <a href="<?= site_url('pembayaran/tambahPembayaran'); ?>" class='btn btn-primary btn-sm' type='submit'>Tambah Pembayaran</a> -->
            </div>
            <div class="card-body">
                <div class="datatable">
                    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Jumlah Pembayaran</th>
                                <th>Tanggal Pembayaran</th>
                                <th>Deskripsi</th>
                                <th>Status Pembayaran</th>
                                <th>Bukti Pembayaran</th>
                                <th width="10%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            function harga($angka){
	
                                $hasil_rupiah = "Rp " . number_format($angka,0,',','.');
                                return $hasil_rupiah;
                            
                            }

                            $no = 1; foreach($pembayaran as $data){ 
                            if ($data->STATUSPEMBAYARAN == 1) {
                                $verfikasi = '<button title="Cabut Verifikasi Pembayaran" type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#cabutVerifikasiPembayaranModal' . $data->IDDETAILPEMBAYARAN.'"><i class="fa fa-times-circle"></i>
                                </button>';    
                            $status = '<span class="badge badge-pill badge-success">Verified</span>';
                            } else {
                                $verfikasi = '<button title="Verifikasi Pembayaran" type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#verifikasiPembayaranModal' . $data->IDDETAILPEMBAYARAN.'"><i class="fa fa-check"></i>
                                </button>';
                                $status = '<span class="badge badge-pill badge-danger">Unverified</span>';
                            }
                            ?>
                            <tr>
                                <td><?php echo $no++?></td>
                                <td><?php echo harga($data->JUMLAHPEMBAYARAN); ?></td>
                                <td><?php echo $data->TANGGALPEMBAYARAN; ?></td>
                                <td><?php echo $data->DESKRIPSI; ?></td>
                                <td><?php echo $status; ?></td>
                                <td><img width=100px src="<?php echo $data->BUKTIPEMBAYARAN; ?>" /></td>
                                <td>
                                    <?php echo $verfikasi?>
                                    <button title="Detail Pembayaran" type="button" class="btn btn-primary btn-sm ml-1" data-toggle="modal" data-target="#detailPembayaranModal<?php echo $data->IDDETAILPEMBAYARAN?>"><i class="fa fa-ellipsis-h"></i>
                                    </button>
                                </td>
                            </tr>
                            
                            <!-- Modal Verifikasi -->
                            <div class="modal fade" id="verifikasiPembayaranModal<?= $data->IDDETAILPEMBAYARAN; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Verifikasi Pembayaran</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <h5>Apakah anda yakin menverifikasi <b> <?= $data->IDDETAILPEMBAYARAN ?> </b> </h5>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="<?= base_url('Pembayaran/aksiVerifikasiPembayaran/' .$data->IDPEMBAYARAN.'/'.$data->IDDETAILPEMBAYARAN) ?>" type="button" class="btn btn-success"><i class="fa fa-check mr-1"></i>Verifikasi</a>
                                            <button type="button" class="btn btn-light" data-dismiss="modal"><i class="fa fa-times mr-1"></i>Tutup</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal Cabut Verifikasi -->
                            <div class="modal fade" id="cabutVerifikasiPembayaranModal<?= $data->IDDETAILPEMBAYARAN; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Cabut Verifikasi Pembayaran</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <h5>Apakah anda yakin mencabut verifikasi <b> <?= $data->IDDETAILPEMBAYARAN ?> </b> </h5>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="<?= base_url('Pembayaran/aksiCabutVerifikasiPembayaran/' .$data->IDPEMBAYARAN.'/'.$data->IDDETAILPEMBAYARAN) ?>" type="button" class="btn btn-danger"><i class="fa fa-check mr-1"></i>Unverified</a>
                                            <button type="button" class="btn btn-light" data-dismiss="modal"><i class="fa fa-times mr-1"></i>Tutup</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal Detail -->
                            <div class="modal fade" id="detailPembayaranModal<?= $data->IDDETAILPEMBAYARAN ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Detail Pembayaran </h5>
                                            <?php if ($data->STATUSPEMBAYARAN == 1) {
                                            ?>
                                                <span class="badge badge-pill badge-success mt-1 ml-1">Terverfikasi</span>
                                            <?php
                                            } else {
                                            ?>
                                                <span class="badge badge-pill badge-danger mt-1 ml-1">Belum Terverifikasi</span>
                                            <?php
                                            }
                                            ?>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <h6 for="nomorKTP">Jumlah Pembayaran</h6>
                                                <p><?= harga($data->JUMLAHPEMBAYARAN); ?></p>
                                            </div>
                                            <div class="form-group">
                                                <h6 for="namaLengkap">Tanggal Pembayaran</h6>
                                                <p><?= $data->TANGGALPEMBAYARAN; ?></p>
                                            </div>
                                            <div class="form-group">
                                                <h6 for="email">Deskripsi</h6>
                                                <p><?= $data->DESKRIPSI; ?></p>
                                            </div>
                                            
                                            <div class="form-group">
                                                <h6>Bukti Pembayaran</h6>
                                                <img src="<?= $data->BUKTIPEMBAYARAN; ?>" width="200px">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <?php if ($data->STATUSPEMBAYARAN == 1) {
                                            ?>
                                                <a href="<?= base_url('Pembayaran/aksiCabutVerifikasiPembayaran/' .$data->IDPEMBAYARAN.'/'.$data->IDDETAILPEMBAYARAN) ?>" type="button" class="btn btn-danger"><i class="fa fa-check mr-1"></i>Unverified</a>
                                            <?php
                                            } else {
                                            ?>
                                                <a href="<?= base_url('Pembayaran/aksiVerifikasiPembayaran/' .$data->IDPEMBAYARAN.'/'.$data->IDDETAILPEMBAYARAN) ?>" type="button" class="btn btn-success"><i class="fa fa-check mr-1"></i>Verifikasi</a>
                                            <?php
                                            }
                                            ?>
                                            <button type="button" class="btn btn-light" data-dismiss="modal"><i class="fa fa-times mr-1"></i> Tutup</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    Pusher.logToConsole = true;

    var pusher = new Pusher('ee692ab95bb9aeaa1dcc', {
        cluster: 'ap1',
        forceTLS: true
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(response) {
        xhr = $.ajax({
            method: 'POST',
            url: "<?php echo base_url() ?>/Notifikasi/listNotifikasi",
            success: function(response) {
                $('.list-notifikasi').html(response);
            }
        })
    });

    $('.list-notifikasi').on('click', '.notifikasi', function(e) {
        console.log("Clicked");
    });
</script>
<script>
    $().ready(function() {
        var table = $('#dataTable').DataTable({
            ordering: false,
            "order": [
                [0, 'asc']
            ],
            columnDefs: [{
                    sWidth: '5%',
                    targets: 0
                },
                {
        "targets": 5,
        "className": "text-center",
   }
            ],
            fixedColumns: false
        });
    });
</script>
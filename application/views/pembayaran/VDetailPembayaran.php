<body>
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <a href="<?= base_url(); ?>Pembayaran">
                                <button class="btn btn-yellow btn-icon mr-2 my-1" type="button"><i class="fas fa-arrow-left"></i></button>
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
                                <th>Aksi</th>
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
                                $verfikasi = '<a title="Cabut Verifikasi Pembayaran" href="'.base_url('Pembayaran/aksiCabutVerifikasiPembayaran/'.$data->IDPEMBAYARAN.'/'.$data->IDDETAILPEMBAYARAN).'" class="btn btn-danger btn-sm"><i class="fa fa-times-circle"></i>
                        </button>';
                                $status = '<span class="badge badge-pill badge-success">Verified</span>';
                            } else {
                                $verfikasi = '<a title="Verifikasi Pembayaran" href="'.base_url('Pembayaran/aksiVerifikasiPembayaran/'.$data->IDPEMBAYARAN.'/'.$data->IDDETAILPEMBAYARAN).'" class="btn btn-primary btn-sm" ><i class="fa fa-check"></i>
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
                                <td><img src="<?php echo $data->BUKTIPEMBAYARAN; ?>" /></td>
                                <td>
                                    <?php echo $verfikasi?>
                                </td>
                            </tr>
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
            ],
            fixedColumns: false
        });
    });
</script>
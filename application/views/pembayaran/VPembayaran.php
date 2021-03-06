<body>
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i class="fas fa-dollar-sign ml-2 fa-xs"></i></div>
                            Pembayaran
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
                                <th>ID Transaksi</th>
                                <th>Total Pembayaran</th>
                                <th>Tanggal Pembayaran</th>
                                <th>Sisa Pembayaran</th>
                                <th>Status Pembayaran</th>
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
                                $status = '<span class="badge badge-pill badge-success">Lunas</span>';
                            } else {
                                $status = '<span class="badge badge-pill badge-danger">Belum Lunas</span>';
                            }
                            ?>
                            <tr>
                                <td><?php echo $no++?></td>
                                <td><?php echo $data->IDTRANSAKSI; ?> </td>
                                <td><?php echo harga($data->TOTALPEMBAYARAN); ?></td>
                                <td><?php echo $data->TANGGALPEMBAYARAN; ?></td>
                                <td><?php echo harga($data->SISAPEMBAYARAN); ?></td>
                                <td><?php echo $status; ?></td>
                                <td>
                                    <a title="Detail Pembayaran" href="<?php echo site_url('Pembayaran/detailPembayaran')?>/<?php echo $data->IDPEMBAYARAN; ?>" class="btn btn-primary btn-sm"><i class="fa fa-ellipsis-h"></i></a>
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
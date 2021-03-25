<body>
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container-fluid">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i class="fas fa-users ml-2 fa-xs"></i></div>
                            Kloter Paket
                        </h1>
                        Daftar Jamaah berdasarkan Paket
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container-fluid mt-n10">
        <div class="card mb-4">
            <div class="card-header">
                <?= $this->session->flashdata('message'); ?>
            </div>
            <div class="card-body">
                <div class="datatable">
                    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Paket</th>
                                <th>Tanggal Keberangkatan</th>
                                <th>Jumlah Jamaah</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($jamaah as $data) { 
                                ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $data->NAMAPAKET ?></td>
                                    <td><?= date_format(new DateTime($data->TANGGALKEBERANGKATAN), 'd-M-Y'); ?></td>
                                    <td><?= $data->jumlah; ?> Jamaah</td>
                                    <td>
                                        <a title="Atur Kloter" href="<?= base_url('Kloter/aturKloter/' . $data->IDPAKET) ?>" type="button" class="btn btn-warning mt-1 btn-sm"><i class="fa fa-edit"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
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
                sWidth: '15%',
                targets: 5
            }
            ],
            fixedColumns: false
        });
    });
</script>
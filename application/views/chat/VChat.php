<body>
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container-fluid">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="message-circle"></i></div>
                            Chat
                        </h1>
                        <div class="page-header-subtitle">Daftar Chat</div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container-fluid mt-n10">
        <div class="card mb-4">
            <div class="card-header">
                <!-- <a href="<?= site_url('pembayaran/tambahPembayaran'); ?>" class='btn btn-primary btn-sm' type='submit'>Tambah Kata-Kata Mutiara</a> -->
            </div>
            <div class="card-body">
                <div class="datatable">
                    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Pesan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; foreach($chat as $data){?>
                            <tr>
                                <td><?php echo $no++?></td>
                                <td><?php echo $data->NAMALENGKAP?></td>
                                <td><?php echo $data->MESSAGE?></td>
                                <td>
                                    <?php if($data->ISSEEN == 0){?>
                                        <a href="<?php echo base_url('Chat/detailChat/'.$data->ID_CHAT_ROOM.'')?>" class="btn btn-sm btn-yellow" data-toggle="tooltip" data-placement="top" title="Detail Chat"><span class="fas fa-info"> </span> </a>
                                    <?php }else{?>
                                        <a href="<?php echo base_url('Chat/detailChat/'.$data->ID_CHAT_ROOM.'')?>" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Detail Chat"><span class="fas fa-info"> </span> </a>
                                    <?php }?>
                                    
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
        xhr=$.ajax({    
                method: 'POST',
                url: "<?php echo base_url()?>/Notifikasi/listNotifikasi",
                success : function(response){
                    $('.list-notifikasi').html(response);
                }
            })
    });

    $('.list-notifikasi').on('click','.notifikasi', function(e) {
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
            columnDefs: [
                {
                    sWidth: '5%',
                    targets: 0
                },
                {
                    sWidth: '25%',
                    targets: 1
                },
                {
                    sWidth: '10%',
                    targets: 3
                }
            ],
            fixedColumns: false
        });
    });
</script>
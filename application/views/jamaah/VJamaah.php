<body>
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container-fluid">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                        <div class="page-header-icon"><i data-feather="user"></i></div>
                        <?= $title; ?>
                        </h1>
                        Daftar Jamaah
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container-fluid mt-n10">
        <div class="card mb-4">
            <div class="card-header">
            </div>
            <div class="card-body">
                <div class="datatable">
                    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Status Pendaftaran</th>
                                <th>Status Berangkat</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; foreach($jamaah as $data){ ?>
                            <?php 
                                if($data->STATUSPENDAFTARAN == 1){
                                    $status = '<span class="badge badge-pill badge-success">Terverfikasi</span>';
                                }else{
                                    $status = '<span class="badge badge-pill badge-danger">Belum Terverifikasi</span>';
                                }

                                if($data->ISJAMAAHBERANGKAT == 1){
                                    $berangkat = '<span class="badge badge-pill badge-success">Berangkat</span>';
                                }else{
                                    $berangkat = '<span class="badge badge-pill badge-danger">Belum Berangkat</span>';
                                }
                            ?>
                            <tr>
                                <td><?php echo $no++?></td>
                                <td><?php echo $status?></td>
                                <td><?php echo $berangkat?></td>
                                <td><?php echo $data->NAMALENGKAP?></td>
                                <td><?php echo $data->EMAIL?></td>
                                <td>
                                    <button title="Detail Jamaah" type="button" class="btn btn-primary mt-1 btn-sm" data-toggle="modal" data-target=""><i class="fa fa-ellipsis-h"></i>
                                    </button>
                                    <button title="Hapus Jamaah" type="button" class="btn btn-danger mt-1 btn-sm" data-toggle="modal" data-target=""><i class="fa fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            <?php }?>
                        </tbody>
                    </table>
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
                    sWidth: '10%',
                    targets: 5
                }
            ],
            fixedColumns: false
        });
    });
</script>

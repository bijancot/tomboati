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
            <?= $this->session->flashdata('message'); ?>
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
                                    $verfikasi = '<button title="Cabut Verifikasi Pendaftaran" type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#cabutVerifikasiPendaftaranModal' . $data->KODEPENDAFTARAN . '"><i class="fa fa-times-circle"></i>
                                    </button>';
                                    $status = '<span class="badge badge-pill badge-success">Terverfikasi</span>';
                                }else{
                                    $verfikasi = '<button title="Verifikasi Pendafataran" type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#verifikasiPendaftaranModal' . $data->KODEPENDAFTARAN . '"><i class="fa fa-check"></i>
                                    </button>';
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
                                    <?php echo $verfikasi?>
                                    <button title="Detail Jamaah" type="button" class="btn btn-primary mt-1 btn-sm" data-toggle="modal" data-target=""><i class="fa fa-ellipsis-h"></i>
                                    </button>
                                    <button title="Hapus Jamaah" type="button" class="btn btn-danger mt-1 btn-sm" data-toggle="modal" data-target=""><i class="fa fa-trash"></i>
                                    </button>
                                </td>
                                <!-- Modal Cabut Verifikasi -->
                                <div class="modal fade" id="cabutVerifikasiPendaftaranModal<?= $data->KODEPENDAFTARAN; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Cabut Verifikasi <?= $title ?></h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <h5>Apakah anda yakin mencabut verifikasi pendaftaran <b> <?= $data->NAMALENGKAP ?> </b> ? </b></h5>
                                            </div>
                                            <div class="modal-footer">
                                                <a href="<?= base_url('Jamaah/aksiCabutVerifikasiPendaftaran/' . $data->KODEPENDAFTARAN) ?>" type="button" class="btn btn-danger"><i class="fa fa-check mr-1"></i>Unverified</a>
                                                <button type="button" class="btn btn-light" data-dismiss="modal"><i class="fa fa-times mr-1"></i>Tutup</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal Cabut Verifikasi -->
                                <div class="modal fade" id="verifikasiPendaftaranModal<?= $data->KODEPENDAFTARAN; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Cabut Verifikasi <?= $title ?></h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <h5>Apakah anda yakin verifikasi pendaftaran <b> <?= $data->NAMALENGKAP ?> ? </b></h5>
                                            </div>
                                            <div class="modal-footer">
                                                <a href="<?= base_url('Jamaah/aksiVerifikasiPendaftaran/' . $data->KODEPENDAFTARAN) ?>" type="button" class="btn btn-success"><i class="fa fa-check mr-1"></i>Verifikasi</a>
                                                <button type="button" class="btn btn-light" data-dismiss="modal"><i class="fa fa-times mr-1"></i>Tutup</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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

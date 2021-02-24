<body>
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container-fluid">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                        <div class="page-header-icon"><i data-feather="home"></i></div>
                        <?= $title; ?>
                        </h1>
                        Daftar Paket
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container-fluid mt-n10">
        <div class="card mb-4">
            <div class="card-header">
                <?= $this->session->flashdata('message'); ?>
                <a href="<?= base_url('Haji/tambahPaket/'.$tipe); ?>" class='btn btn-primary btn-sm' type='submit'><i class="fa fa-plus mr-1"></i>Tambah Paket</a>
                </div>
            <div class="card-body">
                <div class="datatable table-responsive">
                    <?php
                    $template = array('table_open' => '<table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">');
                        $this->table->set_template($template);
                        $this->table->set_heading('No', 'Status', 'Nama Paket', 'Foto Paket', 'Waktu', 'Aksi');
                        $no = 1;
                        foreach ($paket as $row) {
                        if($row->ISSHOW == 1){
                        $verfikasi = '<button title="Non-Aktifkan Paket" type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#nonAktifPaketModal'.$row->IDPAKET.'"><i class="fa fa-times-circle"></i>
                        </button>'; 
                        $status = '<span class="badge badge-pill badge-success">Aktif</span>';
                        }else{
                        $verfikasi = '<button title="Aktifkan Paket" type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#aktifPaketModal'.$row->IDPAKET.'"><i class="fa fa-check"></i>
                        </button>';
                        $status = '<span class="badge badge-pill badge-danger">Non-Aktif</span>';
                        }
                        $this->table->add_row(
                        $no++,
                        $status,
                        $row->NAMAPAKET ,
                        '<img src="' . $row->IMAGEPAKET . '" style="width:100px">',
                        $row->CREATED_AT,
                        $verfikasi.
                        '<button title="Detail Paket" type="button" class="btn btn-primary ml-1 btn-sm" data-toggle="modal" data-target="#detailPaketModal'.$row->IDPAKET.'"><i class="fa fa-ellipsis-h"></i>
                        </button><br>
                        <a title="Edit Paket" href="'.  base_url("Haji/editKhususPaket/".$row->IDPAKET).'" type="button" class="btn btn-warning mt-1 btn-sm"><i class="fa fa-edit"></i>
                        </a>
                        <button title="Hapus Paket" type="button" class="btn btn-danger mt-1 btn-sm" data-toggle="modal" data-target="#hapusPaketModal'.$row->IDPAKET.'"><i class="fa fa-trash"></i>
                        </button>'
                        );
                        ?>
                        <!-- Modal Detail -->
                        <div class="modal fade" id="detailPaketModal<?= $row->IDPAKET?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Detail <?= $row->NAMAPAKET; ?> </h5>
                                        <?php if($row->ISSHOW == 1){
                                        ?>
                                        <span class="badge badge-pill badge-success ml-1">Aktif</span>
                                        <?php
                                        }else{
                                        ?>
                                        <span class="badge badge-pill badge-danger ml-1">Non-Aktif</span>
                                        <?php
                                        }
                                        ?>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="namaPaket">Nama Paket Haji <?= $tipe; ?></label>
                                                    <h5><?= $row->NAMAPAKET; ?></h5>
                                                </div>
                                            </div>
                                        </div>
                                        <h5>Gambar Paket</h5>
                                        <div class="form-group">
                                            <img src="<?= $row->IMAGEPAKET;?>" width="200px">
                                        </div>
                                        <hr>
                                    </div>
                                    <div class="modal-footer">
                                        <?php if($row->ISSHOW == 1){
                                            ?>
                                            <a href="<?= base_url('Haji/aksiNonAktifPaket/'.$row->IDPAKET) ?>" type="button" class="btn btn-danger"><i class="fa fa-check mr-1"></i>Non-Aktifkan</a>
                                        <?php
                                        }else{
                                        ?>                                  
                                            <a href="<?= base_url('Haji/aksiAktifPaket/'.$row->IDPAKET) ?>" type="button" class="btn btn-success"><i class="fa fa-check mr-1"></i>Aktifkan</a>
                                        <?php
                                        }
                                        ?>
                                        <a href="<?= base_url('Haji/editPaket/'.$row->IDPAKET) ?> " type="button" class="btn btn-warning"><i class="fa fa-edit mr-1"></i> Edit</a>
                                        <button type="button" class="btn btn-light" data-dismiss="modal"><i class="fa fa-times mr-1"></i> Tutup</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal Hapus -->
                        <div class="modal fade" id="hapusPaketModal<?= $row->IDPAKET; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Hapus <?= $title ?></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <h5>Apakah anda yakin akan menghapus <b> <?= $row->NAMAPAKET ?> ? </b></h5>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="<?= base_url('Haji/aksiHapusPaket/'.$row->IDPAKET) ?>" type="button" class="btn btn-danger"><i class="fa fa-trash mr-1"></i>Hapus</a>
                                        <button type="button" class="btn btn-light" data-dismiss="modal"><i class="fa fa-times mr-1"></i>Tutup</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal Aktif -->
                        <div class="modal fade" id="aktifPaketModal<?= $row->IDPAKET; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Aktifkan Paket <?= $title ?></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <h5>Apakah anda yakin akan mengaktifkan <b> <?= $row->NAMAPAKET ?> ?</b></h5>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="<?= base_url('Haji/aksiAktifPaket/'.$row->IDPAKET) ?>" type="button" class="btn btn-success"><i class="fa fa-check mr-1"></i>Aktifkan</a>
                                        <button type="button" class="btn btn-light" data-dismiss="modal"><i class="fa fa-times mr-1"></i>Tutup</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal Non-Aktif -->
                        <div class="modal fade" id="nonAktifPaketModal<?= $row->IDPAKET; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Cabut Verifikasi <?= $title ?></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <h5>Apakah anda yakin akan menonaktifkan <b> <?= $row->NAMAPAKET ?> ?</b></h5>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="<?= base_url('Haji/aksiNonAktifPaket/'.$row->IDPAKET) ?>" type="button" class="btn btn-danger"><i class="fa fa-check mr-1"></i>Non-Aktifkan</a>
                                        <button type="button" class="btn btn-light" data-dismiss="modal"><i class="fa fa-times mr-1"></i>Tutup</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        }
                        echo $this->table->generate();
                        ?>
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
            columnDefs: [{
                    sWidth: '5%',
                    targets: 0
                },
                {
                    sWidth: '5%',
                    targets: 1
                }, {
                    sWidth: '12%',
                    targets: 4
                }, {
                    sWidth: '10%',
                    targets: 5
                }
            ],
            fixedColumns: false
        });
    });
</script>
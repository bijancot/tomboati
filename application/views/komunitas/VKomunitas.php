<body>
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container-fluid">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i class="fas fa-users ml-2 fa-xs"></i></div>
                            Komunitas
                        </h1>
                        <div class="page-header-subtitle">Daftar Komunitas</div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container-fluid mt-n10">
        <div class="card mb-4">
            <div class="card-header">
                <?= $this->session->flashdata('message'); ?>
                <a href="<?= site_url('Komunitas/tambahKomunitas'); ?>" class='btn btn-primary btn-sm' type='submit'><i class="fa fa-plus mr-1"></i>Tambah Komunitas</a>
            </div>
            <div class="card-body">
                <div class="datatable">
                    <?php
                    $template = array('table_open' => '<table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">');
                    $this->table->set_template($template);
                    $this->table->set_heading('No', 'Judul Komunitas', 'Content Komunitas', 'Foto', 'Tanggal', 'Aksi');
                    $no = 1;
                    foreach ($komunitas as $row) {
                        $this->table->add_row(
                            $no++,
                            $row->JUDULNEWS,
                            $row->CONTENTNEWS,
                            '<img src="' . $row->FOTO . '" style="width:100px">',
                            $row->TANGGALNEWS,
                            '
                            <button title="Detail Komunitas" type="button" class="btn btn-sm btn-primary mt-1 " data-toggle="modal" data-target="#detailKomunitas' . $row->IDKOMUNITASINFO . '"><i class="fa fa-ellipsis-h"></i>
                            </button>
                            <a title="Edit Komunitas" href="' .  base_url("Komunitas/editKomunitas/" . $row->IDKOMUNITASINFO) . '" type="button" class="btn btn-sm btn-warning mt-1 "><i class="fa fa-edit"></i>
                            </a>
                            <button title="Hapus Komunitas" type="button" class="btn btn-sm btn-danger mt-1" data-toggle="modal" data-target="#hapusKomunitasModal' . $row->IDKOMUNITASINFO . '"><i class="fa fa-trash"></i>
                            </button>'
                        );
                    ?>
                        <!-- Modal Detail -->
                        <div class="modal fade" id="detailKomunitas<?= $row->IDKOMUNITASINFO ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Detail <?= $title; ?> </h5>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <h6 for="judulNews">Judul Komunitas</h6>
                                                    <p><?= $row->JUDULNEWS; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <h6 for="contentNews">Content Komunitas</h6>
                                            <p><?= $row->CONTENTNEWS; ?></p>
                                        </div>
                                        <h5>Foto</h5>
                                        <div class="form-group">
                                            <img src="<?= $row->FOTO; ?>" width="200px">
                                        </div>
                                        <div class="form-group">
                                            <label for="tanggalNews">Tanggal</label>
                                            <h5><?= $row->TANGGALNEWS; ?></h5>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="<?= base_url('Komunitas/editKomunitas/' . $row->IDKOMUNITASINFO) ?> " type="button" class="btn btn-warning"><i class="fa fa-edit mr-1"></i> Edit</a>
                                        <button type="button" class="btn btn-light" data-dismiss="modal"><i class="fa fa-times mr-1"></i> Tutup</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Modal Hapus-->
                        <div class="modal fade" id="hapusKomunitasModal<?= $row->IDKOMUNITASINFO; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Hapus <?= $title ?></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <h5>Apakah anda yakin akan menghapus <b> <?= $row->JUDULNEWS ?> ? </b></h5>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="<?= base_url() ?>Komunitas/hapusKomunitas/<?= $row->IDKOMUNITASINFO; ?>" type="button" class="btn btn-danger"><i class="fa fa-trash mr-1"></i>Hapus</a>
                                        <button type="button" class="btn btn-light" data-dismiss="modal"><i class="fa fa-times mr-1"></i>Tutup</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Akhir Modal Hapus-->
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
                    sWidth: '13%',
                    targets: 5
                }
            ],
            fixedColumns: false
        });
    });
</script>
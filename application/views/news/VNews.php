<body>
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container-fluid">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="activity"></i></div>
                            News
                        </h1>
                        <div class="page-header-subtitle">Daftar News</div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container-fluid mt-n10">
        <div class="card mb-4">
            <div class="card-header">
                <?= $this->session->flashdata('message'); ?>
                <a href="<?= base_url('news/tambahNews/'); ?>" class='btn btn-primary btn-sm' type='submit'><i class="fa fa-plus mr-1"></i>Tambah News</a>
            </div>
            <div class="card-body">
                <div class="datatable">
                    <?php
                    $template = array('table_open' => '<table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">');
                    $this->table->set_template($template);
                    $this->table->set_heading('No', 'Judul News', 'Deskripsi News', 'Isi News', 'Foto', 'Tanggal', 'Aksi');
                    $no = 1;
                    foreach ($news as $row) {
                        $this->table->add_row(
                            $no++,
                            $row->JUDULNEWS,
                            $row->DESKRIPSINEWS,
                            $row->CONTENTNEWS,
                            '<img src="'. $row->FOTO .'" style="width:100px">',
                            $row->TANGGALNEWS,
                            '
                            <button title="Detail News" type="button" class="btn btn-primary mt-1 btn-sm" data-toggle="modal" data-target="#detailNews' . $row->IDNEWSINFO . '"><i class="fa fa-ellipsis-h"></i>
                            </button>
                            <a title="Edit News" href="' .  base_url("News/editNews/" . $row->IDNEWSINFO) . '" type="button" class="btn btn-warning mt-1 btn-sm"><i class="fa fa-edit"></i>
                            </a>
                            <button title="Hapus User" type="button" class="btn btn-danger mt-1 btn-sm" data-toggle="modal" data-target="#hapusNewsModal' . $row->IDNEWSINFO . '"><i class="fa fa-trash"></i>
                            </button>'
                        );
                    ?>
                        <!-- Modal Detail -->
                        <div class="modal fade" id="detailNews<?= $row->IDNEWSINFO ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Detail <?= $title; ?> </h5>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="judulNews">Judul News</label>
                                                    <h5><?= $row->JUDULNEWS; ?></h5>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="deskripsiNews">Deskripsi News</label>
                                                    <h5><?= $row->DESKRIPSINEWS; ?></h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="contentNews">Isi News</label>
                                            <h5><?= $row->CONTENTNEWS; ?></h5>
                                        </div>
                                        <h5>Gambar News</h5>
                                        <div class="form-group">
                                            <img src="<?= $row->FOTO; ?>" width="200px">
                                        </div>
                                        <div class="form-group">
                                            <label for="tanggalNews">Tanggal</label>
                                            <h5><?= $row->TANGGALNEWS; ?></h5>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="<?= base_url('News/editNews/' . $row->IDNEWSINFO) ?> " type="button" class="btn btn-warning"><i class="fa fa-edit mr-1"></i> Edit</a>
                                        <button type="button" class="btn btn-light" data-dismiss="modal"><i class="fa fa-times mr-1"></i> Tutup</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Modal Hapus-->
                        <div class="modal fade" id="hapusNewsModal<?= $row->IDNEWSINFO; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                        <a href="<?= base_url() ?>News/hapusNews/<?= $row->IDNEWSINFO; ?>" type="button" class="btn btn-danger"><i class="fa fa-trash mr-1"></i>Hapus</a>
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
            columnDefs: [
                {
                    sWidth: '5%',
                    targets: 0
                },
                {
                    sWidth: '10%',
                    targets: 5
                },
                {
                    sWidth: '15%',
                    targets: 6
                }
            ],
            fixedColumns: false
        });
    });
</script>
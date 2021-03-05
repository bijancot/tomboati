<body>
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container-fluid">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i class="fas fa-book-open ml-2 fa-xs"></i></div>
                            Kata-Kata Mutiara
                        </h1>
                        <div class="page-header-subtitle">Daftar Kata-Kata Mutiara</div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container-fluid mt-n10">
        <div class="card mb-4">
            <div class="card-header">
                <?= $this->session->flashdata('message'); ?>
                <a href="<?= base_url('KataMutiara/tambahKataMutiara'); ?>" class='btn btn-primary btn-sm' type='submit'><i class="fa fa-plus mr-1"></i>Tambah Kata-Kata Mutiara</a>
            </div>
            <div class="card-body">
                <div class="datatable">
                    <?php
                    $template = array('table_open' => '<table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">');
                    $this->table->set_template($template);
                    $this->table->set_heading('No', 'Kata Mutiara', 'Tanggal', 'Aksi');
                    $no = 1;
                    foreach ($kataMutiara as $row) {
                        $this->table->add_row(
                            $no++,
                            $row->TEKSKATAMUTIARA,
                            $row->WAKTU,
                            '
                            <button title="Detail Kata Mutiara" type="button" class="btn btn-sm btn-primary mt-1 " data-toggle="modal" data-target="#detailKamu' . $row->IDKATAMUTIARA . '"><i class="fa fa-ellipsis-h"></i>
                            </button>
                            <a title="Edit Kata Mutiara" href="' .  base_url("KataMutiara/editKatamutiara/" . $row->IDKATAMUTIARA) . '" type="button" class="btn btn-sm btn-warning mt-1"><i class="fa fa-edit"></i>
                            </a>
                            <button title="Hapus Kata Mutiara" type="button" class="btn btn-sm btn-danger mt-1" data-toggle="modal" data-target="#hapusKamuModal' . $row->IDKATAMUTIARA . '"><i class="fa fa-trash"></i>
                            </button>'
                        );
                    ?>
                        <!-- Modal Detail -->
                        <div class="modal fade" id="detailKamu<?= $row->IDKATAMUTIARA ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Detail <?= $title; ?> </h5>
                                    </div>
                                    <div class="modal-body">
                                        <div class="col">
                                            <div class="form-group">
                                                <h6 for="isiKatamutiara">Kata Mutiara</h6>
                                                <p><?= $row->TEKSKATAMUTIARA; ?></p>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <h6 for="WAKTU">Tanggal Upload</h6>
                                                <p><?= $row->WAKTU; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="<?= base_url('KataMutiara/editKatamutiara/' . $row->IDKATAMUTIARA) ?> " type="button" class="btn btn-warning"><i class="fa fa-edit mr-1"></i> Edit</a>
                                        <button type="button" class="btn btn-light" data-dismiss="modal"><i class="fa fa-times mr-1"></i> Tutup</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Modal Hapus-->
                        <div class="modal fade" id="hapusKamuModal<?= $row->IDKATAMUTIARA; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Hapus <?= $title ?></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <h5>Apakah anda yakin akan menghapus kata mutiara ?</h5>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="<?= base_url() ?>KataMutiara/hapusKataMutiara/<?= $row->IDKATAMUTIARA; ?>" type="button" class="btn btn-danger"><i class="fa fa-trash mr-1"></i>Hapus</a>
                                        <button type="button" class="btn btn-light" data-dismiss="modal"><i class="fa fa-times mr-1"></i>Tutup</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Akhir Modal Hapus-->
                    <?php }
                    echo $this->table->generate();
                    ?>
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
                    targets: 2
                },
                {
                    sWidth: '13%',
                    targets: 3
                }
            ],
            fixedColumns: false
        });
    });
</script>

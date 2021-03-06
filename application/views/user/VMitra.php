<body>
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container-fluid">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <i class="page-header-icon fas fa-handshake ml-2 fa-xs"></i>
                            Mitra
                        </h1>
                        Daftar Mitra
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container-fluid mt-n10">
        <div class="card mb-4">
            <div class="card-header">
                <?= $this->session->flashdata('message'); ?>
                <a href="<?= base_url('User/tambahMitra/'); ?>" class='btn btn-primary btn-sm' type='submit'><i class="fa fa-plus mr-1"></i>Tambah Mitra</a>
            </div>
            <div class="card-body">
                <div class="datatable">
                    <?php
                    $template = array('table_open' => '<table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">');
                    $this->table->set_template($template);
                    $this->table->set_heading('No', 'Status', 'Nomor KTP', 'Nama Lengkap', 'Email', 'Kategori', 'Waktu', 'Aksi');
                    // print_r($paket);
                    $no = 1;
                    $kategori;
                    foreach ($user as $row) {

                        if ($row->STATUS == 1) {
                            $verfikasi = '<button title="Cabut Verifikasi User" type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#cabutVerifikasiUserModal' . $row->IDUSERREGISTER . '"><i class="fa fa-times-circle"></i>
                        </button>';
                            $status = '<span class="badge badge-pill badge-success">Verified</span>';
                        } else {
                            $verfikasi = '<button title="Verifikasi User" type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#verifikasiUserModal' . $row->IDUSERREGISTER . '"><i class="fa fa-check"></i>
                        </button>';
                            $status = '<span class="badge badge-pill badge-danger">Unverified</span>';
                        }
                        //untuk kategori user
                        
                        if ($row->KATEGORI == 1) {
                            $kategori = "Agen";
                        } else if ($row->KATEGORI == 2) {
                            $kategori = "Mitra";
                        }
                        $this->table->add_row(
                            $no++,
                            $status,
                            $row->NOMORKTP,
                            $row->NAMALENGKAP,
                            $row->EMAIL,
                            $kategori,
                            $row->CREATED_AT,
                            $verfikasi . '
                        <button title="Detail Mitra" type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#detailUser' . $row->IDUSERREGISTER . '"><i class="fa fa-ellipsis-h"></i>
                        </button><br>
                        <a title="Chat Mitra" href="' .  base_url("Chat/detailChat/" . $row->ID_CHAT_ROOM) . '" type="button" class="btn btn-primary mt-1 btn-sm"><i class="fa fa-envelope"></i>
                        </a>
                        <a title="Edit Mitra" href="' .  base_url("User/editMitra/" . $row->IDUSERREGISTER) . '" type="button" class="btn btn-warning mt-1 btn-sm"><i class="fa fa-edit"></i>
                        </a>
                        <button title="Hapus User" type="button" class="btn btn-danger mt-1 btn-sm" data-toggle="modal" data-target="#hapusUserModal' . $row->IDUSERREGISTER . '"><i class="fa fa-trash"></i>
                        </button>
                        '
                        );
                    ?>
                        <!-- Modal Detail -->
                        <div class="modal fade" id="detailUser<?= $row->IDUSERREGISTER ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Detail Mitra </h5>
                                        <?php if ($row->STATUS == 1) {
                                        ?>
                                            <span class="badge badge-pill badge-success mt-1 ml-1">Terverfikasi</span>
                                        <?php
                                        } else {
                                        ?>
                                            <span class="badge badge-pill badge-danger mt-1 ml-1">Belum Terverifikasi</span>
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
                                                    <h6 for="nomorKTP">Nomor KTP</h6>
                                                    <p><?= $row->NOMORKTP; ?></p>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <h6 for="namaLengkap">Nama Lengkap</h6>
                                                    <p><?= $row->NAMALENGKAP; ?></p>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <h6 for="email">Email</h6>
                                                    <p><?= $row->EMAIL; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <h6 for="kategori">Kategori</h6>
                                                    <p>
                                                        <?php
                                                        if ($row->KATEGORI == 1) {
                                                            echo "Jamaah";
                                                        } else if ($row->KATEGORI == 2) {
                                                            echo "Agen";
                                                        } else if ($row->KATEGORI == 3) {
                                                            echo "Mitra";
                                                        } else if ($row->KATEGORI == 4) {
                                                            echo "Jamaah 4";
                                                        }
                                                        ?></p>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <h6 for="kodeReferral">Referral</h6>
                                                    <p><?= $row->KODEREFERRAL ?></p>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <h6 for="kodeReferralFrom">Referral dari</h6>
                                                    <p><?= $row->KODEREFERRALFROM ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <h6 for="namaLengkap">Jumlah Poin</h6>
                                                    <p><?= $row->POIN; ?></p>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <h6>File KTP</h6>
                                                    <img src="<?= $row->FILEKTP; ?>" width="200px">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <h6>File Foto</h6>
                                                    <img src="<?= $row->FOTO; ?>" width="200px">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <?php if ($row->STATUS == 1) {
                                        ?>
                                            <a href="<?= base_url('User/aksiCabutVerifikasiUser/' . $row->IDUSERREGISTER) ?>" type="button" class="btn btn-danger"><i class="fa fa-check mr-1"></i>Unverified</a>
                                        <?php
                                        } else {
                                        ?>
                                            <a href="<?= base_url('User/aksiVerifikasiUser/' . $row->IDUSERREGISTER) ?>" type="button" class="btn btn-success"><i class="fa fa-check mr-1"></i>Verifikasi</a>
                                        <?php
                                        }
                                        ?>
                                        <a href="<?= base_url('User/editUser/' . $row->IDUSERREGISTER) ?> " type="button" class="btn btn-warning"><i class="fa fa-edit mr-1"></i> Edit</a>
                                        <button type="button" class="btn btn-light" data-dismiss="modal"><i class="fa fa-times mr-1"></i> Tutup</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal Hapus -->
                        <div class="modal fade" id="hapusUserModal<?= $row->IDUSERREGISTER; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Hapus User</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <h5>Apakah anda yakin akan menghapus <b> <?= $row->NAMALENGKAP ?> </b> dengan Nomor KTP <b> <?= $row->NOMORKTP; ?> ? </b></h5>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="<?= base_url('User/aksiHapusUser/' . $row->IDUSERREGISTER) ?>" type="button" class="btn btn-danger"><i class="fa fa-trash mr-1"></i>Hapus</a>
                                        <button type="button" class="btn btn-light" data-dismiss="modal"><i class="fa fa-times mr-1"></i>Tutup</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal Verifikasi -->
                        <div class="modal fade" id="verifikasiUserModal<?= $row->IDUSERREGISTER; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Verifikasi User</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <h5>Apakah anda yakin menverifikasi <b> <?= $row->NAMALENGKAP ?> </b> dengan Nomor KTP <b> <?= $row->NOMORKTP; ?> ? </b></h5>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="<?= base_url('User/aksiVerifikasiUser/' . $row->IDUSERREGISTER) ?>" type="button" class="btn btn-success"><i class="fa fa-check mr-1"></i>Verifikasi</a>
                                        <button type="button" class="btn btn-light" data-dismiss="modal"><i class="fa fa-times mr-1"></i>Tutup</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal Cabut Verifikasi -->
                        <div class="modal fade" id="cabutVerifikasiUserModal<?= $row->IDUSERREGISTER; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Cabut Verifikasi User</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <h5>Apakah anda yakin mencabut verifikasi <b> <?= $row->NAMALENGKAP ?> </b> dengan Nomor KTP <b> <?= $row->NOMORKTP; ?> ? </b></h5>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="<?= base_url('User/aksiCabutVerifikasiUser/' . $row->IDUSERREGISTER) ?>" type="button" class="btn btn-danger"><i class="fa fa-check mr-1"></i>Unverified</a>
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
                    sWidth: '5%',
                    targets: 1
                }, {
                    sWidth: '12%',
                    targets: 4
                }, {
                    sWidth: '8%',
                    targets: 5
                }, {
                    sWidth: '10%',
                    targets: 6
                },
                {
                    sWidth: '10%',
                    targets: 7
                }
            ],
            fixedColumns: false
        });
    });
</script>
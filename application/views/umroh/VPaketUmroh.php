<body>
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container-fluid">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i class="fas fa-mosque ml-2 fa-xs"></i></div>
                            Paket Umroh&nbsp;<?= $tipe; ?>
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
                <a href="<?= base_url('Umroh/tambahPaket/' . $tipe); ?>" class='btn btn-primary btn-sm' type='submit'><i class="fa fa-plus mr-1"></i>Tambah Paket</a>
            </div>
            <div class="card-body">
                <div class="datatable">
                    <?php
                    $template = array('table_open' => '<table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">');
                    $this->table->set_template($template);
                    $this->table->set_heading('No', 'Status', 'Nama Paket', 'Maskapai', 'Durasi Paket', 'Kuota', 'Waktu', 'Aksi');
                    $no = 1;
                    foreach ($paket as $row) {
                        if ($row->ISSHOW == 1) {
                            $verfikasi = '<button title="Non-Aktifkan Paket" type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#nonAktifPaketModal' . $row->IDPAKET . '"><i class="fa fa-times-circle"></i>
                        </button>';
                            $status = '<span class="badge badge-pill badge-success">Aktif</span>';
                        } else {
                            $verfikasi = '<button title="Aktifkan Paket" type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#aktifPaketModal' . $row->IDPAKET . '"><i class="fa fa-check"></i>
                        </button>';
                            $status = '<span class="badge badge-pill badge-danger">Non-Aktif</span>';
                        }
                        $this->table->add_row(
                            $no++,
                            $status,
                            $row->NAMAPAKET,
                            $row->NAMAMASKAPAI,
                            $row->DURASIPAKET . ' Hari',
                            $row->KUOTA . ' Orang',
                            $row->CREATED_AT,
                            $verfikasi .
                                '<button title="Detail Paket" type="button" class="btn btn-primary ml-1 btn-sm" data-toggle="modal" data-target="#detailPaketModal' . $row->IDPAKET . '"><i class="fa fa-ellipsis-h"></i>
                        </button><br>
                        <a title="Edit Paket" href="' .  base_url("Umroh/editPaket/" . $row->IDPAKET) . '" type="button" class="btn btn-warning mt-1 btn-sm"><i class="fa fa-edit"></i>
                        </a>
                        <button title="Hapus Paket" type="button" class="btn btn-danger mt-1 btn-sm" data-toggle="modal" data-target="#hapusPaketModal' . $row->IDPAKET . '"><i class="fa fa-trash"></i>
                        </button>'
                        );
                    ?>
                        <!-- Modal Detail -->
                        <div class="modal fade" id="detailPaketModal<?= $row->IDPAKET ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Detail Paket Umroh&nbsp;<?= $row->NAMAPAKET; ?> </h5>
                                        <?php if ($row->ISSHOW == 1) {
                                        ?>
                                            <span class="badge badge-pill badge-success mt-1 ml-1">Aktif</span>
                                        <?php
                                        } else {
                                        ?>
                                            <span class="badge badge-pill badge-danger mt-1 ml-1">Non-Aktif</span>
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
                                                    <h6 for="namaPaket">Nama Paket Umroh <?= $tipe; ?></h6>
                                                    <p><?= $row->NAMAPAKET; ?></p>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <h6 for="kuota">Kuota</h6>
                                                    <p class="font-weight-bold"><?= $row->KUOTA; ?> Orang</p>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <h6 for="maskapai">Maskapai</h6>
                                                    <p><?= $row->NAMAMASKAPAI; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <h6 for="durasiPaket">Durasi Paket</h6>
                                                    <p><?= $row->DURASIPAKET; ?> Hari</p>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <h6 for="tanggalKeberangkatan">Tanggal Keberangkatan</h6>
                                                    <p><?= $row->TANGGALKEBERANGKATAN; ?></p>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <h6 for="penerbangan">Penerbangan</h6>
                                                    <p><?= $row->PENERBANGAN; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <h6 for="ratingHotel">Rating Hotel</h6>
                                                    <p><?= $row->RATINGHOTEL; ?></p>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <h6 for="namaHotelPertama">Nama Hotel Pertama</h6>
                                                    <p><?= $row->NAMAHOTELA; ?></p>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <h6 for="namaHotelKedua">Nama Hotel Kedua</h6>
                                                    <p><?= $row->NAMAHOTELB; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col"></div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <h6  for="alamatHotelPertama">Alamat Hotel Pertama</h6>
                                                    <p><?= $row->TEMPATHOTELA; ?></p>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <h6 for="alamatHotelKedua">Alamat Hotel Kedua</h6>
                                                    <p><?= $row->TEMPATHOTELB; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <h6 for="doubleSheet">Harga Double Sheet</h6>
                                                    <p>Rp. <?= $row->DOUBLESHEET; ?></p>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <h6 for="tripleSheet">Harga Triple Sheet</h6>
                                                    <p>Rp. <?= $row->TRIPLESHEET; ?></p>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <h6 for="quadSheet">Harga Quad Sheet</h6>
                                                    <p>Rp. <?= $row->QUADSHEET; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <h6 for="biayaSudahTermasuk">Biaya Sudah Termasuk</h6>
                                            <p><?= $row->BIAYASUDAHTERMASUK; ?></p>
                                        </div>
                                        <div class="form-group">
                                            <h6 for="biayaBelumTermasuk">Biaya Belum Termasuk</h6>
                                            <p><?= $row->BIAYABELUMTERMASUK; ?></p>
                                        </div>
                                        <h6>Gambar Paket</h6>
                                        <div class="form-group">
                                            <img src="<?= $row->IMAGEPAKET; ?>" width="200px">
                                        </div>
                                        <hr>
                                    </div>
                                    <div class="modal-footer">
                                        <?php if ($row->ISSHOW == 1) {
                                        ?>
                                            <a href="<?= base_url('Umroh/aksiNonAktifPaket/' . $row->IDPAKET) ?>" type="button" class="btn btn-danger"><i class="fa fa-check mr-1"></i>Non-Aktifkan</a>
                                        <?php
                                        } else {
                                        ?>
                                            <a href="<?= base_url('Umroh/aksiAktifPaket/' . $row->IDPAKET) ?>" type="button" class="btn btn-success"><i class="fa fa-check mr-1"></i>Aktifkan</a>
                                        <?php
                                        }
                                        ?>
                                        <a href="<?= base_url('Umroh/editPaket/' . $row->IDPAKET) ?> " type="button" class="btn btn-warning"><i class="fa fa-edit mr-1"></i> Edit</a>
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
                                        <h5 class="modal-title" id="exampleModalLabel">Hapus Paket Umroh&nbsp;<?= $tipe ?></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <h5>Apakah anda yakin akan menghapus <b> <?= $row->NAMAPAKET ?> ? </b></h5>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="<?= base_url('Umroh/aksiHapusPaket/' . $row->IDPAKET) ?>" type="button" class="btn btn-danger"><i class="fa fa-trash mr-1"></i>Hapus</a>
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
                                        <h5 class="modal-title" id="exampleModalLabel">Aktifkan Paket Umroh <?= $tipe ?></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <h5>Apakah anda yakin akan mengaktifkan <b> <?= $row->NAMAPAKET ?> ?</b></h5>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="<?= base_url('Umroh/aksiAktifPaket/' . $row->IDPAKET) ?>" type="button" class="btn btn-success"><i class="fa fa-check mr-1"></i>Aktifkan</a>
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
                                        <h5 class="modal-title" id="exampleModalLabel">Cabut Verifikasi Paket Umroh <?= $tipe ?></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <h5>Apakah anda yakin akan menonaktifkan <b> <?= $row->NAMAPAKET ?> ?</b></h5>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="<?= base_url('Umroh/aksiNonAktifPaket/' . $row->IDPAKET) ?>" type="button" class="btn btn-danger"><i class="fa fa-check mr-1"></i>Non-Aktifkan</a>
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
                    sWidth: '10%',
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
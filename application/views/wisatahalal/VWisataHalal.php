<body>
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container-fluid">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                        <div class="page-header-icon"><i class="fas fa-route ml-2 fa-xs"></i></div>
                        <?= $title; ?>
                        </h1>
                        Daftar Wisata Halal
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container-fluid mt-n10">
        <div class="card mb-4">
            <div class="card-header">
                <?= $this->session->flashdata('message'); ?>
                <a href="<?= base_url('WisataHalal/tambah/'.$tipe); ?>" class='btn btn-primary btn-sm' type='submit'><i class="fa fa-plus mr-1"></i>Tambah Wisata Halal</a>
            </div>
            <div class="card-body">
                <div class="datatable">
                    <?php
                    $template = array('table_open' => '<table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">');
                        $this->table->set_template($template);
                        $this->table->set_heading('No', 'Status', 'Nama Wisata', 'Maskapai', 'Durasi Wisata', 'Kuota', 'Waktu', 'Aksi');
                        $no = 1;
                        foreach ($wisata as $row) {
                        if($row->ISSHOW == 1){
                        $verfikasi = '<button title="Non-Aktifkan Paket" type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#nonAktifPaketModal'.$row->IDWISATAHALAL.'"><i class="fa fa-times-circle"></i>
                        </button>'; 
                        $status = '<span class="badge badge-pill badge-success">Aktif</span>';
                        }else{
                        $verfikasi = '<button title="Aktifkan Paket" type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#aktifPaketModal'.$row->IDWISATAHALAL.'"><i class="fa fa-check"></i>
                        </button>';
                        $status = '<span class="badge badge-pill badge-danger">Non-Aktif</span>';
                        }
                        $this->table->add_row(
                        $no++,
                        $status,
                        $row->NAMAWISATA,
                        $row->NAMAMASKAPAI,
                        $row->DURASIWISATA .' hari',
                        $row->KUOTA .' orang',
                        $row->CREATED_AT,
                        $verfikasi.
                        '<button title="Detail Paket" type="button" class="btn btn-primary ml-1 btn-sm" data-toggle="modal" data-target="#detailPaketModal' . $row->IDWISATAHALAL . '"><i class="fa fa-ellipsis-h"></i>
                        </button><br>
                        <a title="Edit Paket" href="'.  base_url("WisataHalal/edit/".$row->IDWISATAHALAL).'" type="button" class="btn btn-warning mt-1 btn-sm"><i class="fa fa-edit"></i>
                        </a>
                        <button title="Hapus Paket" type="button" class="btn btn-danger mt-1 btn-sm" data-toggle="modal" data-target="#hapusPaketModal'.$row->IDWISATAHALAL.'"><i class="fa fa-trash"></i>
                        </button>'
                        );
                        ?>
                        <!-- Modal Detail -->
                        <div class="modal fade" id="detailPaketModal<?= $row->IDWISATAHALAL?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Detail <?= $row->NAMAWISATA; ?> </h5>
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
                                                    <label for="namaPaket">Nama Wisata Halal <?= $tipe; ?></label>
                                                    <h5><?= $row->NAMAWISATA; ?></h5>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="kuota">Kuota</label>
                                                    <h5><?= $row->KUOTA; ?> orang</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="maskapai">Maskapai</label>
                                            <h5><?= $row->NAMAMASKAPAI; ?></h5>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="durasiWisata">Durasi Wisata</label>
                                                    <h5><?= $row->DURASIWISATA; ?> hari</h5>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="tanggalKeberangkatan">Tanggal Keberangkatan</label>
                                                    <h5><?= $row->TANGGALKEBERANGKATAN; ?></h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="penerbangan">Penerbangan</label>
                                                    <h5><?= $row->PENERBANGAN; ?></h5>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="ratingHotel">Rating Hotel</label>
                                                    <h5><?= $row->RATINGHOTEL; ?></h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="namaHotelPertama">Nama Hotel Pertama</label>
                                                    <h5><?= $row->NAMAHOTELA; ?></h5>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="namaHotelKedua">Nama Hotel Kedua</label>
                                                    <h5><?= $row->NAMAHOTELB; ?></h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="alamatHotelPertama">Alamat Hotel Pertama</label>
                                                    <h5><?= $row->TEMPATHOTELA; ?></h5>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="alamatHotelKedua">Alamat Hotel Kedua</label>
                                                    <h5><?= $row->TEMPATHOTELB; ?></h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="doubleSheet">Harga Double Sheet</label>
                                                    <h5>Rp. <?= $row->DOUBLESHEET; ?></h5>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="tripleSheet">Harga Triple Sheet</label>
                                                    <h5>Rp. <?= $row->TRIPLESHEET; ?></h5>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="quadSheet">Harga Quad Sheet</label>
                                                    <h5>Rp. <?= $row->QUADSHEET; ?></h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="biayaSudahTermasuk">Biaya Sudah Termasuk</label>
                                            <h5><?= $row->BIAYASUDAHTERMASUK; ?></h5>
                                        </div>
                                        <div class="form-group">
                                            <label for="biayaBelumTermasuk">Biaya Belum Termasuk</label>
                                            <h5><?= $row->BIAYABELUMTERMASUK; ?></h5>
                                        </div>
                                        <h5>Gambar Paket</h5>
                                        <div class="form-group">
                                            <img src="<?= $row->IMAGEWISATA;?>" width="200px">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <?php if($row->ISSHOW == 1){
                                            ?>
                                            <a href="<?= base_url('WisataHalal/aksiNonAktifPaket/'.$row->IDWISATAHALAL) ?>" type="button" class="btn btn-danger"><i class="fa fa-check mr-1"></i>Non-Aktifkan</a>
                                        <?php
                                        }else{
                                        ?>                                  
                                            <a href="<?= base_url('WisataHalal/aksiAktifPaket/'.$row->IDWISATAHALAL) ?>" type="button" class="btn btn-success"><i class="fa fa-check mr-1"></i>Aktifkan</a>
                                        <?php
                                        }
                                        ?>
                                        <a href="<?= base_url('WisataHalal/edit/'.$row->IDWISATAHALAL) ?> " type="button" class="btn btn-warning"><i class="fa fa-edit mr-1"></i> Edit</a>
                                        <button type="button" class="btn btn-light" data-dismiss="modal"><i class="fa fa-times mr-1"></i> Tutup</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal Hapus -->
                        <div class="modal fade" id="hapusPaketModal<?= $row->IDWISATAHALAL; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Hapus <?= $title ?></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <h5>Apakah anda yakin akan menghapus <b> <?= $row->NAMAWISATA ?> ? </b></h5>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="<?= base_url('WisataHalal/aksiHapusPaket/'.$row->IDWISATAHALAL) ?>" type="button" class="btn btn-danger"><i class="fa fa-trash mr-1"></i>Hapus</a>
                                        <button type="button" class="btn btn-light" data-dismiss="modal"><i class="fa fa-times mr-1"></i>Tutup</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal Aktif -->
                        <div class="modal fade" id="aktifPaketModal<?= $row->IDWISATAHALAL; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Aktifkan <?= $title ?></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <h5>Apakah anda yakin akan mengaktifkan <b> <?= $row->NAMAWISATA ?> ?</b></h5>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="<?= base_url('WisataHalal/aksiAktifPaket/'.$row->IDWISATAHALAL) ?>" type="button" class="btn btn-success"><i class="fa fa-check mr-1"></i>Aktifkan</a>
                                        <button type="button" class="btn btn-light" data-dismiss="modal"><i class="fa fa-times mr-1"></i>Tutup</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal Non-Aktif -->
                        <div class="modal fade" id="nonAktifPaketModal<?= $row->IDWISATAHALAL; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Non-Aktifkan <?= $title ?></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <h5>Apakah anda yakin akan menonaktifkan <b> <?= $row->NAMAWISATA ?> ?</b></h5>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="<?= base_url('WisataHalal/aksiNonAktifPaket/'.$row->IDWISATAHALAL) ?>" type="button" class="btn btn-danger"><i class="fa fa-check mr-1"></i>Non-Aktifkan</a>
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
            columnDefs: [
                {
                    sWidth: '5%',
                    targets: 0
                },
                {
                    sWidth: '5%',
                    targets: 1
                },{
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
            fixedColumns: false,
        });
    });
</script>
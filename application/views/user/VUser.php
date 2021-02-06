<body>
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                        <div class="page-header-icon"><i data-feather="activity"></i></div>
                        <?= $title; ?>
                        </h1>
                        Daftar User
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container mt-n10">
        <div class="card mb-4">
            <div class="card-header">
                <?= $this->session->flashdata('message'); ?>
                <a href="<?= base_url('User/tambahUser/'); ?>" class='btn btn-primary btn-sm' type='submit'><i class="fa fa-plus mr-1"></i>Tambah User</a>
            </div>
            <div class="card-body">
                <div class="datatable">
                    <?php
                    $template = array('table_open' => '<table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">');
                        $this->table->set_template($template);
                        $this->table->set_heading('No', 'Nomor KTP', 'Nama Lengkap', 'Email', 'Kategori', 'Aksi');
                        // print_r($paket);
                        $no = 1;
                        $kategori;
                        foreach ($user as $row) {

                        if($row->STATUS == 1){
                        $verfikasi = '<button title="Verifikasi User" type="button" class="btn btn-primary" data-toggle="modal" data-target="#verifikasiUserModal'.$row->NOMORKTP.'"><i class="fa fa-check"></i>
                        </button>';
                        }else{
                        $verfikasi = '<button title="Cabut Verifikasi User" type="button" class="btn btn-danger" data-toggle="modal" data-target="#cabutVerifikasiUserModal'.$row->NOMORKTP.'"><i class="fa fa-times-circle"></i>
                        </button>';
                        }
                        //untuk kategori user
                        if($row->KATEGORI == 1){
                            $kategori = "Jamaah";
                        }else if($row->KATEGORI == 2){
                            $kategori = "Mitra";
                        }else if($row->KATEGORI == 3) {
                            $kategori = "Agen";
                        }else if($row->KATEGORI == 4){
                            $kategori = "Jamaah 4";
                        }
                        $this->table->add_row(
                        $no++,
                        $row->NOMORKTP,
                        $row->NAMALENGKAP,
                        $row->EMAIL,
                        $kategori,
                        $verfikasi.'
                        <button title="Detail User" type="button" class="btn btn-primary" data-toggle="modal" data-target="#detailUser'.$row->NOMORKTP.'"><i class="fa fa-ellipsis-h"></i>
                        </button><br>
                        <a title="Edit User" href="'.  base_url("User/editUser/".$row->NOMORKTP).'" type="button" class="btn btn-warning mt-1"><i class="fa fa-edit"></i>
                        </a>
                        <button title="Hapus User" type="button" class="btn btn-danger mt-1" data-toggle="modal" data-target="#hapusUserModal'.$row->NOMORKTP.'"><i class="fa fa-trash"></i>
                        </button>'
                        );
                        ?>
                        <!-- Modal Detail -->
                        <div class="modal fade" id="detailUser<?= $row->NOMORKTP?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Detail <?= $title; ?> </h5>
                                        <?php if($row->STATUS == 1){
                                        ?>
                                        <span class="badge badge-pill badge-success ml-1">Terverfikasi</span>
                                        <?php
                                        }else{
                                        ?>
                                        <span class="badge badge-pill badge-danger ml-1">Belum Terverifikasi</span>
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
                                                <label for="nomorKTP">Nomor KTP</label>
                                                <h5><?= $row->NOMORKTP; ?></h5>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="namaLengkap">Nama Lengkap</label>
                                                <h5><?= $row->NAMALENGKAP; ?></h5>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <h5><?= $row->EMAIL; ?></h5>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="kategori">Kategori User</label>
                                                <H5>
                                                <?php 
                                                if($row->KATEGORI == 1){
                                                    echo "Jamaah";
                                                }else if($row->KATEGORI == 2){
                                                    echo "Agen"; 
                                                }else if($row->KATEGORI == 3){
                                                    echo "Mitra"; 
                                                }else if($row->KATEGORI == 4){
                                                    echo "Jamaah 4"; 
                                                }
                                                ?></H5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="kodeReferral">Referral</label>
                                                <h5><?= $row->KODEREFERRAL ?></h5>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="kodeReferralFrom">Referral dari</label>
                                                <h5><?= $row->KODEREFERRALFROM ?></h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="namaLengkap">Jumlah Poin</label>
                                        <h5><?= $row->POIN; ?></h5>
                                    </div>
                                    <div class="form-group">
                                        <h5>File KTP</h5>
                                        <img src="<?= $row->FILEKTP;?>" width="200px">
                                    </div>
                                    <div class="form-group">
                                        <h5>File Foto</h5>
                                        <img src="<?= $row->FOTO;?>" width="200px">
                                    </div>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="<?= base_url('User/editUser/'.$row->NOMORKTP) ?> " type="button" class="btn btn-warning"><i class="fa fa-edit mr-1"></i> Edit</a>
                                        <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times mr-1"></i> Tutup</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal Hapus -->
                        <div class="modal fade" id="hapusUserModal<?= $row->NOMORKTP; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Hapus <?= $title ?></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <h5>Apakah anda yakin akan menghapus <b> <?= $row->NAMALENGKAP ?> </b> dengan Nomor KTP <b> <?= $row->NOMORKTP; ?> ? </b></h5>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="<?= base_url('User/aksiHapusUser/'.$row->NOMORKTP) ?>" type="button" class="btn btn-danger"><i class="fa fa-trash mr-1"></i>Hapus</a>
                                        <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times mr-1"></i>Tutup</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal Verifikasi -->
                        <div class="modal fade" id="verifikasiUserModal<?= $row->NOMORKTP; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Verifikasi <?= $title ?></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <h5>Apakah anda yakin menverifikasi <b> <?= $row->NAMALENGKAP ?> </b> dengan Nomor KTP <b> <?= $row->NOMORKTP; ?> ? </b></h5>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="<?= base_url('User/aksiVerifikasiUser/'.$row->NOMORKTP) ?>" type="button" class="btn btn-success"><i class="fa fa-check mr-1"></i>Verifikasi</a>
                                        <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times mr-1"></i>Tutup</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal Cabut Verifikasi -->
                        <div class="modal fade" id="cabutVerifikasiUserModal<?= $row->NOMORKTP; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Cabut Verifikasi <?= $title ?></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <h5>Apakah anda yakin mencabut verifikasi <b> <?= $row->NAMALENGKAP ?> </b> dengan Nomor KTP <b> <?= $row->NOMORKTP; ?> ? </b></h5>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="<?= base_url('User/aksiCabutVerifikasiUser/'.$row->NOMORKTP) ?>" type="button" class="btn btn-danger"><i class="fa fa-check mr-1"></i>Unverified</a>
                                        <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times mr-1"></i>Tutup</button>
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
<body>
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container-fluid">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                        <div class="page-header-icon"><i class="fas fa-user-check ml-2 fa-xs"></i></div>
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
                                    <button title="Detail Jamaah" type="button" class="btn btn-primary mt-1 btn-sm" data-toggle="modal" data-target="#detailJamaah<?= $data->KODEPENDAFTARAN ?>"><i class="fa fa-ellipsis-h"></i>
                                    </button>
                                    <button title="Hapus Jamaah" type="button" class="btn btn-danger mt-1 btn-sm" data-toggle="modal" data-target=""><i class="fa fa-trash"></i>
                                    </button>
                                </td>

                                <!-- Modal Detail -->
                                <div class="modal fade" id="detailJamaah<?= $data->KODEPENDAFTARAN ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Detail <?= $title; ?> </h5>
                                                <?php if ($data->STATUSPENDAFTARAN == 1) {
                                                ?>
                                                    <span class="badge badge-pill badge-success ml-1">Terverfikasi</span>
                                                <?php
                                                } else {
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
                                                            <h5>Nama Lengkap</h5>
                                                            <?= $data->NAMALENGKAP; ?>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <h5>Email</h5>
                                                            <?= $data->EMAIL; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <h5>Alamat</h5>
                                                    <?= $data->ALAMAT; ?>, Kel <?= $data->KELURAHAN; ?>, Kec <?= $data->KECAMATAN; ?>, <?= $data->KOTAKABUPATEN; ?>, <?= $data->PROVINSI; ?>, Kode POS: <?= $data->KODEPOS; ?>
                                                </div>
                                                <div class="form-group">
                                                    <h5>Nomor HP</h5>
                                                    <?= $data->NOMORHP; ?>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <h5>Pekerjaan</h5>
                                                            <?= $data->PEKERJAAN; ?>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <h5>Riwayat Penyakit</h5>
                                                            <?= $data->RIWAYATPENYAKIT; ?>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <h5>File KTP</h5>
                                                            <img src="<?= $data->FILEKTP; ?>" width="200px">
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <h5>File KK</h5>
                                                            <img src="<?= $data->FILEKK; ?>" width="200px">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <h5>Nomor Paspor</h5>
                                                            <?= $data->NOMORPASPOR; ?>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <h5>Tempat Dikeluarkan</h5>
                                                            <?= $data->TEMPATDIKELUARKAN; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <h5>Tanggal Penerbitan Paspor</h5>
                                                            <?= date("d-m-Y", strtotime($data->TANGGALPENERBITANPASPOR)) ?>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <h5>Tanggal Berakhir Paspor</h5>
                                                            <?= date("d-m-Y", strtotime($data->TANGGALBERAKHIRPASPOR)) ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <h5>File Paspor</h5>
                                                    <img src="<?= $data->FILEPASPOR; ?>" width="200px">
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <h5>Tempat Tanggal Lahir</h5>
                                                            <?= $data->TEMPATLAHIR ?>, <?= date("d-m-Y", strtotime($data->TANGGALLAHIR)) ?>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <h5>Jenis Kelamin</h5>
                                                            <?php if($data->JENISKELAMIN == 1){ 
                                                                echo 'Laki-Laki'; 
                                                            }else if($data->JENISKELAMIN==0){ 
                                                                echo 'Perempuan';
                                                            } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <h5>Status Perkawinan</h5>
                                                            <?= $data->STATUSPERKAWINAN ?>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <h5>Kewarganegaraan</h5>
                                                            <?= $data->KEWARGANEGARAAN ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <h5>File Buku Nikah</h5>
                                                            <?php if($data->STATUSPERKAWINAN == 'Menikah') {?>
                                                                <img src="<?= $data->FILEBUKUNIKAH; ?>" width="200px">
                                                            <?php }else{ ?>
                                                                -
                                                            <?php }?>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <h5>File Akte Kelahiran</h5>
                                                            <?php if($data->FILEAKTEKELAHIRAN != null) {?>
                                                                <img src="<?= $data->FILEBUKUNIKAH; ?>" width="200px">
                                                            <?php }else{ ?>
                                                                -
                                                            <?php }?>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <h5>TTD Pendaftar</h5>
                                                            <?php if($data->TTDPENDAFTAR != null) {?>
                                                                <img src="<?= $data->TTDPENDAFTAR; ?>" width="200px">
                                                            <?php }else{ ?>
                                                                -
                                                            <?php }?>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <h5>FC KTP Almarhum</h5>
                                                            <?php if($data->FCKTPALMARHUM != null) {?>
                                                                <img src="<?= $data->FCKTPALMARHUM; ?>" width="200px">
                                                            <?php }else{ ?>
                                                                -
                                                            <?php }?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <h5>FC KK Almarhum</h5>
                                                            <?php if($data->FCKTPALMARHUM != null) {?>
                                                                <img src="<?= $data->FCKKALMARHUM; ?>" width="200px">
                                                            <?php }else{ ?>
                                                                -
                                                            <?php }?>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <h5>FC Foto Almarhum</h5>
                                                            <?php if($data->FCFOTOALMARHUM != null) {?>
                                                                <img src="<?= $data->FCFOTOALMARHUM; ?>" width="200px">
                                                            <?php }else{ ?>
                                                                -
                                                            <?php }?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <?php if ($data->STATUSPENDAFTARAN == 1) {
                                                ?>
                                                    <a href="<?= base_url('Jamaah/aksiCabutVerifikasiPendaftaran/' . $data->KODEPENDAFTARAN) ?>" type="button" class="btn btn-danger"><i class="fa fa-check mr-1"></i>Unverified</a>
                                                <?php
                                                } else {
                                                ?>
                                                    <a href="<?= base_url('Jamaah/aksiVerifikasiPendaftaran/' . $data->KODEPENDAFTARAN) ?>" type="button" class="btn btn-success"><i class="fa fa-check mr-1"></i>Verifikasi</a>
                                                <?php
                                                }
                                                ?>
                                                <button type="button" class="btn btn-light" data-dismiss="modal"><i class="fa fa-times mr-1"></i> Tutup</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

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

                                <!-- Modal Verifikasi -->
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

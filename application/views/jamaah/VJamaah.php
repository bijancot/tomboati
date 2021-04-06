<body>
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container-fluid">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i class="fas fa-user-check ml-2 fa-xs"></i></div>
                            Jamaah
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
                                <th width="4%">No</th>
                                <th>Status Pendaftaran</th>
                                <th>Status Berangkat</th>
                                <th>Status Pembayaran</th>
                                <th>Nama</th>
                                <th>Nama Paket</th>
                                <th width=10%>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($jamaah as $data) { ?>
                                <?php
                                if ($data->STATUSPENDAFTARAN == 1) {
                                    $verfikasi = '<button title="Cabut Verifikasi Pendaftaran" type="button" class="btn btn-danger btn-sm mt-1" data-toggle="modal" data-target="#cabutVerifikasiPendaftaranModal' . $data->KODEPENDAFTARAN . '"><i class="fa fa-times-circle"></i>
                                    </button>';
                                    $status = '<span class="badge badge-pill badge-success">Terverfikasi</span>';
                                } else {
                                    $verfikasi = '<button title="Verifikasi Pendafataran" type="button" class="btn btn-primary btn-sm mt-1" data-toggle="modal" data-target="#verifikasiPendaftaranModal' . $data->KODEPENDAFTARAN . '"><i class="fa fa-check"></i>
                                    </button>';
                                    $status = '<span class="badge badge-pill badge-danger">Belum Terverifikasi</span>';
                                }

                                if ($data->ISJAMAAHBERANGKAT == 1) {
                                    $berangkat = '<span class="badge badge-pill badge-success">Berangkat</span>';
                                } else {
                                    $berangkat = '<span class="badge badge-pill badge-danger">Belum Berangkat</span>';
                                }

                                if ($data->STATUSTRANSAKSI == 1) {
                                    $pembayaran = '<span class="badge badge-pill badge-danger">Belum Bayar</span>';
                                } else {
                                    $pembayaran = '<span class="badge badge-pill badge-danger">Belum Bayar</span>';
                                }
                                ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $status ?></td>
                                    <td><?php echo $berangkat ?></td>
                                    <td><?php echo $pembayaran ?></td>
                                    <td><?php echo $data->NAMALENGKAP ?></td>
                                    <td><?php echo $data->NAMAPAKET ?></td>
                                    <td>
                                        <?php echo $verfikasi ?>
                                        <button title="Detail Jamaah" type="button" class="btn btn-primary mt-1 btn-sm" data-toggle="modal" data-target="#detailJamaah<?= $data->KODEPENDAFTARAN ?>"><i class="fa fa-ellipsis-h"></i>
                                        </button>
                                        <button title="Hapus Jamaah" type="button" class="btn btn-danger mt-1 btn-sm" data-toggle="modal" data-target=""><i class="fa fa-trash"></i>
                                        </button>
                                        <a title="Detail Pembayaran" type="button" href="<?php echo site_url('Pembayaran'); ?>" class="btn btn-primary mt-1 btn-sm" ><i class="fa fa-dollar-sign fa-fw"></i>
                                        </a>
                                    </td>

                                    <!-- Modal Detail -->
                                    <div class="modal fade" id="detailJamaah<?= $data->KODEPENDAFTARAN ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Detail Jamaah </h5>
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
                                                                <h6>Nama Lengkap</h6>
                                                                <p><?= $data->NAMALENGKAP; ?></p>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <h6>Email</h6>
                                                                <p><?= $data->EMAIL; ?></p>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <h6>Alamat</h6>
                                                                <p><?= $data->ALAMAT; ?>, Kel <?= $data->KELURAHAN; ?>, Kec <?= $data->KECAMATAN; ?>, <?= $data->KOTAKABUPATEN; ?>, <?= $data->PROVINSI; ?>, Kode POS: <?= $data->KODEPOS; ?></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <h6>Nomor HP</h6>
                                                                <p><?= $data->NOMORHP; ?></p>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <h6>Pekerjaan</h6>
                                                                <p><?= $data->PEKERJAAN; ?></p>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <h6>Riwayat Penyakit</h6>
                                                                <p><?= $data->RIWAYATPENYAKIT; ?></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <h6>File KTP</h6>
                                                                <p><img src="<?= $data->FILEKTP; ?>" width="200px"></p>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <h6>File KK</h6>
                                                                <img src="<?= $data->FILEKK; ?>" width="200px">
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <h6>File Paspor</h6>
                                                                <img src="<?= $data->FILEPASPOR; ?>" width="200px">

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <h6>Nomor Paspor</h6>
                                                                <p><?= $data->NOMORPASPOR; ?></p>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <h6>Tanggal Berakhir Paspor</h6>
                                                                <p><?= date("d-m-Y", strtotime($data->TANGGALBERAKHIRPASPOR)) ?></p>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <h6>Tempat Dikeluarkan</h6>
                                                                <p><?= $data->TEMPATDIKELUARKAN; ?></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <h6>Tanggal Penerbitan Paspor</h6>
                                                                <p><?= date("d-m-Y", strtotime($data->TANGGALPENERBITANPASPOR)) ?></p>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <h6>Tempat Tanggal Lahir</h6>
                                                                <p><?= $data->TEMPATLAHIR ?>, <?= date("d-m-Y", strtotime($data->TANGGALLAHIR)) ?></p>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <h6>Jenis Kelamin</h6>
                                                                <?php if ($data->JENISKELAMIN == 1) {
                                                                    echo 'Laki-Laki';
                                                                } else if ($data->JENISKELAMIN == 0) {
                                                                    echo 'Perempuan';
                                                                } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <h6>Status Perkawinan</h6>
                                                                <p><?= $data->STATUSPERKAWINAN ?></p>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <h6>Kewarganegaraan</h6>
                                                                <p><?= $data->KEWARGANEGARAAN ?></p>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <h6>File Buku Nikah</h6>
                                                                <?php if ($data->STATUSPERKAWINAN == 'Menikah') { ?>
                                                                    <img src="<?= $data->FILEBUKUNIKAH; ?>" width="200px">
                                                                <?php } else { ?>
                                                                    -
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <h6>File Akte Kelahiran</h6>
                                                                <?php if ($data->FILEAKTEKELAHIRAN != null) { ?>
                                                                    <img src="<?= $data->FILEBUKUNIKAH; ?>" width="200px">
                                                                <?php } else { ?>
                                                                    -
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <h6>TTD Pendaftar</h6>
                                                                <?php if ($data->TTDPENDAFTAR != null) { ?>
                                                                    <img src="<?= $data->TTDPENDAFTAR; ?>" width="200px">
                                                                <?php } else { ?>
                                                                    -
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <h6>FC KTP Almarhum</h6>
                                                                <?php if ($data->FCKTPALMARHUM != null) { ?>
                                                                    <img src="<?= $data->FCKTPALMARHUM; ?>" width="200px">
                                                                <?php } else { ?>
                                                                    -
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <h6>FC KK Almarhum</h6>
                                                                <?php if ($data->FCKTPALMARHUM != null) { ?>
                                                                    <img src="<?= $data->FCKKALMARHUM; ?>" width="200px">
                                                                <?php } else { ?>
                                                                    -
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <h6>FC Foto Almarhum</h6>
                                                                <?php if ($data->FCFOTOALMARHUM != null) { ?>
                                                                    <img src="<?= $data->FCFOTOALMARHUM; ?>" width="200px">
                                                                <?php } else { ?>
                                                                    -
                                                                <?php } ?>
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
                                                    <h5 class="modal-title" id="exampleModalLabel">Cabut Verifikasi Jamaah</h5>
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
                                                    <h5 class="modal-title" id="exampleModalLabel">Verifikasi Jamaah</h5>
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
                            <?php } ?>
                            <?php $no = 1;
                            foreach ($wisataHalal as $data) { ?>
                                <?php
                                if ($data->STATUSPENDAFTARAN == 1) {
                                    $verfikasi = '<button title="Cabut Verifikasi Pendaftaran" type="button" class="btn btn-danger btn-sm mt-1" data-toggle="modal" data-target="#cabutVerifikasiPendaftaranModal' . $data->KODEPENDAFTARAN . '"><i class="fa fa-times-circle"></i>
                                    </button>';
                                    $status = '<span class="badge badge-pill badge-success">Terverfikasi</span>';
                                } else {
                                    $verfikasi = '<button title="Verifikasi Pendafataran" type="button" class="btn btn-primary btn-sm mt-1" data-toggle="modal" data-target="#verifikasiPendaftaranModal' . $data->KODEPENDAFTARAN . '"><i class="fa fa-check"></i>
                                    </button>';
                                    $status = '<span class="badge badge-pill badge-danger">Belum Terverifikasi</span>';
                                }

                                if ($data->ISJAMAAHBERANGKAT == 1) {
                                    $berangkat = '<span class="badge badge-pill badge-success">Berangkat</span>';
                                } else {
                                    $berangkat = '<span class="badge badge-pill badge-danger">Belum Berangkat</span>';
                                }

                                if ($data->STATUSTRANSAKSI == 1) {
                                    $pembayaran = '<span class="badge badge-pill badge-danger">Belum Bayar</span>';
                                } else {
                                    $pembayaran = '<span class="badge badge-pill badge-danger">Belum Bayar</span>';
                                }
                                ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $status ?></td>
                                    <td><?php echo $berangkat ?></td>
                                    <td><?php echo $pembayaran ?></td>
                                    <td><?php echo $data->NAMALENGKAP ?></td>
                                    <td><?php echo $data->NAMAWISATA ?></td>
                                    <td>
                                        <?php echo $verfikasi ?>
                                        <button title="Detail Jamaah" type="button" class="btn btn-primary mt-1 btn-sm" data-toggle="modal" data-target="#detailJamaah<?= $data->KODEPENDAFTARAN ?>"><i class="fa fa-ellipsis-h"></i>
                                        </button>
                                        <button title="Hapus Jamaah" type="button" class="btn btn-danger mt-1 btn-sm" data-toggle="modal" data-target=""><i class="fa fa-trash"></i>
                                        </button>
                                        <a title="Detail Pembayaran" type="button" href="<?php echo site_url('Pembayaran'); ?>" class="btn btn-primary mt-1 btn-sm" ><i class="fa fa-dollar-sign fa-fw"></i>
                                        </a>
                                    </td>

                                    <!-- Modal Detail -->
                                    <div class="modal fade" id="detailJamaah<?= $data->KODEPENDAFTARAN ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Detail Jamaah </h5>
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
                                                                <h6>Nama Lengkap</h6>
                                                                <p><?= $data->NAMALENGKAP; ?></p>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <h6>Email</h6>
                                                                <p><?= $data->EMAIL; ?></p>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <h6>Alamat</h6>
                                                                <p><?= $data->ALAMAT; ?>, Kel <?= $data->KELURAHAN; ?>, Kec <?= $data->KECAMATAN; ?>, <?= $data->KOTAKABUPATEN; ?>, <?= $data->PROVINSI; ?>, Kode POS: <?= $data->KODEPOS; ?></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <h6>Nomor HP</h6>
                                                                <p><?= $data->NOMORHP; ?></p>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <h6>Pekerjaan</h6>
                                                                <p><?= $data->PEKERJAAN; ?></p>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <h6>Riwayat Penyakit</h6>
                                                                <p><?= $data->RIWAYATPENYAKIT; ?></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <h6>File KTP</h6>
                                                                <p><img src="<?= $data->FILEKTP; ?>" width="200px"></p>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <h6>File KK</h6>
                                                                <img src="<?= $data->FILEKK; ?>" width="200px">
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <h6>File Paspor</h6>
                                                                <img src="<?= $data->FILEPASPOR; ?>" width="200px">

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <h6>Nomor Paspor</h6>
                                                                <p><?= $data->NOMORPASPOR; ?></p>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <h6>Tanggal Berakhir Paspor</h6>
                                                                <p><?= date("d-m-Y", strtotime($data->TANGGALBERAKHIRPASPOR)) ?></p>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <h6>Tempat Dikeluarkan</h6>
                                                                <p><?= $data->TEMPATDIKELUARKAN; ?></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <h6>Tanggal Penerbitan Paspor</h6>
                                                                <p><?= date("d-m-Y", strtotime($data->TANGGALPENERBITANPASPOR)) ?></p>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <h6>Tempat Tanggal Lahir</h6>
                                                                <p><?= $data->TEMPATLAHIR ?>, <?= date("d-m-Y", strtotime($data->TANGGALLAHIR)) ?></p>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <h6>Jenis Kelamin</h6>
                                                                <?php if ($data->JENISKELAMIN == 1) {
                                                                    echo 'Laki-Laki';
                                                                } else if ($data->JENISKELAMIN == 0) {
                                                                    echo 'Perempuan';
                                                                } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <h6>Status Perkawinan</h6>
                                                                <p><?= $data->STATUSPERKAWINAN ?></p>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <h6>Kewarganegaraan</h6>
                                                                <p><?= $data->KEWARGANEGARAAN ?></p>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <h6>File Buku Nikah</h6>
                                                                <?php if ($data->STATUSPERKAWINAN == 'Menikah') { ?>
                                                                    <img src="<?= $data->FILEBUKUNIKAH; ?>" width="200px">
                                                                <?php } else { ?>
                                                                    -
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <h6>File Akte Kelahiran</h6>
                                                                <?php if ($data->FILEAKTEKELAHIRAN != null) { ?>
                                                                    <img src="<?= $data->FILEBUKUNIKAH; ?>" width="200px">
                                                                <?php } else { ?>
                                                                    -
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <h6>TTD Pendaftar</h6>
                                                                <?php if ($data->TTDPENDAFTAR != null) { ?>
                                                                    <img src="<?= $data->TTDPENDAFTAR; ?>" width="200px">
                                                                <?php } else { ?>
                                                                    -
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <h6>FC KTP Almarhum</h6>
                                                                <?php if ($data->FCKTPALMARHUM != null) { ?>
                                                                    <img src="<?= $data->FCKTPALMARHUM; ?>" width="200px">
                                                                <?php } else { ?>
                                                                    -
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <h6>FC KK Almarhum</h6>
                                                                <?php if ($data->FCKTPALMARHUM != null) { ?>
                                                                    <img src="<?= $data->FCKKALMARHUM; ?>" width="200px">
                                                                <?php } else { ?>
                                                                    -
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <h6>FC Foto Almarhum</h6>
                                                                <?php if ($data->FCFOTOALMARHUM != null) { ?>
                                                                    <img src="<?= $data->FCFOTOALMARHUM; ?>" width="200px">
                                                                <?php } else { ?>
                                                                    -
                                                                <?php } ?>
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
                                                    <h5 class="modal-title" id="exampleModalLabel">Cabut Verifikasi Jamaah</h5>
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
                                                    <h5 class="modal-title" id="exampleModalLabel">Cabut Verifikasi Jamaah</h5>
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
                            <?php } ?>
                        </tbody>
                    </table>
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
            fixedColumns: false
        });
    });
</script>
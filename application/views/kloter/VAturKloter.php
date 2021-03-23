<!DOCTYPE html>
<html lang="en">

<body>
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container-fluid">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <a href="<?= base_url(); ?>Kloter">
                                <button class="btn btn-yellow btn-icon mr-2 my-1" type="button"><i class="fas fa-arrow-left"></i></button>
                            </a>
                            <i class="page-header-icon fas fa-edit ml-2 fa-xs"></i>
                            Atur Kloter
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container-fluid mt-n10">
        <div class="row">
            <div class="col-lg-12">
                <!-- Default Bootstrap Form Controls-->
                <div id="default">
                    <div class="card mb-4">
                        <div class="card-header">Form Atur Kloter</div>
                        <div class="card-body">
                            <!-- Component Preview-->
                            <div class="sbp-preview">
                                <div class="sbp-preview-content">
                                    <?php foreach ($paket as $row) { ?>
                                        <?= form_open_multipart('kloter/aksiAturKloter/' . $row['IDMASTERPAKET']) ?>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="judulNews">Nama Paket</label>
                                                    <input class="form-control" name="namaPaket" id="namaPaket" type="text" value="<?= $row['NAMAPAKET']; ?>" disabled="disabled" />
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="deskripsiNews">Jumlah Jamaah</label>
                                                    <input class="form-control" name="jumlah" id="jumlah" type="text" value="<?= $row['jumlah']; ?> jamaah" disabled="disabled" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="tanggalKeberangkatan">Tanggal Keberangkatan</label>
                                                    <input class="form-control" name="tanggalKeberangkatan" id="tanggalKeberangkatan" type="text" value="<?= $row['TANGGALKEBERANGKATAN']; ?>" disabled="disabled" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="foto">Foto News</label>
                                                    <!-- wadah preview -->
                                                    <img id="foto-preview-edit" src="<?= $row['IMAGEPAKET']; ?>" alt="image preview" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <h4>Rombongan</h4>
                                                    <button name="tambah" id="tambah" type="button" class="mb-2 btn btn-success tambah"><i class="fa fa-plus"></i> Tambah Kloter</button>
                                                    <?php 
                                                    ?>
                                                    <div class="datatable">
                                                        <?php
                                                        $template = array('table_open' => '<table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">');
                                                        $this->table->set_template($template);
                                                        $this->table->set_heading('Kloter', 'Jumlah Orang', 'Aksi');

                                                        foreach($kloter as $row){
                                                            $this->table->add_row(
                                                                $row['KLOTER'],
                                                                $row['KLOTER'],
                                                                '<button title="Detail Kloter" type="button" class="btn btn-primary ml-1 btn-sm" data-toggle="modal" data-target="#detailKloterModal' . $row["KLOTER"] . '"><i class="fa fa-ellipsis-h"></i>
                                                                </button>
                                                                <button title="Edit Kloter" type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editKloterModal' . $row["KLOTER"] . '"><i class="fa fa-edit"></i>
                                                                </button>
                                                                <button title="Hapus Paket" type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapusKloterModal' . $row["KLOTER"] . '"><i class="fa fa-trash"></i>
                                                                </button>'
                                                            );
                                                            ?>
                                                            <!-- Modal Detail -->
                                                            <div class="modal fade" id="detailKloterModal<?= $row['KLOTER'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">Detail Kloter &nbsp;<?= $row['KLOTER'] ?></h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="row">
                                                                                <div class="col">
                                                                                    <div class="form-group">
                                                                                        <h6 for="">Nama Lengkap</h6>
                                                                                        <p><?= $row['NAMALENGKAP']; ?></p>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col">
                                                                                    <div class="form-group">
                                                                                        <h6 for="">Jenis Kelamin</h6>
                                                                                        <p>
                                                                                            <?php
                                                                                            if($row['JENISKELAMIN'] == 1){
                                                                                                echo "Laki-Laki";
                                                                                            }else{
                                                                                                echo "Perempuan";
                                                                                            }
                                                                                            ?>
                                                                                        </p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col">
                                                                                    <div class="form-group">
                                                                                        <h6 for="">Tempat, Tanggal Lahir</h6>
                                                                                        <p><?= $row['TEMPATLAHIR'].", " . $row['TANGGALLAHIR'] ?></p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col">
                                                                                    <div class="form-group">
                                                                                        <h6 for="">Alamat</h6>
                                                                                        <p><?= $row['ALAMAT']; ?></p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <a href="<?= base_url('Kloter/aksiHapusKloter/' . $row['KLOTER']) ?>" type="button" class="btn btn-danger"><i class="fa fa-trash mr-1"></i>Hapus</a>
                                                                            <button type="button" class="btn btn-light" data-dismiss="modal"><i class="fa fa-times mr-1"></i>Tutup</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- Modal Hapus -->
                                                            <div class="modal fade" id="hapusKloterModal<?= $row['KLOTER']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">Hapus Kloter &nbsp;<?= $row['KLOTER'] ?></h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <h5>Apakah anda yakin akan menghapus <b> Kloter <?= $row['KLOTER'] ?> ? </b></h5>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <a href="<?= base_url('Kloter/aksiHapusKloter/' . $row['KLOTER']) ?>" type="button" class="btn btn-danger"><i class="fa fa-trash mr-1"></i>Hapus</a>
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
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="ketuaRombongan">Ketua Rombongan</label>
                                                    <select class="ketua-select2 form-control" id="karomah" name="karomah">
                                                        <?php
                                                        foreach($jamaah as $key){ ?>
                                                            <option value="<?php echo $key['NAMALENGKAP']; ?>">
                                                                <?php echo $key['NAMALENGKAP']; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <div class="text-md-right">
                                            <button type="submit" class="btn btn-primary "> Selesai </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script>
        $(document).ready(function() {
            $('.ketua-select2').select2();
        });
    </script>
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

    </html>

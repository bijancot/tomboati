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
                            Manajemen Kloter
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
                        <div class="card-header">Detail Paket dan Kloter</div>
                        <div class="card-body">
                            <!-- Component Preview-->
                            <?= $this->session->flashdata('message'); ?>
                            <div class="sbp-preview">
                                <div class="sbp-preview-content">
                                    <?php foreach ($paket as $row) { ?>
                                        <h4>Paket</h4>
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
                                                    <h4>Kloter</h4>
                                                    <a href="<?= base_url('Kloter/tambahKloter/'. $row['IDPAKET']) ?>" type="button" class="mb-2 btn btn-success" title="Tambah Kloter" type="button" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah Kloter</a>

                                                <?php } ?>
                                                <div class="datatable">
                                                    <?php
                                                    $template = array('table_open' => '<table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">');
                                                    $this->table->set_template($template);
                                                    $this->table->set_heading('Kloter', 'Ketua Rombongan' , 'Jumlah Jamaah', 'Aksi');

                                                    foreach($kloter as $row){
                                                        ?>
                                                        <!-- Modal Detail -->
                                                        <div class="modal fade" id="detailKloterModal<?= $row['KLOTER'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Detail Kloter&nbsp;<?= $row['KLOTER'] ?></h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <!-- Memanggil model -->
                                                                        <?php
                                                                        $CI =& get_instance();
                                                                        $CI->load->model('MKloter');
                                                                        $result = $CI->MKloter->getSelectKloter($row['IDPAKET'], $row['KLOTER']);
                                                                        ?>
                                                                        <?php     
                                                                        $no = 1;
                                                                        foreach($result as $val){
                                                                            ?>
                                                                            <div class="row">
                                                                                <div class="col">
                                                                                    <div class="form-group">
                                                                                        <h6 for="">Jamaah ke <?= $no++; ?></h6>
                                                                                        <p><?= $val['NAMALENGKAP']; ?></p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <?php 
                                                                        } 
                                                                        ?>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <a href='<?= base_url("Kloter/editKloter/". $row['KLOTER'])?>' title="Edit Kloter" type="button" class="btn btn-warning"><i class="fa fa-edit mr-1"></i> Edit</a>
                                                                        <button type="button" class="btn btn-light" data-dismiss="modal"><i class="fa fa-times mr-1"></i>Tutup</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Modal Karomah -->
                                                        <div class="modal fade" id="karomahKloterModal<?= $row['KLOTER']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Pemilihan Karomah Kloter&nbsp;<?= $row['KLOTER'] ?></h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <form action="<?= base_url()?>Kloter/aksiKaromahKloter/<?= $row['KLOTER'] ?>" method="POST" id="saveKloterPaket<?= $row['KLOTER'] ?>">
                                                                        <div class="modal-body">
                                                                            <div class="row">
                                                                                <div class="col">
                                                                                    <div class="form-group">
                                                                                        <label for="ketuaRombongan">Ketua Rombongan</label><br>
                                                                                        <select class="form-control" id="karomah<?= $row['KLOTER'] ?>" name="karomah<?= $row['KLOTER'] ?>" form="saveKloterPaket<?= $row['KLOTER'] ?>" style="width: 100%;">
                                                                                            <option value="">- Pilih -</option>
                                                                                            <?php
                                                                                            $karomah = "-";
                                                                                            $result = $CI->MKloter->getKaromah($row['KLOTER']);
                                                                                            foreach($result as $key){
                                                                                                if($key['ISKAROMAH'] == 1){
                                                                                                    $karomah = $key['NAMALENGKAP'];
                                                                                                }
                                                                                                ?>
                                                                                                <option value="<?php echo $key['KODEPENDAFTARAN']; ?>" <?php if($key['ISKAROMAH']=="1"){echo "selected";}?> ><?php echo $key['NAMALENGKAP']; ?></option>
                                                                                            <?php } ?>
                                                                                        </select>
                                                                                        <!-- Selexct 2 -->
                                                                                        <script>
                                                                                            $(document).ready(function() {
                                                                                                $('#karomah<?= $row['KLOTER']; ?>').select2();
                                                                                            });
                                                                                        </script>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="submit" class="btn btn-success" form="saveKloterPaket<?= $row['KLOTER'] ?>"><i class="fa fa-plus mr-1"></i>Tambah</button>
                                                                            <button type="button" class="btn btn-light" data-dismiss="modal"><i class="fa fa-times mr-1"></i>Tutup</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Modal Hapus -->
                                                        <div class="modal fade" id="hapusKloterModal<?= $row['KLOTER']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Hapus Kloter&nbsp;<?= $row['KLOTER'] ?></h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <h5>Apakah anda yakin akan menghapus <b> Kloter <?= $row['KLOTER'] ?> ? </b></h5>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <a href="<?= base_url('Kloter/aksiHapusKloter/' . $row['KLOTER']) ?>" type="button" class="btn btn-danger"><i class="false fa-trash mr-1"></i>Hapus</a>
                                                                        <button type="button" class="btn btn-light" data-dismiss="modal"><i class="fa fa-times mr-1"></i>Tutup</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php
                                                        $this->table->add_row(
                                                            $row['KLOTER'],
                                                            $karomah,
                                                            ($no-1)." Jamaah",
                                                            '<button title="Detail Kloter" type="button" class="btn btn-primary ml-1 btn-sm" data-toggle="modal" data-target="#detailKloterModal' . $row["KLOTER"] . '"><i class="fa fa-ellipsis-h"></i>
                                                            </button>
                                                            <button title="Karomah Kloter" type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#karomahKloterModal' . $row["KLOTER"] . '"><i class="fa fa-plus"></i>
                                                            </button>
                                                            <a href='.base_url("Kloter/editKloter/". $row['KLOTER']).' title="Edit Kloter" type="button" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i>
                                                            </a>
                                                            <button title="Hapus Kloter" type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapusKloterModal' . $row["KLOTER"] . '"><i class="fa fa-trash"></i>
                                                            </button>'
                                                        );
                                                    }
                                                    echo $this->table->generate();
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- untuk jamaah yang belum masuk kloter -->
                                    <div class="row">
                                        <div class="col">
                                            <div class="datatableV1">
                                                <h4>Jamaah Yang Belum Masuk Kloter</h4>
                                                <?php
                                                $template = array('table_open' => '<table class="table table-bordered table-hover" id="dataTableV1" width="100%" cellspacing="0">');
                                                $this->table->set_template($template);
                                                $this->table->set_heading('Nama Lengkap', 'Alamat');

                                                foreach($unkownKloter as $row){
                                                    $this->table->add_row(
                                                        $row['NAMALENGKAP'],
                                                        $row['ALAMAT']
                                                    );
                                                }
                                                echo $this->table->generate();
                                                ?>
                                            </div>
                                        </div>
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
        var table = $('#dataTableV1').DataTable({
            ordering: false,
            "order": [
            [0, 'asc']
            ],
            fixedColumns: false
        });
    });
</script>

</html>

<!DOCTYPE html>
<html lang="en">

<body>
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container-fluid">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <a href="<?= base_url(); ?>Kloter/aturKloter/<?= substr($kodeKloter, 0, 4) ?>">
                                <button class="btn btn-yellow btn-icon mr-2 my-1" type="button"><i class="fas fa-arrow-left"></i></button>
                            </a>
                            <i class="page-header-icon fas fa-edit ml-2 fa-xs"></i>
                            Edit Kloter
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
                        <div class="card-header">Form Edit Kloter</div>
                        <div class="card-body">
                            <!-- Component Preview-->
                            <?= $this->session->flashdata('message'); ?>
                            <div class="sbp-preview">
                                <div class="sbp-preview-content">
                                    <form action="<?= base_url()?>Kloter/aksiEditKloter/<?= $kodeKloter ?>" method="POST">
                                        <div class="row">
                                            <div class="col">
                                                <input name="idMasterPaket" class="form-control" type="hidden" value="<?= substr($kodeKloter, 5, 7) ?>" />
                                                <input name="idPaket" class="form-control" type="hidden" value="<?= substr($kodeKloter, 0, 4) ?>" />
                                                <label for="kloter">Nama Kloter</label>
                                                <div class="input-group mb-3">
                                                  <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon3"><?= substr($kodeKloter, 0, 4).'-'.substr($kodeKloter, 5, 7) ?></span>
                                                </div>
                                                <input name="kloter" class="form-control" id="kloter" type="text" placeholder="Masukkan Nama Kloter" required="" value="<?= substr($kodeKloter, 13) ?>" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label>Jamaah Yang Sudah Masuk Kloter</label>
                                            <div class="datatable">
                                                <?php
                                                $template = array('table_open' => '<table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">');
                                                $this->table->set_template($template);
                                                $this->table->set_heading('Nama', 'Alamat', 'Aksi');

                                                foreach($kloter as $row){
                                                    $this->table->add_row(
                                                        $row['NAMALENGKAP'],
                                                        $row['ALAMAT'],
                                                        '<button title="Hapus Kloter" type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapusKloterModal' . $row["KODEPENDAFTARAN"] . '"><i class="fa fa-trash"></i>
                                                        </button>'
                                                    );
                                                    ?>
                                                    <!-- Data Jamaah Yang masuk Kloter -->
                                                    <input type="hidden" name="kodePendaftaranJamaahKloter[]" value="<?= $row['KODEPENDAFTARAN']; ?>" />

                                                    <!-- Modal Hapus -->
                                                    <div class="modal fade" id="hapusKloterModal<?= $row['KODEPENDAFTARAN']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Hapus Kloter&nbsp;<?= $row['KLOTER'] ?></h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <h5>Apakah anda yakin akan menghapus <b><?= $row['NAMALENGKAP'] ?></b> dari Kloter <?= $row['KLOTER'] ?> ?</h5>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <a href="<?= base_url('Kloter/aksiHapusJamaahKloter/'.$row['KLOTER'].'/'.$row['KODEPENDAFTARAN']) ?>" type="button" class="btn btn-danger"><i class="false fa-trash mr-1"></i>Hapus</a>
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
                                    <div class="row">
                                        <div class="col">
                                            <label>Nama Jamaah Yang Belum Dapat Kloter</label>
                                            <?php     
                                            $cek = 0;
                                            foreach($unkownKloter as $row){
                                                $cek++;
                                                ?>
                                                <div class="row">
                                                    <div class="col">
                                                      <div class="form-check">
                                                        <input type="checkbox" name="kodePendaftaranJamaah[]" class="form-check-input" id="check<?= $row['KODEPENDAFTARAN']; ?>" value="<?= $row['KODEPENDAFTARAN'] ?>" >
                                                        <label class="form-check-label" for="check<?= $row['KODEPENDAFTARAN'] ?>"><?= $row['NAMALENGKAP'] ?></label>
                                                    </div>
                                                </div>
                                            </div>

                                            <?php 
                                        } 
                                        ?>
                                    </div>
                                </div>
                                <?php
                                if($cek == 0){
                                 // Kondisi
                                    echo '<p><b>Jamaah Sudah Masuk Kloter Semua</b></p>';
                                }
                                // kondisi
                                if($cek != 0){
                                    ?>
                                    <div class="text-md-right">
                                        <button type="submit" class="btn btn-primary "> Update Kloter </button>
                                    </div>
                                    <?php  
                                }
                                ?>
                            </form>
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
    });
</script>

</html>

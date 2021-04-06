<!DOCTYPE html>
<html lang="en">

<body>
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container-fluid">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <a href="<?= base_url(); ?>Kloter/aturKloter/<?= $idPaket ?>">
                                <button class="btn btn-yellow btn-icon mr-2 my-1" type="button"><i class="fas fa-arrow-left"></i></button>
                            </a>
                            <i class="page-header-icon fas fa-edit ml-2 fa-xs"></i>
                            Tambah Kloter
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
                        <div class="card-header">Form Tambah Kloter</div>
                        <div class="card-body">
                            <!-- Component Preview-->
                            <?= $this->session->flashdata('message'); ?>
                            <div class="sbp-preview">
                                <div class="sbp-preview-content">
                                    <?php foreach ($paket as $row) { ?>
                                        <form action="<?= base_url()?>Kloter/aksiTambahKloter/<?= $row['IDPAKET'] ?>" method="POST">
                                            <div class="row">
                                                <div class="col">
                                                    <input name="idMasterPaket" class="form-control" type="hidden" value="<?= $row['IDMASTERPAKET'] ?>" />
                                                    <label for="kloter">Nama Kloter</label>
                                                    <div class="input-group mb-3">
                                                      <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon3"><?= $row['IDPAKET'].'-'.$row['IDMASTERPAKET'] ?></span>
                                                    </div>
                                                    <input name="kloter" class="form-control" id="kloter" type="text" placeholder="Masukkan Nama Kloter" required="" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <label>Nama Jamaah</label>
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
                                            <button type="submit" class="btn btn-primary "> Tambah Kloter </button>
                                        </div>
                                        <?php  
                                    }
                                    ?>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
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

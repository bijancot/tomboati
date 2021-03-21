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
                                    <?php foreach ($jamaah as $row) { ?>
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
                                                    <label for="ketuaRombongan">Ketua Rombongan</label>
                                                    <select class="ketua-select2 form-control" id="ketuaRombongan" name="state">
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
                                        <button type="submit" class="btn btn-primary "> Submit </button>
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

</html>

<!DOCTYPE html>
<html lang="en">

<body>
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container-fluid">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <a href="<?= base_url(); ?>KataMutiara">
                                <button class="btn btn-yellow btn-icon mr-2 my-1" type="button"><i class="fas fa-arrow-left"></i></button>
                            </a>
                            <div class="page-header-icon"><i data-feather="edit-3"></i></div>
                            Kata-Kata Mutiara
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container-fluid mt-n10">
        <div id="solid">
            <div class="card mb-4">
                <div class="card-header">Form Edit Kata-Kata Mutiara</div>
                <div class="card-body">
                    <?php foreach ($kataMutiara as $row) { ?>
                        <?= form_open_multipart('KataMutiara/aksiEditKatamutiara/' . $row['IDKATAMUTIARA']) ?>
                        <div class="form-group">
                            <label for="isiKatamutiara">Kata Mutiara</label>
                            <textarea class="form-control" name="isiKatamutiara" id="isiKatamutiara" rows="3" required=""><?= $row['TEKSKATAMUTIARA']; ?></textarea>
                        </div>
                    <?php } ?>
                    <div class="text-md-right">
                        <button type="submit" class="btn btn-primary "> Submit </button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    ClassicEditor
        .create(document.querySelector('#isiKatamutiara'))
        .then(editor => {
            console.log(editor);
        })
        .catch(error => {
            console.error(error);
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
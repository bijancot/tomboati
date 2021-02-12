<!DOCTYPE html>
<html lang="en">

<body>
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <a href="<?= base_url(); ?>Komunitas">
                                <button class="btn btn-yellow btn-icon mr-2 my-1" type="button"><i class="fas fa-arrow-left"></i></button>
                            </a>
                            Komunitas
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container mt-n10">
        <div id="solid">
            <div class="card mb-4">
                <div class="card-header">Form Edit Komunitas</div>
                <div class="card-body">
                    <?php foreach ($komunitas as $row) { ?>
                        <?= form_open_multipart('Komunitas/aksiEditKomunitas/' . $row['IDKOMUNITASINFO']) ?>
                        <div class="col">
                            <div class="form-group">
                                <label for="judulNews">Judul News</label>
                                <input class="form-control" name="judulNews" id="judulNews" type="text" value="<?= $row['JUDULNEWS']; ?>" required="" />
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="contentNews">Isi News</label>
                                <textarea class="form-control" name="contentNews" id="contentNews" rows="5" required=""><?= $row['CONTENTNEWS']; ?></textarea>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="foto">Foto News</label>
                                <!-- wadah preview -->
                                <img id="foto-preview-edit" src="<?= $row['FOTO']; ?>" alt="image preview" />
                                <div class="custom-file">
                                    <input type="file" name="foto" value="<?= $row['FOTO']; ?>" class="custom-file-input foto" id="source-foto" onchange="previewFoto();">
                                    <label class="custom-file-label label-foto" for="image-source source-foto">Upload Foto</label>
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
</body>

<script>
    ClassicEditor
        .create(document.querySelector('#contentNews'))
        .then(editor => {
            console.log(editor);
        })
        .catch(error => {
            console.error(error);
        });
</script>
<script type="text/javascript">
    //preview sebelum upload
    function previewFoto() {
        document.getElementById("foto-preview-edit").style.display = "block";
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("source-foto").files[0]);
        oFReader.onload = function(oFREvent) {
            document.getElementById("foto-preview-edit").src = oFREvent.target.result;
        };
    };
    // Add the following code if you want the name of the file appear on select
    $(".foto").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".label-foto").addClass("selected").html(fileName);
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

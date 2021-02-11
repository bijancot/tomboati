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
        <div class="row">
            <div class="col-lg-9">
                <!-- Default Bootstrap Form Controls-->
                <div id="default">
                    <div class="card mb-4">
                        <div class="card-header">Form Tambah Komunitas</div>
                        <div class="card-body">
                            <!-- Component Preview-->
                            <div class="sbp-preview">
                                <div class="sbp-preview-content">
                                    <form>
                                        <div class="form-group">
                                            <label for="judulnews">Judul News</label>
                                            <input class="form-control" id="judulnews" name="judulnews" type="text"></input>
                                        </div>
                                        <div class="form-group">
                                            <label for="contentnews">Content News</label>
                                            <input class="form-control" id="contentnews" name="contentnews" type="text"></input>
                                        </div>
                                        <div class="form-group">
                                            <label for="image-source">Foto</label>
                                            <!-- wadah preview -->
                                            <img id="image-preview" alt="image preview" />
                                            <div class="custom-file">
                                                <input type="file" name="foto" class="custom-file-input" id="image-source" onchange="previewImage();">
                                                <label class="custom-file-label" for="image-source">Upload Gambar</label>
                                            </div>
                                        </div>
                                        <div class="text-md-right">
                                            <button type="submit" class="btn btn-primary "> Submit </button>
                                        </div>
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
    ClassicEditor
        .create(document.querySelector('#contentnews'))
        .then(editor => {
            console.log(editor);
        })
        .catch(error => {
            console.error(error);
        });
</script>
<script type="text/javascript">
    //preview sebelum upload
    function previewImage() {
        document.getElementById("image-preview").style.display = "block";
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("image-source").files[0]);

        oFReader.onload = function(oFREvent) {
            document.getElementById("image-preview").src = oFREvent.target.result;
        };
    };

    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
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
<body>
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <a>
                                <button class="btn btn-yellow btn-icon mr-2 my-1" type="button" onclick="history.back(-1)"><i class="fas fa-arrow-left"></i></button>
                            </a>
                            Edit Maskapai
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
                        <div class="card-header">Form Edit News</div>
                        <div class="card-body">
                            <!-- Component Preview-->
                            <div class="sbp-preview">
                                <div class="sbp-preview-content">
                                    <?php foreach ($maskapai as $row) {
                                    ?>
                                        <?= form_open_multipart('maskapai/aksiEditMaskapai/' . $row['IDMASKAPAI']) ?>
                                        <div class="form-group">
                                            <label for="namaMaskapai">Nama Maskapai</label>
                                            <input class="form-control" name="namaMaskapai" id="namaMaskapai" value="<?= $row['NAMAMASKAPAI']; ?>" type="text" required="" />
                                        </div>
                                        <div class="form-group">
                                            <label for="image-source">Gambar Maskapai</label>
                                            <!-- wadah preview -->
                                            <img id="image-preview-edit" src="<?= $row['IMAGEMASKAPAI']; ?>" alt="image preview" />
                                            <div class="custom-file">
                                                <input type="file" value="<?= $row['IMAGEMASKAPAI']; ?>" name="imageMaskapai" class="custom-file-input" id="image-source" onchange="previewImage();">
                                                <label class="custom-file-label" for="image-source">Upload Gambar</label>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
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
<script type="text/javascript">
    //preview sebelum upload
    function previewImage() {
        document.getElementById("image-preview-edit").style.display = "block";
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("image-source").files[0]);
        oFReader.onload = function(oFREvent) {
            document.getElementById("image-preview-edit").src = oFREvent.target.result;
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
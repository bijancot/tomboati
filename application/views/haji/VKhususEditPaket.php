<body>
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container-fluid">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <a onclick="history.back(-1)">
                                <button class="btn btn-yellow btn-icon mr-2 my-1" type="button"><i class="fas fa-arrow-left"></i></button>
                            </a>
                            <div class="page-header-icon"><i data-feather="edit-3"></i></div>
                            Edit Paket Haji&nbsp;<?= $tipe; ?>
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
                        <div class="card-header">Form Edit Paket</div>
                        <div class="card-body">
                            <!-- Component Preview-->
                            <div class="sbp-preview">
                                <div class="sbp-preview-content">
                                    <?php foreach ($paket as $row) {
                                        ?>
                                        <?= form_open_multipart('Haji/aksiEditPaket/'.$row['IDPAKET']) ?>
                                        <input type="hidden" name="idMasterPaket" value="<?= $row['IDMASTERPAKET'] ?>">
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="namaPaket">Nama Paket</label>
                                                    <input name="namaPaket" class="form-control" id="namaPaket" type="text" placeholder="Masukkan Nama Paket" value="<?= $row['NAMAPAKET']; ?>" required="" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="image-source">Gambar Paket</label>
                                            <!-- wadah preview -->
                                            <img id="image-preview-edit" src="<?= $row['IMAGEPAKET']; ?>" alt="image preview"/>
                                            <div class="custom-file">
                                                <input type="file" value="<?= $row['IMAGEPAKET']; ?>" name="imagePaket" class="custom-file-input" id="image-source" onchange="previewImage();">
                                                <label class="custom-file-label" for="image-source">Upload Gambar</label>
                                            </div>
                                        </div>
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input isShow" id="customSwitch1" value="<?php if ($row['ISSHOW'] == 1) echo "true"; ?>" <?php if ($row['ISSHOW'] == 1) echo "checked"; ?> name="isShow">
                                            <label class="custom-control-label" for="customSwitch1">Paket akan tampil dalam Apps</label>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                    <hr>
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
    
    <!-- datepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/25.0.0/classic/ckeditor.js"></script>
    <script type="text/javascript">
    //switch toogle
    $('.isShow').change(function(){
        cb = $(this);
        cb.val(cb.prop('checked'));
    });
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
        xhr=$.ajax({
            method: 'POST',
            url: "<?php echo base_url()?>/Notifikasi/listNotifikasi",
            success : function(response){
                $('.list-notifikasi').html(response);
            }
        })
    });
    $('.list-notifikasi').on('click','.notifikasi', function(e) {
        console.log("Clicked");
    });
    
</script>
</body>
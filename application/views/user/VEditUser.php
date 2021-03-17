<body>
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container-fluid">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                        <a href="<?= base_url('user'); ?>">
                            <button class="btn btn-yellow btn-icon mr-2 my-1" type="button"><i class="fas fa-arrow-left"></i></button>
                        </a>
                        <i class="page-header-icon fas fa-edit ml-2 fa-xs"></i>
                        Edit User
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
                        <div class="card-header">Form Edit User</div>
                        <div class="card-body">
                            <!-- Component Preview-->
                            <div class="sbp-preview">
                                <div class="sbp-preview-content">
                                    <?php foreach ($user as $row) {
                                    ?>
                                    <?= form_open_multipart('User/aksiEditUser/'.$row['IDUSERREGISTER']) ?>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="nomorKTP">Nomor KTP</label>
                                                <input name="nomorKTP" class="form-control" id="nomorKTP" type="text" placeholder="Masukkan Nomor KTP" value="<?= $row['NOMORKTP']; ?>" required="" />
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="namaLengkap">Nama Lengkap</label>
                                                <input name="namaLengkap" class="form-control" id="namaLengkap" type="text" placeholder="Masukkan Nama Lengkap" value="<?= $row['NAMALENGKAP']; ?>" required=""/>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input name="email" class="form-control" id="email" type="email" placeholder="Masukkan Email" value="<?= $row['EMAIL']; ?>" required=""/>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="kategori">Kategori User</label>
                                                <select id="kategori" class="form-control" name="kategori" required="">
                                                    <option value="">
                                                        Pilih Kategori
                                                    </option>
                                                    <option value="1" 
                                                    <?php
                                                    if ($row['KATEGORI'] == "1") {
                                                    echo 'selected="selected"';
                                                    }
                                                    ?>>Jamaah</option>
                                                    <option value="2" <?php
                                                    if ($row['KATEGORI'] == "2") {
                                                    echo 'selected="selected"';
                                                    }
                                                    ?>>Agen</option>
                                                    <option value="3"
                                                    <?php
                                                    if ($row['KATEGORI'] == "3") {
                                                    echo 'selected="selected"';
                                                    }
                                                    ?>>Mitra</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input name="password" class="form-control" id="password" type="password" placeholder="Masukkan Password" value="<?= $row['PASSWORD']; ?>" required="" />
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="confirm_password">Re-Password</label>
                                                <span id='message'></span>
                                                <input name="confirm_password" class="form-control" id="confirm_password" type="password" placeholder="Masukkan Ulang Password" value="<?= $row['NOMORKTP']; ?>" required=""/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="kodeReferralFrom">Referral dari</label>
                                                <input name="kodeReferralFrom" class="form-control" id="kodeReferralFrom" type="text" placeholder="Masukkan Kode Referral" value="<?= $row['KODEREFERRALFROM']; ?>" />
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="nomorHP">Nomor HP</label>
                                                <input name="nomorHP" class="form-control" id="nomorHP" type="text" placeholder="Masukkan Nomor HP"  value="<?= $row['NOMORHP']; ?>"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="nomorHP">File KTP</label>
                                        <!-- wadah preview -->
                                        <img id="ktp-preview-edit" src="<?= $row['FILEKTP']; ?>" alt="image preview"/>
                                        <div class="custom-file">
                                            <input type="file" name="fileKTP" value="<?= $row['FILEKTP']; ?>"  class="custom-file-input fileKTP" id="source-fileKTP" onchange="previewKTP();">
                                            <label class="custom-file-label label-ktp" for="image-source source-fileKTP">Upload File</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="nomorHP">Foto User</label>
                                        <!-- wadah preview -->
                                        <img id="foto-preview-edit" src="<?= $row['FOTO']; ?>" alt="image preview"/>
                                        <div class="custom-file">
                                            <input type="file" name="foto" value="<?= $row['FOTO']; ?>" class="custom-file-input foto" id="source-foto" onchange="previewFoto();">
                                            <label class="custom-file-label label-foto" for="image-source source-foto">Upload Foto</label>
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
    <script type="text/javascript">
    //konfirmasi password sama
    $('#password, #confirm_password').on('keyup', function () {
    if ($('#password').val() == $('#confirm_password').val()) {
    $('#message').html('Matching').css('color', 'green');
    } else
    $('#message').html('Not Matching').css('color', 'red');
    });
    //preview sebelum upload
    function previewKTP() {
    document.getElementById("ktp-preview").style.display = "block";
    var oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById("source-fileKTP").files[0]);
    oFReader.onload = function(oFREvent) {
    document.getElementById("ktp-preview").src = oFREvent.target.result;
    };
    };
    //preview sebelum upload
    function previewFoto() {
    document.getElementById("foto-preview").style.display = "block";
    var oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById("source-foto").files[0]);
    oFReader.onload = function(oFREvent) {
    document.getElementById("foto-preview").src = oFREvent.target.result;
    };
    };
    // Add the following code if you want the name of the file appear on select
    $(".fileKTP").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".label-ktp").addClass("selected").html(fileName);
    });
    // Add the following code if you want the name of the file appear on select
    $(".foto").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".label-foto").addClass("selected").html(fileName);
    });
    </script>
</body>
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
</html>
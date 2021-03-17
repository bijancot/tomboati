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
                        <i class="page-header-icon fas fa-edit ml-2 fa-xs"></i>
                        Edit Paket Umroh&nbsp;<?= $tipe; ?>
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
                                    <?= form_open_multipart('Umroh/aksiEditPaket/'.$row['IDPAKET']) ?>
                                    <input type="hidden" name="idMasterPaket" value="<?= $row['IDMASTERPAKET'] ?>">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="namaPaket">Nama Paket</label>
                                                <input name="namaPaket" class="form-control" id="namaPaket" type="text" placeholder="Masukkan Nama Paket" value="<?= $row['NAMAPAKET']; ?>" required="" />
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="kuota">Kuota</label>
                                                <input name="kuota" class="form-control" id="kuota" type="number" placeholder="Masukkan Kuota" value="<?= $row['KUOTA']; ?>" required="" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="maskapai">Maskapai</label>
                                                <select id="maskapai" class="form-control" name="maskapai" required>
                                                    <option value="">
                                                        Pilih Maskapai
                                                    </option>
                                                    <?php
                                                    $selected = $row['IDMASKAPAI']; // Put value from database here.
                                                    foreach($maskapai as $key){ ?>
                                                    <option value="<?php echo $key->IDMASKAPAI; ?>"
                                                        <?php
                                                        if ($key->IDMASKAPAI == $selected) {
                                                        echo 'selected="selected"';
                                                        }
                                                        ?>>
                                                    <?php echo $key->NAMAMASKAPAI; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col mt-auto">
                                            <div class="form-group">
                                                <label></label>
                                                <a href="<?= base_url('Maskapai'); ?>" class='btn btn-success btn-m' type='submit'><i class="fa fa-cog mr-1"></i>Kelola Maskapai</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="durasiPaket">Durasi Paket</label>
                                                <input name="durasiPaket" class="form-control" id="durasiPaket" type="number" placeholder="Masukkan Durasi"
                                                value="<?= $row['DURASIPAKET']; ?>" />
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="tanggalKeberangkatan">Tanggal Keberangkatan</label>
                                                <input name="tanggalKeberangkatan" class="form-control" id="tanggalKeberangkatan" type="text" placeholder="Masukkan Tanggal" value="<?= $row['TANGGALKEBERANGKATAN']; ?>"  />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="penerbangan">Penerbangan</label>
                                                <input name="penerbangan" class="form-control" id="penerbangan" type="text" placeholder="Masukkan Penerbangan" value="<?= $row['PENERBANGAN']; ?>"/>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="ratingHotel">Rating Hotel</label>
                                                <input name="ratingHotel" class="form-control" id="ratingHotel" type="number" placeholder="Masukkan Rating Hotel"  value="<?= $row['RATINGHOTEL']; ?>"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="namaHotelPertama">Nama Hotel Pertama</label>
                                                <input name="namaHotelA" class="form-control" id="namaHotelPertama" type="text" placeholder="Masukkan Nama Hotel" value="<?= $row['NAMAHOTELA']; ?>"  />
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="namaHotelKedua">Nama Hotel Kedua</label>
                                                <input name="namaHotelB" class="form-control" id="namaHotelKedua" type="text" placeholder="Masukkan Nama Hotel Kedua" value="<?= $row['NAMAHOTELB']; ?>" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="alamatHotelPertama">Alamat Hotel Pertama</label>
                                                <textarea name="tempatHotelA" class="form-control" id="alamatHotelPertama" rows="3"><?= $row['TEMPATHOTELA']; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="alamatHotelKedua">Alamat Hotel Kedua</label>
                                                <textarea  name="tempatHotelB" class="form-control" id="alamatHotelKedua" rows="3"><?= $row['TEMPATHOTELB']; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="doubleSheet">Harga Double Sheet</label>
                                                <input name="doubleSheet" class="form-control" id="doubleSheet" type="number" placeholder="Masukkan Harga" required=""  value="<?= $row['DOUBLESHEET']; ?>"/>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="tripleSheet">Harga Triple Sheet</label>
                                                <input name="tripleSheet" class="form-control" id="tripleSheet" type="number" placeholder="Masukkan Harga" required=""  value="<?= $row['TRIPLESHEET']; ?>"/>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="quadSheet">Harga Quad Sheet</label>
                                                <input name="quadSheet" class="form-control" id="quadSheet" type="number" placeholder="Masukkan Harga" required=""  value="<?= $row['QUADSHEET']; ?>"/>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- decode -->
                                    <?php
                                    $biayaSudahTermasuk = str_replace( '&', '&amp;', $row['BIAYASUDAHTERMASUK'] );
                                    ?>
                                    <div class="form-group">
                                        <label for="biayaSudahTermasuk">Biaya Sudah Termasuk</label>
                                        <textarea  name="biayaSudahTermasuk" class="form-control" id="biayaSudahTermasuk" rows="3"><?= $biayaSudahTermasuk; ?></textarea>
                                    </div>
                                    <!-- decode -->
                                    <?php
                                    $biayaBelumTermasuk = str_replace( '&', '&amp;', $row['BIAYABELUMTERMASUK'] );
                                    ?>
                                    <div class="form-group">
                                        <label for="biayaBelumTermasuk">Biaya Belum Termasuk</label>
                                        <textarea  name="biayaBelumTermasuk" class="form-control" id="biayaBelumTermasuk" rows="15"><?= $biayaBelumTermasuk; ?></textarea>
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
                                    <h5>Detail Rencana Perjalanan</h5>
                                    <div id="itinerary">
                                    <?php 
                                    $hari = 0;
                                    foreach($itinerary as $key){
                                        $hari++;
                                        ?>
                                        <div id="row<?= $hari; ?>">
                                        <hr>
                                            <div class="col text-right">
                                            <button type="button" name="remove" id="<?= $hari; ?>" class="btn btn-danger btn_remove btn-sm">X</button>
                                            </div>
                                            <div class="form-group">
                                                <label for="hari">Hari Ke <?= $key['HARIKE'] ?></label>
                                                <textarea name="detailKegiatan[]" class="form-control" id="detailKegiatan" rows="3" placeholder="Masukkan Detail Kegiatan"><?= $key['DETAILKEGIATAN'] ?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="tempat">Tempat</label>
                                                <input name="tempat[]" class="form-control" id="tempat1" type="text" placeholder="Masukkan Tempat" value="<?= $key['TEMPAT'] ?>" />
                                            </div>
                                        </div>
                                        <?php
                                        }   
                                        ?>                                    
                                    </div>
                                    <button name="tambah" id="tambah" type="button" class="btn btn-success tambah"><i class="fa fa-plus"></i>Tambah Rencana Perjalanan</button>
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
    <!-- Editor -->
    <script>
    ClassicEditor
    .create( document.querySelector( '#biayaSudahTermasuk' ) )
    .then( editor => {
    console.log( editor );
    } )
    .catch( error => {
    console.error( error );
    } );
    ClassicEditor
    .create( document.querySelector( '#biayaBelumTermasuk' ) )
    .then( editor => {
    console.log( editor );
    } )
    .catch( error => {
    console.error( error );
    } );
    </script>
    <script type="text/javascript">
    //datepicker
    $('#tanggalKeberangkatan').datepicker({
    format: 'yyyy-mm-dd',
    autoclose: true,
    todayHighlight: true,
    });
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

    // DETAIL RENCANA
    var i = <?= $hari ?>;
    $('.tambah').click(function() {
    i++;
    $('#itinerary').append(
        '<div id="row' +i+ '">' +
        '<hr>' +
        '<div class="col text-right">' +
        '<button type="button" name="remove" id="' +i+ '" class="btn btn-danger btn_remove btn-sm">X</button>' +
        '</div>' +
        '<div class="form-group">'+
        '<label for="hari"'+i+'">Hari Ke '+i+'</label>'+
        '<textarea name="detailKegiatan[]" class="form-control" id="detailKegiatan"'+i+'" rows="3" placeholder="Masukkan Detail Kegiatan"></textarea>'+
        '</div>'+
        '<div class="form-group">'+
        '<label for="tempat1">Tempat</label>'+
        '<input name="tempat[]" class="form-control" id="tempat"'+i+'" type="text" placeholder="Masukkan Tempat"/>'+
        '</div>');
    });

    // Hapus detail
    $(document).on('click', '.btn_remove', function() {
        var button_id = $(this).attr("id");
        $('#row' + button_id + '').remove();
        i--;
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
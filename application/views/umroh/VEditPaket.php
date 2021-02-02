<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content />
        <meta name="author" content />
        <link href="<?= base_url(); ?>assets/css/styles.css" rel="stylesheet" />
        <link href="<?= base_url(); ?>assets/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <link rel="icon" type="image/x-icon" href="<?= base_url(); ?>assets/img/logo_tomboati.png" />
        <script data-search-pseudo-elements defer src="<?= base_url(); ?>assets/js/plugin/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
        <script src="<?= base_url(); ?>assets/js/plugin/feather-icons/4.27.0/feather.min.js" crossorigin="anonymous"></script>

        <style type="text/css">
            #image-preview{
                width : 300px;
                margin-bottom: 15px;
            }
        </style>

    </head>
    <body>
        <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
            <div class="container">
                <div class="page-header-content pt-4">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-auto mt-4">
                            <h1 class="page-header-title">
                            <a href="<?= base_url('umroh/paket/'.$tipe); ?>">
                                <button class="btn btn-yellow btn-icon mr-2 my-1" type="button"><i class="fas fa-arrow-left"></i></button>
                            </a>
                            <div class="page-header-icon"><i data-feather="edit-3"></i></div>
                            <?= $title; ?>
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
                                            <div class="form-group">
                                                <label for="biayaSudahTermasuk">Biaya Sudah Termasuk</label>
                                                <textarea  name="biayaSudahTermasuk" class="form-control" id="biayaSudahTermasuk" rows="3"><?= $row['BIAYASUDAHTERMASUK']; ?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="biayaBelumTermasuk">Biaya Belum Termasuk</label>
                                                <textarea  name="biayaBelumTermasuk" class="form-control" id="biayaBelumTermasuk" rows="3"><?= $row['BIAYABELUMTERMASUK']; ?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <!-- wadah preview -->
                                                <img id="image-preview" src="<?= $row['IMAGEPAKET']; ?>" alt="image preview"/>
                                                <div class="custom-file">
                                                  <input type="file" value="<?= $row['IMAGEPAKET']; ?>" name="imagePaket" class="custom-file-input" id="image-source" onchange="previewImage();">
                                                  <label class="custom-file-label" for="image-source">Upload Gambar</label>
                                                </div>
                                            </div>
                                            <div class="custom-control custom-switch">
                                                 <input type="checkbox" class="custom-control-input isShow" id="customSwitch1" 
                                                 <?php if ($row['ISSHOW'] == 1) echo "checked='checked'"; ?> name="isShow">
                                                 <label class="custom-control-label" for="customSwitch1">Paket akan tampil dalam Apps</label>
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
        
        <script src="<?= base_url(); ?>assets/js/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <script src="<?= base_url(); ?>assets/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?= base_url(); ?>assets/js/scripts.js"></script>
        <script src="<?= base_url(); ?>assets/js/plugin/datatables/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="<?= base_url(); ?>assets/js/plugin/datatables/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="<?= base_url(); ?>assets/js/demo/datatables-demo.js"></script>
        <script type="text/javascript">
            $('.isShow').change(function(){
             cb = $(this);
             cb.val(cb.prop('checked'));
            });

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
    </body>
</html>
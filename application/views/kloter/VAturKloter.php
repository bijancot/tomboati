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
                                    <?php foreach ($paket as $row) { ?>
                                        <form action="<?= base_url()?>kloter/aksiAturKloter" method="POST" id="saveKloterPaket"></form>
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
                                                    <h4>Rombongan</h4>
                                                    <button type="button" class="mb-2 btn btn-success" title="Tambah Kloter" type="button" class="btn btn-primary ml-1 btn-sm" data-toggle="modal" data-target="#tambahKloterModal"><i class="fa fa-plus"></i> Tambah Kloter</button>

                                                    <!-- Modal Tambah -->
                                                    <div class="modal fade" id="tambahKloterModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Kloter</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="<?= base_url()?>Kloter/aksiTambahKloter/<?= $row['IDPAKET'] ?>" method="POST" id="addKloter"></form>
                                                                    <h5>Silahkan Masukkan Kloter</h5>
                                                                    <input name="idMasterPaket" class="form-control" type="hidden" value="<?= $row['IDMASTERPAKET'] ?>" form="addKloter" />
                                                                    <div class="row">
                                                                        <div class="col">
                                                                            <label for="kloter">Nama Kloter</label>
                                                                            <div class="input-group mb-3">
                                                                              <div class="input-group-prepend">
                                                                                <span class="input-group-text" id="basic-addon3"><?= $row['IDPAKET'].'-'.$row['IDMASTERPAKET'] ?></span>
                                                                            </div>
                                                                            <input name="kloter" class="form-control" id="kloter" type="text" placeholder="Masukkan Nama Kloter" required="" form="addKloter" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <label>Nama Jamaah</label>
                                                                <?php     
                                                                $cek = 0;
                                                                foreach($unkownKloter as $row){
                                                                    $cek++;
                                                                    ?>
                                                                    <div class="row">
                                                                        <div class="col">
                                                                          <div class="form-check">
                                                                            <input type="checkbox" name="kodePendaftaranJamaah[]" class="form-check-input" id="check<?= $row['KODEPENDAFTARAN']; ?>" value="<?= $row['KODEPENDAFTARAN'] ?>" form="addKloter">
                                                                            <label class="form-check-label" for="check<?= $row['KODEPENDAFTARAN'] ?>"><?= $row['NAMALENGKAP'] ?></label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <?php 
                                                            } 
                                                            if($cek == 0){
                                                            // Kondisi
                                                                echo '<p><b>Jamaah Sudah Masuk Kloter Semua</b></p>';
                                                            }
                                                            ?>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <?php
                                                        // kondisi
                                                            if($cek != 0){
                                                                ?>
                                                                <button type="submit" class="btn btn-success" form="addKloter"><i class="fa fa-plus mr-1"></i>Tambah</button>
                                                                <?php  
                                                            }
                                                            ?>
                                                            <button type="button" class="btn btn-light" data-dismiss="modal"><i class="fa fa-times mr-1"></i>Tutup</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="datatable">
                                                <?php
                                                $template = array('table_open' => '<table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">');
                                                $this->table->set_template($template);
                                                $this->table->set_heading('Kloter', 'Jumlah Orang', 'Aksi');

                                                foreach($kloter as $row){
                                                    $this->table->add_row(
                                                        $row['KLOTER'],
                                                        "Kosong",
                                                        '<button title="Detail Kloter" type="button" class="btn btn-primary ml-1 btn-sm" data-toggle="modal" data-target="#detailKloterModal' . $row["KLOTER"] . '"><i class="fa fa-ellipsis-h"></i>
                                                        </button>
                                                        <button title="Edit Kloter" type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editKloterModal' . $row["KLOTER"] . '"><i class="fa fa-edit"></i>
                                                        </button>
                                                        <button title="Hapus Kloter" type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapusKloterModal' . $row["KLOTER"] . '"><i class="fa fa-trash"></i>
                                                        </button>'
                                                    );

                                                    ?>
                                                    <!-- Modal Detail -->
                                                    <div class="modal fade" id="detailKloterModal<?= $row['KLOTER'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Detail Kloter&nbsp;<?= $row['KLOTER'] ?></h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <!-- Memanggil model -->
                                                                    <?php
                                                                    $CI =& get_instance();
                                                                    $CI->load->model('MKloter');
                                                                    $result = $CI->MKloter->getSelectKloter($row['IDPAKET'], $row['KLOTER']);
                                                                    ?>
                                                                    <?php     
                                                                    foreach($result as $val){
                                                                        // DATA YANG MASUK DI KLOTER
                                                                        $checkedJamaah[] = $val['KODEPENDAFTARAN'];
                                                                        ?>
                                                                        <div class="row">
                                                                            <div class="col">
                                                                                <div class="form-group">
                                                                                    <h6 for="">Nama Lengkap</h6>
                                                                                    <p><?= $val['NAMALENGKAP']; ?></p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col">
                                                                                <div class="form-group">
                                                                                    <h6 for="">Jenis Kelamin</h6>
                                                                                    <p>
                                                                                        <?php
                                                                                        if($val['JENISKELAMIN'] == 1){
                                                                                            echo "Laki-Laki";
                                                                                        }else{
                                                                                            echo "Perempuan";
                                                                                        }
                                                                                        ?>
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col">
                                                                                <div class="form-group">
                                                                                    <h6 for="">Tempat, Tanggal Lahir</h6>
                                                                                    <p><?= $val['TEMPATLAHIR'].", " . $val['TANGGALLAHIR'] ?></p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col">
                                                                                <div class="form-group">
                                                                                    <h6 for="">Alamat</h6>
                                                                                    <p><?= $val['ALAMAT']; ?></p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <?php 
                                                                    } 
                                                                    ?>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-light" data-dismiss="modal"><i class="fa fa-times mr-1"></i>Tutup</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Modal Edit -->
                                                    <div class="modal fade" id="editKloterModal<?= $row['KLOTER'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Edit Kloter&nbsp;<?= $row['KLOTER'] ?></h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="<?= base_url()?>Kloter/aksiEditKloter/<?= $row['KLOTER'] ?>" method="POST" id="editKloter"></form>
                                                                    <h5>Silahkan Masukkan Kloter</h5>
                                                                    <input name="idPaket" class="form-control" type="hidden" value="<?= $row['IDPAKET'] ?>" form="editKloter" />
                                                                    <input name="idMasterPaket" class="form-control" type="hidden" value="<?= $row['IDMASTERPAKET'] ?>" form="editKloter" />
                                                                    <div class="row">
                                                                        <div class="col">
                                                                            <label for="kloter">Nama Kloter</label>
                                                                            <div class="input-group mb-3">
                                                                              <div class="input-group-prepend">
                                                                                <span class="input-group-text" id="basic-addon3"><?= $row['IDPAKET'].'-'.$row['IDMASTERPAKET'] ?></span>
                                                                            </div>
                                                                            <?php  
                                                                            $sub_kloter = substr($row['KLOTER'],13);
                                                                            ?>
                                                                            <input name="kloter" class="form-control" id="kloter" type="text" placeholder="Masukkan Nama Kloter" required=""  value="<?= $sub_kloter ?>" form="editKloter" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <?php  
                                                                $edit = $CI->MKloter->getEditKloter($row['IDPAKET'], $row['KLOTER']);
                                                                ?>
                                                                <label>Nama Jamaah</label>
                                                                <?php    
                                                                foreach($edit as $check){

                                                                    $checked = "";
                                                                    if(in_array($check['KODEPENDAFTARAN'],$checkedJamaah)){
                                                                        $checked = "checked";
                                                                    }
                                                                    ?>
                                                                    <div class="row">
                                                                        <div class="col">
                                                                          <div class="form-check">
                                                                            <input type="checkbox" name="kodePendaftaranJamaah[]" class="form-check-input" id="check<?= $check['KODEPENDAFTARAN']; ?>" value="<?= $check['KODEPENDAFTARAN'] ?>" <?= $checked; ?> form="editKloter">
                                                                            <label class="form-check-label" for="check<?= $check['KODEPENDAFTARAN'] ?>"><?= $check['NAMALENGKAP'] ?></label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <?php 
                                                            }
                                                            ?>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-warning" form="editKloter"><i class="fa fa-edit mr-1"></i>Update</button>
                                                            <button type="button" class="btn btn-light" data-dismiss="modal"><i class="fa fa-times mr-1"></i>Tutup</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Modal Hapus -->
                                            <div class="modal fade" id="hapusKloterModal<?= $row['KLOTER']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Hapus Kloter&nbsp;<?= $row['KLOTER'] ?></h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <h5>Apakah anda yakin akan menghapus <b> Kloter <?= $row['KLOTER'] ?> ? </b></h5>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <a href="<?= base_url('Kloter/aksiHapusKloter/'.$row['IDPAKET'].'/' . $row['KLOTER']) ?>" type="button" class="btn btn-danger"><i class="false fa-trash mr-1"></i>Hapus</a>
                                                            <button type="button" class="btn btn-light" data-dismiss="modal"><i class="fa fa-times mr-1"></i>Tutup</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                        echo $this->table->generate();
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="ketuaRombongan">Ketua Rombongan</label>
                                    <select class="ketua-select2 form-control" id="karomah" name="karomah" form="saveKloterPaket">
                                        <?php
                                        foreach($jamaah as $key){ ?>
                                            <option value="">- Pilih -</option>
                                            <option name="kodePendaftaranKaromah" value="<?php echo $key['KODEPENDAFTARAN']; ?>" <?php if($row['ISKAROMAH']=="1"){echo "selected";}?> >
                                                <?php echo $key['NAMALENGKAP']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="text-md-right">
                            <button type="submit" class="btn btn-primary" form="saveKloterPaket"> Selesai </button>
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

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
  
</head>

<body>
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="activity"></i></div>
                            <?= $title; ?>
                        </h1>
                        Daftar Paket
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container mt-n10">
        <div class="card mb-4">
            <div class="card-header">
                <a href="<?= base_url('Umroh/tambahPaket/'.$tipe); ?>" class='btn btn-primary btn-sm' type='submit'>Tambah Paket</a>
            </div>
            <div class="card-body">
                <div class="datatable">
                    <?php
                    $template = array('table_open' => '<table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">');

                    $this->table->set_template($template);
                    $this->table->set_heading('No', 'Nama Paket', 'Maskapai', 'Durasi Paket', 'Kuota');
                        // print_r($paket);
                        $no = 1;
                        foreach ($paket as $row) {
                            $this->table->add_row(
                                $no++,
                                $row->NAMAPAKET,
                                $row->NAMAMASKAPAI,
                                $row->DURASIPAKET,
                                $row->KUOTA
                            );
                        }

                    echo $this->table->generate();
                    ?>
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
   
</body>

</html>
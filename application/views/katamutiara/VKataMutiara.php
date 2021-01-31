<!DOCTYPE html>
<html lang="en">

<body>
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="book-open"></i></div>
                            Kata-Kata Mutiara
                        </h1>
                        <div class="page-header-subtitle">Daftar Kata-Kata Mutiara</div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container mt-n10">
        <div class="card mb-4">
            <div class="card-header">
                <a href="<?= site_url('katamutiara/tambahKataMutiara'); ?>" class='btn btn-primary btn-sm' type='submit'>Tambah Kata-Kata Mutiara</a>
            </div>
            <div class="card-body">
                <div class="datatable">
                    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kata Mutiara</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- <?php foreach ($kata_mutiara as $row) : ?>
                                <tr>
                                    <td width>
                                        <?php echo $row->tekskatamutiara ?>
                                    </td>
                                    <td>
                                        <?php echo $row->waktu ?>
                                    </td>
                                    <td>
                                        <a href="<?= site_url('KataMutiara/editKataMutiara'); ?>" class="btn btn-datatable btn-icon btn-yellow mr-2"><i data-feather="edit-2"></i></a>
                                        <a href="<?= site_url('KataMutiara/hapusKataMutiara'); ?>" class="btn btn-datatable btn-icon btn-red mr-2"><i data-feather="trash-2"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?> -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
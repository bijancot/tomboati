<!DOCTYPE html>
<html lang="en">

<head>
</head>

<body>
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="message-circle"></i></div>
                            Chat
                        </h1>
                        <div class="page-header-subtitle">Daftar Chat</div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container mt-n10">
        <div class="card mb-4">
            <div class="card-header">
                <!-- <a href="<?= site_url('pembayaran/tambahPembayaran'); ?>" class='btn btn-primary btn-sm' type='submit'>Tambah Kata-Kata Mutiara</a> -->
            </div>
            <div class="card-body">
                <div class="datatable">
                    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Pesan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; foreach($chat as $data){?>
                            <tr>
                                <td><?php echo $no++?></td>
                                <td><?php echo $data->NAMALENGKAP?></td>
                                <td><?php echo $data->MESSAGE?></td>
                                <td>
                                    <a href="<?php echo base_url('Chat/detailChat/'.$data->ID_CHAT_ROOM.'')?>" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Detail Chat"><span class="fas fa-info-square"> </span></a>
                                </td>
                            </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
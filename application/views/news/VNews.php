<!DOCTYPE html>
<html lang="en">

<body>
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="activity"></i></div>
                            News
                        </h1>
                        <div class="page-header-subtitle">Daftar News</div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container mt-n10">
        <div class="card mb-4">
            <div class="card-header">
                <a href="<?= site_url('news/tambahNews'); ?>" class='btn btn-primary btn-sm' type='submit'>Tambah News</a>
            </div>
            <div class="card-body">
                <div class="datatable">
                    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul News</th>
                                <th>Deskripsi News</th>
                                <th>Isi News</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Judul</td>
                                <td>Deskripsi</td>
                                <td>Isi</td>
                                <td>2011/04/25</td>
                                <td>
                                    <a href="<?= site_url('News/editNews'); ?>" class="btn btn-datatable btn-icon btn-yellow mr-2"><i data-feather="edit-2"></i></a>
                                    <a class="btn btn-datatable btn-icon btn-red mr-2"><i data-feather="trash-2"></i></a>
                                </td>
                            </tr>
                            <!-- <?php foreach ($news_info as $row) : ?>
                                <tr>
                                    <td width>
                                    <?php echo $row->judulnews ?>
                                    </td>
                                    <td>
                                        <?php echo $row->deskripsinews ?>
                                    </td>
                                    <td>
                                    <?php echo $row->contentnew ?>
                                    </td>
                                    <td>
                                    <?php echo $row->tanggalnews ?>
                                    </td>
                                    <td>
                                       <a href="<?= site_url('News/editNews'); ?>" class="btn btn-datatable btn-icon btn-yellow mr-2"><i data-feather="edit-2"></i></a>
                                       <a href="<?= site_url('News/hapusNews'); ?>"class="btn btn-datatable btn-icon btn-red mr-2"><i data-feather="trash-2"></i></a>
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
<!DOCTYPE html>
<html lang="en">

<body>
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container-fluid">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="globe"></i></div>
                            Dashboard
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container-fluid mt-n10">
        <div class="row">
            <div class="col-xxl-4 col-xl-12 mb-4">
                <div class="card h-100">
                    <div class="card-body h-100 d-flex flex-column justify-content-center py-5 py-xl-4">
                        <div class="row align-items-center">
                            <div class="col-xl-8 col-xxl-12">
                                <div class="text-center px-4 mb-4 mb-xl-0 mb-xxl-4">
                                    <h1 class="text-primary">Selamat Datang !</h1>
                                    <p class="text-gray-700 mb-0">Ayo Waktunya Kerja !</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3 col-lg-3">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="mr-3">
                                <div class="text-white-75 small">Jumlah User</div>
                                <div class="text-lg font-weight-bold"><?php echo $totalUser; ?> User</div>
                            </div>
                            <i class="feather-xl text-white-50" data-feather="user"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3 col-lg-3">
                <div class="card bg-green text-white mb-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="mr-3">
                                <div class="text-white-75 small">Paket Aktif</div>
                                <div class="text-lg font-weight-bold"><?php echo $totalPaketAktif; ?> Paket</div>
                            </div>
                            <i class="feather-xl text-white-50" data-feather="box"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3 col-lg-3">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="mr-3">
                                <div class="text-white-75 small">Paket Nonaktif</div>
                                <div class="text-lg font-weight-bold"><?php echo $totalPaketNonaktif; ?> Paket</div>
                            </div>
                            <i class="feather-xl text-white-50" data-feather="box"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3 col-lg-3">
                <div class="card bg-orange text-white mb-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="mr-3">
                                <div class="text-white-75 small">Pesan</div>
                                <div class="text-lg font-weight-bold">0</div>
                            </div>
                            <i class="feather-xl text-white-50" data-feather="dollar-sign"></i>
                        </div>
                    </div>
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

</html>
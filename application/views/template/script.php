<script src="<?= base_url(); ?>assets/js/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
<script src="<?= base_url(); ?>assets/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="<?= base_url(); ?>assets/js/scripts.js"></script>
<!-- Select2 -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<!-- Datatables -->
<script src="<?= base_url(); ?>assets/js/plugin/datatables/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="<?= base_url(); ?>assets/js/plugin/datatables/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>

<!-- Jquery Mask KUSTOM FORMAT --> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    Pusher.logToConsole = true;

    var pusher = new Pusher('ee692ab95bb9aeaa1dcc', {
        cluster: 'ap1',
        forceTLS: true
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
        console.log(data);
        if (data.notif == "chat") {
            xhr = $.ajax({
                method: 'POST',
                url: "<?php echo base_url() ?>/Notifikasi/listNotifikasi",
                success: function(response) {
                    $('.list-notif-chat').html(response);
                }
            })
        }else if(data.notif == "jamaah"){
            xhr = $.ajax({
                method: 'POST',
                url: "<?php echo base_url() ?>/Notifikasi/listNotifikasiJamaah",
                success: function(response) {
                    $('.list-notif-daftar').html(response);
                }
            })
        }
    });

    // $('.list-pemberitahuan').on('click', '.notifikasi', function(e) {
    //     console.log("Clicked");
    // });
</script>
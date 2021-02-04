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
                        <div class="page-header-subtitle">Detail Chat</div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container mt-n10">
        <div class="card mb-4">
            <div class="card-header">
                Chat Dari : <?php foreach($chatFrom as $data) echo $data->NAMALENGKAP?>
            </div>
            <div class="card-body">
                <div class="chat">
                    <?php foreach($chat as $data){?>
                    <?php if($data->ISADMIN == 1){?>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="float-right">&nbsp;
                                <div id="boxright">
                                    <p><?php echo $data->MESSAGE?></p>
                                </div>
                                <?php if($data->IMG != NULL){?>
                                <div>
                                    <img width="200px" src="<?php echo $data->IMG?>"/>
                                </div>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                    <?php }else{?>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="float-left">
                                <div id="boxleft">
                                    <p><?php echo $data->MESSAGE?></p>
                                </div>
                                <?php if($data->IMG != NULL){?>
                                <div>
                                    <img width="200px" src="<?php echo $data->IMG?>"/>
                                </div>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                    <?php }}?>
                    <br>
                </div><br>
                <div class="row">
                    <div class="col-md-12">
                        <form class="row" method="post" action="<?php echo base_url()?>Chat/adminKirimPesan">
                            <div class="col-12 col-sm pr-sm-0">
                                <input type="hidden" name="idChatRoom" value="<?php echo $data->ID_CHAT_ROOM?>" class="form-control">
                                <input type="hidden" name="userToken" value="<?php echo $data->USERTOKEN?>" class="form-control">
                                <input type="text" name="message" class="form-control" required>
                            </div>
                            <div class="col-12 col-sm-auto pl-sm-0">
                                <input type="submit" value="Kirim" class="btn btn-primary btn-block">
                            </div>
                        </form>
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
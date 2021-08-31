<a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownMessages" href="javascript:void(0);" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="fas fa-envelope"></i>&nbsp;
    <span class="badge badge-primary bg-primary"><?php echo $countMessage;?></span>
</a>
<div class="dropdown-menu dropdown-menu-right border-0 shadow animated--fade-in-up" aria-labelledby="navbarDropdownMessages">
    <h6 class="dropdown-header dropdown-notifications-header">
        <i class="mr-2" data-feather="mail"></i>&nbsp;
        Chat
    </h6>
    <?php 
        if($countMessage == 0){
    ?>
    <a class="dropdown-item dropdown-notifications-item notifikasi">
        Tidak Ada Chat
    </a>
    <?php }?>
    <?php 
        foreach($dataNotifChat as $data){
    ?>
    <a class="dropdown-item dropdown-notifications-item notifikasi" href="<?php echo base_url('Chat/detailChatNotif/'.$data->ID_CHAT_ROOM.'')?>">
        <img class="dropdown-notifications-item-img" src="<?php echo $data->FOTO?>" />
        <div class="dropdown-notifications-item-content">
            <div class="dropdown-notifications-item-content-text"><?php echo $data->MESSAGE?></div>
            <div class="dropdown-notifications-item-content-details"><?php echo $data->NAMALENGKAP?> &#xB7; <?php echo $data->CREATEDAT?></div>
        </div>
    </a>
    <?php }?>
    <a class="dropdown-item dropdown-notifications-footer" href="<?php echo base_url('Chat')?>">Lihat Semua Chat</a>
</div>
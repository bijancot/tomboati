<!DOCTYPE html>
<html lang="en">

<body>
    <nav class="topnav navbar navbar-expand shadow navbar-light bg-white" id="sidenavAccordion">
        <img class="navbar-brand-img ml-3" src="<?= base_url(); ?>assets/img/logo_tomboati.png"></img>
        <a class="navbar-brand" href="<?php echo site_url('umroh'); ?>"> Tombo Ati </a>
        <button class="btn btn-icon btn-transparent-dark order-1 order-lg-0 mr-lg-2 ml-0" id="sidebarToggle" href="assets/#"><i data-feather="menu"></i></button>
        <form class="form-inline mr-auto d-none d-md-block">
            <div class="input-group input-group-joined input-group-solid">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" />
                <div class="input-group-append">
                    <div class="input-group-text"><i data-feather="search"></i></div>
                </div>
            </div>
        </form>
        <ul class="navbar-nav align-items-center ml-auto">
            <li class="nav-item dropdown no-caret mr-3 dropdown-notifications">
                <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownAlerts" href="javascript:void(0);" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="bell"></i></a>
                <div class="dropdown-menu dropdown-menu-right border-0 shadow animated--fade-in-up" aria-labelledby="navbarDropdownAlerts">
                    <h6 class="dropdown-header dropdown-notifications-header">
                        <i class="mr-2" data-feather="bell"></i>
                        Alerts Center
                    </h6>
                    <a class="dropdown-item dropdown-notifications-item" href="#!">
                        <div class="dropdown-notifications-item-icon bg-warning"><i data-feather="activity"></i></div>
                        <div class="dropdown-notifications-item-content">
                            <div class="dropdown-notifications-item-content-details">December 29, 2019</div>
                            <div class="dropdown-notifications-item-content-text">This is an alert message. It&apos;s nothing serious, but it requires your attention.</div>
                        </div>
                    </a>
                    <a class="dropdown-item dropdown-notifications-footer" href="#!">View All Alerts</a>
                </div>
            </li>
            <li class="nav-item dropdown no-caret mr-3 dropdown-notifications list-notifikasi">
                <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownMessages" href="javascript:void(0);" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-envelope"></i>&nbsp;
                    <span class="badge badge-primary bg-primary"><?php echo $countMessage;?></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right border-0 shadow animated--fade-in-up" aria-labelledby="navbarDropdownMessages">
                    <h6 class="dropdown-header dropdown-notifications-header">
                        <i class="mr-2" data-feather="mail"></i>
                        Message Center 
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
                    <a class="dropdown-item dropdown-notifications-footer" href="<?php echo base_url('Chat')?>">Read All Messages</a>
                </div>
            </li>
            <li class="nav-item dropdown no-caret mr-2 dropdown-user">
                <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownUserImage" href="assets/javascript:void(0);" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="img-fluid"/> <i data-feather="user"></i></a>
                <div class="dropdown-menu dropdown-menu-right border-0 shadow animated--fade-in-up" aria-labelledby="navbarDropdownUserImage">
                    <h6 class="dropdown-header d-flex align-items-center">
                        <i data-feather="user"></i>
                        
                        <div class="dropdown-user-details">
                            <div class="dropdown-user-details-name">Mr. Fakhri Fahreza</div>
                        </div>
                    </h6>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo site_url('#'); ?>">
                        <div class="dropdown-item-icon"><i data-feather="settings"></i></div>
                        Account
                    </a>
                    <a class="dropdown-item" href="<?php echo site_url('#'); ?>">
                        <div class="dropdown-item-icon"><i data-feather="log-out"></i></div>
                        Logout
                    </a>
                </div>
            </li>
        </ul>
    </nav>
    
    <?php $this->load->view("template/script.php") ?>
</body>

</html>
<a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownMessages" href="javascript:void(0);" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="fas fa-bell"></i>&nbsp;
    <span class="badge badge-danger bg-danger"><?php echo ($countJamaahDaftar+$countJamaahBayar); ?></span>
</a>
<div class="dropdown-menu dropdown-menu-right border-0 shadow animated--fade-in-up" aria-labelledby="navbarDropdownAlerts">
    <h6 class="dropdown-header dropdown-notifications-header">
        <i class="mr-2" data-feather="bell"></i>
        Pemberitahuan
    </h6>
    <?php
    $countBayar = $this->db->select('*')->from('DETAIL_PEMBAYARAN')->where('ISSEEN', 0)->get()->num_rows();
    
    if ($countJamaahDaftar == 0 && $countBayar == 0) {
    ?>
        <a class="dropdown-item dropdown-notifications-item notifikasi">
            Tidak Ada Pemberitahuan
        </a>
        
        <?php }else if($countJamaahDaftar > 0 ){ ?>
        <a class="dropdown-item dropdown-notifications-item notifikasi" href="<?php echo site_url('Jamaah/notifJamaah'); ?>">
            <i class="fas fa-user"></i>&nbsp;&nbsp;
            <div class="dropdown-notifications-item-content">
                <div class="dropdown-notifications-item-content-text">Pendaftaran Jamaah</div>
                    <div class="dropdown-notifications-item-content-details">Terdapat <?php echo $countJamaahDaftar?> pendaftaran jamaah baru</div>
            </div>
        </a>
        
        <?php }else if( $countBayar > 0){ ?>
        <a class="dropdown-item dropdown-notifications-item notifikasi" href="<?php echo site_url('Pembayaran/notifPembayaran'); ?>">
            <i class="fas fa-user"></i>&nbsp;&nbsp;
            <div class="dropdown-notifications-item-content">
                <div class="dropdown-notifications-item-content-text">Pembayaran Jamaah</div>
                    <div class="dropdown-notifications-item-content-details">Terdapat <?php echo $countBayar?> pembayaran baru</div>
            </div>
        </a>
    <?php }?>                    
</div>
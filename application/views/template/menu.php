<div class="nav accordion" id="accordionSidenav">
    <a class="nav-link " href="<?php echo site_url('Dashboard'); ?>">
        <i class="fas fa-home ml-2 mr-3 fa-lg"></i>
        Dashboard
    </a>
    <a class="nav-link collapsed" href="javascript:void(0);" data-toggle="collapse" data-target="#collapseDashboards" aria-expanded="false" aria-controls="collapseDashboards">
        <i class="fas fa-mosque ml-2 mr-3 fa-lg"></i>
        Umroh
        <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
    </a>
    <div class="collapse" id="collapseDashboards" data-parent="#accordionSidenav">
        <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
            <a class="nav-link" href="<?php echo site_url('Umroh/paket/Promo'); ?>">
                <i class="fas fa-mosque ml-2 mr-2 fa-lg"></i>
                PROMO
            </a>
            <a class="nav-link" href="<?php echo site_url('Umroh/paket/Hemat'); ?>">
                <i class="fas fa-mosque ml-2 mr-2 fa-lg"></i>
                HEMAT
            </a>
            <a class="nav-link" href="<?php echo site_url('Umroh/paket/Bisnis'); ?>">
                <i class="fas fa-mosque ml-2 mr-2 fa-lg"></i>
                BISNIS
            </a>
            <a class="nav-link" href="<?php echo site_url('Umroh/paket/VIP'); ?>">
                <i class="fas fa-mosque ml-2 mr-2 fa-lg"></i>
                VIP
            </a>
            <a class="nav-link" href="<?php echo site_url('Umroh/paket/Plus'); ?>">
                <i class="fas fa-mosque ml-2 mr-2 fa-lg"></i>
                PLUS
            </a>
        </nav>
    </div>
    <a class="nav-link collapsed" href="javascript:void(0);" data-toggle="collapse" data-target="#collapseHaji" aria-expanded="false" aria-controls="collapseHaji">
        <i class="fas fa-kaaba ml-2 mr-3 fa-lg"></i>
        Haji
        <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
    </a>
    <div class="collapse" id="collapseHaji" data-parent="#accordionSidenav">
        <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
            <a class="nav-link" href="<?php echo site_url('Haji/paket/Reguler'); ?>">
                <i class="fas fa-kaaba ml-2 mr-2 fa-lg"></i>
                REGULER
            </a>
            <a class="nav-link" href="<?php echo site_url('Haji/paket/Plus'); ?>">
                <i class="fas fa-kaaba ml-2 mr-2 fa-lg"></i>
                PLUS
            </a>
            <a class="nav-link" href="<?php echo site_url('Haji/paket/TanpaAntri'); ?>">
                <i class="fas fa-kaaba ml-2 mr-2 fa-lg"></i>
                TANPA ANTRI
            </a>
            <a class="nav-link" href="<?php echo site_url('Haji/paket/Talangan'); ?>">
                <i class="fas fa-kaaba ml-2 mr-2 fa-lg"></i>
                TALANGAN
            </a>
            <a class="nav-link" href="<?php echo site_url('Haji/paket/Badal'); ?>">
                <i class="fas fa-kaaba ml-2 mr-2 fa-lg"></i>
                BADAL
            </a>
        </nav>
    </div>
    <a class="nav-link collapsed" href="javascript:void(0);" data-toggle="collapse" data-target="#collapseWisataHalal" aria-expanded="false" aria-controls="collapseWisataHalal">
        <i class="fas fa-route ml-2 mr-3 fa-lg"></i>
        Wisata Halal
        <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
    </a>
    <div class="collapse" id="collapseWisataHalal" data-parent="#accordionSidenav">
        <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
            <a class="nav-link" href="<?php echo site_url('WisataHalal/paket/Internasional'); ?>">
                <i class="fas fa-route ml-2 mr-2 fa-lg"></i>
                INTERNASIONAL
            </a>
            <a class="nav-link" href="<?php echo site_url('WisataHalal/paket/Nasional'); ?>">
                <i class="fas fa-route ml-2  mr-2 fa-lg"></i>
                NASIONAL
            </a>
            <a class="nav-link" href="<?php echo site_url('WisataHalal/paket/ZiarahWali'); ?>">
                <i class="fas fa-route ml-2 mr-2 fa-lg"></i>
                ZIARAH WALI
            </a>
        </nav>
    </div>
    <a class="nav-link collapsed" href="javascript:void(0);" data-toggle="collapse" data-target="#collapseContent" aria-expanded="false" aria-controls="collapseContent">
        <i class="fas fa-pager ml-2 mr-3 fa-lg"></i>
        Content
        <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
    </a>
    <div class="collapse" id="collapseContent" data-parent="#accordionSidenav">
        <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
            <a class="nav-link " href="<?php echo site_url('news'); ?>">
                <i class="fa fa-newspaper ml-2 mr-3 fa-lg"></i>
                News
            </a>
            <a class="nav-link " href="<?php echo site_url('Komunitas'); ?>">
                <i class="fa fa-users ml-2 mr-3 fa-lg"></i>
                Komunitas
            </a>
            <a class="nav-link " href="<?php echo site_url('KataMutiara'); ?>">
                <i class="fa fa-book-open ml-2 mr-3 fa-lg"></i>
                Kata-Kata Mutiara
            </a>
        </nav>
    </div>
    <a class="nav-link " href="<?php echo site_url('User'); ?>">
        <i class="fas fa-user-alt ml-2 mr-3 fa-lg"></i>
        User
    </a>

    <a class="nav-link " href="<?php echo site_url('Jamaah'); ?>">
        <i class="fas fa-user-check ml-2 mr-2 fa-lg"></i>
        Jamaah
    </a>

    <a class="nav-link" href="<?php echo site_url('Pembayaran'); ?>">
        <i class="fas fa-dollar-sign ml-3 mr-3 fa-lg"></i>
        Pembayaran
    </a>

    <a class="nav-link " href="<?php echo site_url('Chat'); ?>">
        <i class="fas fa-inbox ml-2 mr-3 fa-lg"></i>
        Chat
    </a>

    <a class="nav-link " href="<?php echo site_url('Pengumuman'); ?>">
        <i class="fas fa-bullhorn ml-2 mr-3 fa-lg"></i>
        Pengumuman
    </a>
</div>
<div class="sidenav-footer">
    <div class="sidenav-footer-content">
        <div class="sidenav-footer-subtitle">Login Sebagai:</div>
        <div class="sidenav-footer-title">Admin</div>
    </div>
</div>
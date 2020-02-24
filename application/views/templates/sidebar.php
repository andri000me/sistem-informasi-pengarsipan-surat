<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('') ?>">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-envelope"></i>
        </div>
        <div class="sidebar-brand-text mx-3">E-Arsip <br>SMK Darel Hikmah</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('admin') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Data Master
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item 
    <?php if (current_url() == base_url('admin/suratmasuk') or current_url() == base_url('admin/suratkeluar')) {
        echo 'active';
    } ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-envelope"></i>
            <span>Surat</span>
        </a>
        <div id="collapseTwo" class="collapse 
        <?php if (current_url() == base_url('admin/suratmasuk') or current_url() == base_url('admin/suratkeluar')) {
            echo 'show';
        } ?>" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">List:</h6>
                <a class="collapse-item 
                <?php if (current_url() == base_url('admin/suratmasuk')) {
                    echo 'active';
                } ?>" href="<?php echo base_url('admin/suratmasuk') ?>">Surat Masuk</a>
                <a class="collapse-item 
                <?php if (current_url() == base_url('admin/suratkeluar')) {
                    echo 'active';
                } ?>" href="<?php echo base_url('admin/suratkeluar') ?>">Surat Keluar</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item 
    <?php if (current_url() == base_url('admin/indeks') OR current_url() == base_url('admin/users') OR current_url() == base_url('admin/profil')) {
        echo 'active';
    } ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-cog"></i>
            <span>Pengaturan</span>
        </a>
        <div id="collapseUtilities" class="collapse 
        <?php if (current_url() == base_url('admin/indeks') or current_url() == base_url('admin/users') or current_url() == base_url('admin/profil')) {
            echo 'show';
        } ?>" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">List:</h6>
                <a class="collapse-item 
                <?php if($user == 'superadmin'): ?>
                    <?php if (current_url() == base_url('admin/indeks')) {
                        echo 'active';
                    } ?>" href="<?php echo base_url('admin/indeks') ?>">Indeks</a>
                    <a class="collapse-item 
                    <?php if (current_url() == base_url('admin/users')) {
                        echo 'active';
                    } ?>" href="<?php echo base_url('admin/users') ?>">Users</a>
                <?php endif; ?>
                <a class="collapse-item 
                <?php if (current_url() == base_url('admin/profil')) {
                    echo 'active';
                } ?>" href="<?php echo base_url('admin/profil') ?>">Profil</a>
            </div>
        </div>
    </li>

    <li class="nav-item 
    <?php if (current_url() == base_url('admin/laporan_suratmasuk') or current_url() == base_url('admin/laporan_suratkeluar')) {
        echo 'active';
    } ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLaporan" aria-expanded="true" aria-controls="collapseLaporan">
            <i class="fas fa-fw fa-file-pdf"></i>
            <span>Laporan</span>
        </a>
        <div id="collapseLaporan" class="collapse 
        <?php if (current_url() == base_url('admin/laporan_suratmasuk') or current_url() == base_url('admin/laporan_suratkeluar')) {
            echo 'show';
        } ?>" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">List:</h6>
                <a class="collapse-item 
                <?php if (current_url() == base_url('admin/laporan_suratmasuk')) {
                    echo 'active';
                } ?>" href="<?php echo base_url('admin/laporan_suratmasuk') ?>">Laporan Surat Masuk</a>
                <a class="collapse-item 
                <?php if (current_url() == base_url('admin/laporan_suratkeluar')) {
                    echo 'active';
                } ?>" href="<?php echo base_url('admin/laporan_suratkeluar') ?>">Laporan Surat Keluar</a>
            </div>
        </div>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Lainnya
    </div>

    <!-- Nav Item - Charts -->
    <li class="nav-item 
    <?php if (current_url() == base_url('admin/about')) {
        echo 'active';
    } ?>">
        <a class="nav-link" href="<?= base_url('admin/about') ?>">
            <i class="fas fa-fw fa-info-circle"></i>
            <span>Tentang Sekolah</span>
        </a>
    </li>
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
<!-- End of Sidebar -->
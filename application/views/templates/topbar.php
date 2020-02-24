<?php
if ($this->session->userdata('level') == 1) {
    $user = 'superadmin';
} elseif ($this->session->userdata('level') == 2) {
    $user = 'admin';
}
?>
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <!-- Nav Item - Messages -->
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                <!-- Counter - Messages -->
                <span class="badge badge-danger badge-counter">
                    <?php
                    $today = date('Y-m-d');
                    $additional = "tanggal_diterima = '$today'";
                    $count_today = $this->model_surat->countdatawithadd('suratmasuk', $additional)->result();
                    foreach ($count_today as $t) {
                        echo $t->total;
                    } ?></span>
            </a>
            <!-- Dropdown - Messages -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                    Surat Masuk Terbaru, <?php echo date('d/m/Y') ?>
                </h6>
                <?php
                $sm_today_add = "tanggal_diterima='$today'";
                $sm_today = $this->model_surat->getdatawithadd('suratmasuk', $sm_today_add)->result();
                foreach ($sm_today as $smt) : ?>
                    <a class="dropdown-item d-flex align-items-center" href="#">
                        <div class="font-weight-bold">
                            <div class="text-truncate"><?php echo $smt->no_suratmasuk ?> - <?php echo $smt->judul_suratmasuk ?>.</div>
                            <div class="small text-gray-500">
                                <?php echo $smt->asal_surat ?> ·
                                <?php $date = date_create($smt->tanggal_masuk);
                                echo date_format($date, 'd/m/Y'); ?></div>
                        </div>
                    </a>
                <?php endforeach; ?>
                <a class="dropdown-item text-center small text-gray-500" href="<?= base_url('admin/suratmasuk') ?>">Tampilkan Lebih...</a>
            </div>
        </li>

        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo strtoupper($user); ?></span>
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
            </div>
        </li>

    </ul>

</nav>
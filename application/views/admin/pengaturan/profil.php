<div id="wrapper">

    <!-- Sidebar -->
    <?php $this->load->view('templates/sidebar'); ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <?php $this->load->view('templates/topbar'); ?>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <h1 class="h3 mb-4 text-gray-800">Profil saya</h1>
                <div class="card card-success">
                    <div class="card-body">
                        <?= $this->session->flashdata('message'); ?>
                        <br>
                        <div class="row">
                            <div class="col-lg-12 text-center">
                                <div class="well well-sm">
                                    <div class="row">
                                        <?php foreach ($profil as $p) : ?>
                                            <img src="<?= base_url('vendor/files/profilimg/' . $p->image) ?>" alt="User profil" height="200" class="img-rounded img-responsive" />
                                            <div class="col-md-6">
                                                <h4>
                                                    <?= $p->nama_lengkap ?></h4>
                                                <p>
                                                    <span id="bio">Bio : <?php if ($p->bio == null) {
                                                                                echo '-';
                                                                            } else {
                                                                                echo $p->bio;
                                                                            } ?></span>
                                                </p>
                                                <hr>
                                                <p>
                                                    <div class="social">
                                                        <a href="<?= $p->facebook ?>" target="_blank" title="Facebook"><i class="fa-2x fab fa-facebook"></i></a>
                                                        &nbsp;
                                                        <a href="mailto:<?= $p->email ?>" target="_blank" title="email"><i class="fa-2x fas fa-envelope"></i></a>
                                                    </div>
                                                </p>
                                                <div class="editprofil">
                                                    <a href="#" data-id_user="<?= $p->id_user ?>" data-toggle="modal" data-target="#editprofil" class="btn btn-primary btn-flat"><i class="fas fa-edit"></i> Edit profil</a>
                                                    <a href="#" data-id_user="<?= $p->id_user ?>" data-toggle="modal" data-target="#gantipassword" class="btn btn-primary btn-flat"><i class="fas fa-key"></i> Ganti password</a>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->
        <!-- modal tambah -->
        <?php $this->load->view('admin/ekstra/modal'); ?>
        <!-- Footer -->
        <?php $this->load->view('templates/copyright') ?>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>s
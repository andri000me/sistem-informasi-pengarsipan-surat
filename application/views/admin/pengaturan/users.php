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
                <h1 class="h3 mb-4 text-gray-800">Indeks</h1>
                <div class="card card-success">
                    <div class="card-body">
                        <?= $this->session->flashdata('message'); ?>
                        <div class="row">
                            <?php if ($user == 'superadmin') { ?>
                                <div class="col-md-3">
                                    <button class="btn btn-primary btn-flat btn-block" data-toggle="modal" data-target="#adduser"><i class="fas fa-plus"></i> Tambah user </button>
                                </div>
                            <?php } else { ?>
                            <?php } ?>
                        </div>
                        <br>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Lengkap</th>
                                        <th>Username</th>
                                        <th>Level</th>
                                        <?php if ($user == 'superadmin') { ?><th>Aksi</th><?php } else {
                                                                                        } ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($users as $u) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $u->nama_lengkap; ?></td>
                                            <td><?= $u->username; ?></td>
                                            <td><?php
                                                if ($u->level == 1) {
                                                    echo 'Superadmin';
                                                } else {
                                                    echo 'Admin';
                                                }
                                                ?>
                                            </td>
                                            <?php if ($user == 'superadmin') { ?>
                                                <td>
                                                    <?php if ($u->id_user == $this->session->userdata('id_user')) { ?>

                                                    <?php } else { ?>
                                                        <a href="#" data-id-user="<?= $u->id_user ?>" data-nama-lengkap="<?= $u->nama_lengkap ?>" data-toggle="modal" data-target="#hapususer" class="badge badge-danger d-block">hapus</a><br>
                                                        <?php if ($u->level == "2") { ?>
                                                            <a href="<?= base_url('admin/ubahlevel/1/' . $u->id_user) ?>" data-level="<?= $u->level ?>" class="badge badge-info d-block">Jadikan Super Admin</a>
                                                        <?php } else { ?>
                                                            <a href="<?= base_url('admin/ubahlevel/2/' . $u->id_user) ?>" data-level="<?= $u->level ?>" class="badge badge-info d-block">Jadikan Admin</a>
                                                        <?php } ?>
                                                    <?php } ?>
                                                </td>
                                            <?php } else {
                                            } ?>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
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
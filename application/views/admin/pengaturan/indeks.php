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
                            <div class="col-md-auto">
                                <button class="btn btn-primary" data-toggle="modal" data-target="#addindeks">Tambah indeks</button>
                            </div>
                        </div>
                        <br>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Kode Indeks</th>
                                        <th>Nama Indeks</th>
                                        <th>Detail</th>
                                        <?php if ($user == 'superadmin') { ?>
                                            <th>Aksi</th>
                                        <?php } else {
                                        } ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($indeks as $i) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $i->kode_indeks; ?></td>
                                            <td><?= $i->judul_indeks; ?></td>
                                            <td><?= '<div class=text-justify>' . $i->detail . '</div>'; ?></td>
                                            <?php if ($user == 'superadmin') { ?>
                                                <td>
                                                    <!-- <a href="javascript:;" data-id-indeks="<?= $i->id_indeks ?>" data-kode-indeks="<?php echo $i->kode_indeks ?>" data-judul-indeks="<?php echo $i->judul_indeks ?>" data-detail='<?php echo $i->detail ?>' data-toggle="modal" data-target="#ubahindeks"><span class="badge badge-primary d-block">Edit</span></a> -->
                                                    <a href="javascript:;" data-id-indeks="<?= $i->id_indeks ?>" data-toggle="modal" data-target="#ubahindeks"><span class="badge badge-primary d-block">Edit</span></a>
                                                    <br>

                                                    <a href="#" data-id-indeks="<?= $i->id_indeks ?>" data-judul-indeks="<?= $i->judul_indeks ?>" data-toggle="modal" data-target="#hapusindeks"><span class="badge badge-danger d-block">Hapus</span></a><br>
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
        <?php $this->load->view('admin/ekstra/modal') 
        ?>
        <!-- Footer -->
        <?php $this->load->view('templates/copyright') ?>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>

<script>

</script>
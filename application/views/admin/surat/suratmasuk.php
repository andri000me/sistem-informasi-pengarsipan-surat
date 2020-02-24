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
                <h1 class="h3 mb-4 text-gray-800">Surat Masuk</h1>
                <div class="card card-success">
                    <div class="card-body">
                        <?= $this->session->flashdata('message'); ?>
                        <div class="row">
                            <?php if ($user == 'superadmin') { ?>
                                <div class="col-md-3">
                                    <button class="btn btn-primary btn-flat btn-block" data-toggle="modal" data-target="#addsm"><i class="fas fa-plus"></i> Tambah data </button>
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
                                        <th>Nomor Surat</th>
                                        <th>Judul Surat</th>
                                        <th>Indeks</th>
                                        <th>Asal Surat</th>
                                        <th>Tanggal Masuk</th>
                                        <th>Tanggal Diterima</th>
                                        <th>Keterangan</th>
                                        <th>Berkas</th>
                                        <?php if ($user == 'superadmin') { ?><th>Aksi</th><?php } else {
                                                                                        } ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($suratmasuk as $sm) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $sm->no_suratmasuk; ?></td>
                                            <td><?= $sm->judul_suratmasuk; ?></td>
                                            <td><?= $sm->judul_indeks; ?></td>
                                            <td><?= $sm->asal_surat; ?></td>
                                            <td><?php $date = date_create($sm->tanggal_masuk);
                                                echo date_format($date, 'd/m/Y'); ?></td>
                                            <td><?php $date = date_create($sm->tanggal_diterima);
                                                echo date_format($date, 'd/m/Y'); ?></td>
                                            <td><?= $sm->keterangan; ?></td>
                                            <td><a href="<?php if ($sm->berkas_suratmasuk != "") {
                                                                echo base_url('admin/download/suratmasuk/' . $sm->berkas_suratmasuk);
                                                            } elseif ($sm->berkas_suratmasuk == "") {
                                                                echo '#';
                                                            }  ?>" class="text-success"><i class="fas fa-download"></i></a></i></a></td>
                                            <?php if ($user == 'superadmin') { ?>
                                                <td>
                                                    <a href="#" data-toggle="modal" data-target="#ubahsm" data-id-suratmasuk="<?= $sm->id_suratmasuk ?>"><span class="badge badge-primary d-block">edit</span></a>
                                                    <div class="modal fade" id="ubahsm">
                                                        <div class="modal-dialog modal-lg">
                                                            <div id="dataubahsm"></div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <a href="<?= base_url('admin/disposisi/' . $sm->id_suratmasuk) ?>"><span class="badge badge-warning d-block">diposisi</span></a>
                                                    <br>
                                                    <a href="#" data-id-suratmasuk="<?php echo $sm->id_suratmasuk; ?>" data-no-suratmasuk="<?php echo $sm->no_suratmasuk; ?>" data-toggle="modal" data-target="#hapussm"><span class="badge badge-danger d-block">Hapus</span></a>
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

</div>
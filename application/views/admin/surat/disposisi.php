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
                <h1 class="h3 mb-4 text-gray-800">Disposisi #<?php echo $suratmasuk[0]->no_suratmasuk ?></h1>
                <div class="card">
                    <div class="card-body">
                        <?= $this->session->flashdata('message'); ?>
                        <div class="row">
                            <div class="col-12"><br></div>
                            <div class="col-12">
                                <div class="callout callout-success">
                                    <?php foreach ($suratmasuk as $js) : ?>
                                        <h3><i class="fas fa-file-alt"></i> PERIHAL SURAT : <span class="text-danger"><?php echo $js->judul_suratmasuk; ?></span>
                                            <button type="button" class="btn btn-primary float-sm-right" data-id-suratmasuk="<?= $js->judul_suratmasuk ?>" data-toggle="modal" data-target="#tambahdisp"><i class="fas fa-plus"></i>&nbsp;&nbsp;&nbsp;<span>Tambah Disposisi</span></button>
                                            <?php
                                            $data['id_suratmasuk'] = $js->id_suratmasuk;
                                            $this->load->view('admin/ekstra/modal', $data); ?>
                                        <?php endforeach; ?>
                                </div>
                                <!-- /.card-body -->
                                <br>
                                <div class="table-responsive">
                                    <table id="tabeldisposisi" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Pengisi Disposisi</th>
                                                <th>Diteruskan Kepada</th>
                                                <th>Catatan</th>
                                                <th>Instruksi/Informasi</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1; ?>
                                            <?php foreach ($disposisi as $ds) : ?>
                                                <tr>
                                                    <td><?php echo $no++; ?></td>
                                                    <td><?php echo $ds->pengisi; ?></td>
                                                    <td><?php echo $ds->tujuan; ?></td>
                                                    <td><?php echo $ds->catatan; ?></td>
                                                    <td><?php echo $ds->instruksi; ?></td>
                                                    <td>
                                                        <a href="#" data-toggle="modal" data-target="#cetakdisp" data-id_disposisi="<?php echo $ds->id_disposisi ?>" class="badge badge-success d-block">cetak</a>
                                                        <br>
                                                        <a href="#" data-toggle="modal" data-target="#editdisp" data-id_disposisi="<?php echo $ds->id_disposisi ?>" class="badge badge-primary d-block">edit</a>
                                                        <br>
                                                        <a href="#" data-toggle="modal" data-target="#hapusdisp" data-id_disposisi="<?php echo $ds->id_disposisi ?>" class="badge badge-danger d-block">hapus</a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- add button, print, and table -->
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->
        <!-- modal tambah -->
        <!-- Footer -->
        <?php $this->load->view('templates/copyright') ?>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
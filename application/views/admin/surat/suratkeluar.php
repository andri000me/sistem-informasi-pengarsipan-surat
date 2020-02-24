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
                <h1 class="h3 mb-4 text-gray-800">Surat Keluar</h1>
                <div class="card card-success">
                    <div class="card-body">
                        <?= $this->session->flashdata('message'); ?>
                        <div class="row">
                            <?php if ($user == 'superadmin') { ?>
                                <div class="col-md-3">
                                    <button class="btn btn-primary btn-flat btn-block" id="tambah" data-toggle="modal" data-target="#addsk"><i class="fas fa-plus"></i> Tambah data </button>
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
                                        <th>Tujuan</th>
                                        <th>Tanggal Keluar</th>
                                        <th>Keterangan</th>
                                        <th>Berkas</th>
                                        <?php if ($user == 'superadmin') { ?>
                                            <th>Aksi</th>
                                        <?php } else {
                                        } ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($suratkeluar as $sk) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $sk->no_suratkeluar; ?></td>
                                            <td><?= $sk->judul_suratkeluar; ?></td>
                                            <td><?= $sk->judul_indeks; ?></td>
                                            <td><?= $sk->tujuan; ?></td>
                                            <td><?php $date = date_create($sk->tanggal_keluar);
                                                echo date_format($date, 'd/m/Y'); ?></td>
                                            <td><?= $sk->keterangan; ?></td>
                                            <td><a href="<?php if ($sk->berkas_suratkeluar != "") {
                                                                echo base_url('admin/download/suratkeluar/' . $sk->berkas_suratkeluar);
                                                            } elseif ($sk->berkas_suratkeluar == "") {
                                                                echo '#';
                                                            }  ?>" class="text-success"><i class="fas fa-download"></i></a></i></a>
                                            </td>
                                            <?php if ($user == 'superadmin') { ?>
                                                <td>
                                                    <a href="javascript:;" data-id-sk="<?php echo $sk->id_suratkeluar ?>" data-toggle="modal" data-target="#ubahsk" class="badge badge-primary d-block">edit</a>
                                                    <br>
                                                    <a href="javascript:;" data-id-sk="<?php echo $sk->id_suratkeluar ?>" data-no-suratkeluar=<?php echo $sk->no_suratkeluar ?> data-toggle="modal" data-target="#hapussk" class="badge badge-danger d-block">hapus</a>
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
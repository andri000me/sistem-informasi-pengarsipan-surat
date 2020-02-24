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
                                                    <a href="#" data-id-indeks="<?= $i->id_indeks ?>" data-toggle="modal" data-target="#ubahindeks"><span class="badge badge-info d-block">Edit</span></a><br>

                                                    <a href="<?= base_url('admin/hapusindeks/' . $i->id_indeks) ?>" onclick="return confirm('Hapus?')"><span class="badge badge-danger d-block">Hapus</span></a>
                                                    <!-- modal hapus -->
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
        <?php $this->load->view('admin/ekstra/modal') ?>
        <!-- Footer -->
        <?php $this->load->view('templates/copyright') ?>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>

<script src="<?php echo base_url('vendor/') ?>vendor/jquery/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#ubahindeks').on('show.bs.modal', function(e) {
          var id_indeks = $(e.relatedTarget).data('id-indeks');

          $.ajax({
            type: 'post',
            url: 'http://localhost/e-arsip_sb/admin/ajaxindeks',
            data: 'id_indeks=' + id_indeks,
            success: function(data) {
              $('.fetched-data').html(data);
            }
          });
        });
    });
</script>
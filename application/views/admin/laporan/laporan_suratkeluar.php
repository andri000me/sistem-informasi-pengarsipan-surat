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
                <h1 class="h3 mb-4 text-gray-800">Laporan Surat Keluar</h1>
                <div class="card card-success">
                    <div class="card-body">
                        <?= $this->session->flashdata('message'); ?>
                        <div class="row">
                            <div class="col-md-4">
                                <a href="#" id="cetaklaporansk" class="btn btn-success btn-block"><i class="fas fa-print"></i> Cetak laporan</a>
                            </div>
                            <div class="col-md-4">
                                <form action="<?php echo base_url('admin/laporan_suratkeluar') ?>" method="GET">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <select class="form-control" id="filter-index-sk" name="id_index">
                                                <option value="">Filter indeks</option>
                                                <?php foreach ($indeks as $i) : ?>
                                                    <option value="<?php echo $i->id_indeks ?>"><?php echo $i->judul_indeks; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-4">
                                <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle btn-block" type="button" id="filterTanggal" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Filter tanggal
                                    </button>
                                    <?php if (isset($_GET['filter-tanggal'])) { ?>
                                        <a href="<?php echo base_url('admin/laporan_suratkeluar') ?>" class="btn btn-info text-white btn-block"><i class="fas fa-eye" title="Tampilkan semua"></i> Tampilkan semua</a>
                                    <?php } ?>
                                    <div class="dropdown-menu lg" aria-labelledby="dropdownMenuButton">
                                        <form action="<?php echo base_url('admin/laporan_suratkeluar') ?>" method='GET'>
                                            <div class="form-group">
                                                <label for="">start</label>
                                                <input type="date" class="form-control" name="tanggal_awal">
                                            </div>
                                            <div class="form-group">
                                                <label for="">end</label>
                                                <input type="date" class="form-control" name="tanggal_akhir">
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" name="filter-tanggal" class="btn btn-primary btn-block"><i class="fas fa-filter"></i>Filter</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="lapsuratkeluar" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nomor Surat</th>
                                        <th>Judul Surat</th>
                                        <th>Indeks</th>
                                        <th>Tujuan</th>
                                        <th>Tanggal Keluar</th>
                                        <th>Keterangan</th>
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
        <!-- Footer -->
        <?php $this->load->view('templates/copyright') ?>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
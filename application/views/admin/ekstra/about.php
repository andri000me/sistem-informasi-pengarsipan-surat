<div id="wrapper">

    <!-- Sidebar -->
    <?php $this->load->view('templates/sidebar') ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <?php $this->load->view('templates/topbar') ?>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col text-center m-5">
                                <img src="<?= base_url('vendor/') ?>img/logo.jpg" width="100"><br><small><i>Logo SMK Darel Hikmah</i></small><br><br>
                                <p style="text-align: justify;">SMK Darel Hikmah terletak di wilayah Kotamadya Pekanbaru, sekitar 12 km dari pusat kota Pekanbaru ke arah Barat. Dengan menempati lahan seluas 4,5 ha. Sekolah ini didirikan di atas lahan milik H. Abdullah yang strategis karena berdekatan dengan lembaga pendidikan lain seperti Universitas Riau (UNRI) sebelah barat, dan Universitas Islam Negeri Sultan Syarif Kasim (UIN SUSKA) sebelah selatan.
                                    Atas persetujuan Walikota Pekanbaru dan Gubernur Riau pada tahun 1991, dibangun ruangan gedung untuk fasilitas pendidikan dan asrama yang dikelola oleh Yayasan Nur Iman Pekanbaru.
                                </p>
                            </div>
                            <div class="col m-5">
                                <center>
                                    <h4>Visi dan Misi</h4>
                                </center>
                                <h3>Visi</h3>
                                <p>Visi Sekolah adalah imajinasi moral yang dijadikan dasar atau rujukan dalam menentukan tujuan atau keadaan masa depan sekolah yang secara khusus diharapkan oleh Sekolah. Visi Sekolah merupakan turunan dari Visi Pendidikan Nasional, yang dijadikan dasar atau rujukan untuk merumuskan Misi, Tujuan sasaran untuk pengembangan sekolah dimasa depan yang diimpikan dan terus terjaga kelangsungan hidup dan perkembangannya.
                                    Adapaun visi SMK Darel Hikmah : <b>Aktif</b>, <b>Kreatif</b>, <b>Antusias</b>, <b>Bersih</b> dan <b>Religius</b> (<b>AKBAR</b>).
                                </p>
                                <h3>Misi</h3>
                                <ol>
                                    <li>Mendorong aktifitas dan kreatifitas secara optimal kepada seluruh komponen sekolah terutama para siswa.</li>
                                    <li>Mengoptimalkan pembelajaran dalam rangka meningkatkan keterampilan siswa supaya mereka memiliki prestasi yang dapat dibanggakan.</li>
                                    <li>Melaksanakan pembelajaran dan bimbingan secara efektif sehingga kecerdasan siswa terus diasah agar terciptanya kecerdasan intelektual dan emosional yang mantap.</li>
                                    <li>Antusias terhadap perkembangan dan kemajuan ilmu pengetahuan dan teknologi.</li>
                                    <li>Menanamkan cinta kebersihan dan keindahan kepada semua komponen sekolah.</li>
                                    <li>Menimbulkan penghayatan yang dalam dan pengalaman yang tinggi terhadap ajaran agama (Religi) sehingga tercipta kematangan dalam berfikir dan bertindak.</li>
                                </ol>
                            </div>
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
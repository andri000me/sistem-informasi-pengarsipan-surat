<!-- surat masuk -->
<div class="modal fade" id="addsm">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>
                    <?php
                    echo form_open_multipart('admin/tambahsm');
                    ?>
                    <div class="card-body row">
                        <div class="col-md">
                            <div class="form-group">
                                <label>No. Surat</label>
                                <?php $today = date('d,m,Y');
                                $pecah = explode(',', $today);
                                $bulan = $pecah[1];
                                $tahun = $pecah[2]; ?>
                                <input type="text" name="no_suratmasuk" class="form-control" value="<?php echo uniqid(); ?>">
                            </div>
                            <div class="form-group">
                                <label>Judul Surat Masuk</label>
                                <input type="text" name="judul_suratmasuk" class="form-control" placeholder="Judul Surat" required="">
                            </div>
                            <div class="form-group">
                                <label>Asal Surat</label>
                                <input type="text" name="asal_surat" class="form-control" placeholder="Asal Surat" required="">
                            </div>
                            <div class="form-group">
                                <label>Dokumen surat</label>
                                <div class="input-group">
                                    <div class="custom-file">s
                                        <input type="file" name="berkas_suratmasuk" class="custom-file-input">
                                        <label class="custom-file-label">Pilih dokumen</label>
                                    </div>
                                </div>
                                <small class="text-danger">Dokumen surat, bisa berupa doc, docx, pdf, jpg dan png.</small>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label>Tanggal Masuk:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="date" name="tanggal_masuk" value="<?php echo date('Y-m-d') ?>" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Diterima:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="date" name="tanggal_diterima" value="<?php echo date('Y-m-d') ?>" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Index Surat</label>
                                <select class="form-control" name="id_indeks">
                                    <?php foreach ($indeks as $i) : ?>
                                        <option value="<?php echo $i->id_indeks; ?>">
                                            <?php echo strtoupper($i->judul_indeks); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Keterangan</label>
                                <textarea class="form-control" name="keterangan" placeholder="Keterangan"></textarea>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="tambahdisp">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form role="form" action="<?= base_url('admin/tambahdisposisi') ?>" method="POST" enctype="multipart/form-data">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="hidden" name="id_suratmasuk" id="id_sm" value="<?php if (isset($id_suratmasuk)) { echo $id_suratmasuk; } ?>">
                                <div class="form-group">
                                    <label>Pengisi disposisi</label>
                                    <select name="pengisi" id="pengisi" class="form-control" required>
                                        <option value="">-- Pilih --</option>
                                        <option value="Kepala Sekolah">Kepala Sekolah</option>
                                        <option value="Staff Tata Usaha">Staff Tata Usaha</option>
                                        <option value="Wakil Kurikulum">Wakil Kurikulum</option>
                                    </select>
                                    <small><span class="text-danger text-small" id="alertpengisi"></span></small>
                                </div>
                                <div class="form-group">
                                    <label>Diteruskan kepada</label>
                                    <input type="text" name="tujuan" id="tujuan" class="form-control" placeholder="Tujuan" required="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Instruksi/Informasi</label>
                                    <input type="text" name="instruksi" class="form-control" placeholder="Instruksi/Informasi diisi terlebih dahulu oleh pengisi disposisi" disabled="">
                                </div>
                                <div class="form-group">
                                    <label>Catatan</label>
                                    <textarea name="catatan" class="form-control" placeholder="Catatan"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="editdisp">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div id="ajaxeditdisp"></div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="hapusdisp">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Lanjutkan?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Pilih tombol 'hapus' untuk menghapus disposisi ini </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                <a href="" class="btn btn-danger" id="hps-id-disposisi">Hapus</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="cetakdisp">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div id="modalcetakdisp" class="modal-body">
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                <button type="submit" id="btncetakdisp" name="tambah" class="btn btn-success">Cetak</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="hapussm">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Lanjutkan?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Pilih tombol 'hapus' untuk menghapus surat <span id="hps-no-suratmasuk"></span> ? </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                <a class="btn btn-danger" id="hps-id-suratmasuk">Hapus</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- surat masuk -->

<div class="modal fade" id="addsk">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>
                    <form role="form" action="<?= base_url('admin/tambahsk') ?>" method="post" enctype="multipart/form-data">
                        <div class="card-body row">
                            <div class="col-md">
                                <div class="form-group">
                                    <label>No. Surat</label>
                                    <?php $today = date('d,m,Y');
                                    $pecah = explode(',', $today);
                                    $bulan = $pecah[1];
                                    $tahun = $pecah[2]; ?>
                                    <input type="text" name="no_suratkeluar" class="form-control" value=".../SMK-DH/H-<?php echo $bulan; ?>/<?php echo $tahun; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Judul Surat Keluar</label>
                                    <input type="text" name="judul_suratkeluar" class="form-control" placeholder="Judul Surat">
                                </div>
                                <div class="form-group">
                                    <label>Tujuan</label>
                                    <input type="text" name="tujuan" class="form-control" placeholder="Tujuan">
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-group">
                                    <label>Tanggal Keluar:</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="date" name="tanggal_keluar" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask value="<?php echo date('Y-m-d') ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Jenis Surat</label>
                                    <select class="form-control" name="id_indeks">
                                        <?php foreach ($indeks as $i) : ?>
                                            <option value="<?php echo $i->id_indeks; ?>">
                                                <?php echo strtoupper($i->judul_indeks); ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Dokumen surat</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="berkas_suratkeluar" class="custom-file-input" id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">Pilih dokumen</label>
                                        </div>
                                    </div>
                                    <small class="text-danger">Dokumen surat, bisa berupa doc, docx, pdf, jpg dan png.</small>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Keterangan</label>
                                    <textarea class="form-control" name="keterangan" placeholder="Keterangan"></textarea>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                </p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<div class="modal fade" id="ubahsk">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div id="dataubahsk"></div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="hapussk">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Lanjutkan?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Pilih tombol 'hapus' untuk menghapus surat <span id="hps-no-suratkeluar"></span> ? </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                <a href="" class="btn btn-danger" id="hps-id-suratkeluar">Hapus</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- indeks -->
<div class="modal fade" id="addindeks">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>
                    <form role="form" action="<?= base_url('admin/tambahindex') ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="">Kode Indeks</label>
                            <div class="input-group">
                                <input type="text" name="kode_index" maxlength="5" class="form-control" placeholder="Kode Indeks..." required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Nama Indeks</label>
                            <div class="input-group">
                                <input type="text" name="judul_index" class="form-control" placeholder="Nama Indeks..." required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Detail</label>
                            <textarea name="detail" id="" required class="form-control" rows="5" placeholder="Tambah detail dipisah dengan koma (contoh: undangan rapat, undangan pegawai, dll.. / ketik \'-' jika detail kosong"></textarea>
                        </div>
                </p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="ubahindeks" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div id="dataubahindeks"></div>
        </div>
    </div>
</div>

<div class="modal fade" id="hapusindeks">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Lanjutkan?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Pilih tombol 'hapus' untuk menghapus indeks <span id="hps-judul-indeks"></span> ? </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                <a class="btn btn-danger" id="hps-id-indeks">Hapus</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- indeks -->


<div class="modal fade" id="adduser">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>
                    <form role="form" action="<?= base_url('admin/tambahuser') ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="">Nama lengkap</label>
                            <div class="input-group">
                                <input type="text" name="nama_lengkap" autocapitalize="true" class="form-control" placeholder="Nama lengkap..." required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Username</label>
                            <div class="input-group">
                                <input type="text" name="username" class="form-control" placeholder="Username..." required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <div class="input-group">
                                <input type="password" id="password" autocomplete="off" name="password" class="form-control" placeholder="Password..." required>
                            </div>
                            <span class="text-danger" id="passwordvalidasi"></span>
                        </div>
                        <div class="form-group">
                            <label for="">Konfirmasi password</label>
                            <div class="input-group">
                                <input type="password" id="password2" autocomplete="off" name="password2" class="form-control" placeholder="Password..." required>
                            </div>
                            <span class="text-danger" id="passwordvalidasi"></span>
                        </div>
                        <div class="form-group">
                            <label for="">Level</label>
                            <select class="form-control" name="level" id="">
                                <option value="2">Admin</option>
                                <option value="1">Super Admin</option>
                            </select>
                        </div>
                </p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                <button type="submit" name="tambah" class="btn btn-primary tambahuser">Tambah</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="hapususer">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Lanjutkan?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Pilih tombol 'hapus' untuk menghapus user <span id="hps-nama-lengkap"></span> ? </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                <a href="#" class="btn btn-danger" id="hps-id-user">Hapus</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="editprofil">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div id="dataprofil"></div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="gantipassword">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="<?php echo base_url('admin/aksigantipass') ?>" method="post">
                <div class="modal-header">
                    <h4 class="modal-title">Ubah password</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="id_user" name="id_user" value="<?php echo $this->session->userdata('id_user') ?>">
                    <div class="form-group">
                        <label for="">Password lama</label>
                        <div class="input-group">
                            <input type="password" id="password_lama" name="password_lama" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Password baru</label>
                        <div class="input-group">
                            <input type="password" id="password_baru" name="password_baru" class="form-control" required>
                        </div>
                        <span class="text-danger" id="password_baru_message"></span>
                    </div>
                    <div class="form-group">
                        <label for="">Konfirmasi password baru</label>
                        <div class="input-group">
                            <input type="password" id="password_baru2" name="password_baru2" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    <button type="submit" id="btnubahpassword" name="ubah" class="btn btn-primary">Ubah</button>
                    <button type="submit" disabled style="display: none;" name="ubah" class="btn btn-primary btnubahpassword">Ubah</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
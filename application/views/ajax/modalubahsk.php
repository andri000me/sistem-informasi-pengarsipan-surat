<form role="form" action="<?= base_url('admin/aksiubahsk') ?>" method="post" enctype="multipart/form-data">
    <div class="modal-header">
        <h4 class="modal-title">Ubah Data</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="card-body row">
            <?php
            foreach ($suratkeluar as $key) :
            ?>
                <div class="col-md">
                    <input type="hidden" name="id_suratkeluar" value="<?= $key->id_suratkeluar ?>">
                    <div class="form-group">
                        <label>No. Surat</label>
                        <?php $today = date('d,m,Y');
                        $pecah = explode(',', $today);
                        $bulan = $pecah[1];
                        $tahun = $pecah[2]; ?>
                        <input type="text" name="no_suratkeluar" class="form-control" value="<?= $key->no_suratkeluar ?>">
                    </div>
                    <div class="form-group">
                        <label>Judul Surat Keluar</label>
                        <input type="text" name="judul_suratkeluar" class="form-control" value="<?= $key->judul_suratkeluar ?>" placeholder="Judul Surat">
                    </div>
                    <div class="form-group">
                        <label>Tujuan</label>
                        <input type="text" name="tujuan" class="form-control" value="<?= $key->tujuan ?>" placeholder="Tujuan">
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-group">
                        <label>Tanggal Keluar:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                            <input type="date" name="tanggal_keluar" class="form-control" value="<?= $key->tanggal_keluar ?>" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask value="<?php echo date('Y-m-d') ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Jenis Surat</label>
                        <select class="form-control" name="id_indeks">
                            <option value="<?= $key->id_indeks ?>">
                                <?= $key->judul_indeks ?></option>
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
                                <label class="custom-file-label" for="exampleInputFile"><?= $key->berkas_suratkeluar ?></label>
                            </div>
                        </div>
                        <small class="text-danger">Dokumen surat, bisa berupa doc, docx, pdf, jpg dan png.</small>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea class="form-control" name="keterangan" placeholder="Keterangan"><?= $key->keterangan ?></textarea>
                    </div>
                </div>
            <?php
            endforeach;
            ?>
        </div>
    </div>
    <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        <button type="submit" name="ubah" class="btn btn-primary">Ubah</button>
    </div>
</form>
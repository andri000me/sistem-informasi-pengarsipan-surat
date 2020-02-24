<form role="form" action="<?= base_url('admin/editdisp') ?>" method="POST" enctype="multipart/form-data">
    <?php foreach($disposisi as $ds): ?>
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
                        <input type="hidden" name="id_disposisi" value="<?php echo $ds->id_disposisi ?>">
                        <input type="hidden" name="id_suratmasuk" value="<?php echo $ds->id_suratmasuk ?>">
                        <div class="form-group">
                            <label>Pengisi disposisi</label>
                            <select name="pengisi" id="pengisi" class="form-control" required>
                                <option value="<?php echo $ds->pengisi ?>">-- <?php echo $ds->pengisi ?> --</option>
                                <option value="Kepala Sekolah">Kepala Sekolah</option>
                                <option value="Staff Tata Usaha">Staff Tata Usaha</option>
                                <option value="Wakil Kurikulum">Wakil Kurikulum</option>
                            </select>
                            <small><span class="text-danger text-small" id="alertpengisi"></span></small>
                        </div>
                        <div class="form-group">
                            <label>Diteruskan kepada</label>
                            <input type="text" name="tujuan" value="<?php echo $ds->tujuan ?>" class="form-control" placeholder="Tujuan" required="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Instruksi/Informasi</label>
                            <input type="text" name="instruksi" value="<?php echo $ds->instruksi ?>" class="form-control" placeholder="Instruksi/Informasi diisi terlebih dahulu oleh pengisi disposisi">
                        </div>
                        <div class="form-group">
                            <label>Catatan</label>
                            <textarea name="catatan" class="form-control" placeholder="Catatan"><?php echo $ds->catatan ?></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            <button type="submit" name="ubah" class="btn btn-primary">Ubah</button>
        </div>
    <?php endforeach; ?>
</form>
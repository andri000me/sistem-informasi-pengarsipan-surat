<div class="modal-content">
    <form action="<?= base_url('admin/aksiubahsm') ?>" method="POST" enctype="multipart/form-data">
        <div class="modal-header">
            <h4 class="modal-title">Ubah Data</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="card-body row">
                <?php foreach ($suratmasuk as $sm) : ?>
                    <input type="hidden" id="id_suratmasuk" name="id_suratmasuk" value="<?= $sm->id_suratmasuk ?>">
                    <div class="col-md">
                        <div class="form-group">
                            <label>No. Surat</label>
                            <?php $today = date('d,m,Y');
                            $pecah = explode(',', $today);
                            $bulan = $pecah[1];
                            $tahun = $pecah[2]; ?>
                            <input type="text" id="no_suratmasuk" name="no_suratmasuk" class="form-control" value="<?= $sm->no_suratmasuk ?>">
                        </div>
                        <div class="form-group">
                            <label>Judul Surat Masuk</label>
                            <input type="text" id="judul_suratmasuk" name="judul_suratmasuk" class="form-control" value="<?= $sm->judul_suratmasuk ?>" required="">
                        </div>
                        <div class="form-group">
                            <label>Asal Surat</label>
                            <input type="text" id="asal_surat" name="asal_surat" class="form-control" value="<?= $sm->asal_surat ?>" required="">
                        </div>
                        <div class="form-group">
                            <label>Dokumen surat</label>
                            <div class="input-group">
                                <div class="custom-file">s
                                    <input type="file" name="berkas_suratmasuk" class="custom-file-input">
                                    <label class="custom-file-label"><?= $sm->berkas_suratmasuk ?></label>
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
                                <input type="date" id="tanggal_masuk" name="tanggal_masuk" value="<?= $sm->tanggal_masuk ?>" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Diterima:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                </div>
                                <input type="date" id="tanggal_diterima" name="tanggal_diterima" value="<?= $sm->tanggal_diterima ?>" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Index Surat</label>
                            <select class="form-control" name="id_indeks">
                                <option id="id_indeks" value="<?= $sm->id_indeks ?>">
                                    <?php
                                    echo $sm->judul_indeks
                                    ?></option>
                                <?php foreach ($indeks as $i) : ?>
                                    <option value="<?php echo $i->id_indeks; ?>">
                                        <?php echo strtoupper($i->judul_indeks); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Keterangan</label>
                            <textarea class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan"><?php echo $sm->keterangan ?></textarea>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            <button type="submit" name="ubah" class="btn btn-primary">Ubah</button>
        </div>
    </form>
</div>
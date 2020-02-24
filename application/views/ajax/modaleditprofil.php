<?php
foreach ($profil as $p) :
?>
    <form action="<?php echo base_url('admin/aksiubahprofil') ?>" enctype="multipart/form-data" method="post">
        <div class="modal-header">
            <h4 class="modal-title">Ubah Data <?php echo $p->nama_lengkap ?></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <input type="hidden" name="id_user" value="<?= $p->id_user ?>">
            <div class="form-group">
                <label for="">Nama Lengkap</label>
                <div class="input-group">
                    <input type="text" id="nama_lengkap" name="nama_lengkap" value="<?= $p->nama_lengkap ?>" class="form-control" required>
                </div>
            </div>
            <div class="form-group">
                <label for="">Username</label>
                <div class="input-group">
                    <input type="text" id="username" name="username" value="<?= $p->username ?>" class="form-control" required>
                </div>
            </div>
            <div class="form-group">
                <label for="">Bio</label>
                <textarea name="bio" id="bio" required class="form-control" rows="3"><?php echo $p->bio ?></textarea>
            </div>
            <div class="form-group">
                <label for="">Facebook</label>
                <div class="input-group">
                    <input type="text" id="facebook" name="facebook" value="<?php if ($p->facebook == null) {
                                                                                echo 'http://facebook.com/' . $p->username;
                                                                            } else {
                                                                                echo $p->facebook;
                                                                            } ?>" class="form-control" required>
                </div>
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <div class="input-group">
                    <input type="email" id="email" name="email" value="<?php if ($p->email == null) {
                                                                            echo 'user@email.com';
                                                                        } else {
                                                                            echo $p->email;
                                                                        } ?>" class="form-control" required>
                </div>
            </div>
            <div class="form-group">
              <label for="">Pilih gambar</label>
              <input type="file" class="form-control" name="image" id="image">
            </div>
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            <button type="submit" name="ubah" class="btn btn-primary">Ubah</button>
        </div>
    </form>
<?php
endforeach;
?>
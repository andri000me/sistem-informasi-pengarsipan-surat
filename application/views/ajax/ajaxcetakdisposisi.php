<?php foreach($disposisi as $ds): ?>
  <div class="col-12 table-responsive">
    <table class="table table-white bg-white table-bordered" width="60%" cellpadding="10" cellspacing="0">
      <thead>
        <tr>
          <th colspan="3">
            <img src="<?php echo base_url('vendor/') ?>img/logo.jpg" alt="logo.jpg" width="150" height="150" style="float: left; margin-left: 80px; ">
            <center><h1>Lembar Disposisi<br>SMK DAREL HIKMAH PEKANBARU <br></h1>
              <span class="text-muted">Jl. Manyar Sakti, No. 12, Simpang Baru, Pekanbaru</span></center>
          </th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><b>Nomor</b></td>
          <td><?php echo $ds->no_suratmasuk; ?></td>
          <td><b>Diteruskan kepada</b></td>
        </tr>
        <tr>
          <td><b>Perihal</b></td>
          <td><?php echo $ds->judul_suratmasuk; ?></td>
          <td><?php echo $ds->tujuan; ?></td>
        </tr>
        <tr>
          <td><b>Tanggal</b></td>
          <td><?php $tanggal=date_create($ds->tanggal_masuk); ?><?php echo date_format($tanggal, "d - m - Y"); ?></td>
          <td><b>Catatan</b></td>
        </tr>
        <tr>
          <td><b>Asal</b></td>
          <td><?php echo $ds->asal_surat; ?></td>
          <td><?php echo $ds->catatan; ?></td>
        </tr>
        <tr>
          <td rowspan="4" colspan="3"><b>Instruksi/Informasi</b><br>
            <textarea name="" class="form-control" id="" cols="30" rows="10"><?php echo $ds->instruksi; ?></textarea>
            <br>
            <ol>
              <li><strong>Kepada bawahan "Instruksi" dan coret "Informasi"</strong></li>
              <li><strong>Kepada atasan "Informasi" dan coret "Instruksi"</strong></li>
            </ol>
          </td>
        </tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
      </tbody>
    </table>
  </div>
<?php endforeach; ?>
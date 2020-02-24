<thead>
    <tr>
        <th>No.</th>
        <th>Nomor Surat</th>
        <th>Judul Surat</th>
        <th>Indeks</th>
        <th>Asal Surat</th>
        <th>Tanggal Masuk</th>
        <th>Tanggal Diterima</th>
        <th>Keterangan</th>
    </tr>
</thead>
<tbody>
    <?php $no = 1;
    foreach ($suratmasuk as $sm) : ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $sm->no_suratmasuk; ?></td>
            <td><?= $sm->judul_suratmasuk; ?></td>
            <td><?= $sm->judul_indeks; ?></td>
            <td><?= $sm->asal_surat; ?></td>
            <td><?php $date = date_create($sm->tanggal_masuk);
                echo date_format($date, 'd/m/Y'); ?></td>
            <td><?php $date = date_create($sm->tanggal_diterima);
                echo date_format($date, 'd/m/Y'); ?></td>
            <td><?= $sm->keterangan; ?></td>
        </tr>
    <?php endforeach; ?>
</tbody>
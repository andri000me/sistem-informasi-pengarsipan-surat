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
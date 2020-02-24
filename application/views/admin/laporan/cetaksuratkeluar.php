<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $title; ?></title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url('vendor/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url('vendor/') ?>css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="<?php echo base_url('vendor/') ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top" onload="window.print()">
    <hr>
    <center>
        <h1>Laporan Surat Keluar</h1>
        <h2>SMK Darel Hikmah kota Pekanbaru</h2>
        <span class="text-muted">Jl. Manyar Sakti KM. 12, Simpang Baru, Tampan, Pekanbaru</span>
    </center>
    <hr>
    <div class="table-responsive">
        <table class="table table-bordered" id="cetaksuratkeluar" width="100%" cellspacing="0">
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
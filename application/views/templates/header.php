<?php
if ($this->session->userdata('level') == 1) {
  $user = 'superadmin';
} elseif ($this->session->userdata('level') == 2) {
  $user = 'admin';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>E-Arsip - <?php echo $title; ?></title>
  
  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url('vendor/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url('vendor/') ?>css/sb-admin-2.min.css" rel="stylesheet">

  <!-- sweet alert 2 -->
  <link rel="stylesheet" href="<?= base_url('vendor/') ?>swal/dist/sweetalert2.min.css">

  <!-- Custom styles for this page -->
  <link href="<?php echo base_url('vendor/') ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

  <link href="<?php echo base_url('vendor/') ?>vendor/fontawesome-free-5.12.0-web/css/all.min.css" rel="stylesheet">
</head>

<body id="page-top">
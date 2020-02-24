<!-- Logout Modal-->
<div class="modal" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Lanjutkan?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Pilih tombol 'logout' untuk melanjutkan.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
        <a class="btn btn-primary" href="<?= base_url('auth/logout') ?>">Logout</a>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?php echo base_url('vendor/') ?>vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url('vendor/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?php echo base_url('vendor/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?php echo base_url('vendor/') ?>js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?php echo base_url('vendor/') ?>vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?php echo base_url('vendor/') ?>js/demo/chart-area-demo.js"></script>
<script src="<?php echo base_url('vendor/') ?>js/demo/chart-pie-demo.js"></script>

<!-- Page level plugins -->
<script src="<?php echo base_url('vendor/') ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('vendor/') ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?php echo base_url('vendor/') ?>js/demo/datatables-demo.js"></script>

<!-- sweet alert 2 -->
<script src="<?php echo base_url('vendor/') ?>swal/dist/sweetalert2.js"></script>

<script src="<?php echo base_url('vendor/') ?>vendor/fontawesome-free-5.12.0-web/js/all.min.js"></script>

<script src="<?= base_url('vendor/vendor/jqueryprint/jquery.print.js') ?>"></script>


<script src="<?php echo base_url('vendor/') ?>js/usercustom.js"></script>

</body>

</html>
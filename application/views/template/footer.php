<footer class="main-footer">
  <div class="footer-left">
    Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="">WebCrafters</a>
  </div>
  <div class="footer-right">
    v1.0
  </div>
</footer>
</div>
</div>

<!-- General JS Script -->
<script src="<?= base_url('assets/template') ?>/node_modules/jquery/dist/jquery.min.js"></script>
<script src="<?= base_url('assets/template') ?>/node_modules/popper.js/dist/umd/popper.min.js"></script>
<script src="<?= base_url('assets/template') ?>/node_modules/tooltip.js"></script>
<script src="<?= base_url('assets/template') ?>/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?= base_url('assets/template') ?>/node_modules/jquery.nicescroll/dist/jquery.nicescroll.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="<?= base_url('assets/template') ?>/assets/js/stisla.js"></script>

<!-- JS Libraries -->
<script src="<?= base_url('assets/template') ?>/node_modules/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/template') ?>/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/template') ?>/node_modules/datatables.net-select-bs4/js/select.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/template') ?>/node_modules/select2/dist/js/select2.full.min.js"></script>
<script src="<?= base_url('assets/template') ?>/node_modules/selectric/public/jquery.selectric.min.js"></script>
<script src="<?= base_url('assets/template') ?>/assets/js/page/modules-datatables.js"></script>
<script src="<?= base_url('assets/template') ?>/assets/js/page/forms-advanced-forms.js"></script>
<script src="<?= base_url('assets/template') ?>/assets/js/page/bootstrap-modal.js"></script>
<script src="<?= base_url('assets/template') ?>/node_modules/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="<?= base_url('assets/template') ?>/node_modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
<script src="<?= base_url('assets/template') ?>/node_modules/jquery-pwstrength/jquery.pwstrength.min.js"></script>
<!-- <script src="<?= base_url('assets/template') ?>/node_modules/cleave-js/dist/cleave.min.js"></script> -->
<!-- <script src="<?= base_url('assets/template') ?>/js/page/forms-advanced-forms.js"></script> -->

<!-- Template JS File -->
<script src="<?= base_url('assets/template') ?>/assets/js/scripts.js"></script>
<script src="<?= base_url('assets/template') ?>/assets/js/custom.js"></script>

<script>
  $('.logout').on('click', function(e) {

    e.preventDefault();

    const href = $(this).attr('href');

    Swal.fire({
      title: 'Yakin ingin logout?',
      text: 'Jika anda logout maka session akan terhapus!',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Logout!',
      cancelButtonText: 'Batal'
    }).then((result) => {
      if (result.value) {
        document.location.href = href;
      }
    });

  });
</script>

</body>

</html>
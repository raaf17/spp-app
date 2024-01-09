<footer class="main-footer">
  <div class="footer-left">
    Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://nauv.al/">WebCrafters</a>
  </div>
  <div class="footer-right">
    v1.0
  </div>
</footer>
</div>
</div>

<!-- JS Libraies -->
<script src="<?= base_url('assets/template/') ?>/node_modules/datatables/datatables.min.js"></script>
<script src="<?= base_url('assets/template/') ?>/node_modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>
<script src="<?= base_url('assets/template/') ?>/node_modules/jquery-ui/jquery-ui.min.js"></script>

<!-- Page Specific JS File -->
<script src="<?= base_url('assets/template/') ?>/assets/js/page/modules-datatables.js"></script>

<!-- General JS Scripts -->
<script src="<?= base_url('assets/template/') ?>/node_modules/jquery/dist/jquery.min.js"></script>
<script src="<?= base_url('assets/template/') ?>/node_modules/popper.js/dist/umd/popper.min.js"></script>
<script src="<?= base_url('assets/template/') ?>/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?= base_url('assets/template/') ?>/node_modules/jquery.nicescroll/dist/jquery.nicescroll.min.js"></script>
<script src="<?= base_url('assets/template/') ?>/node_modules/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/template/') ?>/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="<?= base_url('assets/template/') ?>/assets/js/stisla.js"></script>

<!-- JS Libraies -->
<script src="<?= base_url('assets/template/') ?>/assets/modules/chart.min.js"></script>
<script src="<?= base_url('assets/template/') ?>/assets/js/page/modules-sweetalert.js"></script>

<!-- Page Specific JS File -->
<script src="<?= base_url('assets/template/') ?>/assets/js/page/modules-chartjs.js"></script>
<!-- SweetAlert2 -->
<script src="<?= base_url('assets/adminlte/') ?>plugins/sweetalert2/sweetalert2.all.js"></script>
<!-- <script src="<?= base_url('assets/js/Mysweetalert.js') ?>"></script> -->

<!-- General JS Scripts -->
<script src="<?= base_url('assets/template/') ?>/node_modules/popper.js/dist/popper.js"></script>
<script src="<?= base_url('assets/template/') ?>/node_modules/tooltip.js/dist/tooltip.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script type="text/javascript">
  $('.logout').on('click', function(event) {
    // var form = $(this).closest("form");
    // var name = $(this).data("name");
    event.preventDefault();
    const href = $(this).attr('href');
    swal({
        title: `Yakin ingin logout?`,
        text: "Jika anda logout maka session akan terhapus!",
        // icon: "warning",
        // buttons: true,
        // dangerMode: true,
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Logout!',
        cancelButtonText: 'Batal'
      })
      .then((result) => {
        if (result.value) {
          document.location.href = href;
        }
      });
  });
</script>

<script>
  $('.logout').on('click', function(e) {

    e.preventDefault();

    const href = $(this).attr('href');

    Swal.fire({
      title: 'Yakin ingin logout?',
      text: 'Jika anda logout maka session akan terhapus!',
      type: 'warning',
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

<!-- Template JS File -->
<script src="<?= base_url('assets/template/') ?>/assets/js/scripts.js"></script>
<script src="<?= base_url('assets/template/') ?>/assets/js/custom.js"></script>

<!-- Page Specific JS File -->
</body>

</html>
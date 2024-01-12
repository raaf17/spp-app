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
<script src="<?= base_url('assets/template/') ?>/node_modules/jquery/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="<?= base_url('assets/template/') ?>/node_modules/popper.js/dist/umd/popper.min.js"></script>
<script src="<?= base_url('assets/template/') ?>/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?= base_url('assets/template/') ?>/node_modules/jquery.nicescroll/dist/jquery.nicescroll.min.js"></script>
<script src="<?= base_url('assets/template/') ?>/node_modules/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/template/') ?>/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/template/') ?>/node_modules/tooltip.js/dist/tooltip.js"></script>
<script src="<?= base_url('assets/template/') ?>/assets/js/stisla.js"></script>

<!-- SweetAlert2 -->
<script src="<?= base_url('assets/js/Mysweetalert.js') ?>"></script>

<!-- Template JS File -->
<script src="<?= base_url('assets/template/') ?>/assets/js/scripts.js"></script>
<script src="<?= base_url('assets/template/') ?>/assets/js/custom.js"></script>

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
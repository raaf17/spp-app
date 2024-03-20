<!-- Main content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Data SPP Lainnya</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Master Data</a></div>
        <div class="breadcrumb-item">Data SPP</div>
        <div class="breadcrumb-item">Tambah Data SPP Lainnya</div>
      </div>
    </div>

    <div class="section-body">
      <div class="card card-primary">
        <div class="card-header">
          <h4>Tambah Data SPP Lainnya</h4>
        </div>
        <div class="card-body">
          <form method="post" action="<?= base_url('masterdata/add_sppmore') ?>">
            <div class="form-group">
              <label for="nama_pembayaran">Nama Pembayaran</label>
              <input type="text" class="form-control" id="nama_pembayaran" name="nama_pembayaran">
              <?= form_error('nama_pembayaran', '<small class="text-danger ml-2">', '</small>'); ?>
            </div>
            <label for="tahun">Tahun Ajaran</label>
            <div class="form-group d-flex">
              <select class="form-control" id="tahun_awal" name="tahun_awal">
                <option value="">-- Pilih --</option>
                <?php for ($tahun = 2000; $tahun <= date('Y'); $tahun++) : ?>
                  <option><?= $tahun ?></option>
                <?php endfor ?>
              </select> <span class="ml-2 mr-2 p-1" style="font-size: 20px;">/</span>
              <select class="form-control" id="tahun_akhir" name="tahun_akhir">
                <option value="">-- Pilih --</option>
                <?php for ($tahun = 2000; $tahun <= date('Y'); $tahun++) : ?>
                  <option><?= $tahun ?></option>
                <?php endfor ?>
              </select>
            </div>
            <?= form_error('tahun_awal', '<small class="text-danger ml-2">', '</small>'); ?>
            <?= form_error('tahun_akhir', '<small class="text-danger ml-2">', '</small>'); ?>
            <div class="form-group">
              <label for="nominal">Nominal</label>
              <input type="number" class="form-control" id="nominal" name="nominal">
              <?= form_error('nominal', '<small class="text-danger ml-2">', '</small>'); ?>
            </div>
            <button type="submit" class="btn btn-primary">Tambah <i class="fas fa-plus"></i></button>
            <a href="<?= base_url('masterdata/spp') ?>" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
          </form>
        </div>
      </div>
    </div>
    <div class="row">
      <section class="col-lg-7 connectedSortable">

      </section>
    </div>
</div>
</section>

</div>


<!-- jQuery -->
<script src="<?= base_url('assets/') ?>js/jquery.js"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<script src="<?= base_url('assets/js/Mysweetalert.js') ?>"></script>

<script>
  show_data();

  function show_data() {
    $.ajax({
      type: 'ajax',
      url: '<?php echo site_url('masterdata/list_petugas') ?>',
      async: true,
      dataType: 'html',
      success: function(data) {
        $('#show_data').html(data);
        $('#dataTable').DataTable();
      }
    });
  }
</script>
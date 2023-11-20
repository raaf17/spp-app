<?= $this->extend('layout/dashboard') ?>

<?= $this->section('title') ?>
<title>Data Pembayaran &mdash; SPPKITA</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
  <div class="section-header">
    <h1>Pembayaran</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="#">Keuangan</a></div>
      <div class="breadcrumb-item">Pembayaran</div>
    </div>
  </div>
</section>
<div class="section">
  <div class=" section-body">
    <div class="row">
      <div class="col-12">
        <div class="card card-primary">
          <form action="<?= site_url('pembayaran/pembayaran'); ?>" method="post">
            <div class="card-body mt-4">
              <div class="row">
                <?= csrf_field(); ?>
                <div class="col">
                  <div class="form-group custom-select-icon">
                    <select class="custom-select" name="id_siswa" id="id_siswa">
                      <option value="" hidden></option>
                      <?php foreach ($siswa_data as $key => $value) : ?>
                        <option value="<?= $value->id_siswa; ?>"><?= $value->nama_siswa; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
                <div class="col col-lg-4">
                  <div class="form-group custom-select-icon">
                    <select class="custom-select" name="id_tagihan" id="id_tagihan">
                      <option value="" hidden></option>
                      <?php foreach ($tagihan_data as $key => $value) : ?>
                        <option value="<?= $value->id_tagihan; ?>"><?= $value->nama_tagihan; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
                <div class="col col-lg-2">
                  <div class="form-group custom-select-icon">
                    <select class="custom-select" name="id_tahunajaran" id="id_tahunajaran">
                      <option value="" hidden></option>
                      <?php foreach ($tahunajaran_data as $key => $value) : ?>
                        <option value="<?= $value->id_tahunajaran; ?>"><?= $value->tahun; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-auto">
                  <button type="submit" name="cari" class="btn btn-primary" style="padding: 8px 30px;">
                    Cari
                  </button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" tabindex="-1" id="pay" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <form>
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Pembayaran</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="pay_date" class="text-capitalize">
                Tanggal bayar
                <small class="required text-danger">*</small>
              </label>
              <input type="text" class="datepicker form-control " name="pay_date" value="">
            </div>
            <div class="form-group">
              <label for="pay" class="text-capitalize">
                Nominal
                <small class="required text-danger">*</small>
              </label>
              <input id="pay" type="text" class="form-control number " name="pay">
            </div>
            <div class="form-group">
              <label for="change" class="text-capitalize">
                Kembalian
              </label>
              <input id="change" type="text" class="form-control number " name="change">
            </div>
          </div>
          <div class="modal-footer bg-whitesmoke">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button class="btn btn-primary">Bayar</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
</div>
<?= $this->endSection() ?>
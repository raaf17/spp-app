<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Data Tagihan &mdash; SPPCERIA</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
  <div class="section-header">
    <div class="section-header-back">
      <a href="<?= site_url('tagihan'); ?>" class="btn"><i class="fas fa-arrow-left"></i></a>
    </div>
    <h1>Create Tagihan</h1>
  </div>

  <div class="section-body">

    <div class="card">

      <div class="card-header">
        <h4>Data Tagihan</h4>
      </div>
      <div class="card-body col-md-6">
        <?php $validation = \Config\Services::validation(); ?>
        <form action="<?= site_url('tagihan'); ?>" method="post" autocomplete="off">
        <?= csrf_field(); ?>
          <div class="form-group">
            <label for="">Nama Tagihan</label>
            <input type="text" name="nama_tagihan" value="<?= old('nama_tagihan'); ?>" class="form-control <?= $validation->hasError('nama_tagihan') ? 'is-invalid' : null ?>" autofocus>
            <div class="invalid-feedback">
              <?= $validation->getError('nama_tagihan'); ?>
            </div>
          </div>
          <div class="form-group">
            <label for="">Nominal</label>
            <input type="text" name="nominal" value="<?= old('nominal'); ?>" class="form-control <?= $validation->hasError('nominal') ? 'is-invalid' : null ?>" autofocus>
            <div class="invalid-feedback">
              <?= $validation->getError('nominal'); ?>
            </div>
          </div>
          <div class="form-group">
            <label for="">Keterangan</label>
            <textarea name="keterangan" class="form-control"></textarea>
          </div>
          <div class="form-group">
            <label for="">Bulan</label>
            <input type="text" name="bulan" value="<?= old('bulan'); ?>" class="form-control <?= $validation->hasError('bulan') ? 'is-invalid' : null ?>" autofocus>
            <div class="invalid-feedback">
              <?= $validation->getError('bulan'); ?>
            </div>
          </div>
          <div>
            <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i> Save</button>
            <button type="reset" class="btn btn-secondary">Reset</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
<?= $this->endSection() ?>
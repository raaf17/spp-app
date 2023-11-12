<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Edit &mdash; SPPCERIA</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
  <div class="section-header">
    <div class="section-header-back">
      <a href="<?= site_url('spp'); ?>" class="btn"><i class="fas fa-arrow-left"></i></a>
    </div>
    <h1>Edit SPP</h1>
  </div>

  <div class="section-body">

    <div class="card">

      <div class="card-header">
        <h4>Edit SPP</h4>
      </div>
      <div class="card-body col-md-6">
      <?php $validation = \Config\Services::validation(); ?>
        <form action="<?= site_url('spp/update/'.$spp_data->id_spp); ?>" method="post" autocomplete="off">
        <?= csrf_field(); ?>
          <div class="form-group">
            <label for="">Tahun</label>
            <input type="text" name="tahun" value="<?= old('tahun', $spp_data->tahun) ?>" class="form-control <?= $validation->hasError('tahun') ? 'is-invalid' : null ?>" autofocus>
            <div class="invalid-feedback">
              <?= $validation->getError('tahun'); ?>
            </div>
          </div>
          <div class="form-group">
            <label for="">Nominal</label>
            <input type="text" name="nominal" value="<?= old('nominal', $spp_data->nominal) ?>" class="form-control <?= $validation->hasError('nominal') ? 'is-invalid' : null ?>" autofocus>
            <div class="invalid-feedback">
              <?= $validation->getError('nominal'); ?>
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
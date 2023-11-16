<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Edit &mdash; SPPKITA</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
  <div class="section-header">
    <div class="section-header-back">
      <a href="<?= site_url('tahunajaran'); ?>" class="btn"><i class="fas fa-arrow-left"></i></a>
    </div>
    <h1>Edit Tahun Ajaran</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="#">Data Master</a></div>
      <div class="breadcrumb-item">Tahun Ajaran</div>
    </div>
  </div>

  <div class="section-body">

    <div class="card">

      <div class="card-header">
        <h4>Edit Tahun Ajaran</h4>
      </div>
      <div class="card-body col-md-6">
      <?php $validation = \Config\Services::validation(); ?>
        <form action="<?= site_url('tahunajaran/update/'.$tahunajaran_data->id_tahunajaran); ?>" method="post" autocomplete="off">
        <?= csrf_field(); ?>
          <div class="form-group">
            <label for="">Tahun Ajaran</label>
            <input type="text" name="tahun" value="<?= old('tahun', $tahunajaran_data->tahun) ?>" class="form-control <?= $validation->hasError('tahun') ? 'is-invalid' : null ?>" autofocus>
            <div class="invalid-feedback">
              <?= $validation->getError('tahun'); ?>
            </div>
          </div>
          <div class="form-group">
            <label for="">Keterangan</label>
            <textarea name="keterangan" class="form-control"><?= $tahunajaran_data->keterangan; ?></textarea>
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
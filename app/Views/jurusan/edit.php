<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Edit &mdash; SPPCERIA</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
  <div class="section-header">
    <div class="section-header-back">
      <a href="<?= site_url('jurusan'); ?>" class="btn"><i class="fas fa-arrow-left"></i></a>
    </div>
    <h1>Edit Jurusan</h1>
  </div>

  <div class="section-body">

    <div class="card">

      <div class="card-header">
        <h4>Edit Jurusan</h4>
      </div>
      <div class="card-body col-md-6">
      <?php $validation = \Config\Services::validation(); ?>
        <form action="<?= site_url('jurusan/update/'.$jurusan_data->id_jurusan); ?>" method="post" autocomplete="off">
        <?= csrf_field(); ?>
          <div class="form-group">
            <label for="">Nama Jurusan</label>
            <input type="text" name="nama_jurusan" value="<?= old('nama_jurusan', $jurusan_data->nama_jurusan) ?>" class="form-control <?= $validation->hasError('nama_jurusan') ? 'is-invalid' : null ?>" autofocus>
            <div class="invalid-feedback">
              <?= $validation->getError('nama_jurusan'); ?>
            </div>
          </div>
          <div class="form-group">
            <label for="">Keterangan Jurusan</label>
            <textarea name="info_group" class="form-control"><?= $jurusan_data->info_group; ?></textarea>
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
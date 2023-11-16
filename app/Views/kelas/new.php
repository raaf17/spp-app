<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Data Kelas &mdash; SPPKITA</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
  <div class="section-header">
    <div class="section-header-back">
      <a href="<?= site_url('kelas'); ?>" class="btn"><i class="fas fa-arrow-left"></i></a>
    </div>
    <h1>Create Kelas</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="#">Data Master</a></div>
      <div class="breadcrumb-item">Kelas</div>
    </div>
  </div>

  <div class="section-body">

    <div class="card">

      <div class="card-header">
        <h4>Data Kelas</h4>
      </div>
      <div class="card-body col-md-6">
        <?php $validation = \Config\Services::validation();
        ?>
        <form action="<?= site_url('kelas'); ?>" method="post" autocomplete="off">
          <?= csrf_field(); ?>
          <div class="form-group custom-select-icon">
            <label for="">Jurusan</label>
            <select name="id_jurusan" id="id_jurusan" class="custom-select" required>
              <option value="">Pilih Jurusan</option>
              <?php foreach ($jurusan_data as $key => $value) : ?>
                <option value="<?= $value->id_jurusan; ?>"><?= $value->nama_jurusan; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="">Nama Kelas</label>
            <input type="text" name="nama_kelas" value="<?= old('nama_kelas'); ?>" class="form-control <?= $validation->hasError('nama_kelas') ? 'is-invalid' : null ?>" autofocus>
            <div class="invalid-feedback">
              <?= $validation->getError('nama_kelas'); ?>
            </div>
          </div>
            <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i> Save</button>
            <button type="reset" class="btn btn-secondary">Reset</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
<?= $this->endSection() ?>
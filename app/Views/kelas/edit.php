<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Edit &mdash; SPPCERIA</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
  <div class="section-header">
    <div class="section-header-back">
      <a href="<?= site_url('kelas'); ?>" class="btn"><i class="fas fa-arrow-left"></i></a>
    </div>
    <h1>Edit Kelas</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="#">Data Master</a></div>
      <div class="breadcrumb-item">Kelas</div>
    </div>
  </div>

  <div class="section-body">

    <div class="card">

      <div class="card-header">
        <h4>Edit Kelas</h4>
      </div>
      <div class="card-body col-md-6">
      <?php $validation = \Config\Services::validation(); ?>
        <form action="<?= site_url('kelas/update/'.$kelas_data->id_jurusan); ?>" method="post" autocomplete="off">
        <?= csrf_field(); ?>
        <div class="form-group">
            <label for="">Jurusan</label>
            <select name="id_jurusan" id="" class="form-control" required>
              <option value="" hidden></option>
              <?php foreach ($jurusan_data as $key => $value) : ?>
                <option value="<?= $value->id_jurusan; ?>" <?= $kelas_data->id_jurusan == $value->id_jurusan ? 'selected' : null ?> ><?= $value->nama_jurusan; ?></option>
              <?php endforeach; ?>
              <option value=""></option>
            </select>
          </div>
          <div class="form-group">
            <label for="">Nama Kelas</label>
            <input type="text" name="nama_kelas" value="<?= old('nama_kelas', $kelas_data->nama_kelas) ?>" class="form-control <?= $validation->hasError('nama_kelas') ? 'is-invalid' : null ?>" autofocus>
            <div class="invalid-feedback">
              <?= $validation->getError('nama_kelas'); ?>
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
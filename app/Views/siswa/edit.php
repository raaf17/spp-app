<?= $this->extend('layout/dashboard') ?>

<?= $this->section('title') ?>
<title>Edit &mdash; SPPKITA</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
  <div class="section-header">
    <div class="section-header-back">
      <a href="<?= site_url('siswa'); ?>" class="btn"><i class="fas fa-arrow-left"></i></a>
    </div>
    <h1>Edit Siswa</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="#">Data Master</a></div>
      <div class="breadcrumb-item">Siswa</div>
    </div>
  </div>

  <div class="section-body">

    <div class="card">

      <div class="card-header">
        <h4>Edit Siswa</h4>
      </div>
      <div class="card-body col-md-6">
        <?php $validation = \Config\Services::validation(); ?>
        <form action="<?= site_url('siswa/update/' . $siswa_data->id_siswa); ?>" method="post" autocomplete="off">
          <?= csrf_field(); ?>
          <div class="form-group">
            <label for="">Nama Siswa</label>
            <input type="text" name="nama_siswa" value="<?= old('nama_siswa', $siswa_data->nama_siswa) ?>" class="form-control <?= $validation->hasError('nama_siswa') ? 'is-invalid' : null ?>" autofocus>
            <div class="invalid-feedback">
              <?= $validation->getError('nama_siswa'); ?>
            </div>
          </div>
          <div class="form-group">
            <label for="">NIS</label>
            <input type="text" name="nis" value="<?= old('nis', $siswa_data->nis) ?>" class="form-control <?= $validation->hasError('nis') ? 'is-invalid' : null ?>" autofocus>
            <div class="invalid-feedback">
              <?= $validation->getError('nis'); ?>
            </div>
          </div>
          <div class="form-group">
            <label for="">NISN</label>
            <input type="text" name="nisn" value="<?= old('nisn', $siswa_data->nisn) ?>" class="form-control <?= $validation->hasError('nisn') ? 'is-invalid' : null ?>" autofocus>
            <div class="invalid-feedback">
              <?= $validation->getError('nisn'); ?>
            </div>
          </div>
          <div class="form-group">
            <label for="">Kelas</label>
            <select name="id_kelas" id="" class="form-control" required>
              <option value="" hidden></option>
              <?php foreach ($kelas_data as $key => $value) : ?>
                <option value="<?= $value->id_kelas; ?>" <?= $siswa_data->id_kelas == $value->id_kelas ? 'selected' : null ?>><?= $value->nama_kelas; ?></option>
              <?php endforeach; ?>
              <option value=""></option>
            </select>
          </div>
          <div class="form-group">
            <label for="">Jenis Kelamin</label>
            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
              <option value="<?= $siswa_data->jenis_kelamin; ?>" ><?= $siswa_data->jenis_kelamin; ?></option>
              <option value="Laki-laki" name="laki-laki">Laki-laki</option>
              <option value="Perempuan" name="perempuan">Perempuan</option>
            </select>
          </div>
          <div class="form-group">
            <label for="">No. Telepon</label>
            <input type="text" name="no_telp" value="<?= old('no_telp', $siswa_data->no_telp) ?>" class="form-control <?= $validation->hasError('no_telp') ? 'is-invalid' : null ?>" autofocus>
            <div class="invalid-feedback">
              <?= $validation->getError('no_telp'); ?>
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
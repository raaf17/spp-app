<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Edit &mdash; SPPCERIA</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
  <div class="section-header">
    <div class="section-header-back">
      <a href="<?= site_url('petugas'); ?>" class="btn"><i class="fas fa-arrow-left"></i></a>
    </div>
    <h1>Edit Petugas</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="#">Data Master</a></div>
      <div class="breadcrumb-item">Petugas</div>
    </div>
  </div>

  <div class="section-body">

    <div class="card">

      <div class="card-header">
        <h4>Edit Petugas</h4>
      </div>
      <div class="card-body col-md-6">
      <?php $validation = \Config\Services::validation(); ?>
        <form action="<?= site_url('petugas/update/'.$petugas_data->id_user); ?>" method="post" autocomplete="off">
        <?= csrf_field(); ?>
          <div class="form-group">
            <label for="">Username</label>
            <input type="text" name="username" value="<?= old('username', $petugas_data->username) ?>" class="form-control <?= $validation->hasError('username') ? 'is-invalid' : null ?>" autofocus>
            <div class="invalid-feedback">
              <?= $validation->getError('username'); ?>
            </div>
          </div>
          <div class="form-group">
            <label for="">Email</label>
            <input type="text" name="email" value="<?= old('email', $petugas_data->email) ?>" class="form-control <?= $validation->hasError('email') ? 'is-invalid' : null ?>" autofocus>
            <div class="invalid-feedback">
              <?= $validation->getError('email'); ?>
            </div>
          </div>
          <div class="form-group">
            <label for="">Password</label>
            <input type="text" name="password" value="<?= old('password', $petugas_data->password) ?>" class="form-control <?= $validation->hasError('password') ? 'is-invalid' : null ?>" autofocus>
            <div class="invalid-feedback">
              <?= $validation->getError('password'); ?>
            </div>
          </div>
          <div class="form-group">
            <label for="">Nama Petugas</label>
            <input type="text" name="nama_petugas" value="<?= old('nama_petugas', $petugas_data->nama_petugas) ?>" class="form-control <?= $validation->hasError('nama_petugas') ? 'is-invalid' : null ?>" autofocus>
            <div class="invalid-feedback">
              <?= $validation->getError('nama_petugas'); ?>
            </div>
          </div>
          <div class="form-group">
            <label for="">Level</label>
            <select name="level" id="level" class="form-control" required>
              <option value="<?= $petugas_data->level; ?>"><?= $petugas_data->level; ?></option>
              <option value="Admin">Admin</option>
              <option value="Petugas">Petugas</option>
            </select>
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
<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Data Petugas &mdash; SPPCERIA</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
  <div class="section-header">
    <div class="section-header-back">
      <a href="<?= site_url('jurusan'); ?>" class="btn"><i class="fas fa-arrow-left"></i></a>
    </div>
    <h1>Create Petugas</h1>
  </div>

  <div class="section-body">

    <div class="card">

      <div class="card-header">
        <h4>Data Petugas</h4>
      </div>
      <div class="card-body col-md-6">
        <?php $validation = \Config\Services::validation(); ?>
        <form action="<?= site_url('jurusan'); ?>" method="post" autocomplete="off">
          <?= csrf_field(); ?>
          <div class="form-group">
            <label for="">Username</label>
            <input type="text" name="username" value="<?= old('username'); ?>" class="form-control" autofocus>
          </div>
          <div class="form-group">
            <label for="">Password</label>
            <input type="password" name="password" value="<?= old('password'); ?>" class="form-control" autofocus>
          </div>
          <div class="form-group">
            <label for="">Nama Petugas</label>
            <input type="text" name="nama_petugas" value="<?= old('nama_petugas'); ?>" class="form-control" autofocus>
          </div>
          <div class="form-group">
            <label for="">Level</label>
            <select name="level" id="level" class="form-control" required>
              <option value="" hidden>Pilih Level</option>
              <option value="admin">Admin</option>
              <option value="petugas">Petugas</option>
              <option value="siswa">Siswa</option>
            </select>
          </div>
          <div>
            <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i> Save</button>
            <button type="reset" class="btn btn-secondary">Reset</button>
          </div>
      </div>
      </form>
    </div>
  </div>
  </div>
</section>
<?= $this->endSection() ?>
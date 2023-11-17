<?= $this->extend('layout/dashboard') ?>

<?= $this->section('title') ?>
<title>Home &mdash; SPPKITA</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
  <div class="section-header">
    <h1>Dashboard</h1>
  </div>

  <div class="section-body">
    <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-primary">
            <i class="far fa-user"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Siswa</h4>
            </div>
            <div class="card-body">
              <?= countData('siswa'); ?>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-primary">
            <i class="far fa-newspaper"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Kelas</h4>
            </div>
            <div class="card-body">
              <?= countData('kelas'); ?>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-primary">
            <i class="fas fa-money-bill-1-wave"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Uang Bulan Ini</h4>
            </div>
            <div class="card-body">
              <?= countData('pembayaran'); ?>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-primary">
            <i class="fas fa-money-bill-1-wave"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Uang Tahun Ini</h4>
            </div>
            <div class="card-body">
              2.000.000
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?= $this->endSection() ?>
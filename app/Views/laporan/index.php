<?= $this->extend('layout/dashboard') ?>

<?= $this->section('title') ?>
<title>Laporan &mdash; SPPKITA</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
  <div class="section-header">
    <h1>Laporan</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="#">Ekstra</a></div>
      <div class="breadcrumb-item">Laporan</div>
    </div>
  </div>

  <div class="section-body">
    <h2 class="section-title">Laporan</h2>
    <p class="section-lead">
    Laporan siswa dan keuangan.
    </p>

    <div class="row">
      <div class="col-lg-6">
        <div class="card card-large-icons">
          <div class="card-icon bg-primary text-white">
            <i class="fas fa-cog"></i>
          </div>
          <div class="card-body">
            <h4>Laporan Siswa</h4>
            <p>Mengenai data jurusan, kelas, dan siswa.</p>
            <a href="features-setting-detail.html" class="card-cta">Klik disini <i class="fas fa-chevron-right"></i></a>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="card card-large-icons">
          <div class="card-icon bg-primary text-white">
            <i class="fas fa-search"></i>
          </div>
          <div class="card-body">
            <h4>Laporan Keuangan</h4>
            <p>Mengenai data-data keuangan SPP.</p>
            <a href="features-setting-detail.html" class="card-cta">Klik disini <i class="fas fa-chevron-right"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?= $this->endSection() ?>
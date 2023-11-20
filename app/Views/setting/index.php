<?= $this->extend('layout/dashboard') ?>

<?= $this->section('title') ?>
<title>Pengaturan &mdash; SPPKITA</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
  <div class="section-header">
    <h1>Pengaturan</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="#">Ekstra</a></div>
      <div class="breadcrumb-item">Settings</div>
    </div>
  </div>

  <div class="section-body">
    <h2 class="section-title">Pengaturan</h2>
    <p class="section-lead">
    Atur sesuai kebutuhan.
    </p>

    <div class="row">
      <div class="col-lg-6">
        <div class="card card-large-icons">
          <div class="card-icon bg-primary text-white">
            <i class="fas fa-cog"></i>
          </div>
          <div class="card-body">
            <h4>Pengaturan Umum</h4>
            <p>Mengenai pengaturan logo, nama website, dan lain-lain.</p>
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
            <h4>Pengaturan Hak Akses</h4>
            <p>Mengenai pengaturan role pada admin dan petugas</p>
            <a href="features-setting-detail.html" class="card-cta">Klik disini <i class="fas fa-chevron-right"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?= $this->endSection() ?>
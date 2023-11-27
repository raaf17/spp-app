<?= $this->extend('layout/dashboard') ?>

<?= $this->section('title') ?>
<title>Rekap Laporan &mdash; SPPKITA</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
  <div class="section-header">
    <h1>Rekap Laporan</h1>
    <div class="section-header-button">
      <a href="<?= site_url('jurusan/new'); ?>" class="btn btn-primary">Add New</a>
    </div>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="#">Data Master</a></div>
      <div class="breadcrumb-item">Rekap Laporan</div>
    </div>
  </div>
  </div>
  <?= $this->endSection() ?>
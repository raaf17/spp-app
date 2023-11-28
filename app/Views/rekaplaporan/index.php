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
  </section>
  <div class="date-container">
    <div  class="date">
      <div class="card">
        <div class="card-body">
          <div class="form-group">
            <input type="date" class="form-control">
          </div>
        </div>
      </div>
    </div>
    <div class="date">
      <div class="card">
        <div class="card-body">
          <div class="form-group">
            <input type="date" class="form-control">
          </div>
        </div>
      </div>
    </div>

    <div class="button-result">
      <a href="#" class="btn btn-lg btn-dark button"><i class="fa-solid fa-magnifying-glass"></i><span style="margin-left: 20px;">Cari</span></a>
    </div> 

  </div>
  <?= $this->endSection() ?>
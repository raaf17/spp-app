<?= $this->extend('layout/dashboard') ?>

<?= $this->section('title') ?>
<title>Data Pembayaran &mdash; SPPKITA</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
  <div class="section-header">
    <h1>Pembayaran Bulanan</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="#">Keuangan</a></div>
      <div class="breadcrumb-item">Pembayaran</div>
    </div>
  </div>
</section>
<div class="section">
  <div class=" section-body">
    <div class="row">
      <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
          <div class="card-header">
            <h4>Data Bayar</h4>
          </div>
          <div class="card-body">
            <form action="<?php base_url('pembayaranbulanan/create') ?>" method="post">
              <?= csrf_field(); ?>
              <div class="form-group custom-select-icon">
                <label>Nama Petugas</label>
                <select name="id_user" id="" class="custom-select">
                  <option value=""></option>
                  <?php foreach ($petugas_data as $key => $value) { ?>
                    <option value="<?= $value->id_user; ?>"><?= $value->nama_petugas; ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group custom-select-icon">
                <label>Nama Siswa</label>
                <select name="id_siswa" id="" class="custom-select">
                  <option value=""></option>
                  <?php foreach ($siswa_data as $key => $value) { ?>
                    <option value="<?= $value->id_siswa; ?>"><?= $value->nama_siswa; ?> - <?= $value->nisn; ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group custom-select-icon">
                <label>Tagihan</label>
                <select name="id_tagihan" id="" class="custom-select">
                  <option value=""></option>
                  <?php foreach ($tagihan_data as $key => $value) { ?>
                    <option value="<?= $value->id_tagihan; ?>"><?= $value->nama_tagihan; ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group custom-select-icon">
                <label>Tahun Ajaran</label>
                <select name="id_tahunajaran" id="" class="custom-select">
                  <option value=""></option>
                  <?php foreach ($tahunajaran_data as $key => $value) { ?>
                    <option value="<?= $value->id_tahunajaran; ?>"><?= $value->tahun; ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group">
                <button type="submit" name="button" class="btn btn-primary btn-sm">Simpan Pembayaran</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
          <div class="card-header">
            <h4>Tabel Data SPP Bulanan</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped" id="table-1">
                <thead>
                  <tr>
                    <th>Bulan</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <?php foreach ($data_bulan as $key => $value) { ?>
                  <tbody>
                    <tr>
                      <td><?= $value; ?></td>
                      <td>
                        <div class="badge badge-danger">Tunggak</div>
                      </td>
                      <td>
                        <a href="<?php base_url('pembayaran/bayar') ?>" class="btn btn-success" data-toggle="modal" data-target="#modal-import-bulanan"><i class="fa-solid fa-dollar-sign"></i></a>
                        <a href="<?php base_url('pembayaran/bayar') ?>" class="btn btn-info"><i class="fa-solid fa-print"></i></a>
                      </td>
                    </tr>
                  </tbody>
                <?php } ?>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="modal-import-bulanan">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Bayar SPP Bulanan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= site_url('contacts/import'); ?>" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <label>Tanggal Bayar</label>
            <input type="date" name="tanggal" class="form-control">
          </div>
          <div class="form-group">
            <label>Nominal</label>
            <input type="text" name="nominal" class="form-control">
          </div>
        </div>
        <div class="modal-footer bg-whitesmoke br">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?= $this->endSection() ?>
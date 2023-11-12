<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Data Tagihan &mdash; SPPCERIA</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
  <div class="section-header">
    <h1>Tagihan</h1>
    <div class="section-header-button">
      <a href="<?= site_url('tagihan/new'); ?>" class="btn btn-primary">Add New</a>
    </div>
  </div>

  <?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success alert-dismissible show fade">
      <div class="alert body">
        <button class="close" data-dismiss="alert">x</button>
        <b>Success !</b>
        <?= session()->getFlashdata('success'); ?>
      </div>
    </div>
  <?php endif; ?>
  <?php if (session()->getFlashdata('error')) : ?>
    <div class="alert alert-danger alert-dismissible show fade">
      <div class="alert body">
        <button class="close" data-dismiss="alert">x</button>
        <b>Error !</b>
        <?= session()->getFlashdata('error'); ?>
      </div>
    </div>
  <?php endif; ?>

  <div class="section-body">

    <div class="card">

      <div class="card-header">
        <h4>Data Tagihan</h4>
        <div class="card-header-action">
          <a href="<?= site_url('tagihan/trash'); ?>" class="btn btn-danger"><i class="fa fa-trash"></i> Trash</a>
        </div>
      </div>
      <div class="card-body table-responsive">
        <table class="table table-striped table-md" id="table1">
          <thead>
            <tr>
              <th>#</th>
              <th>Nama Tagihan</th>
              <th>Nominal</th>
              <th>Keterangan</th>
              <th>Bulan</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($tagihan_data as $key => $value) : ?>
              <tr>
                <td><?= $key + 1; ?></td>
                <td><?= $value->nama_tagihan; ?></td>
                <td><?= $value->nominal; ?></td>
                <td><?= $value->keterangan; ?></td>
                <td><?= $value->bulan; ?></td>
                <td class="text-center" style="width: 15%;">
                  <a href="<?= site_url('tagihan/edit/' . $value->id_tagihan); ?>" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                  <form action="<?= site_url('tagihan/delete/' . $value->id_tagihan); ?>" method="post" class="d-inline" id="del-<?= $value->id_tagihan; ?>">
                    <?= csrf_field(); ?>
                    <button href="submit" class="btn btn-danger btn-sm" data-confirm="Hapus Data?|Apakah Anda Yakin?" data-confirm-yes="submitDel(<?= $value->id_tagihan; ?>)"><i class="fas fa-trash"></i></button>
                  </form>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>
<?= $this->endSection() ?>